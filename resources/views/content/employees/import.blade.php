@extends('layouts.contentNavbarLayout')

@section('title', 'استيراد بيانات الموظفين')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">استيراد بيانات الموظفين</h5>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-sm">
                        <i class="mdi mdi-arrow-right me-1"></i> العودة
                    </a>
                </div>
                <div class="card-body">
                    @livewire('employees.import-employees')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection
