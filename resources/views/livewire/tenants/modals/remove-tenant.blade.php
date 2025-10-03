<!-- Remove Tenant Modal -->
<div wire:ignore.self class="modal fade" id="removetenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-delete-circle-outline text-danger me-2"></i>
          تأكيد الحذف
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 text-center modal-body">
        <div wire:loading.remove>

          @if($Tenant)
          <i class="mb-3 mdi mdi-alert-circle-outline text-danger fs-1"></i>
          <h5>هل أنت متأكد من حذف هذا العنصر؟</h5>
          <p class="text-muted">لا يمكن التراجع عن هذه العملية.</p>
          <div class="mt-2 row g-2">
            <div class="row g-2">
              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->user_id ?? '' }}" wire:model.defer='user_id' type="text" id="removeModalTenantuser_id" placeholder="" class="form-control @error('user_id') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantuser_id"></label>
                </div>
                @error('user_id')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>

              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->name ?? '' }}" wire:model.defer='name' type="text" id="removeModalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantname">اسم المستأجر</label>
                </div>
                @error('name')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->phone ?? '' }}" wire:model.defer='phone' type="text" id="removeModalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantphone">رقم الهاتف</label>
                </div>
                @error('phone')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>

              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->email ?? '' }}" wire:model.defer='email' type="text" id="removeModalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" / readonly disabled>

                  <label for="removeModalTenantemail">
                    <i class="mdi mdi-email me-2"></i>البريد الإلكتروني
                  </label>

                </div>
                @error('email')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->address ?? '' }}" wire:model.defer='address' type="text" id="removeModalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantaddress">العنوان</label>
                </div>
                @error('address')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>

              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->pdf_file ?? '' }}" wire:model.defer='pdf_file' type="text" id="removeModalTenantpdf_file" placeholder="المستمسكات" class="form-control @error('pdf_file') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantpdf_file">المستمسكات</label>
                </div>
                @error('pdf_file')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input value="{{ $Tenant->notes ?? '' }}" wire:model.defer='notes' type="text" id="removeModalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" / readonly disabled>
                  <label for="removeModalTenantnotes">الملاحظات</label>
                </div>
                @error('notes')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
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
          <button wire:click='destroy' type="button" class="btn btn-danger" @disabled(!$Tenant)>
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
  <!--/ Remove Tenant Modal -->
