<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="WorkerSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('worker-create')): ?>
                        <a href="<?php echo e(Route('AddWorker')); ?>" class="mb-3 add-new btn btn-primary mb-md-0">أضــافــة</a>
                    <?php endif; ?>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/workers/worker.blade.php ENDPATH**/ ?>