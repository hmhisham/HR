<div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-create')): ?>
    <a href="<?php echo e(Route('AddEmployee')); ?>" class=" sticky-button btn btn-primary">حفظ المعلومات</a>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col">
        <h4 class="py-3">
            اضافة معلومات الموظف
        </h4>
        <div class="card mb-3">
            <div class="card-header">
                <ul class="nav nav-tabs" role="tablist">

                    
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-1" role="tab"
                            aria-selected="True">بيانات</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-2" role="tab"
                            aria-selected="True"> البيانات الشحصية </button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-3" role="tab"
                            aria-selected="True"> التحصيل الدراسي</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-4" role="tab"
                            aria-selected="True">صفحة 4</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-5" role="tab"
                            aria-selected="True">صفحة 5</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-6" role="tab"
                            aria-selected="True">صفحة 6</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-7" role="tab"
                            aria-selected="True">صفحة 7</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-8" role="tab"
                            aria-selected="True">صفحة 8</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-9" role="tab"
                            aria-selected="True">صفحة 9</button>
                    </li>



                    
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-10" role="tab"
                            aria-selected="True">صفحة 10</button>
                    </li>


                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="form-tabs-1" role="tabpanel">
                    <form>

                        <div Class="row g-4">

                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='calculator_number' type="text"
                                        id="modalEmployeecalculator_number" placeholder="رقم الحاسبة"
                                        class="form-control <?php $__errorArgs = ['calculator_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeecalculator_number">رقم الحاسبة</label>
                                </div>
                                <?php $__errorArgs = ['calculator_number'];
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
                                    <input wire:model.defer='employee_number' type="text"
                                        id="modalEmployeeemployee_number" placeholder="الرقم الوظيفي"
                                        class="form-control <?php $__errorArgs = ['employee_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeeemployee_number">الرقم الوظيفي</label>
                                </div>
                                <?php $__errorArgs = ['employee_number'];
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
                                    <input wire:model.defer='paper_folder_number' type="text"
                                        id="modalEmployeepaper_folder_number" placeholder="رقم الاضبارة الورقية"
                                        class="form-control <?php $__errorArgs = ['paper_folder_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeepaper_folder_number">رقم الاضبارة الورقية</label>
                                </div>
                                <?php $__errorArgs = ['paper_folder_number'];
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
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='first_name' type="text" id="modalEmployeefirst_name"
                                        placeholder="الاسم الاول"
                                        class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeefirst_name">الاسم الاول</label>
                                </div>
                                <?php $__errorArgs = ['first_name'];
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
                                    <input wire:model.defer='father_name' type="text" id="modalEmployeefather_name"
                                        placeholder="اسم الاب"
                                        class="form-control <?php $__errorArgs = ['father_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeefather_name">اسم الاب</label>
                                </div>
                                <?php $__errorArgs = ['father_name'];
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
                                    <input wire:model.defer='grandfather_name' type="text"
                                        id="modalEmployeegrandfather_name" placeholder="اسم الجد"
                                        class="form-control <?php $__errorArgs = ['grandfather_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeegrandfather_name">اسم الجد</label>
                                </div>
                                <?php $__errorArgs = ['grandfather_name'];
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
                                    <input wire:model.defer='great_grandfather_name' type="text"
                                        id="modalEmployeegreat_grandfather_name" placeholder="اسم والد الجد"
                                        class="form-control <?php $__errorArgs = ['great_grandfather_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeegreat_grandfather_name">اسم والد الجد</label>
                                </div>
                                <?php $__errorArgs = ['great_grandfather_name'];
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
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='surname' type="text" id="modalEmployeesurname"
                                        placeholder="اللقب"
                                        class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeesurname">اللقب</label>
                                </div>
                                <?php $__errorArgs = ['surname'];
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
                                    <input wire:model.defer='full_name' type="text" id="modalEmployeefull_name"
                                        placeholder="الاسم الكامل"
                                        class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeefull_name">الاسم الكامل</label>
                                </div>
                                <?php $__errorArgs = ['full_name'];
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
                                    <input wire:model.defer='mother_name' type="text" id="modalEmployeemother_name"
                                        placeholder="اسم الام"
                                        class="form-control <?php $__errorArgs = ['mother_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeemother_name">اسم الام</label>
                                </div>
                                <?php $__errorArgs = ['mother_name'];
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
                                    <input wire:model.defer='maternal_grandfather_name' type="text"
                                        id="modalEmployeematernal_grandfather_name" placeholder="اسم والد الام"
                                        class="form-control <?php $__errorArgs = ['maternal_grandfather_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeematernal_grandfather_name">اسم والد الام</label>
                                </div>
                                <?php $__errorArgs = ['maternal_grandfather_name'];
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
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='maternal_great_grandfather_name' type="text"
                                        id="modalEmployeematernal_great_grandfather_name" placeholder="اسم جد الام"
                                        class="form-control <?php $__errorArgs = ['maternal_great_grandfather_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeematernal_great_grandfather_name">اسم جد الام</label>
                                </div>
                                <?php $__errorArgs = ['maternal_great_grandfather_name'];
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
                                    <input wire:model.defer='maternal_surname' type="text"
                                        id="modalEmployeematernal_surname" placeholder="لقب الام"
                                        class="form-control <?php $__errorArgs = ['maternal_surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeematernal_surname">لقب الام</label>
                                </div>
                                <?php $__errorArgs = ['maternal_surname'];
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
                                    <input wire:model.defer='mother_full_name' type="text"
                                        id="modalEmployeemother_full_name" placeholder="اسم الام الكامل"
                                        class="form-control <?php $__errorArgs = ['mother_full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeemother_full_name">اسم الام الكامل</label>
                                </div>
                                <?php $__errorArgs = ['mother_full_name'];
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
                                    <input wire:model.defer='phone_number' type="text" id="modalEmployeephone_number"
                                        placeholder="رقم الهاتف"
                                        class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeephone_number">رقم الهاتف</label>
                                </div>
                                <?php $__errorArgs = ['phone_number'];
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
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='employee_id_number' type="text"
                                        id="modalEmployeeemployee_id_number" placeholder="رقم هوية الموظف"
                                        class="form-control <?php $__errorArgs = ['employee_id_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeeemployee_id_number">رقم هوية الموظف</label>
                                </div>
                                <?php $__errorArgs = ['employee_id_number'];
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
                                    <input wire:model.defer='department_name' type="text"
                                        id="modalEmployeedepartment_name" placeholder="اسم الدائرة"
                                        class="form-control <?php $__errorArgs = ['department_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeedepartment_name">اسم الدائرة</label>
                                </div>
                                <?php $__errorArgs = ['department_name'];
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
                                    <input wire:model.defer='blood_type' type="text" id="modalEmployeeblood_type"
                                        placeholder="صنف الدم"
                                        class="form-control <?php $__errorArgs = ['blood_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeeblood_type">صنف الدم</label>
                                </div>
                                <?php $__errorArgs = ['blood_type'];
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
                                    <input wire:model.defer='email' type="text" id="modalEmployeeemail"
                                        placeholder="الايميل"
                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeeemail">الايميل</label>
                                </div>
                                <?php $__errorArgs = ['email'];
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
                    </form>
                </div>

                <div class="tab-pane fade" id="form-tabs-2" role="tabpanel">
                    <form>


                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='governorate_id' wire:change='GetDistricts($event.target.value)' id="governorate_id"
                                        class="form-select <?php $__errorArgs = ['governorate_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $Governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($Governorate->id); ?>"><?php echo e($Governorate->governorate_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="governorate_id">المحافظة</label>
                                </div>
                                <?php $__errorArgs = ['governorate_id'];
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
                                    <select wire:model.defer='district_id' id="district_id"  wire:change='GetAreas($event.target.value)' id="district_id"
                                        class="form-select <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($District->id); ?>"><?php echo e($District->district_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="district_id">القضاء</label>
                                </div>
                                <?php $__errorArgs = ['district_id'];
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

                            <div class="mb-3 col ">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='area_id' id="modalEmployeearea_id"
                                        class="form-select <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $Areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($Area->id); ?>"><?php echo e($Area->area_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label for="mmodalEmployeearea_id">الناحية</label>
                                </div>
                                <?php $__errorArgs = ['area_id'];
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
                                    <input wire:model.defer='locality' type="text" id="modalEmployeelocality"
                                        placeholder="المحلة"
                                        class="form-control <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeelocality">المحلة</label>
                                </div>
                                <?php $__errorArgs = ['locality'];
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
                        <div Class="row g-4">
                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='birth_date' type="date" id="modalEmployeebirth_date"
                                        placeholder="تاريخ التولد"
                                        class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeebirth_date">تاريخ التولد</label>
                                </div>
                                <?php $__errorArgs = ['birth_date'];
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
                                    <input wire:model.defer='birth_place' type="text" id="modalEmployeebirth_place"
                                        placeholder="محل الولادة"
                                        class="form-control <?php $__errorArgs = ['birth_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeebirth_place">محل الولادة</label>
                                </div>
                                <?php $__errorArgs = ['birth_place'];
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
                                    <select wire:model.defer='marital_status' id="modalEmployeemarital_status"
                                        placeholder="الحالةالاجتماعية"
                                        class="form-select <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <option value="اعزب">اعزب</option>
                                        <option value="باكر">باكر</option>
                                        <option value="متزوج">متزوج</option>
                                        <option value="متزوجة">متزوجة</option>
                                        <option value="مطلق">مطلق</option>
                                        <option value="مطلقة">مطلقة</option>
                                        <option value="ارمل">ارمل</option>
                                        <option value="ارملة">ارملة</option>
                                    </select>
                                    <label for="modalEmployeemarital_status">الحالة الاجتماعية</label>
                                </div>
                                <?php $__errorArgs = ['marital_status'];
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
                                    <input wire:model.defer='wife_name' type="text" id="modalEmployeewife_name"
                                        placeholder="اسم الزوجة"
                                        class="form-control <?php $__errorArgs = ['wife_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmployeewife_name">اسم الزوجة</label>
                                </div>
                                <?php $__errorArgs = ['wife_name'];
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
                        <div Class="row g-4">



                            <div class="mb-3 col">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer='children_count' id="modalEmployeechildren_count"
                                        class="form-select <?php $__errorArgs = ['children_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        
                                    </select>
                                    <label for="modalEmployeechildren_count">عدد الاطفال</label>
                                </div>
                                <?php $__errorArgs = ['children_count'];
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
                                    <select wire:model.defer='religion' id="modalEmployeereligion"
                                        placeholder="الديانة"
                                        class="form-select <?php $__errorArgs = ['religion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <option value="مسلم">مسلم</option>
                                        <option value="مسلمة">مسلمة</option>
                                        <option value="مسيحي">مسيحي</option>
                                        <option value="مسيحية">مسيحية</option>
                                        <option value="صابئي">صابئي</option>
                                        <option value="صابئية">صابئية</option>
                                        <option value="ايزيدي">ايزيدي</option>
                                        <option value="ايزيدية">ايزيدية</option>
                                        <option value="اخرى">اخرى</option>
                                    </select>
                                    <label for="modalEmployeereligion">الديانة</label>
                                </div>
                                <?php $__errorArgs = ['religion'];
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
                                    <select wire:model.defer='gender' id="modalEmployeegender"
                                        placeholder="الجنس"
                                        class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <option value=""></option>
                                        <option value="ذكر">ذكر</option>
                                        <option value="انثى">انثى</option>
                                    </select>
                                    <label for="modalEmployeegender">الجنس</label>
                                </div>
                                <?php $__errorArgs = ['gender'];
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

                    </form>
                </div>

                <div class="tab-pane fade" id="form-tabs-3" role="tabpanel">
                    <form>

                       <div Class="row g-4">


                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='education_service' id="modalEmployeeeducation_service"
                                    placeholder="التحصيل الدراسي الحالي"
                                    class="form-select <?php $__errorArgs = ['education_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value=""></option>
                                    <option value="امي">امي</option>
                                    <option value="يقرا فقط">يقرا فقط</option>
                                    <option value="يقرا ويكتب">يقرا ويكتب</option>
                                    <option value="ابتدائية">ابتدائية</option>
                                    <option value="متوسطة">متوسطة</option>
                                    <option value="اعدادية">اعدادية</option>
                                    <option value="دبلوم">دبلوم</option>
                                    <option value="بكالوريوس">بكالوريوس</option>
                                    <option value="دبلوم عالي">دبلوم عالي</option>
                                    <option value="ماجستير">ماجستير</option>
                                    <option value="دكتوراه">دكتوراه</option>
                                    <option value="اعلى شهادة اختصاص">اعلى شهادة اختصاص</option>
                                    <option value="غير مبين">غير مبين</option>
                                    <option value="محو الامية">محو الامية</option>
                                </select>
                                <label for="modalEmployeeeducation_service">التحصيل الدراسي الحالي</label>
                            </div>
                            <?php $__errorArgs = ['education_service'];
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
                                <select wire:model.defer='graduation_year_service' id="modalEmployeegraduation_year_service"
                                    placeholder="سنة التخرج الحالية"
                                    class="form-select <?php $__errorArgs = ['graduation_year_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value=""></option>
                                    <option value="1950-1951">1950-1951</option>
                                    <option value="1951-1952">1951-1952</option>
                                    <option value="1952-1953">1952-1953</option>
                                    <option value="1953-1954">1953-1954</option>
                                    <option value="1954-1955">1954-1955</option>
                                    <option value="1955-1956">1955-1956</option>
                                    <option value="1956-1957">1956-1957</option>
                                    <option value="1957-1958">1957-1958</option>
                                    <option value="1958-1959">1958-1959</option>
                                    <option value="1959-1960">1959-1960</option>
                                    <option value="1960-1961">1960-1961</option>
                                    <option value="1961-1962">1961-1962</option>
                                    <option value="1962-1963">1962-1963</option>
                                    <option value="1963-1964">1963-1964</option>
                                    <option value="1964-1965">1964-1965</option>
                                    <option value="1965-1966">1965-1966</option>
                                    <option value="1966-1967">1966-1967</option>
                                    <option value="1967-1968">1967-1968</option>
                                    <option value="1968-1969">1968-1969</option>
                                    <option value="1969-1970">1969-1970</option>
                                    <option value="1970-1971">1970-1971</option>
                                    <option value="1971-1972">1971-1972</option>
                                    <option value="1972-1973">1972-1973</option>
                                    <option value="1973-1974">1973-1974</option>
                                    <option value="1974-1975">1974-1975</option>
                                    <option value="1975-1976">1975-1976</option>
                                    <option value="1976-1977">1976-1977</option>
                                    <option value="1977-1978">1977-1978</option>
                                    <option value="1978-1979">1978-1979</option>
                                    <option value="1979-1980">1979-1980</option>
                                    <option value="1980-1981">1980-1981</option>
                                    <option value="1981-1982">1981-1982</option>
                                    <option value="1982-1983">1982-1983</option>
                                    <option value="1983-1984">1983-1984</option>
                                    <option value="1984-1985">1984-1985</option>
                                    <option value="1985-1986">1985-1986</option>
                                    <option value="1986-1987">1986-1987</option>
                                    <option value="1987-1988">1987-1988</option>
                                    <option value="1988-1989">1988-1989</option>
                                    <option value="1989-1990">1989-1990</option>
                                    <option value="1990-1991">1990-1991</option>
                                    <option value="1991-1992">1991-1992</option>
                                    <option value="1992-1993">1992-1993</option>
                                    <option value="1993-1994">1993-1994</option>
                                    <option value="1994-1995">1994-1995</option>
                                    <option value="1995-1996">1995-1996</option>
                                    <option value="1996-1997">1996-1997</option>
                                    <option value="1997-1998">1997-1998</option>
                                    <option value="1998-1999">1998-1999</option>
                                    <option value="1999-2000">1999-2000</option>
                                    <option value="2000-2001">2000-2001</option>
                                    <option value="2001-2002">2001-2002</option>
                                    <option value="2002-2003">2002-2003</option>
                                    <option value="2003-2004">2003-2004</option>
                                    <option value="2004-2005">2004-2005</option>
                                    <option value="2005-2006">2005-2006</option>
                                    <option value="2006-2007">2006-2007</option>
                                    <option value="2007-2008">2007-2008</option>
                                    <option value="2008-2009">2008-2009</option>
                                    <option value="2009-2010">2009-2010</option>
                                    <option value="2010-2011">2010-2011</option>
                                    <option value="2011-2012">2011-2012</option>
                                    <option value="2012-2013">2012-2013</option>
                                    <option value="2013-2014">2013-2014</option>
                                    <option value="2014-2015">2014-2015</option>
                                    <option value="2015-2016">2015-2016</option>
                                    <option value="2016-2017">2016-2017</option>
                                    <option value="2017-2018">2017-2018</option>
                                    <option value="2018-2019">2018-2019</option>
                                    <option value="2019-2020">2019-2020</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2022-2023">2022-2023</option>
                                    <option value="2023-2024">2023-2024</option>
                                    <option value="2024-2025">2024-2025</option>
                                    <option value="2025-2026">2025-2026</option>
                                    <option value="2026-2027">2026-2027</option>
                                    <option value="2027-2028">2027-2028</option>
                                    <option value="2028-2029">2028-2029</option>
                                    <option value="2029-2030">2029-2030</option>
                                    <option value="2030-2031">2030-2031</option>
                                    <option value="2031-2032">2031-2032</option>
                                    <option value="2032-2033">2032-2033</option>
                                    <option value="2033-2034">2033-2034</option>
                                    <option value="2034-2035">2034-2035</option>
                                    <option value="2035-2036">2035-2036</option>
                                    <option value="2036-2037">2036-2037</option>
                                    <option value="2037-2038">2037-2038</option>
                                    <option value="2038-2039">2038-2039</option>
                                    <option value="2039-2040">2039-2040</option>
                                    <option value="2040-2041">2040-2041</option>
                                    <option value="2041-2042">2041-2042</option>
                                    <option value="2042-2043">2042-2043</option>
                                    <option value="2043-2044">2043-2044</option>
                                    <option value="2044-2045">2044-2045</option>
                                    <option value="2045-2046">2045-2046</option>
                                    <option value="2046-2047">2046-2047</option>
                                    <option value="2047-2048">2047-2048</option>
                                    <option value="2048-2049">2048-2049</option>
                                    <option value="2049-2050">2049-2050</option>
                                    <option value="2050-2051">2050-2051</option>
                                    <option value="2051-2052">2051-2052</option>
                                    <option value="2052-2053">2052-2053</option>
                                    <option value="2053-2054">2053-2054</option>
                                    <option value="2054-2055">2054-2055</option>
                                    <option value="2055-2056">2055-2056</option>
                                    <option value="2056-2057">2056-2057</option>
                                    <option value="2057-2058">2057-2058</option>
                                    <option value="2058-2059">2058-2059</option>
                                    <option value="2059-2060">2059-2060</option>
                                    <option value="2060-2061">2060-2061</option>
                                    <option value="2061-2062">2061-2062</option>
                                    <option value="2062-2063">2062-2063</option>
                                    <option value="2063-2064">2063-2064</option>
                                    <option value="2064-2065">2064-2065</option>
                                    <option value="2065-2066">2065-2066</option>
                                    <option value="2066-2067">2066-2067</option>
                                    <option value="2067-2068">2067-2068</option>
                                    <option value="2068-2069">2068-2069</option>
                                    <option value="2069-2070">2069-2070</option>
                                    <option value="2070-2071">2070-2071</option>
                                    <option value="2071-2072">2071-2072</option>
                                    <option value="2072-2073">2072-2073</option>
                                    <option value="2073-2074">2073-2074</option>
                                    <option value="2074-2075">2074-2075</option>
                                    <option value="2075-2076">2075-2076</option>
                                    <option value="2076-2077">2076-2077</option>
                                    <option value="2077-2078">2077-2078</option>
                                    <option value="2078-2079">2078-2079</option>
                                    <option value="2079-2080">2079-2080</option>
                                    <option value="2080-2081">2080-2081</option>
                                    <option value="2081-2082">2081-2082</option>
                                    <option value="2082-2083">2082-2083</option>
                                    <option value="2083-2084">2083-2084</option>
                                    <option value="2084-2085">2084-2085</option>
                                    <option value="2085-2086">2085-2086</option>
                                    <option value="2086-2087">2086-2087</option>
                                    <option value="2087-2088">2087-2088</option>
                                    <option value="2088-2089">2088-2089</option>
                                    <option value="2089-2090">2089-2090</option>
                                    <option value="2090-2091">2090-2091</option>
                                    <option value="2091-2092">2091-2092</option>
                                    <option value="2092-2093">2092-2093</option>
                                    <option value="2093-2094">2093-2094</option>
                                    <option value="2094-2095">2094-2095</option>
                                    <option value="2095-2096">2095-2096</option>
                                    <option value="2096-2097">2096-2097</option>
                                    <option value="2097-2098">2097-2098</option>
                                    <option value="2098-2099">2098-2099</option>
                                    <option value="2099-2100">2099-2100</option>
                                    <option value="2100-2101">2100-2101</option>
                                </select>
                                <label for="modalEmployeegraduation_year_service">سنة التخرج الحالية</label>
                            </div>
                            <?php $__errorArgs = ['graduation_year_service'];
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
                                           <input wire:model.defer='graduation_institution_service' type="text" id="modalEmployeegraduation_institution_service"
                                               placeholder="جهة التخرج اثناء الخدمة"
                                               class="form-control <?php $__errorArgs = ['graduation_institution_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeegraduation_institution_service">جهة التخرج اثناء الخدمة</label>
                                       </div>
                                       <?php $__errorArgs = ['graduation_institution_service'];
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
                                           <input wire:model.defer='specialization_service' type="text" id="modalEmployeespecialization_service"
                                               placeholder="الاختصاص اثناء الخدمة"
                                               class="form-control <?php $__errorArgs = ['specialization_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeespecialization_service">الاختصاص اثناء الخدمة</label>
                                       </div>
                                       <?php $__errorArgs = ['specialization_service'];
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
                       <div Class="row g-4">
                                   <div class="mb-3 col">
                                       <div class="form-floating form-floating-outline">
                                           <input wire:model.defer='document_number' type="text" id="modalEmployeedocument_number"
                                               placeholder="رقم الوثيقة"
                                               class="form-control <?php $__errorArgs = ['document_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeedocument_number">رقم الوثيقة</label>
                                       </div>
                                       <?php $__errorArgs = ['document_number'];
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
                                           <input wire:model.defer='document_date' type="date" id="modalEmployeedocument_date"
                                               placeholder="تاريخ الوثيقة"
                                               class="form-control <?php $__errorArgs = ['document_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeedocument_date">تاريخ الوثيقة</label>
                                       </div>
                                       <?php $__errorArgs = ['document_date'];
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
                                           <input wire:model.defer='document_verification_number' type="text" id="modalEmployeedocument_verification_number"
                                               placeholder="رقم صحة الصدور"
                                               class="form-control <?php $__errorArgs = ['document_verification_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeedocument_verification_number">رقم صحة الصدور</label>
                                       </div>
                                       <?php $__errorArgs = ['document_verification_number'];
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
                                           <input wire:model.defer='document_verification_date' type="date" id="modalEmployeedocument_verification_date"
                                               placeholder="تاريخ صحة الصدور"
                                               class="form-control <?php $__errorArgs = ['document_verification_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeedocument_verification_date">تاريخ صحة الصدور</label>
                                       </div>
                                       <?php $__errorArgs = ['document_verification_date'];
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
                       <div Class="row g-4">
                                   <div class="mb-3 col">
                                       <div class="form-floating form-floating-outline">
                                           <input wire:model.defer='education_appointment' type="text" id="modalEmployeeeducation_appointment"
                                               placeholder="التحصيل الدراسي التعيين"
                                               class="form-control <?php $__errorArgs = ['education_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeeeducation_appointment">التحصيل الدراسي التعيين</label>
                                       </div>
                                       <?php $__errorArgs = ['education_appointment'];
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
                                           <input wire:model.defer='graduation_year_appointment' type="text" id="modalEmployeegraduation_year_appointment"
                                               placeholder="سنة تخرج التعيين"
                                               class="form-control <?php $__errorArgs = ['graduation_year_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeegraduation_year_appointment">سنة تخرج التعيين</label>
                                       </div>
                                       <?php $__errorArgs = ['graduation_year_appointment'];
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
                                           <input wire:model.defer='graduation_institution_appointment' type="text" id="modalEmployeegraduation_institution_appointment"
                                               placeholder="جهة تخرج التعيين"
                                               class="form-control <?php $__errorArgs = ['graduation_institution_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeegraduation_institution_appointment">جهة تخرج التعيين</label>
                                       </div>
                                       <?php $__errorArgs = ['graduation_institution_appointment'];
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
                                           <input wire:model.defer='specialization_appointment' type="text" id="modalEmployeespecialization_appointment"
                                               placeholder="الاختصاص التعيين"
                                               class="form-control <?php $__errorArgs = ['specialization_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                           <label for="modalEmployeespecialization_appointment">الاختصاص التعيين</label>
                                       </div>
                                       <?php $__errorArgs = ['specialization_appointment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                           <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                   </div>   </div>

                    </form>
                </div>


            </div>


        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/emp-info-bank/add-employee.blade.php ENDPATH**/ ?>