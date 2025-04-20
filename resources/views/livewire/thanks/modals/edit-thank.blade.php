<!-- Edite Thank Modal -->
<div wire:ignore.self class="modal fade" id="editthankModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل بيانات كتاب الشكر والتقدير</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                {{-- <h5 wire:loading wire:target="GetThank"
                    wire:loading.class="d-flex justify-content-center text-primary">
                    جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5> --}}
                <div wire:loading.remove>
                    <form id="editThankModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='full_name' type="text"
                                                id="modalEmployeefull_name" placeholder=" اسم الموظف"
                                                class="form-control @error('full_name') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeefull_name">اسم الموظف</label>
                                        </div>
                                        @error('full_name')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-3">
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
                                    <div class="mb-3 col-3">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='get_departmen' type="text" id="get_departmen"
                                                placeholder="اسم القسم"
                                                class="form-control @error('get_departmen') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="get_departmen">اسم القسم</label>
                                        </div>
                                        @error('get_departmen')
                                            <small class='text-danger inputerror'>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='grantor' id="modalThanksgrantor"
                                                class="form-select @error('grantor') is-invalid is-filled @enderror">
                                                <option value="">اختر الجهة</option>
                                                @foreach ($department as $departmen)
                                                    <option value="{{ $departmen->id }}">
                                                        {{ $departmen->department_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalThanksgrantor">الجهة المانحة للشكر</label>
                                        </div>
                                        @error('grantor')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='reason' type="text" id="modalThankreason"
                                                placeholder="السبب من الشكر"
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
                                            <input wire:model.defer='ministerial_order_number' type="text"
                                                id="modalThankministerial_order_number" placeholder="رقم الامر الوزاري"
                                                class="form-control @error('ministerial_order_number') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalThankministerial_order_number">رقم الامر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_number')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='ministerial_order_date' type="text"
                                                id="editministerial_order_date" placeholder="تاريخ الامر الوزاري"
                                                class="form-control @error('ministerial_order_date') is-invalid is-filled @enderror" />
                                            <label for="modalThankministerial_order_date">تاريخ الامر الوزاري</label>
                                        </div>
                                        @error('ministerial_order_date')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer="months_of_service"
                                                id="modalEmployeemonths_of_service"
                                                class="form-select @error('months_of_service') is-invalid is-filled @enderror">
                                                <option value="" disabled selected>عدد الاشهر</option>
                                                <option value="1">1</option>
                                                <option value="6">6</option>
                                            </select>
                                            <label for="modalEmployeemonths_of_service">مدة القدم/عدد الاشهر</label>
                                        </div>
                                        @error('months_of_service')
                                            <small class="text-danger inputerror">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='notes' type="text" id="modalThanknotes"
                                                placeholder="الملاحظات"
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
</div>
<!--/ Edite Thank Modal -->
