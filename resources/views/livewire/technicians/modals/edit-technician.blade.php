<!-- Edite Technician Modal -->
<div wire:ignore.self class="modal fade" id="edittechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل الراتب</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetTechnician"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>
                <div wire:loading.remove>
                    <form id="editTechnicianModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <div Class="row">
                                    <div class="mb-3 col {{ $grades }}">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='grades_id' id="modalTechniciangrades_id"
                                                class="form-select @error('grades_id') is-invalid is-filled @enderror">
                                                <option value="">اختر الدرجة الوظيفية</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->grades_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="modalTechniciangrades_id">الدرجة الوظيفية</label>
                                        </div>
                                        @error('grades_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='phase_emp' id="modalTechnicianphase_emp"
                                                class="form-select @error('phase_emp') is-invalid is-filled @enderror">
                                                <option value="">اختر المرحلة الوظيفية</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalTechnicianphase_emp">المرحلة الوظيفية</label>
                                        </div>
                                        @error('phase_emp')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_salary_grade'
                                                id="modalTechniciantechnicians_salary_grade"
                                                class="form-select @error('technicians_salary_grade') is-invalid is-filled @enderror">
                                                <option value="">اختر درجة الراتب</option>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <label for="modalTechniciantechnicians_salary_grade">درجة الراتب</label>
                                        </div>
                                        @error('technicians_salary_grade')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_salary_stage'
                                                id="modalTechniciantechnicians_salary_stage"
                                                class="form-select @error('technicians_salary_stage') is-invalid is-filled @enderror">
                                                <option value="">اختر مرحلة الراتب</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalTechniciantechnicians_salary_stage">مرحلة الراتب</label>
                                        </div>
                                        @error('technicians_salary_stage')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_amount'
                                                id="modalTechniciantechnicians_amount"
                                                class="form-select @error('technicians_amount') is-invalid is-filled @enderror">
                                                <option value="">اختر مقدار العلاوة</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="10">10</option>
                                                <option value="12">12</option>
                                            </select>
                                            <label for="modalTechniciantechnicians_amount">مقدار العلاوة</label>
                                        </div>
                                        @error('technicians_amount')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='technicians_salary' type="text"
                                                id="modalTechniciantechnicians_salary" placeholder="الراتب"
                                                class="form-control @error('technicians_salary') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalTechniciantechnicians_salary">الراتب</label>
                                        </div>
                                        @error('technicians_salary')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_minimum_period'
                                                id="modalTechniciantechnicians_minimum_period"
                                                class="form-select @error('technicians_minimum_period') is-invalid is-filled @enderror">
                                                <option value="">اختر المدة الاصغرية</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <label for="modalTechniciantechnicians_minimum_period">المدة
                                                الاصغرية</label>
                                        </div>
                                        @error('technicians_minimum_period')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='technicians_previous_salary' type="text"
                                                id="modalTechniciantechnicians_previous_salary"
                                                placeholder="الراتب السابق"
                                                class="form-control @error('technicians_previous_salary') is-invalid is-filled @enderror"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalTechniciantechnicians_previous_salary">الراتب
                                                السابق</label>
                                        </div>
                                        @error('technicians_previous_salary')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <hr class="my-0">
                                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                                    <button wire:click='update' wire:loading.attr="disabled" type="button"
                                        class="btn btn-primary me-sm-3 me-1">تعديل</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">تجاهل</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edite Technician Modal -->
