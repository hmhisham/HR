<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="ChildrenSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('children-create')): ?>
                            <button wire:click='AddChildrenModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addchildrenModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.childrens.modals.add-children', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('children-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الام الكامل</th>
                            <th class="text-center">الاسم الكامل</th>
                            <th class="text-center">الجنس</th>
                            <th class="text-center">الحالة الدراسية</th>
                            <th class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Childrens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Children->Getwive ? $Children->Getwive->full_name : ''); ?></td>
                                <td class="text-center"><?php echo e($Children->full_name); ?></td>
                                <td class="text-center"><?php echo e($Children->gender); ?></td>
                                <td class="text-center"><?php echo e($Children->occupational_status); ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('children-edit')): ?>
                                            <button wire:click="GetChildren(<?php echo e($Children->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editchildrenModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('children-delete')): ?>
                                            <button wire:click="GetChildren(<?php echo e($Children->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Children->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removechildrenModal">
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
                <?php echo $__env->make('livewire.childrens.modals.edit-children', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.childrens.modals.remove-children', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/childrens/children.blade.php ENDPATH**/ ?>