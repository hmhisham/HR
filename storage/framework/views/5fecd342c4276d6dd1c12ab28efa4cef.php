<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="GraduationSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('graduation-create')): ?>
                            <button wire:click='AddGraduationModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addgraduationModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.graduations.modals.add-graduation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('graduation-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الشهادة</th>
                            <th Class="text-center">جهة التخرج</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Graduations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Graduation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Graduation->Getcertificate ? $Graduation->Getcertificate->certificates_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Graduation->graduations_name); ?></td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('graduation-edit')): ?>
                                            <button wire:click="GetGraduation(<?php echo e($Graduation->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editgraduationModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('graduation-delete')): ?>
                                            <button wire:click="GetGraduation(<?php echo e($Graduation->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Graduation->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removegraduationModal">
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
                <?php echo $__env->make('livewire.graduations.modals.edit-graduation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.graduations.modals.remove-graduation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/graduations/graduation.blade.php ENDPATH**/ ?>