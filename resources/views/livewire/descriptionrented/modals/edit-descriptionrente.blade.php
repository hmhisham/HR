<!-- Edite Descriptionrente Modal -->
<div wire:ignore.self class="modal fade" id="editdescriptionrenteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل\ صفة العقار المؤجر</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetDescriptionrente"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editDescriptionrenteModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="mb-3 col">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='description' type="text"
                                                id="modalDescriptionrentedescription" placeholder="صفة العقار المؤجر"
                                                class="form-control @error('description') is-invalid is-filled @enderror" />
                                            <label for="modalDescriptionrentedescription">صفة العقار المؤجر</label>
                                        </div>
                                        @error('description')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='update' wire:loading.attr="disabled" type="button"
                        class="btn btn-success me-sm-3 me-1">
                        <i class="mdi mdi-pencil-outline me-1"></i>تعديل
                    </button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="mdi mdi-close me-1"></i>تجاهل
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Descriptionrente Modal -->
