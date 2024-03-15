<div class="mt-n4">
    <h4 class="py-3">
        اضافة معلومات الموظف
    </h4>

    <div class="mb-4 col-12">
        <div class="mt-2 bs-stepper wizard-vertical vertical wizard-numbered wizard-modern">
            <div class="bs-stepper-header gap-lg-2">
                
                <div class="step <?php echo e(1 == $currentStep ? $activatedStep:''); ?> <?php echo e(1 < $currentStep ? $crossedStep:''); ?>" data-target="#step-01">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">01</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">معلومات الاسم</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(2 == $currentStep ? $activatedStep:''); ?> <?php echo e(2 < $currentStep ? $crossedStep:''); ?>" data-target="#step-02">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">02</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">البيانات الشخصية</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(3 == $currentStep ? $activatedStep:''); ?> <?php echo e(3 < $currentStep ? $crossedStep:''); ?>" data-target="#step-03">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">03</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">معلومات السكن</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(4 == $currentStep ? $activatedStep:''); ?> <?php echo e(4 < $currentStep ? $crossedStep:''); ?>" data-target="#step-04">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">04</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">البطاقة الوطنية</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(5 == $currentStep ? $activatedStep:''); ?> <?php echo e(5 < $currentStep ? $crossedStep:''); ?>" data-target="#step-05">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">05</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">شهادة الجنسية</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(6 == $currentStep ? $activatedStep:''); ?> <?php echo e(6 < $currentStep ? $crossedStep:''); ?>" data-target="#step-06">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">06</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">بطاقة السكن</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(7 == $currentStep ? $activatedStep:''); ?> <?php echo e(7 < $currentStep ? $crossedStep:''); ?>" data-target="#step-07">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">07</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">البطاقة التموينية</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>

                
                <div class="step <?php echo e(8 == $currentStep ? $activatedStep:''); ?> <?php echo e(8 < $currentStep ? $crossedStep:''); ?>" data-target="#step-08">
                    <button  type="button" class="step-trigger">
                        <span class="bs-stepper-circle"><i class="mdi mdi-check"></i></span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-number">08</span>
                            <span class="gap-1 d-flex flex-column ms-2">
                                <span class="">اجازة السوق</span>
                                
                            </span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="bs-stepper-content">
                <form onSubmit="return false">
                    <div id="step-00" class="content <?php echo e(0 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">Tests Study step</h4>
                        <hr>
                        <h4 class="mb-3 text-center fw-bolder">Tests Study step</h4>
                        <h3 class="mb-3 text-center fw-bolder text-danger">Instep (STOP)</h3>
                        <hr>
                    </div>

                    <div id="step-01" class="content <?php echo e(1 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">معلومات الاسم</h4>
                        <hr>

                        <div class="row mb-n4">
                            <div class="mb-3 col">
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='JobNumber' type="text" id="modalEmployeeJobNumber"
                                                placeholder="الرقم الوظيفي"
                                                class="form-control <?php $__errorArgs = ['JobNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeJobNumber">الرقم الوظيفي</label>
                                        </div>
                                        <?php $__errorArgs = ['JobNumber'];
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
                                            <input wire:model.defer='FileNumber' type="text" id="modalEmployeeFileNumber"
                                                placeholder="رقم الاضبارة"
                                                class="form-control <?php $__errorArgs = ['FileNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeFileNumber">رقم الاضبارة</label>
                                        </div>
                                        <?php $__errorArgs = ['FileNumber'];
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
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FirstName' wire:keyup="concatFullName('FirstName', $event.target.value)" type="text" id="modalEmployeeFirstName"
                                                placeholder="الاسم الأول"
                                                class="form-control <?php $__errorArgs = ['FirstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeFirstName">الاسم الأول</label>
                                        </div>
                                        <?php $__errorArgs = ['FirstName'];
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
                                            <input wire:model.defer='SecondName' wire:keyup="concatFullName('SecondName', $event.target.value)" type="text" id="modalEmployeeSecondName"
                                                placeholder="الاسم الثاني"
                                                class="form-control <?php $__errorArgs = ['SecondName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeSecondName">الاسم الثاني</label>
                                        </div>
                                        <?php $__errorArgs = ['SecondName'];
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
                                            <input wire:model.defer='ThirdName' wire:keyup="concatFullName('ThirdName', $event.target.value)" type="text" id="modalEmployeeThirdName"
                                                placeholder="الاسم الثالث"
                                                class="form-control <?php $__errorArgs = ['ThirdName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeThirdName">الاسم الثالث</label>
                                        </div>
                                        <?php $__errorArgs = ['ThirdName'];
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
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='FourthName' wire:keyup="concatFullName('FourthName', $event.target.value)" type="text" id="modalEmployeeFourthName"
                                                placeholder="الاسم الرابع"
                                                class="form-control <?php $__errorArgs = ['FourthName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeFourthName">الاسم الرابع</label>
                                        </div>
                                        <?php $__errorArgs = ['FourthName'];
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
                                            <input wire:model.defer='LastName' wire:keyup="concatFullName('LastName', $event.target.value)" type="text" id="modalEmployeeLastName"
                                                placeholder="اللقب"
                                                class="form-control <?php $__errorArgs = ['LastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeLastName">اللقب</label>
                                        </div>
                                        <?php $__errorArgs = ['LastName'];
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
                                            <input wire:model.defer='FullName' type="text" id="modalEmployeeFullName"
                                                placeholder="الاسم الكامل" readonly
                                                class="form-control <?php $__errorArgs = ['FullName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeFullName">الاسم الكامل</label>
                                        </div>
                                        <?php $__errorArgs = ['FullName'];
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
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherName' wire:keyup="concatFullName('MotherName', $event.target.value)" type="text" id="modalEmployeeMotherName"
                                                placeholder="اسم الام"
                                                class="form-control <?php $__errorArgs = ['MotherName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeMotherName">اسم الام</label>
                                        </div>
                                        <?php $__errorArgs = ['MotherName'];
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
                                            <input wire:model.defer='MotherFatherName' type="text"
                                            wire:keyup="concatFullName('MotherFatherName', $event.target.value)"  id="modalEmployeeMotherFatherName" placeholder="اسم والد الام"
                                                class="form-control <?php $__errorArgs = ['MotherFatherName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeMotherFatherName">اسم والد الام</label>
                                        </div>
                                        <?php $__errorArgs = ['MotherFatherName'];
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
                                            <input wire:model.defer='MotherGrandName' type="text"
                                            wire:keyup="concatFullName('MotherGrandName', $event.target.value)"  id="modalEmployeeMotherGrandName" placeholder="اسم جد الام"
                                                class="form-control <?php $__errorArgs = ['MotherGrandName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeJMotherGrandName">اسم جد الام</label>
                                        </div>
                                        <?php $__errorArgs = ['MotherGrandName'];
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
                                <Div Class="row">
                                    <div class="mb-3 col">
                                        <div class="form-floating form-floating-outline">
                                            <input wire:model.defer='MotherLastName' type="text"
                                            wire:keyup="concatFullName('MotherLastName', $event.target.value)"  id="modalEmployeeMotherLastName" placeholder="لقب الام"
                                                class="form-control <?php $__errorArgs = ['MotherLastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeMotherLastName">لقب الام</label>
                                        </div>
                                        <?php $__errorArgs = ['MotherLastName'];
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
                                            <input wire:model.defer='FullMothersName' type="text"
                                                id="modalEmployeeFullMothersName" placeholder="اسم الام الكامل" readonly
                                                class="form-control <?php $__errorArgs = ['FullMothersName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeFullMothersName">اسم الام الكامل</label>
                                        </div>
                                        <?php $__errorArgs = ['FullMothersName'];
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
                                            <input wire:model.defer='Status' type="text" id="modalEmployeeStatus"
                                                placeholder="الحالة"
                                                class="form-control <?php $__errorArgs = ['Status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                            <label for="modalEmployeeStatus">الحالة</label>
                                        </div>
                                        <?php $__errorArgs = ['Status'];
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

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-02" class="content <?php echo e(2 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">البيانات الشخصية</h4>
                        <hr>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-03" class="content <?php echo e(3 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">معلومات السكن</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Age ≥ 40 years, at the time of signing the informed consent</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Enter Patient Date of Birth: (DD/MMM/YYYY)</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-04" class="content <?php echo e(4 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">البطاقة الوطنية</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Body mass index (BMI) ≤ 40 (kg/m2) </h5>
                        <h5 class="mb-3 fw-bolder text-primary">Enter Patient BMI: XX (Kg/M2)</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-05" class="content <?php echo e(5 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">شهادة الجنسية</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Patient sex: MALE/FEMALE</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-06" class="content <?php echo e(6 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">بطاقة السكن</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Is subject pregnant or breast feeding?</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-07" class="content <?php echo e(7 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">البطاقة التموينية</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Sex and Contraception/Barrier Requirements</h5>
                        <h5 class="mb-3 fw-bolder">A) For biological female participants:</h5>
                        <h5 class="mb-3 fw-bolder">A biological female participant is step to participate if she is not pregnant, not breastfeeding, and at least one of the following conditions applies:</h5>
                        <h5 class="mb-3 fw-bolder">Participant of non-childbearing potential (PONCBP)</h5>
                        <h5 class="mb-3 fw-bolder text-primary">Is participant of non-childbearing potential (PONCBP)?</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifNext(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifNext">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">التالي</span>
                                    </div>
                                    <div wire:loading wire:target="ifNext">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="step-08" class="content <?php echo e(8 == $currentStep ? $activatedStep:''); ?>">
                        <h4 class="mb-3 fw-bolder">اجازة السوق</h4>
                        <hr>
                        <h5 class="mb-3 fw-bolder">Participant of childbearing potential (POCBP) who</h5>
                        <h5 class="mb-3 fw-bolder">Have a negative pregnancy test (serum) at screening and a negative urine pregnancy test at Day 1 Visit?</h5>
                        <h5 class="mb-3 fw-bolder">Agree to remain abstinent (refrain from heterosexual intercourse) or use of at least one highly effective contraceptive method that results in a failure rate of < 1% per year during the treatment period and for at least 12 weeks after the final dose of Study Drug.</h5>
                        <h5 class="mb-3 fw-bolder text-danger">The participant of childbearing potential (POCBP):  </h5>
                        <h5 class="mb-3 fw-bolder text-primary">pregnancy test (serum) at screening:</h5>

                        <hr>
                        <div class="row g-4">
                            <div class="col-12 d-flex justify-content-between">
                                <button wire:click="ifPre(<?php echo e($currentStep); ?>)" class="btn btn-outline-secondary ">
                                    <div wire:loading.remove wire:target="ifPre">
                                        <span class="align-middle d-sm-inline-block d-none">السابق</span>
                                    </div>
                                    <div wire:loading wire:target="ifPre">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                                <button wire:click="ifSubmit(<?php echo e($currentStep); ?>)" class="btn btn-primary ext" >
                                    <div wire:loading.remove wire:target="ifSubmit">
                                        <span class="align-middle d-sm-inline-block d-none me-sm-1">حفظ المعلومات</span>
                                    </div>
                                    <div wire:loading wire:target="ifSubmit">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/emp-info-bank/add-employee.blade.php ENDPATH**/ ?>