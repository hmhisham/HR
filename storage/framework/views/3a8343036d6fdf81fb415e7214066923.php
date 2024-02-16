<!-- Edit Permission Modal -->
<div wire:ignore.self class="modal fade" id="SendEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-3 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">ارسال بريد الكتروني</h3>
                    <p>ارسال بريد الكتروني للعميل</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetCustomer" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="SendEmail" wire:loading.class="d-flex justify-content-center text-primary">جار ارسال الرسالة...</h5>

                <div wire:loading.remove>
                    <form id="editCategoryForm" class="" onsubmit="return false" autocomplete="off">
                        <div class="row">
                            <div class="mb-3 col col flex-fill">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='Email'  type="text" id="modalEmail"  placeholder="البريد الالكتروني"
                                        class="form-control <?php $__errorArgs = ['Email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalEmail">البريد الالكتروني</label>
                                </div>
                                <?php $__errorArgs = ['Email'];
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

                        <div class="row">
                            <div class="mb-3 col col flex-fill">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='Subject' type="text" id="modalSubject"  placeholder="موضوع الرسالة"
                                           class="form-control <?php $__errorArgs = ['Subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <label for="modalSubject">موضوع الرسالة</label>
                                </div>
                                <?php $__errorArgs = ['Subject'];
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

                        <div class="row">
                            <div class="mb-3 col col flex-fill">
                                <div class="form-floating form-floating-outline">
                                    <textarea wire:model.defer='Message' rows="5" id="modalMessage"  placeholder="الرسالة"
                                           class="form-control h-px-100 <?php $__errorArgs = ['Message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                                    <label for="modalMessage">الرسالة</label>
                                </div>
                                <?php $__errorArgs = ['Message'];
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

                        <hr class="my-0">

                        <div class="text-center col-12 demo-vertical-spacing mb-n4">
                            <button wire:click='SendEmail' type="submit" class="btn btn-primary me-sm-3 me-1">ارسال</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Permission Modal -->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/customers/modals/send-email.blade.php ENDPATH**/ ?>