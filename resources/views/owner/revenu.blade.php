@extends('layout.app')

@section('title', 'My Revenu')

@section('content')
    <h1>My Revenue</h1>
    <p>Total Revenue: {{ $revenue }} Birr</p>
@endsection





<!-- 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Create a canvas dynamically inside the div
    const chartDiv = document.getElementById('bsb-chart-5');
    const canvas = document.createElement('canvas');
    chartDiv.appendChild(canvas);
    
    const ctx = canvas.getContext('2d');
    canvas.style.height = '100%';
    canvas.style.width = '100%';

    const userChart = new Chart(ctx, {
        type: 'doughnut', // Choose your chart type
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'User Statistics',
                data: @json($chartData['data']),
                backgroundColor: [
                    'rgb(0, 0, 255)',
                    'rgb(60, 179, 113)',
                    'rgb(255, 0, 0)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> -->
