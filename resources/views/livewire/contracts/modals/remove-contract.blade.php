
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

                    @if($Contract)
                    <div class="row g-2 mt-2">
   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->end_date ?? '' }}" wire:model.defer='end_date' type="text" id="modalContractend_date" placeholder="تاريخ انتهاء العقد"
                    class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" / readonly disabled>
                <label for="modalContractend_date">تاريخ انتهاء العقد</label>
            </div>
            @error('end_date')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->tenant_name ?? '' }}" wire:model.defer='tenant_name' type="text" id="modalContracttenant_name" placeholder="اسم المستأجر"
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
                <input value="{{ $Contract->annual_rent_amount ?? '' }}" wire:model.defer='annual_rent_amount' type="text" id="modalContractannual_rent_amount" placeholder="مبلغ التأجير للسنة الواحدة"
                    class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror" / readonly disabled>
                <label for="modalContractannual_rent_amount">مبلغ التأجير للسنة الواحدة</label>
            </div>
            @error('annual_rent_amount')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->phone_number ?? '' }}" wire:model.defer='phone_number' type="text" id="modalContractphone_number" placeholder="رقم الهاتف"
                    class="form-control @error('phone_number') is-invalid is-filled @enderror" / readonly disabled>
                <label for="modalContractphone_number">رقم الهاتف</label>
            </div>
            @error('phone_number')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
           </div>   <div class="row g-2">
            <div class="mb-2 col">
            <div class="form-floating form-floating-outline">
                <input value="{{ $Contract->notes ?? '' }}" wire:model.defer='notes' type="text" id="modalContractnotes" placeholder="الملاحظات"
                    class="form-control @error('notes') is-invalid is-filled @enderror" / readonly disabled>
                <label for="modalContractnotes">الملاحظات</label>
            </div>
            @error('notes')
                <small class='text-danger inputerror'> {{ $message }} </small>
            @enderror
        </div>
        
                    </div>
                    @else
                    <div class="alert alert-warning text-center">
                        <i class="mdi mdi-alert-circle-outline me-2"></i>
                        لم يتم تحديد عقد للحذف. يرجى تحديد عقد أولاً.
                    </div>
                    @endif
                </div>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="mdi mdi-close-circle-outline me-1"></i> إلغاء
                </button>
                <button wire:click='destroy' type="button" class="btn btn-danger" @if(!$Contract) disabled @endif>
                    <span wire:loading.remove><i class="mdi mdi-trash-can-outline me-1"></i> حذف نهائي</span>
                    <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحذف...</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--/ Remove Contract Modal -->
