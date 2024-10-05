@extends('layouts/layoutMaster')
@section('title', 'Wives')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
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

    @livewire('wives.wive')

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
                $('#addWiveworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addwiveModal')
                });
            }
            initAddWorkersDrop();
            $('#addWiveworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddWorkersDrop();
            });
        });

        // edit Workers
        $(document).ready(function() {
            window.initEditWorkersDrop = () => {
                $('#editWiveworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editwiveModal')
                });
            }
            initEditWorkersDrop();
            $('#editWiveworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditWorkersDrop();
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

        // add Department
        $(document).ready(function() {
            window.initAddDepartmentDrop = () => {
                $('#addWiveorganization_name').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addwiveModal')
                });
            }
            initAddDepartmentDrop();
            $('#addWiveorganization_name').on('change', function(e) {
                livewire.emit('SelectOrganizationName', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddDepartmentDrop();
            });
        });

        // edit Department
        $(document).ready(function() {
            window.initEditDepartmentDrop = () => {
                $('#editWiveorganization_name').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editwiveModal')
                });
            }
            initEditDepartmentDrop();
            $('#editWiveorganization_name').on('change', function(e) {
                livewire.emit('SelectOrganizationName', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditDepartmentDrop();
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

        window.addEventListener('WiveModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addwiveModal').modal('hide');
            $('#editwiveModal').modal('hide');
            $('#removewiveModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })


        $(document).ready(function() {
            window.initWorkersDrop = () => {
                $('#modalWiveworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addwiveModal')
                });
            }
            initWorkersDrop();
            $('#modalWiveworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initWorkersDrop();
            });
        });
    </script>
@endsection
