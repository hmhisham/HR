<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">نافذة بيانات الزوجية</h4>
    <div class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="WiveSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wive-create')): ?>
                            <button wire:click='AddWiveModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addwiveModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.wives.modals.add-wive', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wive-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">الاسم الزوجة</th>
                            <th class="text-center">الحالة الزوجية</th>
                            <th class="text-center">الحالة المهنية</th>
                            <th class="text-center">رقم البطاقة الوطنية</th>
                            <th class="text-center">العملية</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Wives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Wive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                <td class="text-center"><?php echo e($Wive->Getworker ? $Wive->Getworker->full_name : ''); ?></td>
                                <td class="text-center"><?php echo e($Wive->full_name); ?></td>
                                <td class="text-center"><?php echo e($Wive->marital_status); ?></td>
                                <td class="text-center"><?php echo e($Wive->occupational_status); ?></td>
                                <td class="text-center"><?php echo e($Wive->national_id); ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wive-edit')): ?>
                                            <button wire:click="GetWive(<?php echo e($Wive->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editwiveModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wive-delete')): ?>
                                            <button wire:click="GetWive(<?php echo e($Wive->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Wive->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removewiveModal">
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
                <?php echo $__env->make('livewire.wives.modals.edit-wive', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.wives.modals.remove-wive', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/wives/wive.blade.php ENDPATH**/ ?>