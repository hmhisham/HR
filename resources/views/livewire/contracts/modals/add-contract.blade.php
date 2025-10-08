<!-- Add Contract Modal -->
<div wire:ignore.self class="modal fade" id="addcontractModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة عقد الايجار
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body">
        <form id="addcontractModalForm" autocomplete="off">
          <div class="row g-1">
            <div class="row g-2">




              <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input wire:model.defer='document_contract_number' type="text" id="modalContractdocument_contract_number" placeholder="رقم العقد في المستند" class="form-control @error('document_contract_number') is-invalid is-filled @enderror" />
                  <label for="modalContractdocument_contract_number">رقم العقد في المستند</label>
                </div>
                @error('document_contract_number')
                <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
              </div>

              {{-- <div class="mb-2 col">
                <div class="form-floating form-floating-outline">
                  <input wire:model.defer='generated_contract_number' type="text" id="modalContractgenerated_contract_number" placeholder="رقم العقد المنشأ" class="form-control @error('generated_contract_number') is-invalid is-filled @enderror" />
                  <label for="modalContractgenerated_contract_number">رقم العقد المنشأ</label>
                </div>
                @error('generated_contract_number')
                <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div> --}}

            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='start_date' type="text" id="modalContractstart_date" placeholder="تاريخ بداية العقد" class="form-control flatpickr @error('start_date') is-invalid is-filled @enderror" />
                <label for="modalContractstart_date">تاريخ بداية العقد</label>
              </div>
              @error('start_date')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>


          </div>
          <div class="row g-2">
            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='approval_date' type="text" id="modalContractapproval_date" placeholder="تاريخ المصادقة على العقد" class="form-control flatpickr @error('approval_date') is-invalid is-filled @enderror" />
                <label for="modalContractapproval_date">تاريخ المصادقة على العقد</label>
              </div>
              @error('approval_date')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>
            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='end_date' type="text" id="modalContractend_date" placeholder="تاريخ انتهاء العقد" class="form-control flatpickr @error('end_date') is-invalid is-filled @enderror" />
                <label for="modalContractend_date">تاريخ انتهاء العقد</label>
              </div>
              @error('end_date')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>


         <div class="mb-2 col">
    <div class="form-floating form-floating-outline">
        <select wire:model.defer="tenant_name" id="addContracttenant_name" class="form-select @error('tenant_name') is-invalid @enderror">
            <option value=""></option>
            @foreach($tenants as $tenant)
                <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
            @endforeach
        </select>
        {{-- <label for="addContracttenant_name">اسم المستأجر</label> --}}
    </div>
    @error('tenant_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



          </div>
          <div class="row g-2">

            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='annual_rent_amount' type="text" id="modalContractannual_rent_amount" placeholder="مبلغ التأجير للسنة الواحدة" class="form-control @error('annual_rent_amount') is-invalid is-filled @enderror" />
                <label for="modalContractannual_rent_amount">مبلغ التأجير للسنة الواحدة</label>
              </div>
              @error('annual_rent_amount')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>
            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='lease_duration' type="text" id="modalContractlease_duration" placeholder="مدة الإيجار" class="form-control @error('lease_duration') is-invalid is-filled @enderror" />
                <label for="modalContractlease_duration">مدة الإيجار</label>
              </div>
              @error('lease_duration')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>

            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='usage_type' type="text" id="modalContractusage_type" placeholder="نوع الاستغلال" class="form-control @error('usage_type') is-invalid is-filled @enderror" />
                <label for="modalContractusage_type">نوع الاستغلال</label>
              </div>
              @error('usage_type')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>
          </div>
          <div class="row g-2">



            <div class="mb-2 col">
              <div class="form-floating form-floating-outline">
                <input wire:model.defer='notes' type="text" id="modalContractnotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" />
                <label for="modalContractnotes">الملاحظات</label>
              </div>
              @error('notes')
              <small class='text-danger inputerror'> {{ $message }} </small>
              @enderror
            </div>
          </div>
      </div>
      </form>
    </div>
    <div class="modal-footer justify-content-center">
      <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary">
        <span wire:loading.remove><i class="mdi mdi-content-save-outline me-1"></i> حفظ</span>
        <span wire:loading><span class="spinner-border spinner-border-sm" role="status"></span> جارٍ الحفظ...</span>
      </button>
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
        <i class="mdi mdi-close-circle-outline me-1"></i> تجاهل
      </button>

    </div>
  </div>
</div>
</div>
<!--/ Add Contract Modal -->
