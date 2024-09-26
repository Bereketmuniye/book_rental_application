<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RenterController;


Route::get('/', [DashboardController::class, 'homepage']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard.index');
Route::middleware(['auth'])->group(function() {
   
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard.index');
    Route::delete('/user/{id}', [AuthController::class, 'destroy'])->name('user.destroy');
   
    // Admin routes
Route::middleware(['auth','role:book_owner'])->group(function(){
    
    // Route::get('/books/statistics', [BookController::class, 'statistics'])->name('books.statistics');
    Route::get('owner/books', [BookController::class, 'index'])->name('owner.books.index');  
    Route::get('owner/books/create', [BookController::class, 'create'])->name('owner.books.create');  // Show form to create a new book
    Route::post('owner/books', [BookController::class, 'store'])->name('owner.books.store');          // Store a new book
    Route::get('owner/books/{book}/edit', [BookController::class, 'edit'])->name('owner.books.edit'); // Show form to edit a book
    Route::put('owner/books/{book}', [BookController::class, 'update'])->name('owner.books.update');  // Update a book
    Route::delete('owner/books/{book}', [BookController::class, 'destroy'])->name('owner.books.destroy'); // Delete a book
});
    

Route::patch('/books/{book}/approve', [AdminController::class, 'approve'])->name('books.approve');
// Admin routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/books', [AdminController::class, 'index'])->name('admin.books.index');          // Show all books
   
});

Route::resource('user', AuthController::class);

 Route::get('/users', [AdminController::class, 'users'])->name('user.index');
Route::patch('/user/{user}/toggle', [AuthController::class, 'toggle'])->name('user.toggle');



// Route to show the rental form (if needed)
Route::get('/books/{book}/rent', [RenterController::class, 'create'])->name('books.rent');

// Route to handle the rental submission
Route::post('/books/{book}/rent', [RenterController::class, 'store'])->name('books.storeRent');
   

 
});
