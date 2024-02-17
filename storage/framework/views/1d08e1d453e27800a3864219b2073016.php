<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="EmployeeSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-create')): ?>
                            <button wire:click='AddEmployeeModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addemployeeModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.employees.modals.add-employees', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الرقم الوظيفي</th>
                            <th Class="text-center">رقم الاضبارة</th>
                            <th Class="text-center">الاسم الأول</th>
                            <th Class="text-center">الاسم الثاني</th>
                            <th Class="text-center">الاسم الثالث</th>
                            <th Class="text-center">الاسم الرابع</th>
                            <th Class="text-center">اللقب</th>
                            <th Class="text-center">الاسم الكامل</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $Employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td Class="text-center"><?php echo e($Employee->JobNumber); ?></td>
                                <td Class="text-center"><?php echo e($Employee->FileNumber); ?></td>
                                <td Class="text-center"><?php echo e($Employee->FirstName); ?></td>
                                <td Class="text-center"><?php echo e($Employee->SecondName); ?></td>
                                <td Class="text-center"><?php echo e($Employee->ThirdName); ?></td>
                                <td Class="text-center"><?php echo e($Employee->FourthName); ?></td>
                                <td Class="text-center"><?php echo e($Employee->LastName); ?></td>
                                <td Class="text-center"><?php echo e($Employee->FullName); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>



                <div class="mt-2 d-flex justify-content-center">
                    <?php echo e($links->links()); ?>

                </div>

                
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/employees/employee.blade.php ENDPATH**/ ?>