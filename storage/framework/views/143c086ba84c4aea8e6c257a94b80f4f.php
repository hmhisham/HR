<!-- Edit Permission Modal -->
<div wire:ignore.self class="modal fade" id="ChangeActivatedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-3 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2">تغيير حالة حساب المستخدم</h3>
                    <p>تفعيل أو الغاء تفعيل حساب المستخدم</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetCustomer" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="UpdateActivated" wire:loading.class="d-flex justify-content-center text-primary">جار ارسال الرسالة...</h5>

                <div wire:loading.remove>
                    <form id="editCategoryForm" class="" onsubmit="return false" autocomplete="off">
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <label class="switch switch-primary">
                                    <input wire:click='SetActive(<?php echo e($Status ? 0 : 1); ?>)' type="checkbox" value="<?php echo e($Status); ?>" class="switch-input" <?php echo e($Status ? 'checked':''); ?>/>
                                    <span class="switch-label fw-bolder">
                                        <i class="mdi mdi-account-lock fs-1 pe-3"></i>
                                    </span>
                                    <span class="switch-toggle-slider mt-3">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                    <span class="switch-label fw-bolder">
                                        <i class="mdi mdi-account-lock-open fs-1 ps-3"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Permission Modal -->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/customers/modals/change-activated.blade.php ENDPATH**/ ?>