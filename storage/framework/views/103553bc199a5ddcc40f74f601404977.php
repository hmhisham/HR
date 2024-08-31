<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="JobleaverSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobleaver-create')): ?>
                        <button wire:click='AddJobleaverModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addjobleaverModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.jobleavers.modals.add-jobleaver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobleaver-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>

                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th Class="text-center">رقم الحاسبة</th>
                        <th Class="text-center">نوع ترك العمل</th>
                        <th Class="text-center">تاريخ التعيين</th>
                        <th Class="text-center">تاريخ الانقطاع</th>
                        <th Class="text-center">العملية</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $Jobleavers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Jobleaver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $i++; ?>
                        <td><?php echo e($i); ?></td>

                        <td class="text-center"><?php echo e($Jobleaver->worker ? $Jobleaver->worker->full_name : 'N/A'); ?></td>
                        <td class="text-center"><?php echo e($Jobleaver->worker ? $Jobleaver->worker->department : 'N/A'); ?></td>
                        <td Class="text-center"><?php echo e($Jobleaver->calculator_number); ?></td>
                        <td Class="text-center"><?php echo e($Jobleaver->job_leaving_type); ?></td>
                        <td Class="text-center"><?php echo e($Jobleaver->appointment_date); ?></td>
                        <td Class="text-center"><?php echo e($Jobleaver->disconnection_date); ?></td>
                        <td Class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobleaver-edit')): ?>
                                <button wire:click="GetJobleaver(<?php echo e($Jobleaver->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editjobleaverModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobleaver-delete')): ?>
                                <button wire:click="GetJobleaver(<?php echo e($Jobleaver->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Jobleaver->active ? 'disabled' : ''); ?>"
                                    data-bs-toggle="modal" data-bs-target="#removejobleaverModal">
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
            <?php echo $__env->make('livewire.jobleavers.modals.edit-jobleaver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.jobleavers.modals.remove-jobleaver', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/jobleavers/jobleaver.blade.php ENDPATH**/ ?>