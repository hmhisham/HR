<!-- Add Branc Modal -->
<div wire:ignore.self class="modal fade" id="addbrancModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">اضافة </h3>
                    <p>نافذة الأضافة </p>
                </div>
                <hr class="mt-n2">
                <form id="addbrancModalForm" autocomplete="off">
                    <div class="row row-cols-1  ">
                        <div class="col mb-3">
                            <div Class="row">


                        <div class="mb-3 col">
                            <div class="form-floating form-floating-outline">
                                <select wire:model.defer='linkage_id' wire:change='LinkageId($event.target.value)' id="linkage_id" class="form-select <?php $__errorArgs = ['linkage_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">اختر الارتباط</option>
                                    <?php $__currentLoopData = $linkages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linkage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($linkage->id); ?>"><?php echo e($linkage->Linkages_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                                <label for="linkage_id">الارتباط</label>
                            </div>
                            <?php $__errorArgs = ['linkage_id'];
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
                                <select wire:model.defer='section_id' id="modalBranchsection_id" class="form-select <?php $__errorArgs = ['section_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">اختر قسمًا</option>
                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->section_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="modalBranchsection_id">القسم</label>
                            </div>
                            <?php $__errorArgs = ['section_id'];
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
                                <input wire:model.defer='branch_name' type="text" id="modalBranchbranch_name" placeholder="اسم الشعبة" class="form-control <?php $__errorArgs = ['branch_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                <label for="modalBranchbranch_name">اسم الشعبة</label>
                            </div>
                            <?php $__errorArgs = ['branch_name'];
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
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">تجاهل</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
<!--/ Add Branc Modal -->
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/branch/modals/add-branc.blade.php ENDPATH**/ ?>