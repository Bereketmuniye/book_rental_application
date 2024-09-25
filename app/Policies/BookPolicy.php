<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;

class BookPolicy
{

     /**
     * Determine if the user can view any books.
     */
    public function viewAny(User $user)
    {
        return $user->role === 'admin'|| $user->role==='book_owner';
    }

    /**
     * Determine if the user can view a specific book.
     */
    public function view(User $user, Book $book)
    {
        return $user->role === 'admin';
    }
    public function edit(User $user, Book $book)
    {
        return $user->role === 'book_owner'; // Adjust this according to your user role handling
    }

    public function delete(User $user, Book $book)
    {
        return $user->role === 'book_owner'; // Adjust this according to your user role handling
    }
    
}
