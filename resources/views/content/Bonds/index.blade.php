@extends('layouts/layoutMaster')
@section('title', 'Bonds')
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
@endsection
@section('page-style')
    <style>
        .border-bottom-2 {
            border-bottom: 2px solid !important;
        }
    </style>
@endsection
@section('content')
    @livewire('bonds.bond')


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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    <script>
        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    placeholder: 'التاريخ',
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: true,
                            dateFormat: "Y-m",
                            altFormat: "F Y",
                        })
                    ]
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }

            // تهيئة حقول التاريخ
            initFlatpickr('#addDate', '#addbondModal');
            initFlatpickr('#editDate', '#editbondModal');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addDate', '#addbondModal');
                initFlatpickr('#editDate', '#editbondModal');
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

            // تهيئة Select2 لكل من إضافة وتعديل المقاطعات
            initSelect2('#addBondownership', 'SelectOwnership', '#addbondModal');
            initSelect2('#editBondownership', 'SelectOwnership', '#editbondModal');
            initSelect2('#addBondregistered_office', 'SelectRegisteredOffice', '#addbondModal');
            initSelect2('#editBondregistered_office', 'SelectRegisteredOffice', '#editbondModal');
            initSelect2('#addBondgovernorate', 'SelectGovernorate', '#addbondModal');
            initSelect2('#editBondgovernorate', 'SelectGovernorate', '#editbondModal');
            initSelect2('#addBonddistrict', 'SelectDistrict', '#addbondModal');
            initSelect2('#editBonddistrict', 'SelectDistrict', '#editbondModal');
            //initSelect2('#addBondproperty_type', 'SelectPropertyType', '#addbondModal');
            //initSelect2('#editBondproperty_type', 'SelectPropertyType', '#editbondModal');

            window.livewire.on('select2', () => {
                console.log("Reinitializing Select2");
                initSelect2('#addBondownership', 'SelectOwnership', '#addbondModal');
                initSelect2('#editBondownership', 'SelectOwnership', '#editbondModal');
                initSelect2('#addBondregistered_office', 'SelectRegisteredOffice', '#addbondModal');
                initSelect2('#editBondregistered_office', 'SelectRegisteredOffice', '#editbondModal');
                initSelect2('#addBondgovernorate', 'SelectGovernorate', '#addbondModal');
                initSelect2('#editBondgovernorate', 'SelectGovernorate', '#editbondModal');
                initSelect2('#addBonddistrict', 'SelectDistrict', '#addbondModal');
                initSelect2('#editBonddistrict', 'SelectDistrict', '#editbondModal');
                //initSelect2('#addBondproperty_type', 'SelectPropertyType', '#addbondModal');
                //initSelect2('#editBondproperty_type', 'SelectPropertyType', '#editbondModal');
            });
        });


        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        function onlyArabicKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            // نطاق رموز الحروف العربية والفراغ
            if ((ASCIICode >= 1569 && ASCIICode <= 1610) || (ASCIICode >= 48 && ASCIICode <= 57) || ASCIICode === 32) {
                return true;
            }
            return false;
        }

        //اختبار الحقل ان يكون مرتبتين فقط ولا يتجاوز 99 متر
        function validateMeterInput(evt) {
            const input = evt.target;
            if (input.value.length > 2) {
                input.value = input.value.slice(0, 2);
            }
        }
        //اختبار الحقل ان يكون مرتبتين فقط ولا يتجاوز 25 اولك
        function validateOlokInput(evt) {
            const input = evt.target;
            let value = parseInt(input.value);
            if (input.value.length > 2 || value > 25) {
                input.value = value.toString().slice(0, 2);
            }
            if (value > 25) {
                input.value = 25;
            }
        }

        //اختبار الحقل ان يكون ثلاث فقط ولا يتجاوز 999 دونم
        function validateDonumInput(evt) {
            const input = evt.target;
            if (input.value.length > 3) {
                input.value = input.value.slice(0, 3);
            }
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

        window.addEventListener('BondModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addbondModal').modal('hide');
            $('#editbondModal').modal('hide');
            $('#removebondModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })




        window.addEventListener('error', event => {
            $('#removebondModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
