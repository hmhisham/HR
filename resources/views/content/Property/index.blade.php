@extends('layouts/layoutMaster')
@section('title', 'Property')
@section('vendor-style')
    <link rel="stylesheet"href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel = "stylesheet"href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">

    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel=" stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel=" stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css"> --}}
@endsection
@section('content')
    @livewire('property.propert')
@endsection
@section('vendor-script')
    <script src=" {{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src=" {{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

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
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script> --}}
@endsection
@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script> --}}
    <script>
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
        window.addEventListener('PropertModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })
        window.addEventListener('success', event => {
            $('#addpropertModal').modal('hide');
            $('#editpropertModal').modal('hide');
            $('#removepropertModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removepropertModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })
        })

        function onlyNumberKey(evt) {
            var ASCIICode = evt.which ? evt.which : evt.keyCode;
            if ((ASCIICode >= 48 && ASCIICode <= 57) || ASCIICode === 46 || ASCIICode === 44) {
                return true;
            }
            return false;
        }

        function formatWithCommas(input) {
            // إزالة جميع الأحرف غير الرقمية أو النقطة
            let value = input.value.replace(/[^0-9.]/g, '');

            // تقسيم القيمة إلى جزء قبل وبعد النقطة العشرية
            let parts = value.split('.');

            // تنسيق الجزء الأول (قبل النقطة) بإضافة الفواصل
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');

            // إعادة تجميع الأجزاء
            input.value = parts.join('.');
        }

        $(document).ready(function() {

            function initFlatpickr(selector, eventName) {
            // Destroy any existing Flatpickr instance to avoid conflicts
            if ($(selector)[0] && $(selector)[0]._flatpickr) {
                $(selector)[0]._flatpickr.destroy();
            }

            // Initialize Flatpickr
            $(selector).flatpickr({
                locale: 'ar', // Adjust locale for Arabic
                dateFormat: 'Y-m-d', // Adjust date format as needed
                placeholder: 'التاريخ',
                onChange: function(selectedDates, dateStr) {
                // Emit Livewire event on date change
                livewire.emit(eventName, dateStr);
                },
            });
            }


            function batchInitFlatpickr(configs) {
            configs.forEach(config => initFlatpickr(config.selector, config.eventName));
            }

            // Initialize Flatpickr fields with their respective Livewire event names.
            batchInitFlatpickr([{
                selector: '#modalPropertfrom_date',
                eventName: 'employeePositionOrderDate'
            },
            {
                selector: '#editposition_order_date',
                eventName: 'employeePositionOrderDate'
            },
            {
                selector: '#modalPropertto_date',
                eventName: 'employeePositionStartDate'
            },
            {
                selector: '#editposition_start_date',
                eventName: 'employeePositionStartDate'
            },
            ]);

            // Reinitialize Flatpickr after Livewire updates.
            window.livewire.on('select2', () => {
            console.log("Reinitializing Flatpickr");

            batchInitFlatpickr([{
                selector: '#modalPropertfrom_date',
                eventName: 'employeePositionOrderDate'
                },
                {
                selector: '#editposition_order_date',
                eventName: 'employeePositionOrderDate'
                },
                {
                selector: '#modalPropertto_date',
                eventName: 'employeePositionStartDate'
                },
                {
                selector: '#editposition_start_date',
                eventName: 'employeePositionStartDate'
                },
            ]);
            });

            // Reinitialize Flatpickr when modals are shown
            $('#editpropertModal').on('shown.bs.modal', function () {
            batchInitFlatpickr([{
                selector: '#editposition_order_date',
                eventName: 'employeePositionOrderDate'
                },
                {
                selector: '#editposition_start_date',
                eventName: 'employeePositionStartDate'
                },
            ]);
            });

            $('#addpropertModal').on('shown.bs.modal', function () {
            batchInitFlatpickr([{
                selector: '#modalPropertfrom_date',
                eventName: 'employeePositionOrderDate'
                },
                {
                selector: '#modalPropertto_date',
                eventName: 'employeePositionStartDate'
                },
            ]);
            });
        });
    </script>
@endsection
