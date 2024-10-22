<!-- Remove service Modal -->
<div wire:ignore.self class="modal fade" id="removeserviceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">\ الخدمةحذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="Getservice"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removeserviceModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='service_type' type="text"
                                                id="modalserviceservice_type" placeholder="نوع الخدمة"
                                                class="form-control @error('service_type') is-invalid is-filled @enderror" />
                                            <label for="modalserviceservice_type">نوع الخدمة</label>
                                        </div>
                                        @error('service_type')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='administrative_order_number' type="text"
                                                id="modalserviceadministrative_order_number"
                                                placeholder="رقم امر الاداري"
                                                class="form-control @error('administrative_order_number') is-invalid is-filled @enderror" />
                                            <label for="modalserviceadministrative_order_number">رقم امر الاداري</label>
                                        </div>
                                        @error('administrative_order_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='administrative_order_date' type="date"
                                                id="modalserviceadministrative_order_date"
                                                placeholder="تاريخ امر الاداري"
                                                class="form-control @error('administrative_order_date') is-invalid is-filled @enderror" />
                                            <label for="modalserviceadministrative_order_date">تاريخ امر الاداري</label>
                                        </div>
                                        @error('administrative_order_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy'
                                    type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary"
                                    data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete service Modal -->
