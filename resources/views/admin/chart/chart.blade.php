@extends('admin.admin-layout')
@section('title')
    Thống kê
@endsection
@section('header')
    Thống kê
@endsection
@section('content')
    <div>
        <canvas canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let data = <?php echo json_encode($data)?>;
        let date = data.map(function(item) {return item.date});
        let money = data.map(function(item) {return item.total_money});
        console.log(money);
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: date,
            datasets: [{
                label: 'Doanh thu theo ngày',
                data: money,
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
    </script>
@endsection