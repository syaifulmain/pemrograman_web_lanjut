@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <!-- <div class="row"> -->
            <!-- Small boxes (Stat box) -->
            <!-- ./col -->
            <!-- <div class="col-lg-6 col-6"> -->
                <!-- small box -->
                <!-- <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>
                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                </div>
            </div> -->
            <!-- ./col -->
            <!-- <div class="col-lg-6 col-6"> -->
                <!-- small box -->
                <!-- <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <section class="col-lg-8 connectedSortable">
                <!-- Sales Chart -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sales Chart</h3>
                        <div class="card-tools">
                            <select id="sales_filter" class="form-control">
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body" style="height: 300px;">
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </section>

            <section class="col-lg-4 connectedSortable">
                <!-- Top Seller -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Top Sellers</h3>
                        <div class="card-tools">
                            <select id="top_sales_filter" class="form-control">
                                <option value="day">Day</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul id="top-sellers" class="list-group">
                            <!-- <li class="list-group-item">1. Product A - 120 sales</li>
                                                <li class="list-group-item">2. Product B - 95 sales</li>
                                                <li class="list-group-item">3. Product C - 80 sales</li>
                                                <li class="list-group-item">4. Product D - 75 sales</li>
                                                <li class="list-group-item">5. Product E - 60 sales</li> -->
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.row -->
    </div>
@endsection

@push('css')
    <!-- Add custom CSS here -->
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function fetchTop10Sales(filter) {
            let top10Sales = $('#top-sellers');
            $.ajax({
                url: '{{ url('/dashboard/top10Sales') }}',
                method: 'POST',
                data: { filter: filter },
                success: function (data) {
                    top10Sales.empty();
                    data.forEach(function (item, index) {
                        top10Sales.append('<li class="list-group-item">' + (index + 1) + '. ' + item.barang.barang_nama + ' - ' + item.total_terjual + ' sales</li>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch top 10 sales:', error);
                }
            });
        }

        fetchTop10Sales($('#top_sales_filter').val());

        $('#top_sales_filter').on('change', function () {
            fetchTop10Sales($(this).val());
        });
    </script>
    <script>
        var salesChart = null;
        function fetchTotalSales(filter) {
            $.ajax({
                url: '{{ url('/dashboard/totalSales') }}',
                method: 'POST',
                data: { filter: filter },
                success: function (data) {
                    console.log(data);
                    var ctx = document.getElementById('salesChart').getContext('2d');
                    if (salesChart) {
                        salesChart.destroy();
                    }
                    salesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Sales',
                                data: data.data,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Failed to fetch top 10 sales:', error);
                }
            });
        }

        fetchTotalSales($('#sales_filter').val());

        $('#sales_filter').on('change', function () {
            fetchTotalSales($(this).val());
        });
    </script>
@endpush