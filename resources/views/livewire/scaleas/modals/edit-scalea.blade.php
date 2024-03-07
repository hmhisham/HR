<!-- Edite Scalea Modal -->
<div wire:ignore.self class="modal fade" id="editscaleaModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تعديل</h3>
                    <p>نافذة التعديل</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetScalea"
                    wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">
                    جار حفظ البيانات...</h5>

                <div wire:loading.remove>
                    <form id="editScaleaModalForm" autocomplete="off">
                        <div class="row row-cols-1">
                            <div class="col mb-3">
                                <Div Class="row">
                                    <div class="mb-3 col flex-fill {{ $grades }}">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='grades_id' id="modalscaleasgrades_id"
                                                class="form-select @error('grades_id') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">{{ $grade->grades_name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="modalscaleasgrades_id">الدرجة الوظيفية</label>
                                        </div>
                                        @error('grades_id')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col flex-fill">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='phase_emp' id="modalscaleasphase_emp"
                                                class="form-select @error('phase_emp') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @for ($i = 1; $i <= 11; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalscaleasphase_emp">المرحلة الوظيفية</label>
                                        </div>
                                        @error('phase_emp')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scaleas_salary_grade' type="text"
                                                id="modalscaleasscaleas_salary_grade" placeholder="درجة الراتب"
                                                class="form-control @error('scaleas_salary_grade') is-invalid is-filled @enderror" />
                                            <label for="modalscaleasscaleas_salary_grade">درجة الراتب</label>
                                        </div>
                                        @error('scaleas_salary_grade')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='scaleas_salary_stage'
                                                id="modalscaleasscaleas_salary_stage"
                                                class="form-select @error('scaleas_salary_stage') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                @for ($i = 1; $i <= 30; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalscaleasscaleas_salary_stage">مرحلة الراتب</label>
                                        </div>
                                        @error('scaleas_salary_stage')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='scaleas_amount' id="modalscaleasscaleas_amount"
                                                class="form-select @error('scaleas_amount') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="3">3</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                                <option value="10">10</option>
                                                <option value="17">17</option>
                                                <option value="20">20</option>
                                                <option value="83">83</option>
                                            </select>
                                            <label for="modalscaleasscaleas_amount">مقدار العلاوة</label>
                                        </div>
                                        @error('scaleas_amount')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scaleas_salary' type="text"
                                                id="modalscaleasscaleas_salary" placeholder="الراتب"
                                                class="form-control @error('scaleas_salary') is-invalid is-filled @enderror" />
                                            <label for="modalscaleasscaleas_salary">الراتب</label>
                                        </div>
                                        @error('scaleas_salary')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='scaleas_minimum_period'
                                                id="modalscaleasscaleas_minimum_period"
                                                class="form-select @error('scaleas_minimum_period') is-invalid is-filled @enderror">
                                                <option value=""></option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <label for="modalscaleasscaleas_minimum_period">المدة الاصغرية</label>
                                        </div>
                                        @error('scaleas_minimum_period')
                                            <small class='text-danger inputerror'> {{ $message }} </small>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='scaleas_previous_salary' type="text"
                                                id="modalscaleasscaleas_previous_salary" placeholder="الراتب السابق"
                                                class="form-control @error('scaleas_previous_salary') is-invalid is-filled @enderror" />
                                            <label for="modalscaleasscaleas_previous_salary">الراتب السابق</label>
                                        </div>
                                        @error('scaleas_previous_salary')
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
<!--/ Edite Scalea Modal -->
