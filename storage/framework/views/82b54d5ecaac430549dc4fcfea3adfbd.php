<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">نافذة سلم رواتب العقود الفنيين</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="TechnicianSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('technician-create')): ?>
                            <button wire:click='AddTechnicianModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addtechnicianModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.technicians.modals.add-technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('technician-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">معرّف درجة الموظف</th>
                            <th class="text-center">المرحلة الوظيفية</th>
                            <th class="text-center">درجة الراتب</th>
                            <th class="text-center">مرحلة الراتب</th>
                            <th class="text-center">مقدار العلاوة</th>
                            <th class="text-center">الراتب</th>
                            <th class="text-center">المدة الأصغرية بالأشهر</th>
                            <th class="text-center">الراتب السابق</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Technicians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Technician): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Technician->grades_id); ?></td>
                                <td class="text-center"><?php echo e($Technician->phase_emp); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_salary_grade); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_salary_stage); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_amount); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_salary); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_minimum_period); ?></td>
                                <td class="text-center"><?php echo e($Technician->technicians_previous_salary); ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('technician-edit')): ?>
                                            <button wire:click="GetTechnician(<?php echo e($Technician->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#edittechnicianModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('technician-delete')): ?>
                                            <button wire:click="GetTechnician(<?php echo e($Technician->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Technician->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removetechnicianModal">
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
                <?php echo $__env->make('livewire.technicians.modals.edit-technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.technicians.modals.remove-technician', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/technicians/technician.blade.php ENDPATH**/ ?>