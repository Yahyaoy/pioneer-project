@extends('admin.master')

@section('title', 'Dashboard | ' . config('app.name'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>


<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Products Count</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Category Count</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">100</div>
                            </div>
                            {{-- <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                           Users Count </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">100</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Bookings Status</h4>
            </div>
            <div class="card-body">
                <canvas id="bar" class="chartjs-chart" width="400" height="200"></canvas>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Bar Chart</h4>
            </div>
            <div class="card-body">
                <canvas id="bar" class="chartjs-chart" data-colors="[&quot;--vz-primary-rgb, 0.8&quot;, &quot;--vz-primary-rgb, 0.9&quot;]" width="1054" height="526" style="display: block; box-sizing: border-box; height: 263px; width: 527px;"></canvas>

            </div>
        </div> --}}
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Users Status</h4>
            </div>
            <div class="card-body">
                <canvas id="donutChart" class="chartjs-chart" width="400" height="200"></canvas>
            </div>
        </div>
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Donut Chart</h4>
            </div>
            <div class="card-body">
                <canvas id="doughnut" class="chartjs-chart" data-colors="[&quot;--vz-primary&quot;, &quot;--vz-light&quot;]" width="1054" height="640" style="display: block; box-sizing: border-box; height: 320px; width: 527px;"></canvas>
            </div>
        </div> --}}
    </div>
</div>

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    // Function to fetch and display data for the bar chart
    function fetchAndDisplayBarChartData() {
        $.ajax({
            url: "{{ route('getChartData') }}", // Replace with the actual route name
            type: 'GET',
            dataType: 'json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                    // Update the bar chart data with the retrieved data
                    barChart.data.labels = data.labels;
                    barChart.data.datasets[0].data = data.values;
                    barChart.update(); // Update the chart to reflect the changes
                },
            error: function () {
                alert('Error fetching data for the bar chart.');
            }
        });
    }

    // Bar Chart Data (Initial data, will be updated by the fetchAndDisplayBarChartData function)
    var barData = {
        labels: [],
        datasets: [
            {
                label: 'Booking Status',
                data: [], // Data will be fetched dynamically
                backgroundColor: [
                  'rgba(255, 206, 86, 0.2)',

                    'rgba(75, 192, 192, 0.2)',

                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                  'rgba(255, 206, 86, 1)',

                    'rgba(75, 192, 192, 1)',

                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1,
            },
        ],
    };

    // Bar Chart Options
    var barOptions = {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    };

    // Create the Bar Chart
    var barCtx = document.getElementById('bar').getContext('2d');
    var barChart = new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: barOptions,
    });

    // Fetch and display data for the bar chart on page load
    fetchAndDisplayBarChartData();
</script>


<script>
// Function to fetch and display data for the donut chart
function fetchAndDisplayDonutChartData() {
$.ajax({
    url: "{{ route('getDonutChartData') }}", // Use the actual route name
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        // Create the donut chart
        var donutCtx = document.getElementById('donutChart').getContext('2d');
        var donutChart = new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: data.labels,
                datasets: [{
                    data: data.values,
                    backgroundColor: [
                      'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                    ],
                }],
            },
        });
    },
    error: function () {
        alert('Error fetching data for the donut chart.');
    }
});
}

// Fetch and display data for the donut chart on page load
fetchAndDisplayDonutChartData();

</script>

@endsection
@stop
