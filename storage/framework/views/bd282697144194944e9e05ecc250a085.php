
<!-- Add Holiday Modal -->
<div wire:ignore.self class="modal fade" id="addholidayModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addholidayModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3"> 
                        <div Class="row">

                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='calculator_number' type="text" id="modalHolidaycalculator_number" placeholder="رقم الحاسبة"
                        class="form-control <?php $__errorArgs = ['calculator_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidaycalculator_number">رقم الحاسبة</label>
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
              </div>
                                    <div Class="row">
                <div class="mb-3 col">
                    <div class="form-floating form-floating-outline">

                        <select wire:model.defer='order_number' type="select" id="modalHolidayorder_number"
                            placeholder="رقم الامر الاداري"
                            class="form-select <?php $__errorArgs = ['order_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                        <option value=" " disabled selected>اختيار</option>
<option value="تجريبي">تجريبي</option>
<option value="تجريبي1">تجريبي1</option>
<option value="تجريبي2">تجريبي2</option>
 </select>
                  </div>
                    <?php $__errorArgs = ['order_number'];
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
                    <input wire:model.defer='order_date' type="date" id="modalHolidayorder_date" placeholder="تاريخ الامر الاداري"
                        class="form-control <?php $__errorArgs = ['order_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidayorder_date">تاريخ الامر الاداري</label>
                </div>
                <?php $__errorArgs = ['order_date'];
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
                    <input wire:model.defer='holiday_type' type="text" id="modalHolidayholiday_type" placeholder="نوع الاجازه"
                        class="form-control <?php $__errorArgs = ['holiday_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidayholiday_type">نوع الاجازه</label>
                </div>
                <?php $__errorArgs = ['holiday_type'];
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
                    <input wire:model.defer='holiday_purpose' type="text" id="modalHolidayholiday_purpose" placeholder="الغرض من الاجازه"
                        class="form-control <?php $__errorArgs = ['holiday_purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidayholiday_purpose">الغرض من الاجازه</label>
                </div>
                <?php $__errorArgs = ['holiday_purpose'];
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
                    <input wire:model.defer='days_count' type="text" id="modalHolidaydays_count" placeholder="عدد الايام"
                        class="form-control <?php $__errorArgs = ['days_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidaydays_count">عدد الايام</label>
                </div>
                <?php $__errorArgs = ['days_count'];
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
                    <input wire:model.defer='separation_date' type="date" id="modalHolidayseparation_date" placeholder="تاريخ الانفكاك"
                        class="form-control <?php $__errorArgs = ['separation_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidayseparation_date">تاريخ الانفكاك</label>
                </div>
                <?php $__errorArgs = ['separation_date'];
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
                    <input wire:model.defer='resumption_date' type="date" id="modalHolidayresumption_date" placeholder="تاريخ المباشرة"
                        class="form-control <?php $__errorArgs = ['resumption_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidayresumption_date">تاريخ المباشرة</label>
                </div>
                <?php $__errorArgs = ['resumption_date'];
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
                    <input wire:model.defer='cut_off_holiday' type="text" id="modalHolidaycut_off_holiday" placeholder="قطع الاجازة"
                        class="form-control <?php $__errorArgs = ['cut_off_holiday'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidaycut_off_holiday">قطع الاجازة</label>
                </div>
                <?php $__errorArgs = ['cut_off_holiday'];
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
        <input wire:model.defer="file_path" type="file" id="modalHolidayfile_path"
            placeholder="الملف" accept="pdf,image/*"
            class="form-control <?php $__errorArgs = ['file_path'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
        <label for="modalHolidayfile_path">الملف</label>
    </div>
    <?php $__errorArgs = ['file_path'];
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
<!-- عرض معاينة الصورة إذا تم تحميلها مؤقتًا -->
<?php if($file_path && $file_path instanceof \Livewire\TemporaryUploadedFile): ?>
    <div class="mb-3 col">
        <img src="<?php echo e($file_path->temporaryUrl()); ?>" alt="معاينة الصورة"
            style="max-width: 100%; height: auto;" />
    </div>
<?php endif; ?>
<!-- عرض الصورة المخزنة إذا كانت موجودة -->
<?php if($file_path && !$file_path instanceof \Livewire\TemporaryUploadedFile): ?>
    <div class="mb-3 col">
        <img src="<?php echo e(asset('storage/' . $file_path)); ?>" alt="الصورة المخزنة"
            style="max-width: 100%; height: auto;" />
    </div>
<?php endif; ?>
  </div>
                                    <div Class="row">
                <div class="mb-3 col">
                <div class="form-floating form-floating-outline">
                    <input wire:model.defer='notes' type="text" id="modalHolidaynotes" placeholder="الملاحظات"
                        class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                    <label for="modalHolidaynotes">الملاحظات</label>
                </div>
                <?php $__errorArgs = ['notes'];
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
<!--/ Add Holiday Modal -->
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/holidays/modals/add-holiday.blade.php ENDPATH**/ ?>