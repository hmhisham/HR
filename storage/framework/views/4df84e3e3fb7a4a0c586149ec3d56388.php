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
                            <a href="<?php echo e(Route('AddEmployee')); ?>" class="mb-3 add-new btn btn-primary mb-md-0">أضــافــة</a>
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
                            <th Class="text-center">الحالة</th>
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

                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-edit')): ?>
                                            <button wire:click="GetEmployee(<?php echo e($Employee->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee-delete')): ?>
                                            <button wire:click="GetEmployee(<?php echo e($Employee->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#removeEmployeeModal">
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
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/emp-info-bank/emp-info-bank.blade.php ENDPATH**/ ?>