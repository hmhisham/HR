<!-- Edit Valuation Modal -->
<div wire:ignore.self class="modal fade" id="editValuationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="border-0 shadow-lg modal-content h-100 rounded-3">
      <div class="px-4 py-3 modal-header bg-light">
        <h5 class="modal-title d-flex align-items-center">
          <i class="mdi mdi-file-document-edit-outline text-primary me-2"></i>
          تعديل محضر التثمين
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="p-4 modal-body d-flex flex-column">
        <form id="editValuationModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
          <div class="row g-3 flex-grow-1">
            <div class="col-12 d-flex flex-column">
              <div class="border-0 shadow-sm card flex-grow-1">
                <div class="p-4 card-body d-flex flex-column">
                  <div class="row g-3 flex-grow-1">

                    <!-- التاريخ -->
                    <div class="col-md-4">
                      <div class="form-floating form-floating-outline">
                        <input id="editValuationDate" type="text" class="form-control" placeholder="التاريخ" wire:model.defer="date">
                        <label for="editValuationDate">التاريخ</label>
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
                    <div class="col-md-4">
                      <div class="form-floating form-floating-outline">
                        <input type="file" class="form-control" accept="application/pdf" wire:model="pdf_file">
                        <label>ملف PDF</label>
                        @error('pdf_file')<span class="text-danger small">{{ $message }}</span>@enderror
                      </div>
                      @if($pdf_file)
                        <div class="mt-2">
                          <a href="{{ asset('storage/' . $pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="mdi mdi-file-pdf-box"></i> الملف الحالي
                          </a>
                        </div>
                      @endif
                      @if($filePreviewPath)
                        <div class="mt-2">
                          <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                            معاينة مؤقتة
                          </a>
                          <button type="button" class="btn btn-sm btn-outline-danger" wire:click="clearTempPdf">حذف المعاينة</button>
                        </div>
                      @endif
                      <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="removeFile" wire:model="remove_file">
                        <label class="form-check-label" for="removeFile">حذف الملف الحالي</label>
                      </div>
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
        <button type="button" class="btn btn-success" wire:click="update">تعديل</button>
      </div>
    </div>
  </div>
</div>

