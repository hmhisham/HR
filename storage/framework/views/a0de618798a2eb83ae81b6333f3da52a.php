<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScaleaSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalea-create')): ?>
                            <button wire:click='AddScaleaModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscaleaModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.scaleas.modals.add-scalea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalea-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة الوظيفية</th>
                            <th Class="text-center">المرحلة الوظيفية</th>
                            <th Class="text-center">درجة الراتب</th>
                            <th Class="text-center">مرحلة الراتب</th>
                            <th Class="text-center">مقدار العلاوة</th>
                            <th Class="text-center">الراتب</th>
                            <th Class="text-center">المدة الاصغرية</th>
                            <th Class="text-center">الراتب السابق</th>
                            <th Class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Scaleas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Scalea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Scalea->Getgrade ? $Scalea->Getgrade->grades_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->phase_emp); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_salary_grade); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_salary_stage); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_amount); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_salary); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_minimum_period); ?></td>
                                <td Class="text-center"><?php echo e($Scalea->scaleas_previous_salary); ?></td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalea-edit')): ?>
                                            <button wire:click="GetScalea(<?php echo e($Scalea->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscaleaModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalea-delete')): ?>
                                            <button wire:click="GetScalea(<?php echo e($Scalea->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Scalea->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removescaleaModal">
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
                <?php echo $__env->make('livewire.scaleas.modals.edit-scalea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.scaleas.modals.remove-scalea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\laravel\HR\resources\views/livewire/scaleas/scalea.blade.php ENDPATH**/ ?>