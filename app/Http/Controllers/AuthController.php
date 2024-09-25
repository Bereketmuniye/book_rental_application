<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index()
{
    // Fetch all available books
    $books = Book::all(); 
    
    $booksByCategory = $books->groupBy('category')->map(function ($group) {
        return $group->count();
    });

    // Prepare data for the chart
    $chartData = [
        'labels' => $booksByCategory->keys(),
        'data' => $booksByCategory->values(),
    ];

    // Return the view with the books and chart data
    return view('dashboard.index', compact('books', 'chartData'));
}

public function toggle(User $user)
{
    $user->is_enabled = !$user->is_enabled; // Toggle the status
    // $user->book()-> 
    $user->save();
    $availabilityStatus = $user->is_enabled;
    $user->book()->update(['is_available' => $availabilityStatus]);

    return redirect()->back()->with('success', 'User status updated successfully.');
}

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:user,book_owner,admin',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'is_enabled' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with($validator->errors(), 422);
        }
        $isEnabled = $request->role === 'admin' ? true : ($request->has('is_enabled') ? $request->is_enabled : false);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'location' => $request->location, 
            'phone_number' => $request->phone_number, 
            'is_enabled' => $isEnabled,
        ]);
        return redirect()->route('login');
        // return response()->json(['message' => 'User registered successfully.'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Attempt to authenticate the user with the provided credentials
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user->is_enabled) {
                Auth::logout();
                return redirect()-> back()->with(['error' => 'Your account is not approved yet. Please wait for admin approval.'], 403);
            }
            $token = $user->createToken('Personal Access Token')->accessToken;

            return redirect()->route('dashboard.index'); 
        }
        return redirect()->back()->with(['error' => 'Unauthorized'], 401);
    }
    
    

    public function logout(Request $request)
{
    // Get the currently authenticated user
    $user = Auth::user();

    // Revoke the user's token
    $user->tokens()->delete();
    return redirect()->route('login');
    // return response()->json(['message' => 'Successfully logged out']);
}
}