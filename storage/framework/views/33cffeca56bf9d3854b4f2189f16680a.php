<div>
    <div class="row">
        <div class="col">
            <h4 class="py-3">
                اضافة معلومات الموظف
            </h4>
        </div>
        <div class="col text-end">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker-create')): ?>
                <button wire:click='AddWorker' class="btn btn-primary waves-effect waves-light sticky-button">حفظ
                    المعلومات</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist" style="position: relative;">
                
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(1)"
                        class="btn btn-text-dark <?php echo e($currentTap == 1 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : ''); ?>"
                        type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-1" role="tab"
                        aria-selected="True">بيانات الأسم</button>
                </li>

                
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(2)"
                        class="btn btn-text-dark <?php echo e($currentTap == 2 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : ''); ?>"
                        type="button" data-bs-toggle="tab" data-bs-target="#form-tabs-2" role="tab"
                        aria-selected="True"> البيانات الشخصية </button>
                </li>

                
                <li class="nav-item" role="presentation">
                    <button wire:click="buttonStep(3)"
                        class="btn btn-text-dark <?php echo e($currentTap == 3 ? 'active btn btn-label-secondary  btn-fab demo waves-effect' : ''); ?>"
                        data-bs-toggle="tab" data-bs-target="#form-tabs-3" role="tab" aria-selected="True">مستمسكات
                        الموظف</button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade <?php echo e($currentTap == 1 ? 'active show' : ''); ?> " id="form-tabs-1" role="tabpanel">



                <!-- Bootstrap Datepicker -->
                
                <!-- /Bootstrap Datepicker -->
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
                            <input wire:model.defer='employee_number' type="text" id="modalEmployeeemployee_number"
                                placeholder="الرقم الوظيفي"
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
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='first_name' wire:keyup='changeName' type="text"
                                id="modalEmployeefirst_name" placeholder="الاسم الاول"
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
                            <input wire:model.defer='father_name' wire:keyup='changeName' type="text"
                                id="modalEmployeefather_name" placeholder="اسم الاب"
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
                            <input wire:model.defer='grandfather_name' wire:keyup='changeName' type="text"
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
                            <input wire:model.defer='great_grandfather_name' wire:keyup='changeName' type="text"
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
                    <div class="mb-3 col-3">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='surname' wire:keyup='changeName' type="text"
                                id="modalEmployeesurname" placeholder="اللقب"
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
unset($__errorArgs, $__bag); ?>" disabled />
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
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='mother_name' wire:keyup='changeNameMother' type="text"
                                id="modalEmployeemother_name" placeholder="اسم الام"
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
                            <input wire:model.defer='maternal_grandfather_name' wire:keyup='changeNameMother'
                                type="text" id="modalEmployeematernal_grandfather_name"
                                placeholder="اسم والد الام"
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
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='maternal_great_grandfather_name' wire:keyup='changeNameMother'
                                type="text" id="modalEmployeematernal_great_grandfather_name"
                                placeholder="اسم جد الام"
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
                            <input wire:model.defer='maternal_surname' wire:keyup='changeNameMother' type="text"
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
unset($__errorArgs, $__bag); ?>"
                                disabled />
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
                </div>
                <div Class="row g-4">
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
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer="blood_type" id="modalEmployeeblood_type"
                                class="form-select <?php $__errorArgs = ['blood_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" disabled selected>اختر صنف الدم</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <label for="modalEmployeeblood_type">صنف الدم</label>
                        </div>
                        <?php $__errorArgs = ['blood_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger inputerror"><?php echo e($message); ?></small>
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
            </div>
            <div class="tab-pane fade <?php echo e($currentTap == 2 ? 'active show' : ''); ?>" id="form-tabs-2" role="tabpanel">
                <div class="row g-4">
                    <!-- Date Picker-->
                    
                    <!-- /Date Picker -->
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='governorate_id' id="governorate_id"
                                class="form-select <?php $__errorArgs = ['governorate_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value=""></option>
                                <?php $__currentLoopData = $Governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($governorate->id); ?>"><?php echo e($governorate->governorate_name); ?>

                                    </option>
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
                            <select wire:model.defer='district_id' id="district_id"
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
                            <input wire:model.defer='birth_date' type="text" id="birth_date" autocomplete="off"
                                readonly placeholder="يوم-شهر-سنة"
                                class="form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="flatpickr-date">تاريخ التولد</label>
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
                                placeholder="مسقط الراس"
                                class="form-control <?php $__errorArgs = ['birth_place'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeebirth_place">مسقط الراس</label>
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
                            <select wire:model.defer='gender' id="modalEmployeegender" placeholder="الجنس"
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

                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='religion' id="modalEmployeereligion" placeholder="الديانة"
                                class="form-select <?php $__errorArgs = ['religion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value=""></option>
                                <option value="مسلم/مسلمة">مسلم/مسلمة</option>
                                <option value="مسيحي/مسيحية">مسيحي/مسيحية</option>
                                <option value="صابئي/صابئية">صابئي/صابئية</option>
                                <option value="ايزيدي/ايزيدية">ايزيدي/ايزيدية</option>
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
                </div>

                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='marital_status'
                                wire:change='getWifeNameStatus($event.target.value)' id="modalEmployeemarital_status"
                                placeholder="الحالةالاجتماعية"
                                class="form-select <?php $__errorArgs = ['marital_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">اختر الحالة الاجتماعية</option>
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
                                placeholder="<?php echo e($HusbandName); ?>" <?php echo e($isMaritalStatus); ?>

                                class="form-control <?php $__errorArgs = ['wife_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeewife_name"><?php echo e($HusbandName); ?></label>
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
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <select wire:model.defer='children_count' id="modalEmployeechildren_count"
                                <?php echo e($isMaritalStatus); ?>

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
                </div>
            </div>
            <div class="tab-pane fade <?php echo e($currentTap == 3 ? 'active show' : ''); ?>" id="form-tabs-3" role="tabpanel">
                <div class="divider text-start mt-n3">
                    <div class="divider-text">البطاقة الوطنية / البطاقة التموينية</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='national_card_number' type="text"
                                id="modalEmployeenational_card_number" placeholder="رقم البطاقة الوطنية"
                                class="form-control <?php $__errorArgs = ['national_card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeenational_card_number">رقم البطاقة الوطنية</label>
                        </div>
                        <?php $__errorArgs = ['national_card_number'];
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
                            <input wire:model.defer='national_card_date' type="text" id="national_card_date"
                                autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                class="form-control <?php $__errorArgs = ['national_card_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="flatpickr-date">تاريخ البطاقة الوطنية</label>
                        </div>
                        <?php $__errorArgs = ['national_card_date'];
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
                            <input wire:model.defer='ration_card_number' type="text"
                                id="modalEmployeeration_card_number" placeholder="رقم البطاقة التموينية"
                                class="form-control <?php $__errorArgs = ['ration_card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeeration_card_number">رقم البطاقة التموينية</label>
                        </div>
                        <?php $__errorArgs = ['ration_card_number'];
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
                            <input wire:model.defer='ration_card_date' type="text" id="ration_card_date"
                                autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                class="form-control <?php $__errorArgs = ['ration_card_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="flatpickr-date">تاريخ البطاقة التموينية</label>
                        </div>
                        <?php $__errorArgs = ['ration_card_date'];
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
                <div class="divider text-start">
                    <div class="divider-text">بطاقة السكن</div>
                </div>
                <div Class="row g-4">
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='residence_card_number' type="text"
                                id="modalEmployeeresidence_card_number" placeholder="رقم بطاقة السكن"
                                class="form-control <?php $__errorArgs = ['residence_card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeeresidence_card_number">رقم بطاقة السكن</label>
                        </div>
                        <?php $__errorArgs = ['residence_card_number'];
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
                            <input wire:model.defer='information_office' type="text"
                                id="modalEmployeeinformation_office" placeholder="مكتب المعلومات"
                                class="form-control <?php $__errorArgs = ['information_office'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="modalEmployeeinformation_office">مكتب المعلومات</label>
                        </div>
                        <?php $__errorArgs = ['information_office'];
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
                            <select wire:model.defer='information_office' id="modalWorkerinformation_office"
                                class="form-select <?php $__errorArgs = ['information_office'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value=""></option>
                                <?php $__currentLoopData = $infooffice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infooffic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($infooffic->id); ?>"><?php echo e($infooffic->infooffice_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <label for="modalWorkerinformation_office">information_office</label>
                        </div>
                        <?php $__errorArgs = ['information_office'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class='text-danger inputerror'><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3 col">
                        <div class="form-floating form-floating-outline">
                            <input wire:model.defer='organization_date' type="text" id="organization_date"
                                autocomplete="off" readonly placeholder="يوم-شهر-سنة"
                                class="form-control <?php $__errorArgs = ['organization_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <label for="flatpickr-date">تاريخ التنظيم</label>
                        </div>
                        <?php $__errorArgs = ['organization_date'];
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
        </div>
        <?php echo $__env->make('livewire.workers.modals.add-takhroj', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/workers/AddWorker.blade.php ENDPATH**/ ?>