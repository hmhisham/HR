@php
    $configData = Helper::appClasses();
    $isFront = '';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'لوحة المتابعة')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
@endsection

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-statistics.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-analytics.css') }}">

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')
    <div class="row gy-4">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4">
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            {{-- <a href="{{ route('Worker') }}" class="menu-link"> --}}
                                <div class="avatar">
                                    <div
                                        class="avatar-initial bg-label-info rounded {{ request()->is('Employees') ? 'active' : '' }}">
                                        <span class="mdi mdi-account-group-outline"></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            {{-- <h5 class="mb-2">{{ App\Models\Employees\Employees::count() }}</h5> --}}
                            <p class="text-muted">عدد الموظفين</p>
                            <div class="badge bg-label-secondary rounded-pill">بيانات جميع الموظفين</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            <div class="avatar">
                                <div class="rounded avatar-initial bg-label-warning">
                                    <i class="mdi mdi-link mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-success me-1">+62%</p>
                                <i class="mdi mdi-chevron-up text-success"></i>
                            </div>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            <h5 class="mb-2">142.8k</h5>
                            <p class="text-muted">Total Impression</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            <div class="avatar">
                                <div class="rounded avatar-initial bg-label-warning">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            <div class="avatar">
                                <div class="rounded avatar-initial bg-label-warning">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            <div class="avatar">
                                <div class="rounded avatar-initial bg-label-warning">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="text-center card">
                    <div class="card-body">
                        <div class="flex-wrap gap-2 d-flex justify-content-between align-items-start">
                            <div class="avatar">
                                <div class="rounded avatar-initial bg-label-warning">
                                    <i class="mdi mdi-wallet-giftcard mdi-24px"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 text-danger me-1">-18%</p>
                                <i class="mdi mdi-chevron-up text-danger"></i>
                            </div>
                        </div>
                        <div class="pt-1 mt-4 card-info">
                            <h5 class="mb-2">$89.34k</h5>
                            <p class="text-muted">Total Profit</p>
                            <div class="badge bg-label-secondary rounded-pill">Last One Year</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
