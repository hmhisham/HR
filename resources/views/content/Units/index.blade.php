@extends('layouts/layoutMaster')
@section('title', 'Units')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('content')

@livewire('units.unit')

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>

    <script>
        $(document).ready(function() {
            window.initEditSectionDrop = () => {
                $('#editSection').select2({
                    placeholder: 'حدد المحافظة',
                    dropdownParent: $('#editunitModal')
                })
            }
            initEditSectionDrop();
            $('#editSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditSectionDrop();
            });
        });
        $(document).ready(function() {
            window.initUnitBranchDrop = () => {
                $('#editUnitsbranch').select2({
                    placeholder: 'حدد المحافظة',
                    dropdownParent: $('#editunitModal')
                })
            }
            initUnitBranchDrop();
            $('#editUnitsbranch').on('change', function(e) {
                livewire.emit('GetUnitBranch', e.target.value)
            });
            window.livewire.on('select2', () => {
                initUnitBranchDrop();
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        window.addEventListener('UnitModalShow', event => {
            setTimeout(() => {
             $('#id').focus();
               }, 100);
        })

        window.addEventListener('success', event => {
            $('#addunitModal').modal('hide');
            $('#editunitModal').modal('hide');
            $('#removeunitModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removeunitModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
