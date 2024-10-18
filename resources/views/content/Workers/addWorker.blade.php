@extends('layouts/layoutMaster')
@section('title', 'Add Workers')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection
@section('page-style')
    <style>
        .sticky-button {
            position: fixed;
            top: 100px;
            left: 40px;
            z-index: 1;
        }
    </style>
@endsection
@section('content')

    @livewire('workers.add-worker')

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
        /* المحافظة */
        $(document).ready(function() {
            window.initGovernorateDrop = () => {
                $('#governorate_id').select2({
                    placeholder: 'حدد المحافظة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initGovernorateDrop();
            $('#governorate_id').on('change', function(e) {
                livewire.emit('GetDistricts', e.target.value)
            });
            window.livewire.on('select2', () => {
                initGovernorateDrop();
            });
        });
        /* القضاء */
        $(document).ready(function() {
            window.initDistrictDrop = () => {
                $('#district_id').select2({
                    placeholder: 'حدد القضاء',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initDistrictDrop();
            $('#district_id').on('change', function(e) {
                livewire.emit('GetAreas', e.target.value)
            });
            window.livewire.on('select2', () => {
                initDistrictDrop();
            });
        });
        /* الناحية */
        $(document).ready(function() {
            window.initAreaDrop = () => {
                $('#modalEmployeearea_id').select2({
                    placeholder: 'حدد الناحية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAreaDrop();
            $('#modalEmployeearea_id').on('change', function(e) {
                livewire.emit('SelectArea', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAreaDrop();
            });
        });


        /*  مكتب الملومات   */
        $(document).ready(function() {
            window.initInfoofficeDrop = () => {
                $('#modalWorkerinformation_office').select2({
                    placeholder: 'اختيار',
                    // dropdownParent: $('#addWorker')
                });
            }
            initInfoofficeDrop();
            $('#modalWorkerinformation_office').on('change', function(e) {
                livewire.emit('SelectInformationOffice', e.target.value);
            });
            window.livewire.on('select2', () => {
                initInfoofficeDrop();
            });
        });


        /* تاريخ التولد */
        $(document).ready(function() {
            window.initBirthDateDrop = () => {
                $('#birth_date').flatpickr({
                    placeholder: 'تاريخ التولد',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initBirthDateDrop();
            $('#birth_date').on('change', function(e) {
                livewire.emit('employeeBirthDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initBirthDateDrop();
            });
        });

        /*  تاريخ البطاقة الوطنية */
        $(document).ready(function() {
            window.initNationalCardDateDrop = () => {
                $('#national_card_date').flatpickr({
                    placeholder: 'تاريخ البطاقة الوطنية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initNationalCardDateDrop();
            $('#national_card_date').on('change', function(e) {
                livewire.emit('employeeNationalCardDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initNationalCardDateDrop();
            });
        });

        /*  تاريخ البطاقة التموينية */
        $(document).ready(function() {
            window.initRationCardDateDrop = () => {
                $('#ration_card_date').flatpickr({
                    placeholder: 'تاريخ البطاقة التموينية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initRationCardDateDrop();
            $('#ration_card_date').on('change', function(e) {
                livewire.emit('employeeRationCardDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initRationCardDateDrop();
            });
        });

        /*  تاريخ التنظيم */
        $(document).ready(function() {
            window.initOrganizationDateDrop = () => {
                $('#organization_date').flatpickr({
                    placeholder: 'تاريخ التنظيم',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initOrganizationDateDrop();
            $('#organization_date').on('change', function(e) {
                livewire.emit('employeeOrganizationDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initOrganizationDateDrop();
            });
        });

        /*  تاريخ الامر الوزاري */
        $(document).ready(function() {
            window.initOrganizationDateDrop = () => {
                $('#ministerial_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الوزاري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initOrganizationDateDrop();
            $('#ministerial_order_date').on('change', function(e) {
                livewire.emit('employeeMinisterialOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initOrganizationDateDrop();
            });
        });

        /*  تاريخ امر التعيين */
        $(document).ready(function() {
            window.initOrganizationDateDrop = () => {
                $('#appointment_date').flatpickr({
                    placeholder: 'تاريخ امر التعيين',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initOrganizationDateDrop();
            $('#appointment_date').on('change', function(e) {
                livewire.emit('employeeAppointmentOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initOrganizationDateDrop();
            });
        });

        /*  تاريخ المباشرة */
        $(document).ready(function() {
            window.initOrganizationDateDrop = () => {
                $('#start_work_date').flatpickr({
                    placeholder: 'تاريخ امر التعيين',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initOrganizationDateDrop();
            $('#start_work_date').on('change', function(e) {
                livewire.emit('employeeStartWorkDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initOrganizationDateDrop();
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

        window.addEventListener('success', event => {
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
