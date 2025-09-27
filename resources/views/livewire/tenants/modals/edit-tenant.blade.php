<!-- Edit Tenant Modal -->
<div wire:ignore.self class="modal fade" id="edittenantModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-pencil-circle-outline text-warning me-2"></i>
          تعديل المستأجر
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">


        <div wire:loading.remove>
          <form id="editTenantModalForm" autocomplete="off">
            <div class="row g-1">
              <div class="row g-2">
                 

                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='name' type="text" id="modalTenantname" placeholder="اسم المستأجر" class="form-control @error('name') is-invalid is-filled @enderror" />
                    <label for="modalTenantname">اسم المستأجر</label>
                  </div>
                  @error('name')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='phone' type="text" id="modalTenantphone" placeholder="رقم الهاتف" class="form-control @error('phone') is-invalid is-filled @enderror" />
                    <label for="modalTenantphone">رقم الهاتف</label>
                  </div>
                  @error('phone')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>
              </div>
              <div class="row g-2">
                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='email' type="text" id="modalTenantemail" placeholder="البريد الإلكتروني" class="form-control @error('email') is-invalid is-filled @enderror" />
                    <label for="modalTenantemail">البريد الإلكتروني</label>
                  </div>
                  @error('email')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='address' type="text" id="modalTenantaddress" placeholder="العنوان" class="form-control @error('address') is-invalid is-filled @enderror" />
                    <label for="modalTenantaddress">العنوان</label>
                  </div>
                  @error('address')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='pdf_file' type="text" id="modalTenantpdf_file" placeholder="المستمسكات" class="form-control @error('pdf_file') is-invalid is-filled @enderror" />
                    <label for="modalTenantpdf_file">المستمسكات</label>
                  </div>
                  @error('pdf_file')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>
              </div>
              <div class="row g-2">
                <div class="mb-2 col">
                  <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalTenantnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                    <label for="modalTenantnotes">الملاحظات</label>
                  </div>
                  @error('notes')
                  <small class='text-danger inputerror'> {{ $message }} </small>
                  @enderror
                </div>

              </div>
          </form>
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success">
          <span wire:loading.remove><i class="mdi mdi-check-circle-outline me-1"></i> تعديل</span>
          <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ التعديل...</span>
        </button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          <i class="mdi mdi-close-circle-outline me-1"></i> تجاهل
        </button>

      </div>
    </div>
  </div>
</div>
<!--/ Edit Tenant Modal -->
