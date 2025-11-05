<!-- Edit Rental Modal -->
<div wire:ignore.self class="modal fade" id="editRentalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="border-0 shadow-lg modal-content h-100 rounded-3">
            <div class="px-4 py-3 modal-header bg-light">
                <h5 class="modal-title d-flex align-items-center">
                    <i class="mdi mdi-file-document-edit-outline text-primary me-2"></i>
                    تعديل محضر التأجير
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="p-4 modal-body d-flex flex-column">
                <form id="editRentalModalForm" autocomplete="off" class="d-flex flex-column flex-grow-1">
                    <div class="row g-3 flex-grow-1">
                        <div class="col-12 d-flex flex-column">
                            <div class="border-0 shadow-sm card flex-grow-1">
                                <div class="p-4 card-body d-flex flex-column">
                                    <div class="row g-3 flex-grow-1">

                                        <!-- اسم المستأجر -->
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <div wire:ignore>
                                                    <select wire:model.defer="tenant_name" id="editRentalTenantName"
                                                        class="form-select select2 @error('tenant_name') is-invalid is-filled @enderror"
                                                        data-placeholder="اختيار اسم المستأجر" data-allow-clear="true"
                                                        data-dropdownParent="#editRentalModal">
                                                        <option value="">اختيار اسم المستأجر</option>
                                                        @if (isset($tenants) && count($tenants) > 0)
                                                            @foreach ($tenants as $tenant)
                                                                <option value="{{ $tenant->id }}"
                                                                    {{ $tenant_name == $tenant->id ? 'selected' : '' }}>
                                                                    {{ $tenant->name }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option value="" disabled>لا توجد بيانات متاحة
                                                            </option>
                                                        @endif
                                                    </select>
                                                </div>
                                                <label for="editRentalTenantName">اسم المستأجر</label>
                                            </div>
                                            @error('tenant_name')
                                                <small class='text-danger inputerror'>{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- التاريخ -->
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input wire:model.defer='date' type="text" id="editRentalDate"
                                                    placeholder="التاريخ"
                                                    class="form-control flatpickr @error('date') is-invalid is-filled @enderror" />
                                                <label for="editRentalDate">التاريخ</label>
                                            </div>
                                            @error('date')
                                                <small class='text-danger inputerror'>{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- المبلغ -->
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input wire:model.defer='amount' type="number" step="0.01"
                                                    id="editRentalAmount" placeholder="المبلغ"
                                                    class="form-control @error('amount') is-invalid is-filled @enderror" />
                                                <label for="editRentalAmount">المبلغ</label>
                                            </div>
                                            @error('amount')
                                                <small class='text-danger inputerror'>{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- ملف PDF -->
                                        <div class="col-12">
                                            <label class="form-label" for="editRentalPdfFile">ملف PDF</label>
                                            <div class="input-group input-group-lg flex-nowrap">
                                                <input wire:model.defer='pdf_file' type="file" accept=".pdf"
                                                    id="editRentalPdfFile"
                                                    class="form-control @error('pdf_file') is-invalid is-filled @enderror" />
                                                @if ($Rental && $Rental->pdf_file && !($pdf_file instanceof \Livewire\TemporaryUploadedFile))
                                                    <a href="{{ asset('storage/' . $Rental->pdf_file) }}"
                                                        target="_blank" class="btn btn-outline-primary btn-lg"
                                                        title="عرض الملف الحالي">
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
                                                    wire:click="$set('remove_file', !remove_file)"
                                                    title="حذف الملف الحالي">
                                                    <i class="mdi mdi-delete-outline"></i>
                                                </button>
                                            </div>
                                            @error('pdf_file')
                                                <small class='text-danger inputerror'>{{ $message }}</small>
                                            @enderror
                                            @if ($Rental && $Rental->pdf_file && $remove_file)
                                                <div class="mt-2 text-danger small d-flex align-items-center">
                                                    <i class="mdi mdi-alert-circle-outline me-1"></i>
                                                    سيتم حذف الملف عند الحفظ
                                                </div>
                                            @endif
                                        </div>

                                        <!-- الملاحظات -->
                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea wire:model.defer='notes' id="editRentalNotes" placeholder="الملاحظات"
                                                    class="form-control @error('notes') is-invalid is-filled @enderror" rows="3"></textarea>
                                                <label for="editRentalNotes">الملاحظات</label>
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
                <button wire:click="update()" wire:loading.attr="disabled" type="button" class="btn btn-primary">
                    <span wire:loading.remove>حفظ التعديل</span>
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
        $('#editRentalModal').on('shown.bs.modal', function() {
            $('#editRentalTenantName').select2({
                dropdownParent: $('#editRentalModal'),
                placeholder: 'اختيار اسم المستأجر',
                allowClear: true,
                minimumResultsForSearch: 0,
                width: '100%',
                dir: 'rtl'
            });

            // Handle Select2 change event
            $('#editRentalTenantName').on('change', function(e) {
                @this.call('SelectTenantName', $(this).val());
            });
        });

        // Clean up Select2 when modal is hidden
        $('#editRentalModal').on('hidden.bs.modal', function() {
            $('#editRentalTenantName').select2('destroy');
        });
    });
</script>
