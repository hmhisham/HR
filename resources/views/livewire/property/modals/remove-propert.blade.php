<!-- Remove Property Modal -->
<div wire:ignore.self class="modal fade" id="removepropertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4 p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="text-center mb-4 mt-n4">
                    <h3 class="pb-1 mb-2">حذف بيانات الموظف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetPropert2" class="d-flex justify-content-center text-primary"></h5>
                <h5 wire:loading wire:target="destroy" class="d-flex justify-content-center text-primary"></h5>
                <div wire:loading.remove wire:target="GetPropert2,destroy">
                    <form id="removePropertModalForm" onsubmit="return false" autocomplete="off">
                        <div class="row">
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model='full_name' type="text" id="modalPropertfull_name" readonly placeholder="الاسم الكامل" class="form-control @error('full_name') is-invalid is-filled @enderror" />
                                    <label for="modalPropertfull_name">الاسم الكامل</label>
                                    @error('full_name')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model='calculator_number' type="text" id="modalPropertcalculator_number" readonly placeholder="رقم الحاسبة" class="form-control @error('calculator_number') is-invalid is-filled @enderror" />
                                    <label for="modalPropertcalculator_number">رقم الحاسبة</label>
                                    @error('calculator_number')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model='department_name' type="text" id="modalPropertdepartment_name" readonly placeholder="القسم" class="form-control @error('department_name') is-invalid is-filled @enderror" />
                                    <label for="modalPropertdepartment_name">القسم</label>
                                    @error('department_name')
                                        <small class='text-danger inputerror'>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <hr class="my-0">
                        <div class="d-flex justify-content-center mt-4">
                            <button wire:click='destroy' type="submit" class="btn btn-danger me-3">حذف</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Remove Property Modal -->
