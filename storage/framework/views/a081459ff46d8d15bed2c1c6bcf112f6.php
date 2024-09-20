<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="UnitSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit-create')): ?>
                            <button wire:click='AddUnitModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addunitModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.units.modals.add-unit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">اسم القسم</th>
                            <th Class="text-center">اسم الشعبة</th>
                            <th Class="text-center">اسم الوحدة</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Unit->Getsection ? $Unit->Getsection->section_name : ''); ?></td>
                                <td class="text-center"><?php echo e($Unit->Getbranc ? $Unit->Getbranc->branch_name : ''); ?></td>
                                <td Class="text-center"><?php echo e($Unit->units_name); ?></td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit-edit')): ?>
                                            <button wire:click="GetUnit(<?php echo e($Unit->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editunitModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('unit-delete')): ?>
                                            <button wire:click="GetUnit(<?php echo e($Unit->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Unit->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removeunitModal">
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
                <?php echo $__env->make('livewire.units.modals.edit-unit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.units.modals.remove-unit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/units/unit.blade.php ENDPATH**/ ?>