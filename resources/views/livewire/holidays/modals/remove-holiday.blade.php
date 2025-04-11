<!-- Remove Holiday Modal -->
<div wire:ignore.self class="modal fade" id="removeholidayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetHoliday"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حذف البيانات...</h5>

                <div wire:loading.remove>
                    <form id="removeHolidayModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">

                                <div class="mb-3">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='full_name' type="text" id="modalEmployeefull_name"
                                            placeholder="اسم الموظف "
                                            class="form-control @error('full_name') is-invalid is-filled @enderror"
                                            disabled />
                                        <label for="modalEmployeefull_name">اسم الموظف</label>
                                    </div>
                                    @error('full_name')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='computer_number' type="text"
                                                id="modalEmployeecomputer_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('computer_number') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeecomputer_number">رقم الحاسبة</label>
                                        </div>
                                        @error('computer_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='department' type="text"
                                                id="modalEmployeedepartment" placeholder="اسم القسم"
                                                class="form-control @error('department') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeedepartment">اسم القسم </label>
                                        </div>
                                        @error('department')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <hr class="my-0">
                            <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                                <button wire:click='destroy' type="submit"
                                    class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
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
<!--/ Delete Holiday Modal -->
