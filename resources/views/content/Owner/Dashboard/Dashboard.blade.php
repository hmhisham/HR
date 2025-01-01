@extends('layouts/layoutMaster')

@section('لوحة التحكم', 'Ports')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
 @endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-statistics.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-analytics.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-crm.js') }}"></script>
    <script src="{{ asset('assets/js/charts-apex.js') }}"></script>

@endsection

@section('content')
    <div class="row gy-4 mb-4">

        <div class="row">
            <div class="col-12">
                <div class="card h-100">

                    <div class="row">

                    </div>

                </div>
            </div>
        </div>

        <!-- Total Expenses -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                    <div class="avatar-initial bg-label-success rounded">
                    <i class="mdi mdi-currency-usd mdi-24px"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-success me-1">+38%</p>
                    <i class="mdi mdi-chevron-up text-success"></i>
                </div>
                </div>
                <div class="card-info mt-4 pt-1">
                <h5 class="mb-2">$13.4k</h5>
                <p>Total Sales</p>
                <div class="badge bg-label-secondary rounded-pill">Last Six Month</div>
                </div>
            </div>
            </div>
        </div>
        <!--/ Total Expenses -->

        <!-- Total Revenue -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                    <div class="avatar-initial bg-label-primary rounded">
                    <i class="mdi mdi-cash-multiple mdi-24px"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-primary me-1">+45%</p>
                    <i class="mdi mdi-chevron-up text-primary"></i>
                </div>
                </div>
                <div class="card-info mt-4 pt-1">
                <h5 class="mb-2">$24.8k</h5>
                <p>Total Revenue</p>
                <div class="badge bg-label-secondary rounded-pill">Last Year</div>
                </div>
            </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <!-- Total Profit -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div class="avatar">
                            <div class="avatar-initial bg-label-purple rounded">
                                <i class="mdi mdi-chart-line mdi-24px"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="mb-0 text-purple me-1">+60%</p>
                            <i class="mdi mdi-chevron-up text-purple"></i>
                        </div>
                    </div>
                    <div class="card-info mt-4 pt-1">
                        <h5 class="mb-2">$18.7k</h5>
                        <p>Total Profit</p>
                        <div class="badge bg-label-secondary rounded-pill">Last Quarter</div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Profit -->

        <!-- New Users -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                    <div class="avatar-initial bg-label-warning rounded">
                    <i class="mdi mdi-account-multiple mdi-24px"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-warning me-1">+28%</p>
                    <i class="mdi mdi-chevron-up text-warning"></i>
                </div>
                </div>
                <div class="card-info mt-4 pt-1">
                <h5 class="mb-2">1.2k</h5>
                <p>New Users</p>
                <div class="badge bg-label-secondary rounded-pill">Last Month</div>
                </div>
            </div>
            </div>
        </div>
        <!--/ New Users -->

        <!-- Active Projects -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                    <div class="avatar-initial bg-label-danger rounded">
                    <i class="mdi mdi-briefcase mdi-24px"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-danger me-1">+12%</p>
                    <i class="mdi mdi-chevron-up text-danger"></i>
                </div>
                </div>
                <div class="card-info mt-4 pt-1">
                <h5 class="mb-2">320</h5>
                <p>Active Projects</p>
                <div class="badge bg-label-secondary rounded-pill">Last Week</div>
                </div>
            </div>
            </div>
        </div>
        <!--/ Active Projects -->

        <!-- Completed Tasks -->
        <div class="col-xl-2 col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm hover-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                    <div class="avatar-initial bg-label-info rounded">
                    <i class="mdi mdi-check-circle mdi-24px"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-info me-1">+50%</p>
                    <i class="mdi mdi-chevron-up text-info"></i>
                </div>
                </div>
                <div class="card-info mt-4 pt-1">
                <h5 class="mb-2">1.8k</h5>
                <p>Completed Tasks</p>
                <div class="badge bg-label-secondary rounded-pill">Last Day</div>
                </div>
            </div>
            </div>
        </div>
        <!--/ Completed Tasks -->

        <style>
            .hover-card:hover {
            background-color: #eaf4f9;
            transition: background-color 0.3s ease;
            }
        </style>


        @section('vendor-style')
            @parent
            <link rel="stylesheet" href="{{ asset('assets/vendor/libs/remixicon/remixicon.css') }}" />
        @endsection

        @section('vendor-script')
            @parent
            <script src="{{ asset('assets/vendor/libs/remixicon/remixicon.js') }}"></script>
        @endsection

    </div>



    <div class="row">

        <!-- Line Area Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Last updates</h5>
                        <small class="text-muted">Commercial networks</small>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="lineAreaChart"></div>
                </div>
            </div>
        </div>
        <!-- /Line Area Chart -->

        <!-- Bar Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
                    <h5 class="card-title mb-0">Data Science</h5>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="barChart"></div>
                </div>
            </div>
        </div>
        <!-- /Bar Chart -->

     

        <!-- Line Chart -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Balance</h5>
                        <small class="text-muted">Commercial networks & enterprises</small>
                    </div>
                    <div class="d-sm-flex d-none align-items-center">
                        <h5 class="mb-0 me-3">$ 100,000</h5>
                        <span class="badge bg-label-secondary">
                            <i class='mdi mdi-arrow-down mdi-14px text-danger'></i>
                            <span class="align-middle">20%</span>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>
        <!-- /Line Chart -->

        <!-- Bar Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-1">Balance</h5>
                        <p class="text-muted mb-0">$74,382.72</p>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="horizontalBarChart"></div>
                </div>
            </div>
        </div>
        <!-- /Bar Chart -->

        <!-- Candlestick Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-1">Stocks Prices</h5>
                        <p class="text-muted mb-0">$50,863.98</p>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="candleStickChart"></div>
                </div>
            </div>
        </div>
        <!-- /Candlestick Chart -->

        <!-- Heat map Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Daily Sales States</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="heatChartDd" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heatChartDd">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="heatMapChart"></div>
                </div>
            </div>
        </div>
        <!-- /Heat map Chart -->

        <!-- Radial bar Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Statistics</h5>
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="radialBarChart"></div>
                </div>
            </div>
        </div>
        <!-- /Radial bar Chart -->

        <!-- Radar Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Mobile Comparison</h5>
                    <div class="dropdown">
                        <button class="btn px-0" type="button" id="heatChartDd1" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="heatChartDd1">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="radarChart"></div>
                </div>
            </div>
        </div>
        <!-- /Radar Chart -->

        <!-- Donut Chart -->
        <div class="col-md-6 col-12 mb-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h5 class="card-title mb-0">Expense Ratio</h5>
                        <small class="text-muted">Spending on various categories</small>
                    </div>
                    <div class="dropdown d-none d-sm-flex">
                        <button type="button" class="btn dropdown-toggle px-0" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="mdi mdi-calendar-month-outline"></i></button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Today</a>
                            </li>
                            <li><a href="javascript:void(0);"
                                    class="dropdown-item d-flex align-items-center">Yesterday</a>
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 7
                                    Days</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last 30
                                    Days</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Current
                                    Month</a></li>
                            <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Last
                                    Month</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="donutChart"></div>
                </div>
            </div>
        </div>
        <!-- /Donut Chart -->

    </div>

@endsection
