<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScaleSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scale-create')): ?>
                            <button wire:click='AddScaleModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscaleModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.scales.modals.add-scale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scale-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة</th>
                            <th Class="text-center">المرحلة</th>
                            <th Class="text-center">الراتب</th>
                            <th Class="text-center">مقدار الزيادة</th>
                            <th Class="text-center">مدة اصغرية</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Scales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Scale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Scale->Getgrade ? $Scale->Getgrade->grades_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Scale->scales_phase); ?></td>
                                <td Class="text-center"><?php echo e($Scale->scales_salary); ?></td>
                                <td Class="text-center"><?php echo e($Scale->scales_quantity); ?></td>
                                <td Class="text-center"><?php echo e($Scale->scales_period); ?></td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scale-edit')): ?>
                                            <button wire:click="GetScale(<?php echo e($Scale->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscaleModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scale-delete')): ?>
                                            <button wire:click="GetScale(<?php echo e($Scale->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Scale->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removescaleModal">
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
                <?php echo $__env->make('livewire.scales.modals.edit-scale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.scales.modals.remove-scale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/scales/scale.blade.php ENDPATH**/ ?>