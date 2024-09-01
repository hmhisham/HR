<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="ThankSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-create')): ?>
                        <button wire:click='AddThankModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addthankModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.thanks.modals.add-thank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-list')): ?>
        

        
        <!-- Modal -->
       
        <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
<?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/thanks/thank.blade.php ENDPATH**/ ?>