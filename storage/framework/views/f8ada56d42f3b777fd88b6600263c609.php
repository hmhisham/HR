<div wire:ignore.self class="modal fade" id="adddistrictModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">إضافة منطقة جديدة</h3>
                    <p>نافذة الإضافة</p>
                </div>
                <hr class="mt-n2">
                <form id="adddistrictModalForm" autocomplete="off">
                    <div class="row">


                                    <div class="mb-3 col flex-fill <?php echo e($governorates); ?>">
                                        <div class="form-floating form-floating-outline">
                                            <select wire:model.defer='governorate_id' id="modalDistrictsgovernorate_id"
                                                class="form-select <?php $__errorArgs = ['governorate_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gov->governorate_number); ?>">
                                                        <?php echo e($gov->governorate_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <label for="modalDistrictsgovernorate_id">رقم المحافظة</label>
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




                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="modalDistrictsdistrict_number" class="form-label">رقم
                                                    القضاء</label>
                                                <input wire:model.defer='district_number' type="text"
                                                    id="modalDistrictsdistrict_number" placeholder="رقم القضاء"
                                                    class="form-control <?php $__errorArgs = ['district_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                                <?php $__errorArgs = ['district_number'];
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
                                            <div class="col mb-3">
                                                <label for="modalDistrictsdistrict_name" class="form-label">اسم
                                                    القضاء</label>
                                                <input wire:model.defer='district_name' type="text"
                                                    id="modalDistrictsdistrict_name" placeholder="اسم القضاء"
                                                    class="form-control <?php $__errorArgs = ['district_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                                <?php $__errorArgs = ['district_name'];
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
                                <hr class="my-4">
                                <div class="text-center">
                                    <button wire:click='store' wire:loading.attr="disabled" type="button"
                                        class="btn btn-primary me-sm-3 me-1">إضافة</button>
                                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">تجاهل</button>
                                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\HISHAM\Desktop\HR\HR\resources\views/livewire/districts/modals/add-district.blade.php ENDPATH**/ ?>