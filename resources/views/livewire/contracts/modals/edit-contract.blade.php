
<!-- Edit Contract Modal -->
<div wire:ignore.self class="modal fade" id="editcontractModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light px-4 py-3">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="mdi mdi-pencil-circle-outline text-warning me-2"></i>
                    تعديل عقد
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">


                <div wire:loading.remove>
                    <form id="editContractModalForm" autocomplete="off">
                        <div class="row g-1">
   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='user_id' type="text" id="editContractuser_id" placeholder=""
                    class="form-control @error('user_id') is-invalid is-filled @enderror" />
                <label for="editContractuser_id"></label>
            </div>
            @error('user_id')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='property_folder_id' type="text" id="editContractproperty_folder_id" placeholder=""
                    class="form-control @error('property_folder_id') is-invalid is-filled @enderror" />
                <label for="editContractproperty_folder_id"></label>
            </div>
            @error('property_folder_id')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='document_contract_number' type="text" id="editContractdocument_contract_number" placeholder="رقم العقد في المستند"
                    class="form-control @error('document_contract_number') is-invalid is-filled @enderror" />
                <label for="editContractdocument_contract_number">رقم العقد في المستند</label>
            </div>
            @error('document_contract_number')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='start_date' type="text" id="editContractstart_date" placeholder="تاريخ بداية العقد"
                    class="form-control flatpickr @error('start_date') is-invalid is-filled @enderror" />
                <label for="editContractstart_date">تاريخ بداية العقد</label>
            </div>
            @error('start_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='approval_date' type="text" id="editContractapproval_date" placeholder="تاريخ المصادقة على العقد"
                    class="form-control flatpickr @error('approval_date') is-invalid is-filled @enderror" />
                <label for="editContractapproval_date">تاريخ المصادقة على العقد</label>
            </div>
            @error('approval_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='end_date' type="text" id="editContractend_date" placeholder="تاريخ انتهاء العقد"
                    class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" />
                <label for="editContractend_date">تاريخ انتهاء العقد</label>
            </div>
            @error('end_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
        <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <select wire:model.defer="tenant_name"
                    id="editContracttenant_name"
                    class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror"
                    data-placeholder="اختيار اسم المستأجر"
                    data-allow-clear="true"
                    data-dropdown-parent="#editcontractModal">

                    <option value="">اختيار اسم المستأجر</option>

                    @if(isset($tenants) && count($tenants) > 0)
                        @foreach($tenants as $tenantsnew)
                            <option value="{{ $tenantsnew->id }}">
                                {{ $tenantsnew->name }}
                            </option>
                        @endforeach
                    @else
                        <option value="" disabled>لا توجد بيانات متاحة</option>
                    @endif
                </select>

              //  <label for="editContracttenant_name">اسم المستأجر</label>
            </div>
            @error('tenant_name')
                <small class='text-danger inputerror'>{ $message }</small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='annual_rent_amount' type="text" id="editContractannual_rent_amount" placeholder="مبلغ التأجير للسنة الواحدة"
                    class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror"
                    oninput="formatNumber(this)" />
                <label for="editContractannual_rent_amount">مبلغ التأجير للسنة الواحدة</label>
            </div>
            @error('annual_rent_amount')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <select wire:model="lease_duration" id="editContractlease_duration" class="form-select @error('lease_duration') is-invalid is-filled @enderror" size="6">
                    <option value="">اختيار مدة الإيجار</option>
                    @for ($i = 1; $i <= 30; $i++)
                    <option value="{{ $i }}">{{ $i }} @if($i == 1) سنة @else سنوات @endif</option>
                    @endfor
                </select>
                <label for="editContractlease_duration">مدة الإيجار</label>
            </div>
            @error('lease_duration')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <select wire:model.defer="usage_type" id="editContractusage_type" class="form-select select2 @error('usage_type') is-invalid is-filled @enderror" data-placeholder="اختيار نوع الاستغلال" data-allow-clear="true" data-dropdown-parent="#editcontractModal">
                    <option value="">اختيار نوع الاستغلال</option>
                    @if (isset($propertyTypes) && count($propertyTypes) > 0)
                    @foreach ($propertyTypes as $propertyType)
                    <option value="{{ $propertyType->id }}" {{ $usage_type == $propertyType->id ? 'selected' : '' }}>
                      {{ $propertyType->type_name }}
                    </option>
                    @endforeach
                    @else
                    <option value="" disabled>لا توجد بيانات متاحة</option>
                    @endif
                </select>
                {{-- <label for="editContractusage_type">نوع الاستغلال</label> --}}
            </div>
            @error('usage_type')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='notes' type="text" id="editContractnotes" placeholder="الملاحظات"
                    class="form-control @error('notes') is-invalid is-filled @enderror" />
                <label for="editContractnotes">الملاحظات</label>
            </div>
            @error('notes')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input wire:model.defer='file' type="file" id="editContractfile" placeholder="الملف"
                    class="form-control @error('file') is-invalid is-filled @enderror" />
                <label for="editContractfile">الملف</label>
            </div>
            @error('file')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>
                        </div>
                    </form>
                </div>
            </div>
              <div class="px-3 py-2 border-0 modal-footer">
        <div class="gap-2 d-flex w-100 justify-content-center">
          <button wire:click='update' wire:loading.attr="disabled" type="button" class="px-3 py-2 shadow-sm btn btn-success rounded-pill">
            <span wire:loading.remove wire:target="update">
              <i class="mdi mdi-check-circle-outline Me-2"></i>تحديث البيانات
            </span>
            <span wire:loading wire:target="update">
              <span class="spinner-border spinner-border-sm Me-2" role="status"></span>
              جارٍ التحديث...
            </span>
          </button>
          <button type = "button" Class="px-3 py-2 btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">
            <i class="mdi mdi-close-circle-outline Me-2"></i>إلغاء العملية
          </button>
        </div>
      </div>
        </div>
    </div>
</div>

<style>
/* تحديد حجم قائمة lease_duration */
.select2-container--default .select2-results__options {
    max-height: 150px !important;
    overflow-y: auto !important;
}

.select2-dropdown {
    max-height: 150px !important;
}

/* تحديد حجم القائمة المنسدلة لـ lease_duration فقط */
#editContractlease_duration + .select2-container .select2-dropdown .select2-results {
    max-height: 150px !important;
    overflow-y: auto !important;
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
</script>

<style>
/* أنماط خاصة بقائمة lease_duration */
#editContractlease_duration {
    height: 120px !important;
    overflow-y: auto !important;
    max-height: 120px !important;
    padding: 0 !important;
}

#editContractlease_duration option {
    padding: 8px 12px;
    border-bottom: 1px solid #f0f0f0;
}

#editContractlease_duration option:hover {
    background-color: #f8f9fa;
}

/* تحسين مظهر القائمة */
select[size] {
    border: 1px solid #d1d5db;
    border-radius: 0.375rem;
    background-color: white;
}

select[size]:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    outline: none;
}
</style>

<!--/ Edit Contract Modal -->
