@extends('layouts/layoutMaster')

@section('title', 'Show Real Properties')

@section('vendor-style')
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel ="stylesheet"href=" {{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href=" {{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
@endsection

@section('content')

    @livewire('real-properties.show-real-properties', [
        'Provinceid' => $Provinceid,
        'Plotid' => $Plotid,
    ])

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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>

    <script>
        $(document).ready(function() {
            function initFlatpickr(selector, eventName, parentModal) {
                $(selector).flatpickr({
                    placeholder: 'اختر التاريخ',
                    dropdownParent: $(parentModal),
                    dir: 'rtl',
                    allowInput: true,
                    width: '100%',
                    locale: {
                        months: {
                            shorthand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                                'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                            ],
                            longhand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                                'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                            ]
                        }
                    },
                });
                $(selector).on('change', function(e) {
                    Livewire.emit(eventName, e.target.value);
                });
            }

            initFlatpickr('#addfrom_date', 'SelectFromDate', '#addBuyerTenantModal');
            initFlatpickr('#addto_date', 'SelectToDate', '#addBuyerTenantModal');
            initFlatpickr('#editfrom_date', 'SelectFromDate', '#editBuyerTenantModal');
            initFlatpickr('#editto_date', 'SelectToDate', '#editBuyerTenantModal');
            initFlatpickr('#receipt_date', 'SelectReceiptDate', '#saleTenantReceiptModal');
            initFlatpickr('#receipt_from_date', 'SelectReceiptFromDate', '#saleTenantReceiptModal');
            initFlatpickr('#receipt_to_date', 'SelectReceiptToDate', '#saleTenantReceiptModal');
            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addfrom_date', 'SelectFromDate', '#addBuyerTenantModal');
                initFlatpickr('#addto_date', 'SelectToDate', '#addBuyerTenantModal');
                initFlatpickr('#editfrom_date', 'SelectFromDate', '#editBuyerTenantModal');
                initFlatpickr('#editto_date', 'SelectToDate', '#editBuyerTenantModal');
                initFlatpickr('#receipt_date', 'SelectReceiptDate', '#saleTenantReceiptModal');
                initFlatpickr('#receipt_from_date', 'SelectReceiptFromDate', '#saleTenantReceiptModal');
                initFlatpickr('#receipt_to_date', 'SelectReceiptToDate', '#saleTenantReceiptModal');
            });
        });

        // تحديث المبالغ عند تغيير قيمة مبلغ التسديد
        document.getElementById('receipt_payment_amount').addEventListener('input', function(e) {
            if (this.value) {
                window.livewire.emit('calculateAmounts');
            }
        });
        window.addEventListener('updateAmounts', event => {
            document.getElementById('totalPaid').innerText = event.detail.totalPaid;
            document.getElementById('remainingAmount').innerText = event.detail.remainingAmount;
            document.getElementById('netAmount').innerText = event.detail.netAmount;
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
            if ((ASCIICode >= 1569 && ASCIICode <= 1610) || ASCIICode === 32) {
                return true;
            }
            return false;
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

        window.addEventListener('RealitieModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addBuyerTenantModal').modal('hide');
            $('#editBuyerTenantModal').modal('hide');
            $('#uploadFilesModal').modal('hide');
            $('#saleRealPropertyModal').modal('hide');
            $('#saleTenantReceiptModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#deleteRealitieModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })
        })

        window.addEventListener('show-upload-modal', event => {
            $('#uploadFilesModal').modal('show');
        });

        function handleDrop(event, input) {
            event.preventDefault();
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                input.files = files;
                // Trigger Livewire file upload
                input.dispatchEvent(new Event('change'));
            }
        }
    </script>
@endsection
