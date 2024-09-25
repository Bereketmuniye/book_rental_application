@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <div class="container mt-5">
        <h1 class="mb-4">Edit Book Information</h1>
        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <form action="{{ route('owner.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" class="form-control" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" class="form-control" required>
                @error('author')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-select" required>
                    <option value="" disabled>Select a category</option>
                    <option value="fiction" {{ old('category', $book->category) == 'fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="non-fiction" {{ old('category', $book->category) == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                    <option value="science" {{ old('category', $book->category) == 'science' ? 'selected' : '' }}>Science</option>
                    <option value="history" {{ old('category', $book->category) == 'history' ? 'selected' : '' }}>History</option>
                    <option value="biography" {{ old('category', $book->category) == 'biography' ? 'selected' : '' }}>Biography</option>
                    <option value="fantasy" {{ old('category', $book->category) == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $book->quantity) }}" class="form-control" min="1" required>
                @error('quantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $book->price) }}" class="form-control" step="0.01" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="file">Image Cover</label>
                <input type="file" name="file" id="file" class="form-control" accept=".jpg,.jpeg,.png,.gif" required>
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection