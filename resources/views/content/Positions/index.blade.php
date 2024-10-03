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
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
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
        /* اضافة تاريخ امر التكليف */
        $(document).ready(function() {
            window.initAddPositionOrderDateDrop = () => {
                $('#addposition_order_date').flatpickr({
                    placeholder: 'تاريخ امر التنسيب',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionOrderDateDrop();
            $('#addposition_order_date').on('change', function(e) {
                livewire.emit('employeePositionOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionOrderDateDrop();
            });
        });
        /* تعديل تاريخ امر التكليف */
        $(document).ready(function() {
            window.initEditPositionOrderDateDrop = () => {
                $('#editposition_order_date').flatpickr({
                    placeholder: 'تاريخ امر التنسيب',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionOrderDateDrop();
            $('#editposition_order_date').on('change', function(e) {
                livewire.emit('employeePositionOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionOrderDateDrop();
            });
        });
        /* اضافة تاريخ المباشرة */
        $(document).ready(function() {
            window.initAddPositionStartDateDrop = () => {
                $('#addposition_start_date').flatpickr({
                    placeholder: 'تاريخ المباشرة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPositionStartDateDrop();
            $('#addposition_start_date').on('change', function(e) {
                livewire.emit('employeePositionStartDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPositionStartDateDrop();
            });
        });
        /* تعديل تاريخ المباشرة */
        $(document).ready(function() {
            window.initEditPositionStartDateDrop = () => {
                $('#editposition_start_date').flatpickr({
                    placeholder: 'تاريخ المباشرة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPositionStartDateDrop();
            $('#editposition_start_date').on('change', function(e) {
                livewire.emit('employeePositionStartDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPositionStartDateDrop();
            });
        });

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        // add Workers
        $(document).ready(function() {
            window.initAddWorkersDrop = () => {
                $('#addPositionworker_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addpositionModal')
                });
            }
            initAddWorkersDrop();
            $('#addPositionworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddWorkersDrop();
            });
        });

        // edit Workers
        $(document).ready(function() {
            window.initEditWorkersDrop = () => {
                $('#editPositionworker_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editpositionModal')
                });
            }
            initEditWorkersDrop();
            $('#editPositionworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditWorkersDrop();
            });
        });


        /* addLinkage */
        $(document).ready(function() {
            window.initAddLinkageDrop = () => {
                $('#addLinkage').select2({
                    placeholder: 'حدد الارتباط',
                    dropdownParent: $('#addpositionModal')
                })
            }
            initAddLinkageDrop();
            $('#addLinkage').on('change', function(e) {
                livewire.emit('GetLinkage', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddLinkageDrop();
            });
        });


        /* addSection */
        $(document).ready(function() {
            window.initAddSectionDrop = () => {
                $('#addSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#addpositionModal')
                })
            }
            initAddSectionDrop();
            $('#addSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddSectionDrop();
            });
        });

        /* addBranch */
        $(document).ready(function() {
            window.initAddBranchDrop = () => {
                $('#addBranch').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addpositionModal')
                });
            }
            initAddBranchDrop();
            $('#addBranch').on('change', function(e) {
                livewire.emit('GetBranch', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddBranchDrop();
            });
        });

        /* addUnit */
        $(document).ready(function() {
            window.initAddUnitDrop = () => {
                $('#addUnit').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addpositionModal')
                });
            }
            initAddUnitDrop();
            $('#addUnit').on('change', function(e) {
                livewire.emit('GetUnit', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddUnitDrop();
            });
        });

        /* editLinkage */
        $(document).ready(function() {
            window.initEditLinkageDrop = () => {
                $('#editLinkage').select2({
                    placeholder: 'حدد الارتباط',
                    dropdownParent: $('#editpositionModal')
                })
            }
            initEditLinkageDrop();
            $('#editLinkage').on('change', function(e) {
                livewire.emit('GetLinkage', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditLinkageDrop();
            });
        });
        /* editSection */
        $(document).ready(function() {
            window.initEditSectionDrop = () => {
                $('#editSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#editpositionModal')
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

        /* editBranch */
        $(document).ready(function() {
            window.initEditBranchDrop = () => {
                $('#editBranch').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editpositionModal')
                });
            }
            initEditBranchDrop();
            $('#editBranch').on('change', function(e) {
                livewire.emit('GetBranch', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditBranchDrop();
            });
        });

        /* editUnit */
        $(document).ready(function() {
            window.initEditUnitDrop = () => {
                $('#editUnit').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editpositionModal')
                });
            }
            initEditUnitDrop();
            $('#editUnit').on('change', function(e) {
                livewire.emit('GetUnit', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditUnitDrop();
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
                title: event.detail.message
            })
        })

        window.addEventListener('error', event => {
            $('#removepositionModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })

//         document.addEventListener('reinitialize-select2', function () {
//     // إعادة تهيئة Select2
//     $('.select2').select2();
// });
    </script>
@endsection
