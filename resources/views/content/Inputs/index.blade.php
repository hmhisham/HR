@extends('layouts/layoutMaster')
@section('title', 'Inputs')
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
    @livewire('inputs.input')


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

            // نوع القيد
            initSelect2('#addInputitype', 'SelectItype', '#addinputModal');
            initSelect2('#editInputitype', 'SelectItype', '#editinputModal');
            // الدليل المحاسبي
            initSelect2('#addInputiacct', 'SelectIacct', '#addinputModal');
            initSelect2('#editInputiacct', 'SelectIacct', '#editinputModal');
            // استدعاء قيد القسم
            initSelect2('#addInputidepartment', 'SelectIdepartment', '#addinputModal');
            initSelect2('#editInputidepartment', 'SelectIdepartment', '#editinputModal');

            // Livewire event to reinitialize Select2
            window.livewire.on('select2', () => {
                initSelect2('#addInputitype', 'SelectItype', '#addinputModal');
                initSelect2('#editInputitype', 'SelectItype', '#editinputModal');
                initSelect2('#addInputiacct', 'SelectIacct', '#addinputModal');
                initSelect2('#editInputiacct', 'SelectIacct', '#editinputModal');
                initSelect2('#addInputidepartment', 'SelectIdepartment', '#addinputModal');
                initSelect2('#editInputidepartment', 'SelectIdepartment', '#editinputModal');
            });
        });

        $(document).ready(function() {
            function initFlatpickr(selector, eventName, parentModal) {
                $(selector).flatpickr({
                    placeholder: 'تاريخ المستند',
                    onChange: function(selectedDates, dateStr, instance) {
                        livewire.emit(eventName, dateStr);
                    },
                    onReady: function(selectedDates, dateStr, instance) {
                        $(parentModal).append(instance.calendarContainer);
                    }
                });
            }

            // تاريخ المستند
            initFlatpickr('#addmodalInputidate', 'AddInputIdateDrop', '#addinputModal');
            initFlatpickr('#editmodalInputidate', 'EditInputIdateDrop', '#editinputModal');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addmodalInputidate', 'AddInputIdateDrop', '#addinputModal');
                initFlatpickr('#editmodalInputidate', 'EditInputIdateDrop', '#editinputModal');
            });
        });


        function onlyArabicKey(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;
            // نطاق رموز الحروف العربية والفراغ
            if ((ASCIICode >= 1569 && ASCIICode <= 1610) || ASCIICode === 32) {
                return true;
            }
            return false;
        }

        function onlyNumberKey(evt) {
            // نطاق الارقام
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

        //الدائن والمدين
        function onlyNumberKey1(evt) {
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode;

            if ([46, 44, 8, 9, 27, 13].includes(ASCIICode) || (ASCIICode >= 48 && ASCIICode <= 57)) {
                return true;
            }
            return false;
        }

        function formatNumberInput(input) {
            var value = input.value.replace(/,/g, '');

            if (!isNaN(value) && value !== '') {
                var parts = value.split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                if (parts[1]) {
                    parts[1] = parts[1].substring(0, 3);
                }
                input.value = parts.join('.');
            }
        }

        function updateFieldValues(fieldName) {
            if (fieldName === 'icredt') {
                document.getElementById('modalInputidept').value = '0';
                Livewire.find(document.getElementById('modalInputidept').closest('[wire\\:id]').getAttribute('wire:id'))
                    .set('idept', 0);
            } else if (fieldName === 'idept') {
                document.getElementById('modalInputicredt').value = '0';
                Livewire.find(document.getElementById('modalInputicredt').closest('[wire\\:id]').getAttribute('wire:id'))
                    .set('icredt', 0);
            }
        }

        document.querySelectorAll('input[data-type="number"]').forEach(function(input) {
            input.addEventListener('keypress', onlyNumberKey1);
            input.addEventListener('input', function() {
                formatNumberInput(input);
                updateFieldValues(input.getAttribute('id').replace('modalInput', ''));
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

        window.addEventListener('InputModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addinputModal').modal('hide');
            $('#editinputModal').modal('hide');
            $('#removeinputModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })

        window.addEventListener('error', event => {
            $('#removeinputModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
