@extends('layouts/layoutMaster')
@section('title', 'Placements')
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
    @livewire('placements.placement')

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
        /* اضافة تاريخ امر التنسيب */
        $(document).ready(function() {
            window.initAddPlacementOrderDateDrop = () => {
                $('#addplacement_order_date').flatpickr({
                    placeholder: 'تاريخ امر التنسيب',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddPlacementOrderDateDrop();
            $('#addplacement_order_date').on('change', function(e) {
                livewire.emit('employeePlacementOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddPlacementOrderDateDrop();
            });
        });
        /* تعديل تاريخ امر التنسيب */
        $(document).ready(function() {
            window.initEditPlacementOrderDateDrop = () => {
                $('#editplacement_order_date').flatpickr({
                    placeholder: 'تاريخ امر التنسيب',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditPlacementOrderDateDrop();
            $('#editplacement_order_date').on('change', function(e) {
                livewire.emit('employeePlacementOrderDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditPlacementOrderDateDrop();
            });
        });
        /* اضافة تاريخ الانفكاك */
        $(document).ready(function() {
            window.initAddReleaseDateDrop = () => {
                $('#addrelease_date').flatpickr({
                    placeholder: 'تاريخ الانفكاك',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddReleaseDateDrop();
            $('#addrelease_date').on('change', function(e) {
                livewire.emit('employeeReleaseDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddReleaseDateDrop();
            });
        });
        /* تعديل تاريخ الانفكاك */
        $(document).ready(function() {
            window.initEditReleaseDateDrop = () => {
                $('#editrelease_date').flatpickr({
                    placeholder: 'تاريخ الانفكاك',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditReleaseDateDrop();
            $('#editrelease_date').on('change', function(e) {
                livewire.emit('employeeReleaseDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditReleaseDateDrop();
            });
        });
        /* اضافة تاريخ المباشرة */
        $(document).ready(function() {
            window.initAddStartDateDrop = () => {
                $('#addstart_date').flatpickr({
                    placeholder: 'تاريخ المباشرة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddStartDateDrop();
            $('#addstart_date').on('change', function(e) {
                livewire.emit('employeeStartDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddStartDateDrop();
            });
        });
        /* تعديل تاريخ المباشرة */
        $(document).ready(function() {
            window.initEditStartDateDrop = () => {
                $('#editstart_date').flatpickr({
                    placeholder: 'تاريخ المباشرة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditStartDateDrop();
            $('#editstart_date').on('change', function(e) {
                livewire.emit('employeeStartDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditStartDateDrop();
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

        window.addEventListener('PlacementModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addplacementModal').modal('hide');
            $('#editplacementModal').modal('hide');
            $('#removeplacementModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })




        window.addEventListener('error', event => {
            $('#removeplacementModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })

        // add Workers
        $(document).ready(function() {
            window.initAddWorkersDrop = () => {
                $('#addPlacementworker_id').select2({
                    placeholder: 'اختيار الاسم',
                    dropdownParent: $('#addplacementModal')
                });
            }
            initAddWorkersDrop();
            $('#addPlacementworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddWorkersDrop();
            });
        });

        // edit Workers
        $(document).ready(function() {
            window.initEditWorkersDrop = () => {
                $('#editPlacementworker_id').select2({
                    placeholder: 'اختيار الاسم',
                    dropdownParent: $('#editplacementModal')
                });
            }
            initEditWorkersDrop();
            $('#editPlacementworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditWorkersDrop();
            });
        });



        // add Linkages
        $(document).ready(function() {
            window.initAddLinkagesDrop = () => {
                $('#addPlacementlinkage_id').select2({
                    placeholder: 'اختيار الارتباط',
                    dropdownParent: $('#addplacementModal')
                });
            }
            initAddLinkagesDrop();
            $('#addPlacementlinkage_id').on('change', function(e) {
                livewire.emit('SelectLinkageId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddLinkagesDrop();
            });
        });

        // edit Linkages
        $(document).ready(function() {
            window.initEditLinkagesDrop = () => {
                $('#editPlacementlinkage_id').select2({
                    placeholder: 'اختيار الارتباط',
                    dropdownParent: $('#editplacementModal')
                });
            }
            initEditLinkagesDrop();
            $('#editPlacementlinkage_id').on('change', function(e) {
                livewire.emit('SelectLinkageId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditLinkagesDrop();
            });
        });

        // add Sections
        $(document).ready(function() {
            window.initAddSectionsDrop = () => {
                $('#addPlacementsection_id').select2({
                    placeholder: 'اختيار القسم',
                    dropdownParent: $('#addplacementModal')
                });
            }
            initAddSectionsDrop();
            $('#addPlacementsection_id').on('change', function(e) {
                livewire.emit('SelectSectionId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddSectionsDrop();
            });
        });

        // edit Sections
        $(document).ready(function() {
            window.initEditSectionsDrop = () => {
                $('#editPlacementsection_id').select2({
                    placeholder: 'اختيار القسم',
                    dropdownParent: $('#editplacementModal')
                });
            }
            initEditSectionsDrop();
            $('#editPlacementsection_id').on('change', function(e) {
                livewire.emit('SelectSectionId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditSectionsDrop();
            });
        });
    </script>
@endsection
