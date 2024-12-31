<!-- Edite Propertypay Modal -->
<div wire:ignore.self class="modal fade" id="editpropertypayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الدفع</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPropertypay"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editPropertypayModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='user_id' type="text" id="modalPropertypayuser_id"
                                                placeholder="رقم المستخدم"
                                                class="form-control @error('user_id') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayuser_id">رقم المستخدم</label>
                                        </div>
                                        @error('user_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='bonds_id' type="text" id="modalPropertypaybonds_id"
                                                placeholder="رقم العقار"
                                                class="form-control @error('bonds_id') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypaybonds_id">رقم العقار</label>
                                        </div>
                                        @error('bonds_id')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='receipt_number' type="text"
                                                id="modalPropertypayreceipt_number" placeholder="رقم الإيصال"
                                                class="form-control @error('receipt_number') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayreceipt_number">رقم الإيصال</label>
                                        </div>
                                        @error('receipt_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='receipt_date' type="date"
                                                id="modalPropertypayreceipt_date" placeholder="تاريخ الإيصال"
                                                class="form-control @error('receipt_date') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayreceipt_date">تاريخ الإيصال</label>
                                        </div>
                                        @error('receipt_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='amount' type="text" id="modalPropertypayamount"
                                                placeholder="المبلغ"
                                                class="form-control @error('amount') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayamount">المبلغ</label>
                                        </div>
                                        @error('amount')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='receipt_file' type="text"
                                                id="modalPropertypayreceipt_file" placeholder="ملف الإيصال"
                                                class="form-control @error('receipt_file') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayreceipt_file">ملف الإيصال</label>
                                        </div>
                                        @error('receipt_file')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalPropertypaynotes"
                                                placeholder="ملاحظات"
                                                class="form-control @error('notes') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypaynotes">ملاحظات</label>
                                        </div>
                                        @error('notes')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='isdeleted' type="text"
                                                id="modalPropertypayisdeleted" placeholder="محذوف"
                                                class="form-control @error('isdeleted') is-invalid is-filled @enderror" />
                                            <label for="modalPropertypayisdeleted">محذوف</label>
                                        </div>
                                        @error('isdeleted')
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
                        class="btn btn-success me-sm-3 me-1">تعديل</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Propertypay Modal -->
