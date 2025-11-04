<!-- Add Rental Modal -->
<div wire:ignore.self class="modal fade" id="addRentalModal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content h-100">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة محضر تأجير
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body d-flex flex-column">
        <form id="addRentalModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
          <div class="row g-3 flex-grow-1">
            <div class="col-12 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="p-3 card-body d-flex flex-column">
                  <div class="row g-3 flex-grow-1">

                    <!-- اسم المستأجر -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <select wire:model.defer="tenant_name" id="addRentalTenantName" class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror" data-placeholder="اختيار اسم المستأجر" data-allow-clear="true" data-dropdown-parent="#addRentalModal">
                          <option value="">اختيار اسم المستأجر</option>
                          @if (isset($tenants) && count($tenants) > 0)
                          @foreach ($tenants as $tenant)
                          <option value="{{ $tenant->id }}">
                            {{ $tenant->name }}
                          </option>
                          @endforeach
                          @else
                          <option value="" disabled>لا توجد بيانات متاحة</option>
                          @endif
                        </select>
                        <label for="addRentalTenantName">اسم المستأجر</label>
                      </div>
                      @error('tenant_name')
                      <small class='text-danger inputerror'>{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- التاريخ -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='date' type="text" id="addRentalDate" placeholder="التاريخ" class="form-control flatpickr @error('date') is-invalid is-filled @enderror" />
                        <label for="addRentalDate">التاريخ</label>
                      </div>
                      @error('date')
                      <small class='text-danger inputerror'>{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- المبلغ -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='amount' type="number" step="0.01" id="addRentalAmount" placeholder="المبلغ" class="form-control @error('amount') is-invalid is-filled @enderror" />
                        <label for="addRentalAmount">المبلغ</label>
                      </div>
                      @error('amount')
                      <small class='text-danger inputerror'>{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- ملف PDF -->
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input wire:model.defer='pdf_file' type="file" accept=".pdf" id="addRentalPdfFile" class="form-control @error('pdf_file') is-invalid is-filled @enderror" />
                        <label for="addRentalPdfFile">ملف PDF</label>
                      </div>
                      @error('pdf_file')
                      <small class='text-danger inputerror'>{{ $message }}</small>
                      @enderror

                      <!-- معاينة الملف المؤقت -->
                      @if($filePreviewPath)
                      <div class="mt-2">
                        <small class="text-success">
                          <i class="mdi mdi-file-pdf-box"></i>
                          تم اختيار ملف جديد:
                          <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank" class="text-primary">عرض المعاينة</a>
                        </small>
                      </div>
                      @endif
                    </div>

                    <!-- الملاحظات -->
                    <div class="col-12">
                      <div class="form-floating form-floating-outline">
                        <textarea wire:model.defer='notes' id="addRentalNotes" placeholder="الملاحظات" class="form-control @error('notes') is-invalid is-filled @enderror" rows="3"></textarea>
                        <label for="addRentalNotes">الملاحظات</label>
                      </div>
                      @error('notes')
                      <small class='text-danger inputerror'>{{ $message }}</small>
                      @enderror
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="px-4 py-3 modal-footer bg-light">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button wire:click="store()" wire:loading.attr="disabled" type="button" class="btn btn-primary">
          <span wire:loading.remove>حفظ</span>
          <span wire:loading>
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            جاري الحفظ...
          </span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Select2 when modal is shown
    $('#addRentalModal').on('shown.bs.modal', function () {
        $('#addRentalTenantName').select2({
            dropdownParent: $('#addRentalModal'),
            placeholder: 'اختيار اسم المستأجر',
            allowClear: true
        });

        // Handle Select2 change event
        $('#addRentalTenantName').on('change', function (e) {
            @this.call('SelectTenantName', $(this).val());
        });
    });

    // Clean up Select2 when modal is hidden
    $('#addRentalModal').on('hidden.bs.modal', function () {
        $('#addRentalTenantName').select2('destroy');
    });
});
</script>
