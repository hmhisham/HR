
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
    <style>
      .select2-container { width: 100% !important; }
      .select2-selection--single .select2-selection__rendered { white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
      /* عرض 8 عناصر عند فتح Select2 */
      .select2-container--default .select2-results__options { max-height: calc(8 * 2.25em) !important; overflow-y: auto !important; }
      .select2-container--default .select2-results__option { line-height: 2.25em; padding: 0 0.75rem; }
    </style>
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
                    width: '100%',
                    dir: 'rtl',
                    placeholder: element.getAttribute('data-placeholder') || 'اختيار',
                    allowClear: element.getAttribute('data-allow-clear') === 'true' || true,
                    dropdownParent: parentModalSelector ? $(parentModalSelector) : $(document.body),
                    language: {
                        noResults: function () { return 'لا توجد نتائج'; },
                        searching: function () { return 'جاري البحث…'; }
                    }
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
initSelect2('#editContractusage_type', 'SelectUsageType', '#editcontractModal');
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
            initSelect2('#addContractusage_type', 'SelectUsageType', '#addcontractModal');
            // initSelect2('#editContracttenant_name', 'SelectTenantName', '#editcontractModal');
                }, 100);
            });

            $('#editcontractModal').on('shown.bs.modal', function () {
                setTimeout(() => {
                    // تهيئة حقول التعديل فقط
            // initSelect2('#addContracttenant_name', 'SelectTenantName', '#addcontractModal');
            initSelect2('#editContracttenant_name', 'SelectTenantName', '#editcontractModal');
            initSelect2('#editContractusage_type', 'SelectUsageType', '#editcontractModal');
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



<style>
  /* Independent Usage Type Field Styling for Edit Modal */
  .usage-type-wrapper {
    position: relative;
    width: 100%;
  }

  .usage-type-select {
    background-color: #fff !important;
    border: 1px solid #d9dee3 !important;
    border-radius: 0.375rem !important;
    height: 3.5rem !important;
    padding: 0.875rem 2.5rem 0.875rem 0.875rem !important;
    font-size: 0.9375rem !important;
    line-height: 1.53 !important;
    color: #697a8d !important;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23697a8d' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.875rem center;
    background-size: 16px 12px;
    transition: all 0.2s ease-in-out;
  }

  .usage-type-select:focus {
    border-color: #696cff !important;
    box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25) !important;
    outline: 0;
  }

  .usage-type-select:hover {
    border-color: #696cff !important;
  }

  .usage-type-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 1050;
    background-color: #fff;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
    margin-top: 2px;
    max-height: 300px;
    overflow: hidden;
  }

  .usage-type-search {
    padding: 0.5rem;
    border-bottom: 1px solid #f8f9fa;
    background: #fff;
  }

  .usage-type-search input {
    border: 1px solid #d9dee3;
    border-radius: 0.25rem;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    width: 100%;
  }

  .usage-type-search input:focus {
    border-color: #696cff;
    box-shadow: 0 0 0 0.125rem rgba(105, 108, 255, 0.25);
    outline: 0;
  }

  /* ضبط ارتفاع القائمة لعرض 6 عناصر بدلاً من 8 */
  .usage-type-wrapper {
    --usage-option-row-height: 36px;
  }

  .usage-type-options {
    max-height: calc(var(--usage-option-row-height) * 6);
    overflow-y: auto;
    background: #fff;
  }

  .usage-type-option {
    padding: 0 0.75rem;
    line-height: var(--usage-option-row-height);
    color: #697a8d;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
    border-bottom: 1px solid #f8f9fa;
    font-size: 0.875rem;
  }

  .usage-type-option:hover {
    background-color: #f8f9fa;
    color: #5a6acf;
  }

  .usage-type-option:last-child {
    border-bottom: none;
  }

  .usage-type-option.selected {
    background-color: #696cff;
    color: #fff;
  }

  .usage-type-option.hidden {
    display: none;
  }

  /* تحسين شريط التمرير */
  .usage-type-options::-webkit-scrollbar {
    width: 6px;
  }

  .usage-type-options::-webkit-scrollbar-track {
    background: #f8f9fa;
  }

  .usage-type-options::-webkit-scrollbar-thumb {
    background: #d9dee3;
    border-radius: 3px;
  }

  .usage-type-options::-webkit-scrollbar-thumb:hover {
    background: #b8c2cc;
  }

  /* Dark mode support */
  [data-bs-theme="dark"] .usage-type-select {
    background-color: #2b2c40 !important;
    border-color: #444564 !important;
    color: #a1acb8 !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23a1acb8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
  }

  [data-bs-theme="dark"] .usage-type-dropdown {
    background-color: #2b2c40;
    border-color: #444564;
  }

  [data-bs-theme="dark"] .usage-type-search {
    border-bottom-color: #444564;
  }

  [data-bs-theme="dark"] .usage-type-search input {
    background-color: #2b2c40;
    border-color: #444564;
    color: #a1acb8;
  }

  [data-bs-theme="dark"] .usage-type-option {
    color: #a1acb8;
    border-bottom-color: #444564;
  }

  [data-bs-theme="dark"] .usage-type-option:hover {
    background-color: #444564;
    color: #fff;
  }

  /* Error state */
  .usage-type-select.is-invalid {
    border-color: #ff3e1d !important;
  }

  .usage-type-select.is-invalid:focus {
    border-color: #ff3e1d !important;
    box-shadow: 0 0 0 0.2rem rgba(255, 62, 29, 0.25) !important;
  }

  /* Floating label compatibility */
  .form-floating-outline .usage-type-select:focus~label,
  .form-floating-outline .usage-type-select:not(:placeholder-shown)~label {
    transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    color: #696cff;
  }

  .form-floating-outline .usage-type-select.is-filled~label {
    transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    color: #697a8d;
  }

</style>

<script>
  function formatNumber(input) {
    // احفظ موضع المؤشر
    let cursorPosition = input.selectionStart;

    // احصل على القيمة وأزل الفواصل الموجودة
    let value = input.value.replace(/,/g, '');

    // تحقق من أن القيمة رقم صحيح
    if (!/^\d*\.?\d*$/.test(value)) {
      // إذا لم تكن رقماً صحيحاً، أزل الأحرف غير الصحيحة
      value = value.replace(/[^\d.]/g, '');
    }

    // تأكد من وجود نقطة عشرية واحدة فقط
    let parts = value.split('.');
    if (parts.length > 2) {
      value = parts[0] + '.' + parts.slice(1).join('');
    }

    // أضف الفواصل للجزء الصحيح
    if (parts[0]) {
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      value = parts.join('.');
    }

    // احسب الفرق في الطول لتعديل موضع المؤشر
    let lengthDiff = value.length - input.value.length;

    // حدث القيمة
    input.value = value;

    // أعد تعيين موضع المؤشر
    let newCursorPosition = cursorPosition + lengthDiff;
    input.setSelectionRange(newCursorPosition, newCursorPosition);

    // حدث قيمة Livewire
    input.dispatchEvent(new Event('input', {
      bubbles: true
    }));
  }

  // Independent Usage Type Field JavaScript for Edit Modal
  document.addEventListener('DOMContentLoaded', function() {
    initEditUsageTypeField();
  });

  function initEditUsageTypeField() {
    const select = document.getElementById('editContractUsageTypeUnique');
    const dropdown = document.getElementById('editUsageTypeDropdown');
    const searchInput = document.getElementById('editUsageTypeSearch');
    const optionsContainer = document.getElementById('editUsageTypeOptions');

    if (!select || !dropdown || !searchInput || !optionsContainer) {
      return;
    }

    let isOpen = false;
    let selectedValue = '';
    let selectedText = '';

    // Toggle dropdown
    function toggleDropdown() {
      isOpen = !isOpen;
      dropdown.style.display = isOpen ? 'block' : 'none';

      if (isOpen) {
        searchInput.focus();
        searchInput.value = '';
        filterOptions('');
      }
    }

    // Close dropdown
    function closeDropdown() {
      isOpen = false;
      dropdown.style.display = 'none';
    }

    // Filter options based on search
    function filterOptions(searchTerm) {
      const options = optionsContainer.querySelectorAll('.usage-type-option');
      const term = searchTerm.toLowerCase().trim();

      options.forEach(option => {
        const text = option.textContent.toLowerCase();
        if (text.includes(term)) {
          option.classList.remove('hidden');
        } else {
          option.classList.add('hidden');
        }
      });
    }

    // Select option
    function selectOption(value, text) {
      selectedValue = value;
      selectedText = text;

      // Update select element
      select.value = value;

      // Update visual display
      const selectedOption = select.querySelector(`option[value="${value}"]`);
      if (selectedOption) {
        selectedOption.selected = true;
      }

      // Update all options visual state
      optionsContainer.querySelectorAll('.usage-type-option').forEach(opt => {
        opt.classList.remove('selected');
      });

      const clickedOption = optionsContainer.querySelector(`[data-value="${value}"]`);
      if (clickedOption) {
        clickedOption.classList.add('selected');
      }

      // Add filled class for floating label
      if (value) {
        select.classList.add('is-filled');
      } else {
        select.classList.remove('is-filled');
      }

      // Trigger Livewire update
      select.dispatchEvent(new Event('change', {
        bubbles: true
      }));

      closeDropdown();
    }

    // Event listeners
    select.addEventListener('mousedown', function(e) {
      e.preventDefault();
    });

    select.addEventListener('keydown', function(e) {
      const keys = ['ArrowDown', 'ArrowUp', ' ', 'Spacebar', 'Enter'];
      if (keys.includes(e.key)) {
        e.preventDefault();
        toggleDropdown();
      }
    });

    select.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      toggleDropdown();
    });

    select.addEventListener('focus', function(e) {
      e.preventDefault();
      toggleDropdown();
    });

    searchInput.addEventListener('input', function() {
      filterOptions(this.value);
    });

    searchInput.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeDropdown();
      }
    });

    // Handle option clicks
    optionsContainer.addEventListener('click', function(e) {
      if (e.target.classList.contains('usage-type-option')) {
        const value = e.target.getAttribute('data-value');
        const text = e.target.textContent.trim();
        selectOption(value, text);
      }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      if (!select.contains(e.target) && !dropdown.contains(e.target)) {
        closeDropdown();
      }
    });

    // Initialize with current value
    const currentValue = select.value;
    if (currentValue) {
      const currentOption = select.querySelector(`option[value="${currentValue}"]`);
      if (currentOption) {
        selectOption(currentValue, currentOption.textContent.trim());
      }
    }

    // Handle Livewire updates
    document.addEventListener('livewire:load', function() {
      initEditUsageTypeField();
    });

    document.addEventListener('livewire:update', function() {
      setTimeout(() => {
        initEditUsageTypeField();
      }, 100);
    });
  }

</script>


@endsection
