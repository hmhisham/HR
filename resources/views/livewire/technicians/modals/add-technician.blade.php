
<!-- Add Technician Modal -->
<div wire:ignore.self class="modal fade" id="addtechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addtechnicianModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3"> 
                        <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='grades_id' type="text" id="modalTechniciangrades_id" placeholder="معرّف درجة الموظف"
                        class="form-control @error('grades_id') is-invalid is-filled @enderror" />
                    <label for="modalTechniciangrades_id">معرّف درجة الموظف</label>
                </div>
                @error('grades_id')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='phase_emp' type="text" id="modalTechnicianphase_emp" placeholder="المرحلة الوظيفية"
                        class="form-control @error('phase_emp') is-invalid is-filled @enderror" />
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
                    <input wire:model.defer='technicians_salary_grade' type="text" id="modalTechniciantechnicians_salary_grade" placeholder="درجة الراتب"
                        class="form-control @error('technicians_salary_grade') is-invalid is-filled @enderror" />
                    <label for="modalTechniciantechnicians_salary_grade">درجة الراتب</label>
                </div>
                @error('technicians_salary_grade')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='technicians_salary_stage' type="text" id="modalTechniciantechnicians_salary_stage" placeholder="مرحلة الراتب"
                        class="form-control @error('technicians_salary_stage') is-invalid is-filled @enderror" />
                    <label for="modalTechniciantechnicians_salary_stage">مرحلة الراتب</label>
                </div>
                @error('technicians_salary_stage')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='technicians_amount' type="text" id="modalTechniciantechnicians_amount" placeholder="مقدار العلاوة"
                        class="form-control @error('technicians_amount') is-invalid is-filled @enderror" />
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
                    <input wire:model.defer='technicians_salary' type="text" id="modalTechniciantechnicians_salary" placeholder="الراتب"
                        class="form-control @error('technicians_salary') is-invalid is-filled @enderror" />
                    <label for="modalTechniciantechnicians_salary">الراتب</label>
                </div>
                @error('technicians_salary')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='technicians_minimum_period' type="text" id="modalTechniciantechnicians_minimum_period" placeholder="المدة الأصغرية بالأشهر"
                        class="form-control @error('technicians_minimum_period') is-invalid is-filled @enderror" />
                    <label for="modalTechniciantechnicians_minimum_period">المدة الأصغرية بالأشهر</label>
                </div>
                @error('technicians_minimum_period')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='technicians_previous_salary' type="text" id="modalTechniciantechnicians_previous_salary" placeholder="الراتب السابق"
                        class="form-control @error('technicians_previous_salary') is-invalid is-filled @enderror" />
                    <label for="modalTechniciantechnicians_previous_salary">الراتب السابق</label>
                </div>
                @error('technicians_previous_salary')
                    <small class='text-danger inputerror'> {{ $message }} </small>
                @enderror
            </div>
            
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="text-center col-12 demo-vertical-spacing mb-n4">
                    <button wire:click='store' wire:loading.attr="disabled" type="button" class="btn btn-primary me-sm-3 me-1">اضافة فئة</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">تجاهل</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--/ Add Technician Modal -->
