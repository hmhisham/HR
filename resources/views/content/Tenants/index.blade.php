
@extends('layouts/layoutMaster')
@section('title', 'Tenants')
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
@livewire('tenants.tenant')


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
        window.addEventListener('TenantModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
                // ✅ إعادة تهيئة Flatpickr عند فتح المودال
                initFlatpickr();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addtenantModal').modal('hide');
            $('#edittenantModal').modal('hide');
            $('#removetenantModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })

        window.addEventListener('error', event => {
            $('#removetenantModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })
        })

        // ✅ تهيئة Select2 للحقول المحددة
        function initializeSelect2Fields() {
            console.log('Initializing Select2 fields...');
            
            // البحث عن جميع حقول Select2
            $('.select2').each(function() {
                const $element = $(this);
                
                // تدمير أي نسخة سابقة لتجنب التكرار
                if ($element.hasClass('select2-hidden-accessible')) {
                    $element.select2('destroy');
                }
                
                // تهيئة Select2 مع الإعدادات المطلوبة
                $element.select2({
                    placeholder: $element.data('placeholder') || 'اختيار',
                    allowClear: $element.data('allow-clear') || true,
                    minimumInputLength: $element.data('minimum-input-length') || 0,
                    maximumSelectionLength: $element.data('maximum-selection-length') || 1,
                    dropdownParent: $element.closest('.modal').length ? $element.closest('.modal') : $('body'),
                    language: {
                        noResults: function() {
                            return 'لا توجد نتائج';
                        },
                        searching: function() {
                            return 'جاري البحث...';
                        }
                    }
                });
                
                console.log('Select2 initialized for:', $element.attr('id'));
            });
        }

        // تهيئة Select2 عند تحميل الصفحة
        $(document).ready(function() {
            console.log('Document ready - initializing Select2');
            initializeSelect2Fields();
        });

        // إعادة تهيئة Select2 عند تحديث Livewire
        window.livewire.on('select2', () => {
            console.log('Livewire select2 event - reinitializing Select2');
            setTimeout(function() {
                initializeSelect2Fields();
            }, 100);
        });

        // إعادة تهيئة Select2 عند فتح المودال
        $('.modal').on('shown.bs.modal', function() {
            console.log('Modal shown - reinitializing Select2');
            setTimeout(function() {
                initializeSelect2Fields();
            }, 100);
        });
    </script>
@endsection