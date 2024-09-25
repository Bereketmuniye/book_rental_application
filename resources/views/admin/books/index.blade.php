@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card widget-card border-light shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title widget-card-title mb-4">All Available Books</h5>
                            <div class="table-responsive">
                                <table class="table table-borderless bsb-table-xl text-nowrap align-middle m-0">
                                    <thead>
                                        <tr class="text-sm font-monospace">
                                            <th>#</th>
                                            <th>Book No</th>
                                            <th>Author</th>
                                            <th>Owner</th>
                                            <th>Category</th>
                                            <th>Book Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($books->isEmpty())
                                            <tr>
                                                <td colspan="8" class="text-center">No books available.</td>
                                            </tr>
                                        @else
                                            @php $count = 1; @endphp
                                            @foreach($books as $book)
                                                <tr class="text-sm font-weight-light">
                                                    <td>0{{ $count++ }}</td>
                                                    <td>{{ $book->bookNo }}</td>
                                                    <td>{{ $book->author }}</td>
                                                    <td>
                                                        <div class="avatar-icon" style="display: inline-flex; align-items: center;">
                                                            <i class="fas fa-user-circle" style="font-size: 30px; margin-right: 8px;"></i>
                                                            {{ $book->user->name ?? 'No User Assigned' }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $book->category }}</td>
                                                    <td>{{ $book->title }}</td>
                                                    <td>
                                                        <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                                                            {{ $book->is_available ? 'Available' : 'Not Available' }}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        @if(!$book->is_approved) <!-- Check if the book is not already approved -->
                                                            <form action="{{ route('books.approve', $book->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('PATCH')
                                                                @if($book->user->is_enabled) <!-- Check if the user is active -->
                                                                    <button type="submit" class="btn btn-secondary btn-sm" title="Approve" onclick="return confirm('Are you sure you want to approve this book?');">
                                                                        Approve
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="btn btn-secondary btn-sm" title="Cannot Approve" disabled>
                                                                        Cannot Approve
                                                                    </button>
                                                                @endif
                                                            </form>
                                                        @else
                                                            <form action="{{ route('books.approve', $book->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="button" class="btn btn-primary btn-sm" title="Approved" disabled>
                                                                    Approved
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection