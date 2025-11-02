<!-- Add Contract Modal -->
<div wire:ignore.self class="modal fade" id="addcontractModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content h-100">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة عقد
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body d-flex flex-column">
        <form id="addcontractModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
          <div class="row g-3 flex-grow-1">
            <div class="col-lg-7 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="p-3 card-body d-flex flex-column">
                  <div class="row g-1 flex-grow-1">
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='document_contract_number' type="text" id="addContractdocument_contract_number" placeholder="رقم العقد في المستند" class="form-control @error('document_contract_number') is-invalid is-filled @enderror" />
                          <label for="addContractdocument_contract_number">رقم العقد في
                            المستند</label>
                        </div>
                        @error('document_contract_number')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <select wire:model.defer="tenant_name" id="addContracttenant_name" class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror" data-placeholder="اختيار اسم المستأجر" data-allow-clear="true" data-dropdown-parent="#addcontractModal">
                            <option value="">اختيار اسم المستأجر</option>
                            @if (isset($tenants) && count($tenants) > 0)
                            @foreach ($tenants as $tenantsnew)
                            <option value="{{ $tenantsnew->id }}">
                              {{ $tenantsnew->name }}
                            </option>
                            @endforeach
                            @else
                            <option value="" disabled>لا توجد بيانات متاحة
                            </option>
                            @endif
                          </select>
                          {{-- <label for="addContracttenant_name">اسم المستأجر</label> --}}
                        </div>
                        @error('tenant_name')
                        <small class='text-danger inputerror'>{ $message }</small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='start_date' type="text" id="addContractstart_date" placeholder="تاريخ بداية العقد" class="form-control flatpickr @error('start_date') is-invalid is-filled @enderror" />
                          <label for="addContractstart_date">تاريخ بداية العقد</label>
                        </div>
                        @error('start_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='approval_date' type="text" id="addContractapproval_date" placeholder="تاريخ المصادقة على العقد" class="form-control flatpickr @error('approval_date') is-invalid is-filled @enderror" />
                          <label for="addContractapproval_date">تاريخ المصادقة على
                            العقد</label>
                        </div>
                        @error('approval_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='end_date' type="text" id="addContractend_date" placeholder="تاريخ انتهاء العقد" class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" />
                          <label for="addContractend_date">تاريخ انتهاء العقد</label>
                        </div>
                        @error('end_date')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='annual_rent_amount'
                                 type="text"
                                 id="addContractannual_rent_amount"
                                 placeholder="مبلغ التأجير للسنة الواحدة"
                                 class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror"
                                 oninput="formatNumber(this)" />
                          <label for="addContractannual_rent_amount">مبلغ التأجير للسنة
                            الواحدة</label>
                        </div>
                        @error('annual_rent_amount')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>

                     <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='lease_duration' type="number" id="addContractlease_duration" placeholder="مدة الإيجار" class="form-control @error('lease_duration') is-invalid is-filled @enderror"   />
                          <label for="addContractlease_duration">مدة الإيجار (سنوات)</label>
                        </div>
                        @error('lease_duration')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>


                        <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <div class="usage-type-wrapper position-relative">
                            <select wire:model.defer="usage_type" id="addContractUsageTypeUnique" class="form-select usage-type-select @error('usage_type') is-invalid is-filled @enderror" data-placeholder="اختيار نوع الاستغلال">
                              <option value="">اختيار نوع الاستغلال</option>
                              @if (isset($propertyTypes) && count($propertyTypes) > 0)
                              @foreach ($propertyTypes as $propertyType)
                              <option value="{{ $propertyType->id }}">
                                {{ $propertyType->type_name }}
                              </option>
                              @endforeach
                              @else
                              <option value="" disabled>لا توجد بيانات متاحة
                              </option>
                              @endif
                            </select>
                            <div class="usage-type-dropdown" id="usageTypeDropdown" style="display: none;">
                              <div class="usage-type-search">
                                <input type="text" id="usageTypeSearch" placeholder="البحث..." class="form-control form-control-sm">
                              </div>
                            <div class="usage-type-options" id="usageTypeOptions">
                                @if (isset($propertyTypes) && count($propertyTypes) > 0)
                                @foreach ($propertyTypes as $propertyType)
                                <div class="usage-type-option" data-value="{{ $propertyType->id }}">
                                  {{ $propertyType->type_name }}
                                </div>
                               @endforeach
                               @endif
                             </div>
                            </div>
                          </div>
                         </div>
                        @error('usage_type')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                    <div class="row g-2">

                      <div class="mb-2 col">
                        <div class="form-floating form-floating-outline">
                          <input wire:model.defer='notes' type="text" id="addContractnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                          <label for="addContractnotes">الملاحظات</label>
                        </div>
                        @error('notes')
                        <small class='text-danger inputerror'> {{ $message }} </small>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-lg-5 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="px-3 py-2 border-0 card-header bg-light">
                  <h6 class="mb-0 card-title d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-file-pdf-box text-danger me-2 fs-6"></i>
                    <span>الملف</span>
                  </h6>
                </div>
                <div class="p-2 card-body d-flex flex-column">
                  <div wire:loading.remove wire:target="file" class="flex-grow-1 d-flex flex-column">
                    @if ($file)
                    <div class="p-2 border rounded-3 bg-light flex-grow-1 d-flex flex-column">
                      <div class="mb-2 text-center">
                        <span class="px-2 py-1 text-success bg-success-subtle rounded-pill fw-bold small">
                          <i class="mdi mdi-check-circle me-1"></i>تم رفع الملف بنجاح
                        </span>
                      </div>
                      @if (!is_string($file))
                      <div class="pdf-preview-container flex-grow-1 d-flex flex-column">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3 flex-grow-1">
                          @if ($filePreviewPath)
                          <embed src="{{ asset('storage/' . $filePreviewPath) }}" type="application/pdf" width="100%" height="100%" style="border-radius: 6px;">
                          @else
                          <div class="p-2 text-muted">
                            لا يمكن إنشاء رابط معاينة مؤقت على هذا القرص.
                          </div>
                          @endif
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-1 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            معاينة الملف المرفوع
                          </small>
                        </div>
                      </div>
                      @else
                      <div class="pdf-preview-container flex-grow-1 d-flex flex-column">
                        <div class="overflow-hidden bg-white border shadow-sm rounded-3 flex-grow-1">
                          <embed src="{{ asset('storage/' . $file) }}" type="application/pdf" width="100%" height="100%" style="border-radius: 6px;">
                        </div>
                        <div class="mt-2 text-center">
                          <small class="mb-2 text-muted d-block">
                            <i class="mdi mdi-file-pdf-box text-danger me-1"></i>
                            ملف محفوظ مسبقاً
                          </small>
                          <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">
                            <i class="mdi mdi-open-in-new me-1"></i>فتح في نافذة
                            جديدة
                          </a>
                        </div>
                      </div>
                      @endif
                      <div class="mt-2 text-center">
                        @if (!is_string($file) && $filePreviewPath)
                        <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill me-2">
                          <i class="mdi mdi-open-in-new me-1"></i>عرض الملف
                        </a>
                        @elseif (is_string($file))
                        <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill me-2">
                          <i class="mdi mdi-open-in-new me-1"></i>عرض الملف
                        </a>
                        @endif
                        <button wire:click="$set('file', null)" type="button" class="px-3 btn btn-outline-danger btn-sm rounded-pill">
                          <i class="mdi mdi-refresh me-1"></i>استبدال الملف
                        </button>
                      </div>
                    </div>
                    @else
                    <label for="addContractfile" class="w-100 d-flex align-items-center justify-content-center upload-label flex-grow-1" style="cursor: pointer;">
                      <div class="border-2 border-dashed upload-container rounded-3 w-100 h-100 d-flex align-items-center justify-content-center position-relative" style="transition: all 0.3s ease; border-color: #dee2e6;" onmouseover="this.style.borderColor='#007bff'; this.style.backgroundColor='rgba(0,123,255,0.05)'" onmouseout="this.style.borderColor='#dee2e6'; this.style.backgroundColor='transparent'">
                        <div class="p-3 text-center upload-content">
                          <div class="mb-2 upload-icon">
                            <i class="mdi mdi-cloud-upload text-primary" style="font-size: 2.2rem; opacity: 0.8;"></i>
                          </div>
                          <h6 class="mb-1 text-dark fw-bold fs-6">الملف</h6>
                          <span class="px-2 py-1 mb-1 badge bg-danger-subtle text-danger rounded-pill d-inline-block small">
                            <i class="mdi mdi-alert-circle me-1"></i>PDF فقط
                          </span>
                          <p class="mt-1 text-muted small">الحد الأقصى: 10 ميجابايت</p>
                        </div>
                      </div>
                    </label>
                    <input wire:model="file" type="file" id="addContractfile" class="d-none" accept="application/pdf" />
                    @endif
                  </div>
                  {{-- <div wire:loading wire:target="file"
                                        class="d-flex align-items-center justify-content-center flex-grow-1">
                                        <div class="text-center">
                                            <div class="spinner-border text-primary" role="status"></div>
                                            <p class="mt-2 text-muted small">جارٍ رفع الملف...</p>
                                        </div>
                                    </div> --}}
                  @error('file')
                  <div class="p-2 mt-2 border-0 shadow-sm alert alert-danger rounded-3">
                    <div class="d-flex align-items-center small">
                      <i class="mdi mdi-alert-circle me-2 fs-6"></i>
                      <span>{ $message }</span>
                    </div>
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="px-3 py-2 border-0 modal-footer">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='store' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-primary rounded-pill">
            <span wire:loading.remove wire:target="store">
              <i class="mdi mdi-content-save-outline me-2"></i>حفظ
            </span>
            <span wire:loading wire:target="store">
              <span class="spinner-border spinner-border-sm me-2" role="status"></span>
              جارٍ الحفظ...
            </span>
          </button>
          <button type="button" class="px-3 py-2 btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline me-2"></i>إلغاء العملية
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ Add Contract Modal -->

<style>
/* Independent Usage Type Field Styling */
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
    border-bottom: 1px solid #e7eaf3;
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
    box-shadow: 0 0 0 0.2rem rgba(105, 108, 255, 0.25);
    outline: 0;
}

 /* ضبط ارتفاع القائمة لعرض 10 عناصر */
 .usage-type-wrapper { --usage-option-row-height: 38px; }
 .usage-type-options {
     max-height: calc(var(--usage-option-row-height) * 8);
     overflow-y: auto;
 }

 .usage-type-option {
     padding: 0 0.875rem;
     line-height: var(--usage-option-row-height);
     color: #697a8d;
     cursor: pointer;
     transition: background-color 0.15s ease-in-out;
     border-bottom: 1px solid #f8f9fa;
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
.form-floating-outline .usage-type-select:focus ~ label,
.form-floating-outline .usage-type-select:not(:placeholder-shown) ~ label {
    transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    color: #696cff;
}

.form-floating-outline .usage-type-select.is-filled ~ label {
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
    input.dispatchEvent(new Event('input', { bubbles: true }));
}

// Independent Usage Type Field JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initUsageTypeField();
});

function initUsageTypeField() {
    const select = document.getElementById('addContractUsageTypeUnique');
    const dropdown = document.getElementById('usageTypeDropdown');
    const searchInput = document.getElementById('usageTypeSearch');
    const optionsContainer = document.getElementById('usageTypeOptions');

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

    // Reset any inline display styles to ensure all items are visible (scroll will handle height)
    optionsContainer.querySelectorAll('.usage-type-option').forEach(opt => { opt.style.display = ''; });

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
        select.dispatchEvent(new Event('change', { bubbles: true }));

        closeDropdown();
    }

    // Removed visibility limiting: the list remains full, with scroll limiting height

    // Event listeners
    // امنع فتح القائمة الأصلية للـ <select>
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

    // Removed toggle more/less button handler

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

    // No initial visibility limiting; scrolling will handle height constraint

    // Handle Livewire updates
    document.addEventListener('livewire:load', function() {
        initUsageTypeField();
    });

    document.addEventListener('livewire:update', function() {
        setTimeout(() => {
            initUsageTypeField();
        }, 100);
    });
}
</script>
