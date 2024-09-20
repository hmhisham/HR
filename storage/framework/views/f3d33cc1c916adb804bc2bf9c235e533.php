<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ScalemSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalem-create')): ?>
                            <button wire:click='AddScalemModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addscalemModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.scalems.modals.add-scalem', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalem-list')): ?>
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
                        <?php $__currentLoopData = $Scalems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Scalem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Scalem->Getgrade ? $Scalem->Getgrade->grades_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->phase_emp); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_salary_grade); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_salary_stage); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_amount); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_salary); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_minimum_period); ?></td>
                                <td Class="text-center"><?php echo e($Scalem->scalems_previous_salary); ?></td>

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalem-edit')): ?>
                                            <button wire:click="GetScalem(<?php echo e($Scalem->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editscalemModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('scalem-delete')): ?>
                                            <button wire:click="GetScalem(<?php echo e($Scalem->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Scalem->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removescalemModal">
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
                <?php echo $__env->make('livewire.scalems.modals.edit-scalem', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.scalems.modals.remove-scalem', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/scalems/scalem.blade.php ENDPATH**/ ?>