
<!-- Edite Thank Modal -->
<div wire:ignore.self class="modal fade" id="editthankModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetThank" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                <form id="editThankModalForm" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        '<Div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='grantor' type="text" id="modalThankgrantor" placeholder="الجهة المانحة للشكر"
                                            class="form-control @error('grantor') is-invalid is-filled @enderror" />
                                        <label for="modalThankgrantor">الجهة المانحة للشكر</label>
                                    </div>
                                    @error('grantor')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_number' type="text" id="modalThankministerial_order_number" placeholder="رقم الامر الوزاري"
                                            class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalThankministerial_order_number">رقم الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='ministerial_order_date' type="text" id="modalThankministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                            class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalThankministerial_order_date">تاريخ الامر الوزاري</label>
                                    </div>
                                    @error('ministerial_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='reason' type="text" id="modalThankreason" placeholder="السبب من الشكر"
                                            class="form-control @error('reason') is-invalid is-filled @enderror" />
                                        <label for="modalThankreason">السبب من الشكر</label>
                                    </div>
                                    @error('reason')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                  </div>
                                        <Div Class="row">
                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='months_of_service' type="text" id="modalThankmonths_of_service" placeholder="عدد اشهر القدم"
                                            class="form-control @error('months_of_service') is-invalid is-filled @enderror" />
                                        <label for="modalThankmonths_of_service">عدد اشهر القدم</label>
                                    </div>
                                    @error('months_of_service')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='notes' type="text" id="modalThanknotes" placeholder="الملاحظات"
                                            class="form-control @error('notes') is-invalid is-filled @enderror" />
                                        <label for="modalThanknotes">الملاحظات</label>
                                    </div>
                                    @error('notes')
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
<!--/ Edite Thank Modal -->
