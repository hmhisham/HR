<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="ThankSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-create')): ?>
                        <button wire:click='AddThankModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addthankModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.thanks.modals.add-thank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-list')): ?>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th Class="text-center">الاسم الكامل</th>
                    <th Class="text-center">القسم</th>
                    <th Class="text-center">رقم الحاسبة</th>

                    <th Class="text-center">رقم الامر الوزاري</th>
                    <th Class="text-center">تاريخ الامر الوزاري</th>
                    <th Class="text-center">عدد اشهر القدم</th>
                    <th Class="text-center">العملية</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                <?php $__currentLoopData = $Thanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Thank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php $i++; ?>
                    <td><?php echo e($i); ?></td>
                    <td class="text-center"><?php echo e($Thank->worker ? $Thank->worker->full_name : 'N/A'); ?></td>
                    <td class="text-center"><?php echo e($Thank->worker ? $Thank->worker->department : 'N/A'); ?></td>
                    <td class="text-center"><?php echo e($Thank->calculator_number); ?></td>
                    <td Class="text-center"><?php echo e($Thank->ministerial_order_number); ?></td>
                    <td Class="text-center"><?php echo e($Thank->ministerial_order_date); ?></td>
                    <td Class="text-center"><?php echo e($Thank->months_of_service); ?></td>


                    <td Class="text-center">
                        <div class="btn-group" role="group" aria-label="First group">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-edit')): ?>
                                <button wire:click="GetThank(<?php echo e($Thank->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editthankModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('thank-delete')): ?>
                                <button wire:click="GetThank(<?php echo e($Thank->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Thank->active ? 'disabled' : ''); ?>"
                                    data-bs-toggle="modal" data-bs-target="#removethankModal">
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
        <?php echo $__env->make('livewire.thanks.modals.edit-thank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.thanks.modals.remove-thank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/thanks/thank.blade.php ENDPATH**/ ?>