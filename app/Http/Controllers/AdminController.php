<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
 
    public function index(Request $request)
    {
        // Filter books by category, author, or owner
        $books = Book::query();

        if ($request->filled('category')) {
            $books->where('category', $request->category);
        }
        if ($request->filled('author')) {
            $books->where('author', 'like', '%' . $request->author . '%');
        }
        if ($request->filled('owner_id')) {
            $books->where('owner_id', $request->owner_id);
        }

        $books = $books->get();
        return view('admin.books.index', compact('books'));
    }

    public function users(Request $request)
    {
        $users=User::all();
        return view('user.index', compact('users'));
    }

    // Approve a book to make it available for renting
    public function approve(Book $book)
    {
        if ($book->user->is_enabled) { // Ensure the user is active
            $book->is_approved = true; // Update the book's approval status
            $book->save();
    
            return redirect()->back()->with('success', 'Book approved successfully.');
        }
    
        return redirect()->back()->with('error', 'Cannot approve the book because the user is not active.');
    }

}
