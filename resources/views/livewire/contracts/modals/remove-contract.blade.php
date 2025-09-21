
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
                    <i class="mdi mdi-alert-circle-outline text-danger fs-1 mb-3"></i>
                    <h5>هل أنت متأكد من حذف هذا العنصر؟</h5>
                    <p class="text-muted">لا يمكن التراجع عن هذه العملية.</p>

                    <div class="row g-2 mt-2">
   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->user_id }}" wire:model.defer='user_id' type="text" id="modalContractuser_id" placeholder=""
                        class="form-control @error('user_id') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractuser_id"></label>
                </div>
                @error('user_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->property_folder_id }}" wire:model.defer='property_folder_id' type="text" id="modalContractproperty_folder_id" placeholder=""
                        class="form-control @error('property_folder_id') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractproperty_folder_id"></label>
                </div>
                @error('property_folder_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->document_contract_number }}" wire:model.defer='document_contract_number' type="text" id="modalContractdocument_contract_number" placeholder="رقم العقد في المستند"
                        class="form-control @error('document_contract_number') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractdocument_contract_number">رقم العقد في المستند</label>
                </div>
                @error('document_contract_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->generated_contract_number }}" wire:model.defer='generated_contract_number' type="text" id="modalContractgenerated_contract_number" placeholder="رقم العقد المنشأ"
                        class="form-control @error('generated_contract_number') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractgenerated_contract_number">رقم العقد المنشأ</label>
                </div>
                @error('generated_contract_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->start_date }}" wire:model.defer='start_date' type="date" id="modalContractstart_date" placeholder="تاريخ بداية العقد"
                        class="form-control @error('start_date') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractstart_date">تاريخ بداية العقد</label>
                </div>
                @error('start_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->approval_date }}" wire:model.defer='approval_date' type="date" id="modalContractapproval_date" placeholder="تاريخ المصادقة على العقد"
                        class="form-control @error('approval_date') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractapproval_date">تاريخ المصادقة على العقد</label>
                </div>
                @error('approval_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->end_date }}" wire:model.defer='end_date' type="date" id="modalContractend_date" placeholder="تاريخ انتهاء العقد"
                        class="form-control @error('end_date') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractend_date">تاريخ انتهاء العقد</label>
                </div>
                @error('end_date')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->tenant_name }}" wire:model.defer='tenant_name' type="text" id="modalContracttenant_name" placeholder="اسم المستأجر"
                        class="form-control @error('tenant_name') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContracttenant_name">اسم المستأجر</label>
                </div>
                @error('tenant_name')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->annual_rent_amount }}" wire:model.defer='annual_rent_amount' type="text" id="modalContractannual_rent_amount" placeholder="مبلغ التأجير للسنة الواحدة"
                        class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractannual_rent_amount">مبلغ التأجير للسنة الواحدة</label>
                </div>
                @error('annual_rent_amount')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->amount_in_words }}" wire:model.defer='amount_in_words' type="text" id="modalContractamount_in_words" placeholder="المبلغ كتابةً"
                        class="form-control @error('amount_in_words') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractamount_in_words">المبلغ كتابةً</label>
                </div>
                @error('amount_in_words')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->lease_duration }}" wire:model.defer='lease_duration' type="text" id="modalContractlease_duration" placeholder="مدة الإيجار"
                        class="form-control @error('lease_duration') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractlease_duration">مدة الإيجار</label>
                </div>
                @error('lease_duration')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->usage_type }}" wire:model.defer='usage_type' type="text" id="modalContractusage_type" placeholder="نوع الاستغلال"
                        class="form-control @error('usage_type') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractusage_type">نوع الاستغلال</label>
                </div>
                @error('usage_type')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->phone_number }}" wire:model.defer='phone_number' type="text" id="modalContractphone_number" placeholder="رقم الهاتف"
                        class="form-control @error('phone_number') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractphone_number">رقم الهاتف</label>
                </div>
                @error('phone_number')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->address }}" wire:model.defer='address' type="text" id="modalContractaddress" placeholder="العنوان"
                        class="form-control @error('address') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractaddress">العنوان</label>
                </div>
                @error('address')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
               </div>   <div class="row g-2">
                <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                    <input value="{{ $Contract->notes }}" wire:model.defer='notes' type="text" id="modalContractnotes" placeholder="الملاحظات"
                        class="form-control @error('notes') is-invalid is-filled @enderror" / readonly disabled>
                    <label for="modalContractnotes">الملاحظات</label>
                </div>
                @error('notes')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                    </div>
                </div>
 
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-circle-outline me-1"></i> إلغاء
                </button>
                <button wire:click='destroy' type="button" class="btn btn-danger">
                    <span wire:loading.remove><i class="mdi mdi-trash-can-outline me-1"></i> حذف نهائي</span>
                    <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحذف...</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--/ Remove Contract Modal -->
