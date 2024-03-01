
<!-- Remove Graduation Modal -->
<div wire:ignore.self class="modal fade" id="removegraduationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-4 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">حذف</h3>
                    <p>نافذة الحذف</p>
                </div>
                <hr class="mt-n2">
                <h5 wire:loading wire:target="GetGraduation" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="destroy" wire:loading.class="d-flex justify-content-center text-primary">جار حذف البيانات...</h5>

                <div wire:loading.remove>
                <form id="removeGraduationModalForm" onsubmit="return false" autocomplete="off">
                    <div class="row row-cols-1">
                        <div class="col mb-3">
                        '<Div Class="row">

                                    <div class="mb-3 col">
                                    <div class="form-floating form-floating-outline">
                                        <input wire:model.defer='graduations_name' type="text" id="modalGraduationgraduations_name" placeholder="جهة التخرج"
                                            class="form-control <?php $__errorArgs = ['graduations_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" disabled/>
                                        <label for="modalGraduationgraduations_name">جهة التخرج</label>
                                    </div>
                                    <?php $__errorArgs = ['graduations_name'];
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
                    <div class="d-flex justify-content-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='destroy' type="submit"class="flex-fill btn btn-danger me-sm-3 me-1">حذف </button>
                             <button type="reset" class="flex-fill btn btn-outline-secondary" data-bs-dismiss="modal"
                             aria-label="Close">تجاهل</button>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
<!--/ Delete Graduation Modal -->
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/graduations/modals/remove-graduation.blade.php ENDPATH**/ ?>