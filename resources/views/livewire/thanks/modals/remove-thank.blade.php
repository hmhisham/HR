<!-- Remove Thank Modal -->
<div wire:ignore.self class="modal fade" id="removethankModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetThank" wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removeThankModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <Div Class="row">

                                    <div class="mb-3">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='full_name' type="text" id="modalEmployeefull_name"
                                                placeholder="رقم الحاسبة"
                                                class="form-control @error('full_name') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeefull_name">اسم الموظف</label>
                                        </div>
                                        @error('full_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ministerial_order_date' type="date"
                                                id="modalThanksministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                                class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" disabled/>
                                            <label for="modalThanksministerial_order_date">تاريخ الامر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ministerial_order_number' type="text"
                                                id="modalThanksministerial_order_number" placeholder="رقم الامر الوزاري"
                                                class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror" disabled />
                                            <label for="modalThanksministerial_order_number">رقم الامر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy' type="submit"
                                    class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                                <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">تجاهل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Delete Thank Modal -->
