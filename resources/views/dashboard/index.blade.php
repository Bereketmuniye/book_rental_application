@extends('layout.app')
@section('content')

@php
    $totalIncome = \App\Models\Rental::whereMonth('created_at', now()->month)
                                      ->sum('amount'); 
    $lastMonthIncome = \App\Models\Rental::whereMonth('created_at', now()->subMonth()->month)
                                          ->sum('amount');
    $percentageChange = $lastMonthIncome ? 
        (($totalIncome - $lastMonthIncome) / $lastMonthIncome) * 100 : 
        0;
@endphp

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <!-- Income and Stats Card -->
                <div class="col-12 col-md-4">
                    <div class="card widget-card border-light shadow-sm mb-4">
                        <div class="card-body p-4 shadow">
                            <h3 class="card-title widget-card-title font-weight-bold">
                                This Month Statistics
                                <br>
                                <small class="text-muted" style="display: inline;">
                                    {{ now()->format('D, d M Y, g:i A') }}
                                </small>
                            </h3>
                            <div></div>
                            <br><br><br>
                            <hr>
                            <h3 class="text-dark font-weight-bold">
                                ETB {{ number_format($totalIncome, 2) }}
                                <span class="text-danger"> ↓ {{ number_format($percentageChange, 2) }}%</span>
                            </h3>
                            <p class="text-muted">
                                Compared to ETB {{ number_format($lastMonthIncome, 2) }} last month
                            </p>
                            <p class="font-weight-bold mb-0">Last Month Income: 
                                <span class="text-dark">ETB {{ number_format($lastMonthIncome, 2) }}</span>
                            </p>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title widget-card-title">Available Books</h5>
                            <canvas id="bookChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Book List Section -->
                <div class="col-12 col-md-8">
                    <div class="card widget-card border-light shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5>Live Book Status</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="booksTable">
                                    <thead>
                                        <tr class="text-sm font-monospace">
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                            <tr class="text-sm font-weight-light">
                                                <td>{{ $book->title }}</td>
                                                <td>{{ $book->author }}</td>
                                                <td>{{ $book->category }}</td>
                                                <td>
                                                    @if($book->is_available)
                                                        <span style="color: green;">●</span> Free
                                                    @else
                                                        <span style="color: red;">●</span> Rented
                                                    @endif
                                                </td>
                                                <td>{{ number_format($book->price, 2) }} birr</td>
                                                <td>
                                                    @can('edit', $book)
                                                        <a href="{{ route('owner.books.edit', $book->id) }}" class="btn btn-success btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $book)
                                                        <form action="{{ route('owner.books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this book?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              

                <!-- Sales Overview Card -->
                <div class="col-12 ">
                    <div class="card widget-card border-light shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="card-title widget-card-title">Sales Overview</h5>
                            <select class="form-select text-secondary border-light-subtle">
                                <option value="1">March 2023</option>
                                <option value="2">April 2023</option>
                                <option value="3">May 2023</option>
                                <option value="4">June 2023</option>
                            </select>
                            <div id="bsb-chart-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<!-- Chart.js Integration -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Prepare data for the chart
    const labels = @json($chartData['labels']);
    const data = @json($chartData['data']);

    // Initialize the chart
    const ctx = document.getElementById('bookChart').getContext('2d');
    const bookChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Books by Category',
                data: data,
                backgroundColor: [
                    'rgba(0, 9, 255, 1)',
                    'rgba(252, 40, 145, 0.8)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(253, 9, 4, 1)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Books by Category'
                }
            }
        }
    });
</script>

@endsection
