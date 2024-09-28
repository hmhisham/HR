<!-- Add Technician Modal -->
<div wire:ignore.self class="modal fade" id="addtechnicianModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة راتب جديد </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addtechnicianModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">
                                <div class="mb-3 col">
                                    <div class="mb-3 col flex-fill <?php echo e($grades); ?>">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='grades_id' id="modalTechniciangrades_id"
                                                class="form-select <?php $__errorArgs = ['grades_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">اختر الدرجة الوظيفية</option>
                                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($grade->id); ?>"><?php echo e($grade->grades_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <label for="modalTechniciangrades_id">الدرجة الوظيفية</label>
                                        </div>
                                        <?php $__errorArgs = ['grades_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col flex-fill">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='phase_emp' id="modalTechnicianphase_emp"
                                                class="form-select <?php $__errorArgs = ['phase_emp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">اختر المرحلة الوظيفية</option>
                                                <?php for($i = 1; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalTechnicianphase_emp">المرحلة الوظيفية</label>
                                        </div>
                                        <?php $__errorArgs = ['phase_emp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_salary_grade'
                                                id="modalTechniciantechnicians_salary_grade"
                                                class="form-select <?php $__errorArgs = ['technicians_salary_grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">اختر درجة الراتب</option>
                                                <?php for($i = 1; $i <= 6; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <label for="modalTechniciantechnicians_salary_grade">درجة الراتب</label>
                                        </div>
                                        <?php $__errorArgs = ['technicians_salary_grade'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_salary_stage'
                                                id="modalTechniciantechnicians_salary_stage"
                                                class="form-select <?php $__errorArgs = ['technicians_salary_stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">اختر مرحلة الراتب</option>
                                                <?php for($i = 1; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                                <option value="">م</option>
                                            </select>
                                            <label for="modalTechniciantechnicians_salary_stage">مرحلة الراتب</label>
                                        </div>
                                        <?php $__errorArgs = ['technicians_salary_stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_amount'
                                                id="modalTechniciantechnicians_amount"
                                                class="form-select <?php $__errorArgs = ['technicians_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
                                        <?php $__errorArgs = ['technicians_amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='technicians_salary' type="text"
                                                id="modalTechniciantechnicians_salary" placeholder="الراتب"
                                                class="form-control <?php $__errorArgs = ['technicians_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalTechniciantechnicians_salary">الراتب</label>
                                        </div>
                                        <?php $__errorArgs = ['technicians_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='technicians_minimum_period'
                                                id="modalTechniciantechnicians_minimum_period"
                                                class="form-select <?php $__errorArgs = ['technicians_minimum_period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value="">اختر المدة الاصغرية</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <label for="modalTechniciantechnicians_minimum_period">المدة
                                                الاصغرية</label>
                                        </div>
                                        <?php $__errorArgs = ['technicians_minimum_period'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='technicians_previous_salary' type="text"
                                                id="modalTechniciantechnicians_previous_salary"
                                                placeholder="الراتب السابق"
                                                class="form-control <?php $__errorArgs = ['technicians_previous_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                onkeypress="return onlyNumberKey(event)" />
                                            <label for="modalTechniciantechnicians_previous_salary">الراتب
                                                السابق</label>
                                        </div>
                                        <?php $__errorArgs = ['technicians_previous_salary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ Add Technician Modal -->
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/technicians/modals/add-technician.blade.php ENDPATH**/ ?>