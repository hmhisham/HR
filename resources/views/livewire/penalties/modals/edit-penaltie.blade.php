<!-- Edite Penaltie Modal -->
<div wire:ignore.self class="modal fade" id="editpenaltieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                {{-- <h5 wire:loading wire:target="GetPenaltie"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5> --}}

                <div wire:loading.remove>
                    <form id="editPenaltieModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
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
                                <div class="row">


                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='calculator_number' type="text"
                                                id="modalEmployeecalculator_number" placeholder="رقم الحاسبة"
                                                class="form-control @error('calculator_number') is-invalid is-filled @enderror"
                                                disabled />
                                            <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                        </div>
                                        @error('calculator_number')
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

                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='p_reason' type="text" id="modalPenaltiep_reason"
                                                placeholder="سبب العقوبة"
                                                class="form-control @error('p_reason') is-invalid is-filled @enderror" />
                                            <label for="modalPenaltiep_reason">سبب العقوبة</label>
                                        </div>
                                        @error('p_reason')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='p_issuing_authority' type="text"
                                                id="modalPenaltiep_issuing_authority" placeholder="جهة الاصدار"
                                                class="form-control @error('p_issuing_authority') is-invalid is-filled @enderror" />
                                            <label for="modalPenaltiep_issuing_authority">جهة الاصدار</label>
                                        </div>
                                        @error('p_issuing_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='p_ministerial_order_number' type="text"
                                                id="modalPenaltiep_ministerial_order_number"
                                                placeholder="رقم الامر الوزاري"
                                                class="form-control @error('p_ministerial_order_number') is-invalid is-filled @enderror" />
                                            <label for="modalPenaltiep_ministerial_order_number">رقم الامر
                                                الوزاري</label>
                                        </div>
                                        @error('p_ministerial_order_number')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='p_ministerial_order_date' type="text"
                                                id="modalPenaltiep_ministerial_order_date"
                                                placeholder="تاريخ الامر الوزاري"
                                                class="form-control @error('p_ministerial_order_date') is-invalid is-filled @enderror" />
                                            <label for="modalPenaltiep_ministerial_order_date">تاريخ الامر
                                                الوزاري</label>
                                        </div>
                                        @error('p_ministerial_order_date')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='p_penalty_type' id="modalPenaltiesp_penalty_type"
                                                class="form-select @error('p_penalty_type') is-invalid is-filled @enderror">
                                                <option value="" disabled selected>اختر نوع العقوبة</option>
                                                <option value="لفت نظر">لفت نظر</option>
                                                <option value="انذار">انذار</option>
                                                <option value="توبيخ">توبيخ</option>
                                                <option value="سحب يد">سحب يد</option>
                                                <option value="فصل">فصل</option>
                                                <option value="عزل">عزل</option>
                                                <option value="قطع راتب">قطع راتب</option>
                                                <option value="انزال درجة وظيفية">انزال درجة وظيفية</option>
                                                <option value="انقاص راتب">انقاص راتب</option>
                                            </select>
                                            <label for="modalPenaltiesp_penalty_type">نوع العقوبة</label>
                                        </div>
                                        @error('p_penalty_type')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='p_notes' type="text" id="modalPenaltiep_notes"
                                                placeholder="ملاحظات"
                                                class="form-control @error('p_notes') is-invalid is-filled @enderror" />
                                            <label for="modalPenaltiep_notes">ملاحظات</label>
                                        </div>
                                        @error('p_notes')
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
<!--/ Edite Penaltie Modal -->
