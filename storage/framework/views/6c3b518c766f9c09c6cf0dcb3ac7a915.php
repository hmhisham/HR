<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="PenaltieSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('penaltie-create')): ?>
                        <button wire:click='AddPenaltieModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addpenaltieModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.penalties.modals.add-penaltie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('penaltie-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th Class="text-center">رقم الحاسبة</th>
                        <th Class="text-center">رقم الامر الوزاري</th>
                        <th Class="text-center">تاريخ الامر الوزاري</th>
                        <th Class="text-center">نوع العقوبة</th>
                        <th Class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $Penalties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Penaltie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $i++; ?>
                        <td><?php echo e($i); ?></td>
                        <td class="text-center"><?php echo e($Penaltie->worker ? $Penaltie->worker->full_name : 'N/A'); ?></td>
                        <td class="text-center"><?php echo e($Penaltie->worker ? $Penaltie->worker->department : 'N/A'); ?></td>
                        <td Class="text-center"><?php echo e($Penaltie->calculator_number); ?></td>
                        <td Class="text-center"><?php echo e($Penaltie->p_ministerial_order_number); ?></td>
                        <td Class="text-center"><?php echo e($Penaltie->p_ministerial_order_date); ?></td>
                        <td Class="text-center"><?php echo e($Penaltie->p_penalty_type); ?></td>
                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('penaltie-edit')): ?>
                                <button wire:click="GetPenaltie(<?php echo e($Penaltie->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editpenaltieModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('penaltie-delete')): ?>
                                <button wire:click="GetPenaltie(<?php echo e($Penaltie->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Penaltie->active ? 'disabled' : ''); ?>"
                                    data-bs-toggle="modal" data-bs-target="#removepenaltieModal">
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
            <?php echo $__env->make('livewire.penalties.modals.edit-penaltie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.penalties.modals.remove-penaltie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/penalties/penaltie.blade.php ENDPATH**/ ?>