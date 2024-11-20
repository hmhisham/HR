@extends('layouts/layoutMaster')
@section('title', 'Positions')
@section('vendor-style')
    <link rel="stylesheet"href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel = "stylesheet"href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <lin rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
@endsection
@section('content')
    @livewire('positions.position')

@endsection

@section('vendor-script')
    <script src=" {{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script>
        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(`Value changed to: ${e.target.value}`);
                    livewire.emit(eventName, e.target.value);
                });
            }

            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    placeholder: 'تاريخ امر التنسيب'
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }
            // تاريخ امر التكليف
            initFlatpickr('#addposition_order_date', 'employeePositionOrderDate');
            initFlatpickr('#editposition_order_date', 'employeePositionOrderDate');
            // تاريخ المباشرة
            initFlatpickr('#addposition_start_date', 'employeePositionStartDate');
            initFlatpickr('#editposition_start_date', 'employeePositionStartDate');
            window.livewire.on('select2', () => {
                console.log("Reinitializing Select2 and Flatpickr");
                initFlatpickr('#addposition_order_date', 'employeePositionOrderDate');
                initFlatpickr('#editposition_order_date', 'employeePositionOrderDate');
                initFlatpickr('#addposition_start_date', 'employeePositionStartDate');
                initFlatpickr('#editposition_start_date', 'employeePositionStartDate');
            });
        });

        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(`Value changed to: ${e.target.value}`);
                    livewire.emit(eventName, e.target.value);
                });
            }
            // Linkage
            initSelect2('#addLinkage', 'GetLinkage', '#addpositionModal');
            initSelect2('#editLinkage', 'GetLinkage', '#editpositionModal');
            // Section
            initSelect2('#addSection', 'GetSection', '#addpositionModal');
            initSelect2('#editSection', 'GetSection', '#editpositionModal');
            // Branch
            initSelect2('#addBranch', 'GetBranch', '#addpositionModal');
            initSelect2('#editBranch', 'GetBranch', '#editpositionModal');
            // Unit
            initSelect2('#addUnit', 'GetUnit', '#addpositionModal');
            initSelect2('#editUnit', 'GetUnit', '#editpositionModal');
            // Workers
            initSelect2('#addPositionworker_id', 'SelectWorkerId', '#addpositionModal');
            initSelect2('#editPositionworker_id', 'SelectWorkerId', '#editpositionModal');
            window.livewire.on('select2', () => {
                console.log("Reinitializing Select2");
                initSelect2('#addLinkage', 'GetLinkage', '#addpositionModal');
                initSelect2('#editLinkage', 'GetLinkage', '#editpositionModal');
                initSelect2('#addSection', 'GetSection', '#addpositionModal');
                initSelect2('#editSection', 'GetSection', '#editpositionModal');
                initSelect2('#addBranch', 'GetBranch', '#addpositionModal');
                initSelect2('#editBranch', 'GetBranch', '#editpositionModal');
                initSelect2('#addUnit', 'GetUnit', '#addpositionModal');
                initSelect2('#editUnit', 'GetUnit', '#editpositionModal');
                initSelect2('#addPositionworker_id', 'SelectWorkerId', '#addpositionModal');
                initSelect2('#editPositionworker_id', 'SelectWorkerId', '#editpositionModal');
            });
        });

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

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

        window.addEventListener('PositionModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addpositionModal').modal('hide');
            $('#editpositionModal').modal('hide');
            $('#removepositionModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#removepositionModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
