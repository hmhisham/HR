@extends('layouts/layoutMaster')

@section('title', 'property')

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

    @livewire('real-properties.show-buyer-tenant', [
        'RealPropertyNumber' => $RealPropertyNumber,
        'BuyerTenantid' => $BuyerTenantid,
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
            function initflatpickrFromTo(selector, eventName, parentModal) {
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

            initflatpickrFromTo('#edit_receipt_date', 'SelectReceiptDate', '#editSaleTenantReceiptModal');
            initflatpickrFromTo('#edit_receipt_from_date', 'SelectReceiptFromDate', '#editSaleTenantReceiptModal');
            initflatpickrFromTo('#edit_receipt_to_date', 'SelectReceiptToDate', '#editSaleTenantReceiptModal');

            $('[wire\\:model\\.debounce\\.300ms="search.receipt_date"]').flatpickr({
                placeholder: 'اختر التاريخ',
                dir: 'rtl',
                allowInput: true,
                locale: {
                    months: {
                        shorthand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ],
                        longhand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ]
                    }
                }
            });

            $('[wire\\:model\\.debounce\\.300ms="search.receipt_from_date"]').flatpickr({
                placeholder: 'اختر التاريخ',
                dir: 'rtl',
                allowInput: true,
                locale: {
                    months: {
                        shorthand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ],
                        longhand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ]
                    }
                }
            });

            $('[wire\\:model\\.debounce\\.300ms="search.receipt_to_date"]').flatpickr({
                placeholder: 'اختر التاريخ',
                dir: 'rtl',
                allowInput: true,
                locale: {
                    months: {
                        shorthand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ],
                        longhand: ['كانون الثاني', 'شباط', 'آذار', 'نيسان', 'أيار', 'حزيران', 'تموز',
                            'آب', 'أيلول', 'تشرين الأول', 'تشرين الثاني', 'كانون الأول'
                        ]
                    }
                }
            });

            window.livewire.on('flatpickr', () => {
                initflatpickrFromTo('#edit_receipt_date', 'SelectReceiptDate', '#editSaleTenantReceiptModal');
                initflatpickrFromTo('#edit_receipt_from_date', 'SelectReceiptFromDate', '#editSaleTenantReceiptModal');
                initflatpickrFromTo('#edit_receipt_to_date', 'SelectReceiptToDate', '#editSaleTenantReceiptModal');
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

        window.addEventListener('SaleTenantReceiptModal', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#removeSaleTenantReceiptModal').modal('hide');
            $('#editSaleTenantReceiptModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.title + '<hr>' + event.detail.message,
            })
        })

        window.addEventListener('error', event => {
            $('#removeSaleTenantReceiptModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.title + '<hr>' + event.detail.message,
                timer: 5000,
            })

        })
    </script>
@endsection
