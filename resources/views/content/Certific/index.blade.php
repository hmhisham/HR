@extends('layouts/layoutMaster')

@section('title', 'Certific')

@section('vendor-style')
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel = "stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
@endsection

@section('page-style')
    <style>
        .border-bottom-2 {
            border-bottom: 2px solid !important;
        }
        select2-selection__rendered {
            text-align: right;
        }
    </style>
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
    <script src=" {{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script src=" {{ asset('assets/js/ui-modals.js') }}"></script>

    <script>
        const customBtn = document.getElementById("certificate_file");
        customBtn.innerHTML = "اختر الملف";
        //تاريخ الوثيقة وصحة الصدور
        $(document).ready(function() {
            function initFlatpickr(selector, eventName, placeholderText, parentModal) {
                $(selector).flatpickr({
                    placeholder: placeholderText,
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }
            initFlatpickr('#addauthenticity_date', 'employeeAuthenticityDate', 'تاريخ صحة الصدور', '#addcertifiModal');
            //initFlatpickr('#editauthenticity_date', 'employeeAuthenticityDate', 'تاريخ صحة الصدور');
            initFlatpickr('#adddocument_date', 'employeeDocumentDate', 'تاريخ الوثيقة', '#addcertifiModal');
            //initFlatpickr('#editdocument_date', 'employeeDocumentDate', 'تاريخ الوثيقة');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addauthenticity_date', 'employeeAuthenticityDate', 'تاريخ صحة الصدور', '#addcertifiModal');
                //initFlatpickr('#editauthenticity_date', 'employeeAuthenticityDate', 'تاريخ صحة الصدور');
                initFlatpickr('#adddocument_date', 'employeeDocumentDate', 'تاريخ الوثيقة', '#addcertifiModal');
                //initFlatpickr('#editdocument_date', 'employeeDocumentDate', 'تاريخ الوثيقة');
            });
        });

        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal),
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }
            //أستدعاء جدول التحصيل الدراسي
            initSelect2('#addCertificertificates_id', 'GetCertificate', '#addcertifiModal');

            //استدعاء جهة التخرج
            initSelect2('#addCertifigraduations_id', 'GetGraduation', '#addcertifiModal');

            //استدعاء التخصص
            initSelect2('#addCertifispecialization_id', 'GetSpecialization', '#addcertifiModal');

            //استدعاء تصنيف التخصص
            initSelect2('#addCertifispecializationclassification_id', 'SelectSpecializationclassificationId', '#addcertifiModal');

            //استدعاء التخصص العام
            initSelect2('#addCertifispecialtys_id', 'GetSpecialtys', '#addcertifiModal');

            //استدعاء التخصص الدقيق
            initSelect2('#addCertifiprecises_id', 'GetPrecises', '#addcertifiModal');

            window.livewire.on('select2', () => {
                initSelect2('#addCertificertificates_id', 'GetCertificate', '#addcertifiModal');

                //استدعاء جهة التخرج
                initSelect2('#addCertifigraduations_id', 'GetGraduation', '#addcertifiModal');

                //استدعاء التخصص
                initSelect2('#addCertifispecialization_id', 'GetSpecialization', '#addcertifiModal');

                //استدعاء تصنيف التخصص
                initSelect2('#addCertifispecializationclassification_id', 'SelectSpecializationclassificationId', '#addcertifiModal');

                //استدعاء التخصص العام
                initSelect2('#addCertifispecialtys_id', 'GetSpecialtys', '#addcertifiModal');

                //استدعاء التخصص الدقيق
                initSelect2('#addCertifiprecises_id', 'GetPrecises', '#addcertifiModal');
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

        window.addEventListener('AddCertifyModal', event => {
            $('#id').focus();
        })

        window.addEventListener('success', event => {
            $('#addcertifiModal').modal('hide');
            $('#editcertifiModal').modal('hide');
            $('#removecertifiModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#addcertifiModal').modal('hide');
            $('#removecertifiModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })
        })
    </script>
@endsection
