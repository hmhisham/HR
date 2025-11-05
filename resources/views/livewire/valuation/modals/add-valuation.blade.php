<!-- Add Valuation Modal -->
<div wire:ignore.self class="modal fade" id="addValuationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content h-100 rounded-3 border-0 shadow-lg">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-plus-circle-outline text-primary me-2"></i>
          إضافة محضر التثمين
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body d-flex flex-column">
        <form id="addValuationModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
          <div class="row g-3 flex-grow-1">
            <div class="col-12 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="p-4 card-body d-flex flex-column">
                  <div class="row g-3 flex-grow-1">

                    <!-- التاريخ -->
                    <div class="col-md-4">
                      <div class="form-floating form-floating-outline">
                        <input id="addValuationDate" type="text" class="form-control" placeholder="التاريخ" wire:model.defer="date">
                        <label for="addValuationDate">التاريخ</label>
                        @error('date')<span class="text-danger small">{{ $message }}</span>@enderror
                      </div>
                    </div>

                    <!-- المبلغ -->
                    <div class="col-md-4">
                      <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control" placeholder="المبلغ" wire:model.defer="amount">
                        <label>المبلغ</label>
                        @error('amount')<span class="text-danger small">{{ $message }}</span>@enderror
                      </div>
                    </div>

                    <!-- ملف PDF -->
                    <div class="col-12">
                      <label class="form-label">ملف PDF</label>
                      <div class="input-group input-group-lg flex-nowrap">
                        <input type="file" class="form-control" accept="application/pdf" wire:model="pdf_file" style="min-width:0">
                        @if($filePreviewPath)
                          <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank" class="btn btn-outline-secondary btn-lg" title="معاينة مؤقتة">
                            <i class="mdi mdi-eye-outline"></i>
                          </a>
                          <button type="button" class="btn btn-outline-danger btn-lg" wire:click="clearTempPdf" title="حذف المعاينة">
                            <i class="mdi mdi-close-circle-outline"></i> حذف المعاينة
                          </button>
                        @endif
                      </div>
                      @error('pdf_file')<span class="text-danger small">{{ $message }}</span>@enderror
                    </div>

                    <!-- الملاحظات -->
                    <div class="col-12">
                      <div class="form-floating form-floating-outline">
                        <textarea class="form-control" placeholder="الملاحظات" style="min-height: 100px" wire:model.defer="notes"></textarea>
                        <label>الملاحظات</label>
                        @error('notes')<span class="text-danger small">{{ $message }}</span>@enderror
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="px-4 py-3 modal-footer d-flex justify-content-end">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
        <button type="button" class="btn btn-primary" wire:click="store">حفظ</button>
      </div>
    </div>
  </div>
</div>
