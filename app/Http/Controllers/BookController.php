<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    // Show the list of books owned by the authenticated owner

    public function index()
    {
        if (Gate::allows('viewAny', Book::class)) {
            $books = Book::all();
        } else {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        return view('owner.books.index', compact('books'));
    }

    public function create()
    {
        return view('owner.books.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'bookNo' => 'required|string|unique:books,bookNo',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Store the uploaded file in the public storage
        $filePath = $request->file('file')->store('books/files', 'public');
    
        // Create a new book record in the database
        Book::create([
            'bookNo' => $request->input('bookNo'),
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'file' => $filePath, // Use the correct file path here
            'is_available' => false,
            'is_approved' => false,
            'user_id' => Auth::id(),
        ]);
    
        // Redirect back with success message
        return redirect()->route('owner.books.create')->with('success', 'Book uploaded successfully and awaiting approval');
    }

    // Show the form for editing a book
    public function edit(Book $book)
    {
        $this->authorize('edit', $book);  
        return view('owner.books.edit', compact('book'));
    }

    // Update book information in storage
    public function update(Request $request, Book $book)
    {
        $this->authorize('edit', $book);

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book->update($request->all());

        return redirect()->back()->with('success', 'Book information updated successfully');
    }

    // Remove a book from storage
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return redirect()->route('owner.books.index')->with('success', 'Book removed successfully');
    }
}
