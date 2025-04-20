@extends('layouts.contentNavbarLayout')

@section('title', 'إدارة الموظفين')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">إدارة بيانات الموظفين</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="mdi mdi-file-excel-outline mdi-48px text-primary mb-3"></i>
                                    <h5>استيراد بيانات الموظفين</h5>
                                    <p>رفع ملف Excel يحتوي على بيانات الموظفين</p>
                                    <a href="{{ route('employees.import') }}" class="btn btn-primary">استيراد البيانات</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="mdi mdi-account-group-outline mdi-48px text-info mb-3"></i>
                                    <h5>عرض بيانات الموظفين</h5>
                                    <p>عرض وتصفية بيانات الموظفين المستوردة</p>
                                    <a href="{{ route('employees.list') }}" class="btn btn-info">عرض البيانات</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endsection
