
<!-- Edite InfoOffic Modal -->
<div wire:ignore.self class="modal fade" id="editinfoofficModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetInfoOffic" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                <form id="editInfoOfficModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        '<Div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='Infooffice_id' type="text" id="modalInfoOfficInfooffice_id" placeholder="رقم"
                                            class="form-control @error('Infooffice_id') is-invalid is-filled @enderror" />
                                        <label for="modalInfoOfficInfooffice_id">رقم</label>
                                    </div>
                                    @error('Infooffice_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='Infooffice_name' type="text" id="modalInfoOfficInfooffice_name" placeholder="مكتب معلومات بطاقة السكن"
                                            class="form-control @error('Infooffice_name') is-invalid is-filled @enderror" />
                                        <label for="modalInfoOfficInfooffice_name">مكتب معلومات بطاقة السكن</label>
                                    </div>
                                    @error('Infooffice_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='update' wire:loading.attr="disabled" type="button" class="btn btn-success me-sm-3 me-1">تعديل</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
<!--/ Edite InfoOffic Modal -->
