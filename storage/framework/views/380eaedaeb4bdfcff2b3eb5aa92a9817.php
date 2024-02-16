<!-- Remove Permission Modal -->
<div wire:ignore.self class="modal fade" id="eventArchiveModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="p-3 modal-content p-md-5">
            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-md-0">
                <div class="mb-4 text-center mt-n4">
                    <h3 class="pb-1 mb-2"><span class="text-warning">أرشفة الحدث</span></h3>
                    <p>حذف الحدث بصورة مؤقته</p>
                </div>

                <hr class="mt-n2">

                <h5 wire:loading wire:target="GetEvent" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="archive" wire:loading.class="d-flex justify-content-center text-primary">جار ارشفة الحدث...</h5>

                <div wire:loading.remove>
                    <div class="alert alert-warning <?php echo e($eventActive ? '':'hidden'); ?> " role="alert">
                        <h4 class="alert-heading d-flex align-items-center">
                            <i class="mdi mdi-alert-circle-outline mdi-24px me-2"></i>الحدث!!
                        </h4>
                        <hr>
                        <p class="mb-0">
                            يجب ان يكون الحدث غير مغعل لاتمام عملية الارشفة.
                        </p>
                    </div>

                    <form id="editCategoryForm" class="pt-2 row" onsubmit="return false">
                        <div class="mb-3 col-sm-12 text-center">
                            <label for="modalCategoryName">عنوان الحدث</label>
                            <div class="text-warning"><?php echo e($eventTitle); ?></div>
                        </div>

                        <hr class="my-0 mb-3">

                        <div class="d-flex justify-content-center mb-n4">
                            <button wire:click='archive' type="submit" class="flex-fill btn btn-warning me-sm-2 me-1">
                                ارشفة الحدث
                            </button>
                            <button type="reset" class="flex-fill btn btn-outline-secondary ms-sm-2 ms-1" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Edit Permission Modal -->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/events/modals/archive-events.blade.php ENDPATH**/ ?>