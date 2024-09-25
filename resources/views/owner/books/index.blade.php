@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>My Books</h1>
        <a href="{{ route('owner.books.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Upload
        </a>
        
        <!-- Filter Form
        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" id="search" class="form-control" placeholder="Search by title or author" onkeyup="filterTable()">
                </div>
                <div class="col-md-4">
                    <select id="categoryFilter" class="form-select" onchange="filterTable()">
                        <option value="">All Categories</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="science">Science</option>
                        <option value="history">History</option>
                        <option value="biography">Biography</option>
                        <option value="fantasy">Fantasy</option>
                    </select>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="booksTable">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>${{ number_format($book->price, 2) }}</td>
                            <td>
                                <a href="{{ route('owner.books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('owner.books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function filterTable() {
    const searchInput = document.getElementById('search').value.toLowerCase();
    const categoryFilter = document.getElementById('categoryFilter').value;
    const table = document.getElementById('booksTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');
        const title = cells[0].textContent.toLowerCase();
        const author = cells[1].textContent.toLowerCase();
        const category = cells[2].textContent.toLowerCase();

        const titleMatch = title.includes(searchInput);
        const authorMatch = author.includes(searchInput);
        const categoryMatch = categoryFilter === '' || category === categoryFilter;

        if ((titleMatch || authorMatch) && categoryMatch) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
}
</script> -->
@endsection