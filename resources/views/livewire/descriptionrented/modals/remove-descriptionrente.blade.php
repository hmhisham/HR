<!-- Remove Descriptionrente Modal -->
<div wire:ignore.self class="modal fade" id="removedescriptionrenteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف صفة العقار المؤجر</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">

                <div wire:loading.remove wire:target="GetDescriptionrente, destroy">

                    <form id="removeDescriptionrenteModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="mb-3 col">
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label class="mb-1 form-label fw-bold text-dark">
                                            نوع عقار المؤجر
                                        </label>

                                        <div class="p-2 rounded border bg-light"
                                            style="border-left: 4px solid #0d6efd; font-size: 16px; color: #333;">
                                            {{ $description ?? 'غير محدد' }}
                                        </div>

                                        @error('description')
                                            <small class="mt-1 text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy' type="submit"
                                    class="flex-fill btn btn-danger me-sm-3 me-1">
                                    <i class="mdi mdi-delete me-1"></i>
                                    حذف
                                </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="mdi mdi-close me-1"></i>
                                    تجاهل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Descriptionrente Modal -->
