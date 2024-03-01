<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PreciseSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('precise-create')): ?>
                            <button wire:click='AddPreciseModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addpreciseModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.precises.modals.add-precise', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('precise-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الرمز</th>
                            <th Class="text-center">التخصص العام</th>
                            <th Class="text-center">الرمز</th>
                            <th Class="text-center">التخصص الدقيق</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Precises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Precise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Precise->Getspecialty ? $Precise->Getspecialty->specialtys_code : ''); ?></td>
                                <td class="text-center"><?php echo e($Precise->Getspecialty ? $Precise->Getspecialty->specialtys_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Precise->precises_code); ?></td>
                                <td Class="text-center"><?php echo e($Precise->precises_name); ?></td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('precise-edit')): ?>
                                            <button wire:click="GetPrecise(<?php echo e($Precise->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editpreciseModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('precise-delete')): ?>
                                            <button wire:click="GetPrecise(<?php echo e($Precise->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Precise->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removepreciseModal">
                                                <i class="tf-icons mdi mdi-delete-outline fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <div class="mt-2 d-flex justify-content-center">
                    <?php echo e($links->links()); ?>

                </div>
                <!-- Modal -->
                <?php echo $__env->make('livewire.precises.modals.edit-precise', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.precises.modals.remove-precise', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/precises/precise.blade.php ENDPATH**/ ?>