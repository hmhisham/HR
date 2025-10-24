
@extends('layouts/layoutMaster')
@section('title', 'Contracts')
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
        @endsection
@section('content') 
@livewire('contracts.contract', ['property_folder_id' => $property_folder_id])


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

    <script src=" {{ asset('assets/vendor/libs/flatpickr/l10n/ar.js') }}"></script>
@endsection

@section('page-script')
    <script src=" {{ asset('assets/js/app-user-list.js') }}"></script>
    <script src=" {{ asset('assets/js/extended-ui-sweetalert2.js') }}"></script>
    <script src=" {{ asset('assets/js/form-basic-inputs.js') }}"></script>
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

        // ✅ تعريف دالة initFlatpickr في المستوى العام
        function initFlatpickr() {
            document.querySelectorAll('.flatpickr').forEach(function(input) {
                // تدمير أي نسخة سابقة لتجنب التكرار
                if (input._flatpickr) {
                    input._flatpickr.destroy();
                }
                // تهيئة Flatpickr
                flatpickr(input, {
                    locale: 'ar', // ✅ تفعيل اللغة العربية
                    dateFormat: 'Y-m-d',
                    disableMobile: true,
                    allowInput: true,
                    clickOpens: true,
                    theme: 'material_blue'
                });
            });
        }

        // ✅ استدعاء عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            initFlatpickr();
        });

        // ✅ استدعاء عند تحميل Livewire
        document.addEventListener('livewire:load', function() {
            initFlatpickr();
        });

        // ✅ استدعاء عند تحديث Livewire (إذا تم إطلاق الحدث)
        if (window.livewire) {
            window.livewire.on('flatpickr', function() {
                initFlatpickr();
            });
        }

        // معالجة أحداث Livewire الأخرى
        window.addEventListener('ContractModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
                // ✅ إعادة تهيئة Flatpickr عند فتح المودال
                initFlatpickr();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addcontractModal').modal('hide');
            $('#editcontractModal').modal('hide');
            $('#removecontractModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })

        window.addEventListener('error', event => {
            $('#removecontractModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })
        })

        // ✅ تهيئة Select2 مع دعم كامل لـ Livewire والنوافذ المنبثقة
        document.addEventListener('livewire:load', function () {
            // دالة عامة لإعادة تهيئة Select2 بأمان
            window.initSelect2 = function(selector, eventName, parentModalSelector = null) {
                const element = document.querySelector(selector);
                if (!element) {
                    console.warn('Select2 element not found:', selector);
                    return;
                }

                const $el = $(element);
                // تدمير التهيئة السابقة إن وجدت
                if ($el.data('select2')) {
                    $el.select2('destroy');
                }

                const options = {
                   // placeholder: 'اختيار',
                    allowClear: true,
                    minimumInputLength: 0,
                    maximumInputLength: 255,
                    dropdownParent: parentModalSelector ? $(parentModalSelector) : $(document.body)
                };

                try {
                    $el.select2(options).on('change', function (e) {
                        const value = e.target.value || null;
                        if (window.Livewire && Livewire.emit) {
                            Livewire.emit(eventName, value);
                        }
                    });
                } catch (error) {
                    console.error('Error initializing Select2 for', selector, error);
                }
            };

            // دالة لإعادة تهيئة جميع حقول Select2
            window.reinitAllSelect2 = function() {
initSelect2('#addContracttenant_name', 'SelectTenantName', '#addcontractModal');
initSelect2('#editContracttenant_name', 'SelectTenantName', '#editcontractModal');
            };

            // ✅ تهيئة أولية عند تحميل الصفحة
            window.reinitAllSelect2();

            // ✅ إعادة التهيئة بعد كل تحديث من Livewire
            Livewire.hook('message.processed', (message, component) => {
                setTimeout(() => {
                    window.reinitAllSelect2();
                }, 100);
            });

            // ✅ تهيئة عند فتح النوافذ المنبثقة
            $('#addcontractModal').on('shown.bs.modal', function () {
                setTimeout(() => {
                    // تهيئة حقول الإضافة فقط
            initSelect2('#addContracttenant_name', 'SelectTenantName', '#addcontractModal');
            // initSelect2('#editContracttenant_name', 'SelectTenantName', '#editcontractModal');
                }, 100);
            });

            $('#editcontractModal').on('shown.bs.modal', function () {
                setTimeout(() => {
                    // تهيئة حقول التعديل فقط
            // initSelect2('#addContracttenant_name', 'SelectTenantName', '#addcontractModal');
            initSelect2('#editContracttenant_name', 'SelectTenantName', '#editcontractModal');
                }, 100);
            });

            // ✅ تنظيف Select2 عند إغلاق المودال
            $('#addcontractModal, #editcontractModal').on('hidden.bs.modal', function () {
                $(this).find('select').each(function() {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                });
            });
        });

    </script>
@endsection