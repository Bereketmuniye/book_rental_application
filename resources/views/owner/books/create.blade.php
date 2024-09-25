@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="container mt-5">
            <h1 class="mb-4">Upload New Book</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('owner.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="bookNo">Book Number</label>
                    <input type="text" name="bookNo" id="bookNo" class="form-control" required>
                    @error('bookNo')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                    @error('title')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                    @error('author')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="" disabled>Select a category</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="science">Science</option>
                        <option value="history">History</option>
                        <option value="biography">Biography</option>
                        <option value="fantasy">Fantasy</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    @error('quantity')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                    @error('price')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="file">Upload Cover Book</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".jpg,.jpeg,.png,.gif"required>
                    @error('file')
                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endsection