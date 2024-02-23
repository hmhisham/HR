@php
	$configData = Helper::appClasses();
    $isFront = '';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'لوحة المتابعة')

@section('vendor-style')
	<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
@endsection

@section('page-style')
	<!-- Page -->
	<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-statistics.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-analytics.css')}}">

@endsection

@section('vendor-script')
	<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
	<script src="{{asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
@endsection

@section('page-script')
	<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
    <div class="row gy-4">

          <!-- Stats Vertical Card -->
          <div class="row">
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-info p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="eye" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">36.9k</h2>
                        <p class="card-text">Views</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-warning p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="message-square" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">12k</h2>
                        <p class="card-text">Comments</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-danger p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="shopping-bag" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">97.8k</h2>
                        <p class="card-text">Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-primary p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="heart" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">26.8</h2>
                        <p class="card-text">Bookmarks</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <span class="mdi mdi-ab-testing"></span>
                            </div>
                        </div>
                        <h2 class="fw-bolder">689</h2>
                        <p class="card-text">Reviews</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="avatar bg-light-danger p-50 mb-1">
                            <div class="avatar-content">
                                <i data-feather="truck" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">2.1k</h2>
                        <p class="card-text">Returns</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Stats Vertical Card -->
    </div>

@endsection
