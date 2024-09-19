<div class="mt-n4">
    <h4 class="mb-1fw-semiboyld">قائمة التصاريح</h4>

    <p class="mb-4">التصاريح التي يمكنك استخدامها وتعيينها للمستخدمين وحسب الادوار ازاء كل منها.</p>

    <!-- Search & Add -->
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="PermissionSearch" wire:keyup='Search' type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-create')): ?>
                        <button wire:click='AddPermissionModalShow' class="mb-3 add-new btn btn-primary mb-md-0" data-bs-toggle="modal"
                            data-bs-target="#addPermissionModal">أضف تصريح</button>

                        <?php echo $__env->make('livewire.owner.permissions-roles.permissions.modals.add-permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Permission Table -->
        <div class="card-datatable table-responsive">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
                <table class="table ">
                    <thead class="table-light">
                        <tr>
                            <th>الأسم</th>
                            <th>معين إلى</th>
                            <th class="text-center">تاريخ الإنشاء</th>
                            <th class="text-center">الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $Permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($Permission->name); ?></td>
                                <td>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $Permission->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php ++$i; ?>
                                        <span class="m-0 text-sm fw-bolder ">
                                            <?php echo e($role->name); ?>

                                            <?php if($i < count($Permission->roles)): ?>
                                                ,
                                            <?php endif; ?>
                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="text-center"><?php echo e($Permission->created_at->format('Y-m-d')); ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-edit')): ?>
                                            <button wire:click="GetPermission(<?php echo e($Permission->id); ?>)" class="p-0 px-1 btn btn-outline-success waves-effect rounded-circle" data-bs-toggle="modal" data-bs-target="#editPermissionModal"><i class="tf-icons mdi mdi-pen-lock fs-3"></i></button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-delete')): ?>
                                            <?php if( Auth::User()->hasRole('OWNER') ): ?>
                                                <button wire:click="GetPermission(<?php echo e($Permission->id); ?>)" class="p-0 px-1 btn btn-outline-danger waves-effect rounded-circle" data-bs-toggle="modal" data-bs-target="#removePermissionModal"><i class="tf-icons mdi mdi-lock-remove-outline fs-3"></i></button>
                                            <?php endif; ?>
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
                <?php echo $__env->make('livewire.owner.permissions-roles.permissions.modals.edit-permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.owner.permissions-roles.permissions.modals.remove-permission', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
           <?php endif; ?>
        </div>
    </div>
    <!--/ Permission Table -->
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/owner/permissions-roles/permissions/account-permissions.blade.php ENDPATH**/ ?>