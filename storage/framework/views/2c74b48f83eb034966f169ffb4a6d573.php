<div class="mt-n4">
    <h4 class="mb-1 fw-medium">قائمة الأدوار</h4>
    <p class="mb-4">يوفر الدور الوصول إلى القوائم والميزات المحددة مسبقًا بحيث يمكن للمسؤول ، بناءً على الدور المعين ، الوصول إلى ما يحتاجه المستخدم.</p>
    <!-- Role cards -->
    <div class="row g-4">
        <?php $__currentLoopData = $Roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2 d-flex justify-content-between">
                            <h6 class="fw-normal">مستخدمي الدور</h6>
                            <?php
                                $Users =  App\Models\User::role($Role->name)->get()->pluck('name');
                            ?>
                            <h2 class="fw-normal mt-n2"><?php echo e($Users->count()); ?></h2>
                        </div>
                        <div class="role-heading">
                            <h4 class="mt-n3 fw-bolder"><?php echo e($Role->name); ?></h4>
                        </div>
                        <div class="mb-n3 d-flex justify-content-between">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                <a href="javascript:void(0);" wire:click="GetRole(<?php echo e($Role->id); ?>)" class="btn rounded-pill btn-text-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editRoleModal">
                                    <span>تحرير الدور</span>
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?>
                                <?php if(Auth::User()->hasRole('OWNER') AND $Role->name != 'OWNER'): ?>
                                    <a href="javascript:void(0);" wire:click="GetRole(<?php echo e($Role->id); ?>)" class="btn rounded-pill btn-text-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#removeRoleModal">
                                        <span>حذف الدور</span>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-7">
                        <div class="text-center card-body text-sm-start ">
                            <button wire:click="create" data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="mb-3 btn btn-primary text-nowrap add-new-role">اضافة دور</button>
                            <p class="mb-0">أضف دورًا ، إذا لم يكن موجودًا</p>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex align-items-end h-100 justify-content-center pe-sm-0">
                            <img src="<?php echo e(asset('assets/img/illustrations/add-new-role-illustration.png')); ?>"
                                class="img-fluid" alt="Image" width="70">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-2 d-flex justify-content-center">
            <?php echo e($links->links()); ?>

        </div>
    </div>
    <!--/ Role cards -->

    <!-- Role Modal -->
    <?php echo $__env->make('livewire.owner.permissions-roles.roles.modals.add-role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.owner.permissions-roles.roles.modals.edit-role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('livewire.owner.permissions-roles.roles.modals.remove-role', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- / Role Modal -->
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/owner/permissions-roles/roles/account-roles.blade.php ENDPATH**/ ?>