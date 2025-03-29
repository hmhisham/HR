@extends('layouts/layoutMaster')

@section('title', 'إدارة النسخ الاحتياطية')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('backup.backup-manager')
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            // تهيئة النوافذ المنبثقة
            window.addEventListener('showModal', event => {
                $('#backupModal').modal('show');
            });

            window.addEventListener('hideModal', event => {
                $('#backupModal').modal('hide');
            });

            window.addEventListener('showRestoreModal', event => {
                $('#restoreModal').modal('show');
            });

            window.addEventListener('hideRestoreModal', event => {
                $('#restoreModal').modal('hide');
            });
        });
    </script>
@endsection
