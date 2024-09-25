<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;
use Auth;
use App\Models\Rental;

class RenterController extends Controller
{

    // In your controller method


    // Rent a book
    public function store(Book $book)
    {
        // Ensure the book is available
        if ($book->quantity <= 0 || !$book->is_approved) {
            return redirect()->back()->with('error', 'Book is unavailable for rent');
        }

        $rentalDays = 7;
    
        // Calculate the total rental amount
        $amount = $book->price_per_day * $rentalDays; 
        $is_returned = false; 

        Rental::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'rented_at' => now(),
            'due_at' => now()->addDays($rentalDays),  // Set a due date (7 days by default)
            'amount' => $amount,
            'is_returned' => $is_returned,
        ]);
    
        // Decrease the book quantity
        $book->quantity -= 1;
        $book->is_available=false;
        $book->save();
    
        return redirect()->back()->with('success', 'Book rented successfully');
    }

    // Return a rented book
    public function return(Rental $rental)
    {
        $rental->is_returned = true;
        $rental->save();

        // Increase the book quantity
        $book = $rental->book;
        $book->quantity += 1;
        $book->save();

        return redirect()->back()->with('success', 'Book returned successfully');
    }
}
