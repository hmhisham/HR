<!-- Edite Worker Modal -->
<div wire:ignore.self class="modal fade" id="addtakhroj" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة معلومات الموظف</h3>
                    <p>نافذة اضافة جهة التخرج</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetWorker"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove>
                    <form id="editWorkerModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='computer_number' type="text"
                                                id="modalWorkercomputer_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('computer_number') is-invalid is-filled @enderror" />
                                            <label for="modalWorkercomputer_number">رقم الحاسبة</label>
                                        </div>
                                        @error('computer_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Worker Modal -->
