
<!-- Remove Contract Modal -->
<div wire:ignore.self class="modal fade" id="removecontractModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light px-4 py-3">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="mdi mdi-delete-circle-outline text-danger me-2"></i>
                    تأكيد الحذف
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div wire:loading.remove>

                    @if($Contract)
                        <i class="mdi mdi-alert-circle-outline text-danger fs-1 mb-3"></i>
                        <h5>هل أنت متأكد من حذف هذا العنصر؟</h5>
                        <p class="text-muted">لا يمكن التراجع عن هذه العملية.</p>
                        <div class="row g-2 mt-2">
   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->user_id ?? '' }}" wire:model.defer='user_id' type="text" id="deleteContractuser_id" placeholder=""
                    class="form-control @error('user_id') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractuser_id"></label>
            </div>
            @error('user_id')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->property_folder_id ?? '' }}" wire:model.defer='property_folder_id' type="text" id="deleteContractproperty_folder_id" placeholder=""
                    class="form-control @error('property_folder_id') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractproperty_folder_id"></label>
            </div>
            @error('property_folder_id')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->document_contract_number ?? '' }}" wire:model.defer='document_contract_number' type="text" id="deleteContractdocument_contract_number" placeholder="رقم العقد في المستند"
                    class="form-control @error('document_contract_number') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractdocument_contract_number">رقم العقد في المستند</label>
            </div>
            @error('document_contract_number')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->start_date ?? '' }}" wire:model.defer='start_date' type="text" id="deleteContractstart_date" placeholder="تاريخ بداية العقد"
                    class="form-control flatpickr @error('start_date') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractstart_date">تاريخ بداية العقد</label>
            </div>
            @error('start_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->approval_date ?? '' }}" wire:model.defer='approval_date' type="text" id="deleteContractapproval_date" placeholder="تاريخ المصادقة على العقد"
                    class="form-control flatpickr @error('approval_date') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractapproval_date">تاريخ المصادقة على العقد</label>
            </div>
            @error('approval_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->end_date ?? '' }}" wire:model.defer='end_date' type="text" id="deleteContractend_date" placeholder="تاريخ انتهاء العقد"
                    class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractend_date">تاريخ انتهاء العقد</label>
            </div>
            @error('end_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
        <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <select wire:model.defer="tenant_name"
                    id="deleteContracttenant_name"
                    class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror"
                    data-placeholder="اختيار اسم المستأجر"
                    data-allow-clear="true"
                    data-dropdown-parent="#deletecontractModal">

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

              //  <label for="deleteContracttenant_name">اسم المستأجر</label>
            </div>
            @error('tenant_name')
                <small class='text-danger inputerror'>{ $message }</small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->annual_rent_amount ?? '' }}" wire:model.defer='annual_rent_amount' type="text" id="deleteContractannual_rent_amount" placeholder="مبلغ التأجير للسنة الواحدة"
                    class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractannual_rent_amount">مبلغ التأجير للسنة الواحدة</label>
            </div>
            @error('annual_rent_amount')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->lease_duration ?? '' }}" wire:model.defer='lease_duration' type="text" id="deleteContractlease_duration" placeholder="مدة الإيجار"
                    class="form-control @error('lease_duration') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractlease_duration">مدة الإيجار</label>
            </div>
            @error('lease_duration')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->usage_type ?? '' }}" wire:model.defer='usage_type' type="text" id="deleteContractusage_type" placeholder="نوع الاستغلال"
                    class="form-control @error('usage_type') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractusage_type">نوع الاستغلال</label>
            </div>
            @error('usage_type')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->notes ?? '' }}" wire:model.defer='notes' type="text" id="deleteContractnotes" placeholder="الملاحظات"
                    class="form-control @error('notes') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractnotes">الملاحظات</label>
            </div>
            @error('notes')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->file ?? '' }}" wire:model.defer='file' type="file" id="deleteContractfile" placeholder="الملف"
                    class="form-control @error('file') is-invalid is-filled @enderror" / readonly disabled>
                <label for="deleteContractfile">الملف</label>
            </div>
            @error('file')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>
                        </div>
                    @else

                        <div class="alert alert-warning" role="alert">
                            لم يتم العثور على العقد المطلوب للحذف.
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                 <button wire:click='destroy' type="button" class="btn btn-danger" @disabled(!$Contract)>
                    <span wire:loading.remove><i class="mdi mdi-trash-can-outline me-1"></i> حذف نهائي</span>
                    <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحذف...</span>
                </button>
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-circle-outline me-1"></i> إلغاء
                </button>

            </div>
        </div>
    </div>
</div>
<!--/ Remove Contract Modal -->
