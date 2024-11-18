<!-- Add Idepartment Modal -->
<div wire:ignore.self class="modal fade" id="addidepartmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة قيد قسم جديد</h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addidepartmentModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='idepartment' type="text"
                                            id="modalIdepartmentidepartment" placeholder="رقم القسم"
                                            class="form-control @error('idepartment') is-invalid is-filled @enderror" />
                                        <label for="modalIdepartmentidepartment">رقم القسم</label>
                                    </div>
                                    @error('idepartment')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='idepartmentcname' type="text"
                                            id="modalIdepartmentidepartmentcname" placeholder="اسم القسم"
                                            class="form-control @error('idepartmentcname') is-invalid is-filled @enderror" />
                                        <label for="modalIdepartmentidepartmentcname">اسم القسم</label>
                                    </div>
                                    @error('idepartmentcname')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='note' type="text" id="modalIdepartmentnote"
                                            placeholder="ملاحظات"
                                            class="form-control @error('note') is-invalid is-filled @enderror" />
                                        <label for="modalIdepartmentnote">ملاحظات</label>
                                    </div>
                                    @error('note')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="text-center col-12 demo-vertical-spacing mb-n4">
                        <button wire:click='store' wire:loading.attr="disabled" type="button"
                            class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">تجاهل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Idepartment Modal -->
