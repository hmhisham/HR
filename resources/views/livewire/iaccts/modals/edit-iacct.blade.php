<!-- Edite Iacct Modal -->
<div wire:ignore.self class="modal fade" id="editiacctModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل قيد الدليل المحاسبي</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetIacct" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editIacctModalForm" autocomplete="off">
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='iacct' type="text" id="modalIacctiacct"
                                        placeholder="رقم الدليل"
                                        class="form-control @error('iacct') is-invalid is-filled @enderror"
                                        onkeypress="return onlyNumberKey(event)" />
                                    <label for="modalIacctiacct">رقم الدليل</label>
                                </div>
                                @error('iacct')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='iacctname' type="text" id="modalIacctiacctname"
                                        placeholder="اسم الدليل"
                                        class="form-control @error('iacctname') is-invalid is-filled @enderror"
                                        onkeypress="return onlyArabicKey(event)" />
                                    <label for="modalIacctiacctname">اسم الدليل</label>
                                </div>
                                @error('iacctname')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div Class="row">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='note' type="text" id="modalIacctnote"
                                        placeholder="ملاحظات"
                                        class="form-control @error('note') is-invalid is-filled @enderror" />
                                    <label for="modalIacctnote">ملاحظات</label>
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
<!--/ Edite Iacct Modal -->
