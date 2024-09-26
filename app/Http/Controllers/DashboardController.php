<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Rental;
use Carbon\Carbon;
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


        public function dashboard() {
            // Fetch rental amounts grouped by month, including months with no rentals
            $rentalData = Rental::selectRaw('SUM(amount) as total_amount, MONTH(created_at) as month')
                                ->groupBy('month')
                                ->orderBy('month', 'asc')
                                ->get()
                                ->keyBy('month');
        
            // Initialize an array with zeros for all months
            $months = collect(range(1, 12))->map(function ($month) use ($rentalData) {
                return $rentalData->get($month) ? $rentalData->get($month)->total_amount : 0;
            });
        
            // Prepare the data for Chart.js
            $chartData = [
                'labels' => collect(range(1, 12))->map(function($month) {
                    return Carbon::create()->month($month)->format('F'); // Convert month number to name
                }),
                'data' => $months
            ];
        
            // Pass the data to the view
            return view('dashboard.index', compact('chartData'));
        }

  
}