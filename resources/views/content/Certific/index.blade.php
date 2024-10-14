@extends('layouts/layoutMaster')
@section('title', 'Certific')
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
@endsection

@section('content')

    @livewire('certific.certifi')

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
                $('#addCertifiworker_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addcertifiModal')
                });
            }
            initAddWorkersDrop();
            $('#addCertifiworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddWorkersDrop();
            });
        });

        // edit Workers
        $(document).ready(function() {
            window.initEditWorkersDrop = () => {
                $('#editCertifiworker_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editcertifiModal')
                });
            }
            initEditWorkersDrop();
            $('#editCertifiworker_id').on('change', function(e) {
                livewire.emit('SelectWorkerId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditWorkersDrop();
            });
        });
        /*  اضافة تاريخ الوثيقة */
        $(document).ready(function() {
            window.initAddDocumentDateDrop = () => {
                $('#adddocument_date').flatpickr({
                    placeholder: 'تاريخ الوثيقة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddDocumentDateDrop();
            $('#adddocument_date').on('change', function(e) {
                livewire.emit('employeeDocumentDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddDocumentDateDrop();
            });
        });
        /* تعديل تاريخ الوثيقة */
        $(document).ready(function() {
            window.initEditDocumentDateDrop = () => {
                $('#editdocument_date').flatpickr({
                    placeholder: 'تاريخ الوثيقة',
                    //dropdownParent: $('#editPatientModal')
                })
            }
            initEditDocumentDateDrop();
            $('#editdocument_date').on('change', function(e) {
                livewire.emit('employeeDocumentDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditDocumentDateDrop();
            });
        });

        /* اضافة تاريخ صحة الصدور */
        $(document).ready(function() {
            window.initAddAuthenticityDateDrop = () => {
                $('#addauthenticity_date').flatpickr({
                    placeholder: 'تاريخ صحة الصدور',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAddAuthenticityDateDrop();
            $('#addauthenticity_date').on('change', function(e) {
                livewire.emit('employeeAuthenticityDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initAddAuthenticityDateDrop();
            });
        });
        /* تعديل تاريخ صحة الصدور */
        $(document).ready(function() {
            window.initEditAuthenticityDateDrop = () => {
                $('#editauthenticity_date').flatpickr({
                    placeholder: 'تاريخ صحة الصدور',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initEditAuthenticityDateDrop();
            $('#editauthenticity_date').on('change', function(e) {
                livewire.emit('employeeAuthenticityDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initEditAuthenticityDateDrop();
            });
        });

        // add Certificates
        $(document).ready(function() {
            window.initAddCertificatesDrop = () => {
                $('#addCertificertificates_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addcertifiModal')
                });
            }
            initAddCertificatesDrop();
            $('#addCertificertificates_id').on('change', function(e) {
                livewire.emit('GetCertificate', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddCertificatesDrop();
            });
        });

        // edit Certificates
        $(document).ready(function() {
            window.initEditCertificatesDrop = () => {
                $('#editCertificertificates_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editcertifiModal')
                });
            }
            initEditCertificatesDrop();
            $('#editCertificertificates_id').on('change', function(e) {
                livewire.emit('GetCertificate', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditCertificatesDrop();
            });
        });

        // add Graduations
        $(document).ready(function() {
            window.initAddGraduationsDrop = () => {
                $('#addCertifigraduations_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addcertifiModal')
                });
            }
            initAddGraduationsDrop();
            $('#addCertifigraduations_id').on('change', function(e) {
                livewire.emit('GetGraduation', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddGraduationsDrop();
            });
        });

        // edit Graduations
        $(document).ready(function() {
            window.initEditGraduationsDrop = () => {
                $('#editCertifigraduations_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editcertifiModal')
                });
            }
            initEditGraduationsDrop();
            $('#editCertifigraduations_id').on('change', function(e) {
                livewire.emit('GetGraduation', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditGraduationsDrop();
            });
        });

        // add Specializations
        $(document).ready(function() {
            window.initAddSpecializationsDrop = () => {
                $('#addCertifispecialization_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addcertifiModal')
                });
            }
            initAddSpecializationsDrop();
            $('#addCertifispecialization_id').on('change', function(e) {
                livewire.emit('GetSpecialization', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddSpecializationsDrop();
            });
        });

        // edit Specializations
        $(document).ready(function() {
            window.initEditSpecializationsDrop = () => {
                $('#editCertifispecialization_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editcertifiModal')
                });
            }
            initEditSpecializationsDrop();
            $('#editCertifispecialization_id').on('change', function(e) {
                livewire.emit('GetSpecialization', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditSpecializationsDrop();
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

        window.addEventListener('certifiModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addcertifiModal').modal('hide');
            $('#editcertifiModal').modal('hide');
            $('#removecertifiModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })




        window.addEventListener('error', event => {
            $('#removecertifiModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
