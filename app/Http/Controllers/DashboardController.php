<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function homepage()
    {
        $books = Book::where('is_available', true)
        ->where('is_approved', true)
        ->get();

        $categories = Book::select('category')->distinct()->get(); // Fetch unique categories
        return view('homepage', compact('books', 'categories'));
    }
 // Display the appropriate dashboard based on user role
        public function index()
        {
            $user = Auth::user();
            if ($user->role === 'admin'|| $user->role === 'book_owner'|| $user->role==='user') {
                $books = Book::all();
                return view('dashboard.index', compact('books'));
            }
         
        }

  
}