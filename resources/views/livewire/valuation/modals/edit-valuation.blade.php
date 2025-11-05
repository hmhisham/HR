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
                    <div class="row g-2 flex-grow-1">
                        <div class="col-12 d-flex flex-column">
                            <div class="border-0 shadow-sm card flex-grow-1">
                                <div class="p-4 card-body d-flex flex-column">
                                    <div class="row g-2 flex-grow-1">

                                        <!-- التاريخ -->
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input id="editValuationDate" type="text" class="form-control"
                                                    placeholder="التاريخ" wire:model.defer="date">
                                                <label for="editValuationDate">التاريخ</label>
                                                @error('date')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- المبلغ -->
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control" placeholder="المبلغ"
                                                    wire:model.defer="amount">
                                                <label>المبلغ</label>
                                                @error('amount')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- ملف PDF -->
                                        <div class="col-12">
                                            <div class="flex-nowrap input-group input-group-lg">
                                                <span class="input-group-text">ملف PDF</span>
                                                <input type="file" class="form-control" accept="application/pdf"
                                                    wire:model="pdf_file" style="min-width:0">
                                                @if ($pdf_file)
                                                    <a href="{{ asset('storage/' . $pdf_file) }}" target="_blank"
                                                        class="btn btn-outline-primary btn-lg" title="عرض الملف الحالي">
                                                        <i class="mdi mdi-file-pdf-box"></i>
                                                    </a>
                                                @endif
                                                @if ($filePreviewPath)
                                                    <a href="{{ asset('storage/' . $filePreviewPath) }}" target="_blank"
                                                        class="btn btn-outline-secondary btn-lg" title="معاينة مؤقتة">
                                                        <i class="mdi mdi-eye-outline"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger btn-lg"
                                                        wire:click="clearTempPdf" title="حذف المعاينة">
                                                        <i class="mdi mdi-close-circle-outline"></i> حذف المعاينة
                                                    </button>
                                                @endif
                                                <button type="button"
                                                    class="btn btn-lg {{ $remove_file ? 'btn-danger' : 'btn-outline-danger' }}"
                                                    wire:click="$set('remove_file', ! $remove_file)"
                                                    title="حذف الملف الحالي">
                                                    <i class="mdi mdi-delete-outline"></i>
                                                </button>
                                            </div>
                                            @error('pdf_file')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                            @if ($remove_file)
                                                <div class="mt-2 text-danger small d-flex align-items-center">
                                                    <i class="mdi mdi-alert-circle-outline me-1"></i>
                                                    سيتم حذف الملف الحالي عند الحفظ
                                                </div>
                                            @endif
                                        </div>

                                        <!-- الملاحظات -->
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea class="form-control" placeholder="الملاحظات" style="min-height: 100px" wire:model.defer="notes"></textarea>
                                                <label>الملاحظات</label>
                                                @error('notes')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
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
                <button type="button" class="btn btn-primary" wire:click="update">تعديل</button>
            </div>
        </div>
    </div>
</div>
