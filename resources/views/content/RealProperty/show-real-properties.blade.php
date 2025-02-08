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
        'Plotid' => $Plotid
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
        /* الموظفين */
        $(document).ready(function() {
            window.initSelectedWorkerDrop = () => {
                $('#selectedWorker').select2({
                    placeholder: 'حدد الموظف',
                    dropdownParent: $('#addBuyerTenantModal'),

                    minimumInputLength: 3,
                    ajax: {
                        url: '{{ route("worker.search") }}',
                        dataType: 'json',
                    },
                })
            }
            initSelectedWorkerDrop();
            $('#selectedWorker').on('change', function(e) {
                livewire.emit('SelectWorker', e.target.value)
            });
            window.livewire.on('select2', () => {
                initSelectedWorkerDrop();
            });
        });

        $(document).ready(function() {
            function initflatpickrFromTo(selector, eventName, parentModal) {
                $(selector).flatpickr({
                    placeholder: 'اختر التاريخ',
                    dropdownParent: $(parentModal),
                    dir: 'rtl',
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
            initflatpickrFromTo('#from_date', 'SelectFromDate', '#saleRealPropertyModal');
            initflatpickrFromTo('#to_date', 'SelectToDate', '#saleRealPropertyModal');
            initflatpickrFromTo('#tenant_from_date', 'SelectFromDate', '#tenantRealPropertyModal');
            initflatpickrFromTo('#tenant_to_date', 'SelectToDate', '#tenantRealPropertyModal');
            initflatpickrFromTo('#receipt_date', 'SelectReceiptDate', '#saleTenantReceiptModal');
            initflatpickrFromTo('#receipt_from_date', 'SelectReceiptFromDate', '#saleTenantReceiptModal');
            initflatpickrFromTo('#receipt_to_date', 'SelectReceiptToDate', '#saleTenantReceiptModal');
            window.livewire.on('flatpickr', () => {
                initflatpickrFromTo('#from_date', 'SelectFromDate', '#saleRealPropertyModal');
                initflatpickrFromTo('#to_date', 'SelectToDate', '#saleRealPropertyModal');
                initflatpickrFromTo('#tenant_from_date', 'SelectFromDate', '#tenantRealPropertyModal');
                initflatpickrFromTo('#tenant_to_date', 'SelectToDate', '#tenantRealPropertyModal');
                initflatpickrFromTo('#receipt_date', 'SelectReceiptDate', '#saleTenantReceiptModal');
                initflatpickrFromTo('#receipt_from_date', 'SelectReceiptFromDate', '#saleTenantReceiptModal');
                initflatpickrFromTo('#receipt_to_date', 'SelectReceiptToDate', '#saleTenantReceiptModal');
            });
        });

        $(document).ready(function() {
            function initFlatpickr(selector, eventName) {
                $(selector).flatpickr({
                    placeholder: 'التاريخ',
                    dir: 'rtl',
                    altInput: true,
                    altFormat: "Y-m",
                    dateFormat: "Y-m",
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
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: true,
                            dateFormat: "Y-m",
                            altFormat: "Y-m",
                            theme: "light"
                        })
                    ],
                    onChange: function(selectedDates, dateStr, instance) {
                        console.log(dateStr);
                        livewire.emit(eventName, dateStr);
                    }
                });
            }

            // تهيئة حقول التاريخ
            initFlatpickr('#addDate', 'updateDate', '#addRealPropertyModal');
            initFlatpickr('#editDate', 'updateDate', '#editRealitieToPlotModal');

            window.livewire.on('flatpickr', () => {
                initFlatpickr('#addDate', 'updateDate', '#addRealPropertyModal');
                initFlatpickr('#editDate', 'updateDate', '#editRealitieToPlotModal');
            });
        });

        $(document).ready(function() {
            function initSelect2(selector, eventName, parentModal) {
                $(selector).select2({
                    placeholder: 'اختيار',
                    dropdownParent: $(parentModal)
                });
                $(selector).on('change', function(e) {
                    livewire.emit(eventName, e.target.value);
                });
            }
            initSelect2('#addRealitiegovernorate', 'SelectGovernorate', '#addRealPropertyModal');
            initSelect2('#editRealitiegovernorate', 'SelectGovernorate', '#editRealitieModal');
            initSelect2('#addRealitiedistrict', 'SelectDistrict', '#addRealPropertyModal');
            initSelect2('#editRealitiedistrict', 'SelectDistrict', '#editRealitieModal');
            initSelect2('#addRealitiespecialized_department', 'SelectSpecializedDepartment', '#addRealPropertyModal');
            initSelect2('#editRealitiespecialized_department', 'SelectSpecializedDepartment', '#editRealitieModal');

            window.livewire.on('select2', () => {
                initSelect2('#addRealitiegovernorate', 'SelectGovernorate', '#addRealPropertyModal');
                initSelect2('#editRealitiegovernorate', 'SelectGovernorate', '#editRealitieModal');
                initSelect2('#addRealitiedistrict', 'SelectDistrict', '#addRealPropertyModal');
                initSelect2('#editRealitiedistrict', 'SelectDistrict', '#editRealitieModal');
                initSelect2('#addRealitiespecialized_department', 'SelectSpecializedDepartment','#addRealPropertyModal');
                initSelect2('#editRealitiespecialized_department', 'SelectSpecializedDepartment','#editRealitieModal');
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
    </script>
@endsection
