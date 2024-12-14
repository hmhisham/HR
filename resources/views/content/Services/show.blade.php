@extends('layouts/layoutMaster')
@section('title', 'Services Show')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
@endsection
@section('content')
    @livewire('services.show-service.show-service', ['worker_id' => $id])
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
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
        //اضافة وتعيدل اسم الموظف
        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }
            initSelect2('#addServiceworkers_id', 'SelectWorkersId', '#addserviceModal');
            initSelect2('#editServiceworkers_id', 'SelectWorkersId', '#editserviceModal');

            window.livewire.on('select2', () => {
                initSelect2('#addServiceworkers_id', 'SelectWorkersId', '#addserviceModal');
                initSelect2('#editServiceworkers_id', 'SelectWorkersId', '#editserviceModal');
            });
        });

        //اضافة وتعديل تاريخ الامر الاداري
        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    dateFormat: 'Y-m-d',
                    placeholder: 'تاريخ الامر الاداري'
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }
            initFlatpickr('#addadministrative_order_date', 'employeeAddAdministrativeOrderDate');
            initFlatpickr('#editadministrative_order_date', 'employeeEditAdministrativeOrderDate');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addadministrative_order_date', 'employeeAddAdministrativeOrderDate');
                initFlatpickr('#editadministrative_order_date', 'employeeEditAdministrativeOrderDate');
            });
        });
        //اضافة وتعديل حقلي من تاريخ والى تاريخ
        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    dateFormat: 'Y-m-d',
                    placeholder: 'تاريخ الامر الاداري'
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }

            function initAllFlatpickrs() {
                initFlatpickr('#addfrom_date', 'employeeAddFromDate');
                initFlatpickr('#addto_date', 'employeeAddToDate');
                initFlatpickr('#editfrom_date', 'employeeEditFromDate');
                initFlatpickr('#editto_date', 'employeeEditToDate');
            }

            initAllFlatpickrs();

            window.livewire.on('flatpickr', () => {
                initAllFlatpickrs();
            });
        });


        //اضافة وتعديل تاريخ الاحتساب
        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    dateFormat: 'Y-m-d',
                    placeholder: 'تاريخ الامر الاداري'
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }

            initFlatpickr('#addcalculation_order_date', 'employeeAddCalculationOrderDate');
            initFlatpickr('#editcalculation_order_date', 'employeeEditCalculationOrderDate');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addcalculation_order_date', 'employeeAddCalculationOrderDate');
                initFlatpickr('#editcalculation_order_date', 'employeeEditCalculationOrderDate');
            });
        });


        //اضافة وتعديل حقل الشهادة
        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }
            initSelect2('#addServicecertificates_id', 'SelectCertificatesId', '#addserviceModal');
            initSelect2('#editServicecertificates_id', 'SelectCertificatesId', '#editserviceModal');

            window.livewire.on('select2', () => {
                initSelect2('#addServicecertificates_id', 'SelectCertificatesId', '#addserviceModal');
                initSelect2('#editServicecertificates_id', 'SelectCertificatesId', '#editserviceModal');
            });
        });

        //اضافة وتعديل العنوان الوظيفي الحذف والاستحداث
        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    console.log(e.target.value);
                    livewire.emit(eventName, e.target.value);
                });
            }

            initSelect2('#addServicejob_title_deletion', 'SelectJobTitleDeletion', '#addserviceModal');
            initSelect2('#addServicejob_title_introduction', 'SelectJobTitleIntroduction', '#addserviceModal');
            initSelect2('#editServicejob_title_deletion', 'SelectJobTitleDeletion', '#editserviceModal');
            initSelect2('#editServicejob_title_introduction', 'SelectJobTitleIntroduction', '#editserviceModal');

            window.livewire.on('select2', () => {
                initSelect2('#addServicejob_title_deletion', 'SelectJobTitleDeletion', '#addserviceModal');
                initSelect2('#addServicejob_title_introduction', 'SelectJobTitleIntroduction',
                    '#addserviceModal');
                initSelect2('#editServicejob_title_deletion', 'SelectJobTitleDeletion',
                    '#editserviceModal');
                initSelect2('#editServicejob_title_introduction', 'SelectJobTitleIntroduction',
                    '#editserviceModal');
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

        window.addEventListener('serviceModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addserviceModal').modal('hide');
            $('#editserviceModal').modal('hide');
            $('#removeserviceModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#removeserviceModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
