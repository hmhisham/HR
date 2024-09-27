<!-- Add Penaltie Modal -->
<div wire:ignore.self class="modal fade" id="addpenaltieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addpenaltieModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">

                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-floating form-floating-outline @error('worker') is-invalid is-filled @enderror"
                                        style="width: 100%">
                                        <select wire:model='worker' id="worker" class="form-select"
                                            placeholder='حدد العملية'>
                                            <option value=""></option>
                                            @foreach ($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->full_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="worker">حدد الموظف</label>
                                    </div>
                                    @error('worker')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-4 col-6">
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

                                <div class="mb-3 col-6">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='get_departmen' type="text" id="modalEmployeeget_departmen"
                                            placeholder="اسم القسم"
                                            class="form-control @error('get_departmen') is-invalid is-filled @enderror"
                                            disabled />
                                        <label for="modalEmployeeget_departmen">اسم القسم </label>
                                    </div>
                                    @error('get_departmen')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>


                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='p_reason' type="text" id="modalPenaltiesp_reason"
                                            placeholder="سبب العقوبة"
                                            class="form-control @error('p_reason') is-invalid is-filled @enderror" />
                                        <label for="modalPenaltiesp_reason">سبب العقوبة</label>
                                    </div>
                                    @error('p_reason')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>

                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <select wire:model.defer='p_issuing_authority' id="modalPenaltiep_issuing_authority" class="form-select @error('p_issuing_authority') is-invalid is-filled @enderror">
                                            <option value=""></option>
                                            @foreach ($department as $departmen)
                                                <option value="{{ $departmen->id }}">{{ $departmen->department_name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="modalPenaltiep_issuing_authority">الجهة المانحة للعقوبة</label>
                                    </div>
                                    @error('p_issuing_authority')
                                        <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>


                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='p_ministerial_order_number' type="text"
                                            id="modalPenaltiesp_ministerial_order_number"
                                            placeholder="رقم الامر الوزاري"
                                            class="form-control @error('p_ministerial_order_number') is-invalid is-filled @enderror" />
                                        <label for="modalPenaltiesp_ministerial_order_number">رقم الامر الوزاري</label>
                                    </div>
                                    @error('p_ministerial_order_number')
                                    <small class='text-danger inputerror'> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='p_ministerial_order_date' type="date"
                                            id="modalPenaltiesp_ministerial_order_date"
                                            placeholder="تاريخ الامر الوزاري"
                                            class="form-control @error('p_ministerial_order_date') is-invalid is-filled @enderror" />
                                        <label for="modalPenaltiesp_ministerial_order_date">تاريخ الامر الوزاري</label>
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
                                        <input wire:model.defer='p_notes' type="text" id="modalPenaltiesp_notes"
                                            placeholder="ملاحظات"
                                            class="form-control @error('p_notes') is-invalid is-filled @enderror" />
                                        <label for="modalPenaltiesp_notes">ملاحظات</label>
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
<!--/ Add Penaltie Modal -->
