@extends('layouts/layoutMaster')
@section('title', 'Penalties')
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
    @livewire('penalties.penaltie')


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
        /* اضافة تاريخ الامر الوزاري */
        $(document).ready(function() {
            window.initAddPMinisterialOrderDateDrop = () => {
                $('#addp_ministerial_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الوزاري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPMinisterialOrderDateDrop();
            $('#addp_ministerial_order_date').on('change', function(e) {
                livewire.emit('employeePMinisterialOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPMinisterialOrderDateDrop();
            });
        });
        /* تعديل تاريخ الامر الوزاري */
        $(document).ready(function() {
            window.initEditPMinisterialOrderDateDrop = () => {
                $('#editp_ministerial_order_date').flatpickr({
                    placeholder: 'تاريخ الامر الوزاري',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPMinisterialOrderDateDrop();
            $('#editp_ministerial_order_date').on('change', function(e) {
                livewire.emit('employeePMinisterialOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPMinisterialOrderDateDrop();
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

        window.addEventListener('PenaltieModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addpenaltieModal').modal('hide');
            $('#editpenaltieModal').modal('hide');
            $('#removepenaltieModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removepenaltieModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })

        /* الموظفين */
        $(document).ready(function() {
            window.initWorkerDrop = () => {
                $('#worker').select2({
                    placeholder: 'حدد الموظف',
                    dropdownParent: $('#addpenaltieModal')
                })
            }
            initWorkerDrop();
            $('#worker').on('change', function(e) {
                livewire.emit('SelectWorker', e.target.value)
            });
            window.livewire.on('select2', () => {
                initWorkerDrop();
            });
        });

        /* الجهات */

        $(document).ready(function() {
            // Initialize select2 for the grantor field
            window.initDepartmentDrop = () => {
                $('#modalPenaltiep_issuing_authority').select2({
                    placeholder: 'حدد الجهة', // Set placeholder text
                    dropdownParent: $('#addpenaltieModal') // Parent modal for dropdown
                });
            }

            // Call initialization function
            initDepartmentDrop();

            // Emit change event to Livewire on selection change
            $('#modalPenaltiep_issuing_authority').on('change', function(e) {
                livewire.emit('Selectauthority', e.target.value); // Adjust event if needed
            });

            // Reinitialize select2 when Livewire triggers 'select2' event
            window.livewire.on('select2', () => {
                initDepartmentDrop();
            });
        });
    </script>
@endsection
