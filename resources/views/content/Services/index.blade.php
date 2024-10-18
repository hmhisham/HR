@extends('layouts/layoutMaster')
@section('title', 'Services')
@section('vendor-style')
    <link rel="stylesheet"href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel = "stylesheet"href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
@endsection
@section('content')
    @livewire('services.service')


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
        // add Workers
        $(document).ready(function() {
            window.initAddWorkersDrop = () => {
                $('#addServiceworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addserviceModal')
                });
            }
            initAddWorkersDrop();
            $('#addServiceworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddWorkersDrop();
            });
        });

        // edit Workers
        $(document).ready(function() {
            window.initEditWorkersDrop = () => {
                $('#editServiceworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editserviceModal')
                });
            }
            initEditWorkersDrop();
            $('#editServiceworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditWorkersDrop();
            });
        });

        /* اضافة تاريخ الامر الاداري */
        $(document).ready(function() {
            window.initAddPositionOrderDateDrop = () => {
                $('#addadministrative_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionOrderDateDrop();
            $('#addadministrative_order_date').on('change', function(e) {
                livewire.emit('employeeAddAdministrativeOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionOrderDateDrop();
            });
        });
        /* تعديل تاريخ الامر الاداري */
        $(document).ready(function() {
            window.initEditPositionOrderDateDrop = () => {
                $('#editadministrative_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionOrderDateDrop();
            $('#editadministrative_order_date').on('change', function(e) {
                livewire.emit('employeeEditAdministrativeOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionOrderDateDrop();
            });
        });

        /* اضافة من تاريخ */
        $(document).ready(function() {
            window.initAddPositionOrderDateDrop = () => {
                $('#addfrom_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionOrderDateDrop();
            $('#addfrom_date').on('change', function(e) {
                livewire.emit('employeeAddFromDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionOrderDateDrop();
            });
        });
        /* تعديل من تاريخ */
        $(document).ready(function() {
            window.initEditPositionOrderDateDrop = () => {
                $('#editfrom_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionOrderDateDrop();
            $('#editfrom_date').on('change', function(e) {
                livewire.emit('employeeEditFromDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionOrderDateDrop();
            });
        });

        /* اضافة الى تاريخ */
        $(document).ready(function() {
            window.initAddPositionOrderDateDrop = () => {
                $('#addto_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionOrderDateDrop();
            $('#addto_date').on('change', function(e) {
                livewire.emit('employeeAddToDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionOrderDateDrop();
            });
        });
        /* تعديل الى تاريخ */
        $(document).ready(function() {
            window.initEditPositionOrderDateDrop = () => {
                $('#editfrom_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionOrderDateDrop();
            $('#editfrom_date').on('change', function(e) {
                livewire.emit('employeeEditToDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionOrderDateDrop();
            });
        });

        /* اضافة تاريخ امر الاحتساب */
        $(document).ready(function() {
            window.initAddPositionOrderDateDrop = () => {
                $('#addcalculation_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionOrderDateDrop();
            $('#addcalculation_order_date').on('change', function(e) {
                livewire.emit('employeeAddCalculationOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionOrderDateDrop();
            });
        });
        /* تعديل تاريخ امر الاحتساب */
        $(document).ready(function() {
            window.initEditPositionOrderDateDrop = () => {
                $('#editcalculation_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الاداري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionOrderDateDrop();
            $('#editcalculation_order_date').on('change', function(e) {
                livewire.emit('employeeEditCalculationOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionOrderDateDrop();
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
                title: event.detail.message
            })
        })




        window.addEventListener('error', event => {
            $('#removeserviceModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
