<!-- Edite Itype Modal -->
<div wire:ignore.self class="modal fade" id="edititypeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل نوع القيد</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetItype" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editItypeModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='itypename' type="text" id="modalItypeitypename"
                                        placeholder="اسم القيد"
                                        class="form-control @error('itypename') is-invalid is-filled @enderror"
                                        onkeypress="return onlyArabicKey(event)" />
                                    <label for="modalItypeitypename">اسم القيد</label>
                                </div>
                                @error('itypename')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='itype' type="text" id="modalItypeitype"
                                        placeholder="نوع القيد"
                                        class="form-control @error('itype') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" maxlength="6"/>
                                    <label for="modalItypeitype">نوع القيد</label>
                                </div>
                                @error('itype')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='note' type="text" id="modalItypenote"
                                        placeholder="ملاحظات"
                                        class="form-control @error('note') is-invalid is-filled @enderror" />
                                    <label for="modalItypenote">ملاحظات</label>
                                </div>
                                @error('note')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-0">
                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='update' wire:loading.attr="disabled" type="button"
                                class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Itype Modal -->
