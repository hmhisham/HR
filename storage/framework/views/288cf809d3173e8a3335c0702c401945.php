<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="dispatcSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatc-create')): ?>
                        <button wire:click='AdddispatcModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#adddispatcModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.dispatch.modals.add-dispatc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatc-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th Class="text-center">الاسم الكامل</th>
                        <th Class="text-center">القسم</th>
                        <th class="text-center">رقم الحاسبة</th>
                        <th class="text-center">تاريخ السفر</th>
                        <th class="text-center">عدد أيام السفر</th>
                        <th class="text-center">رقم الأمر الوزاري</th>
                        <th class="text-center">العملية</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    <?php $__currentLoopData = $Dispatch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dispatc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php $i++; ?>
                        <td><?php echo e($i); ?></td>
                        <td class="text-center"><?php echo e($dispatc->worker ? $dispatc->worker->full_name : 'N/A'); ?></td>
                        <td class="text-center"><?php echo e($dispatc->worker ? $dispatc->worker->department : 'N/A'); ?></td>
                        <td class="text-center"><?php echo e($dispatc->calculator_number); ?></td>
                        <td class="text-center"><?php echo e($dispatc->travel_date); ?></td>
                        <td class="text-center"><?php echo e($dispatc->travel_days); ?></td>
                        <td class="text-center"><?php echo e($dispatc->ministerial_order_number); ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="First group">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatc-edit')): ?>
                                <button wire:click="Getdispatc(<?php echo e($dispatc->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                    data-bs-target="#editdispatcModal">
                                    <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                </button>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dispatc-delete')): ?>
                                <button wire:click="Getdispatc(<?php echo e($dispatc->id); ?>)"
                                    class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($dispatc->active ? 'disabled' : ''); ?>"
                                    data-bs-toggle="modal" data-bs-target="#removedispatcModal">
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
            <?php echo $__env->make('livewire.dispatch.modals.edit-dispatc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.dispatch.modals.remove-dispatc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/dispatch/dispatc.blade.php ENDPATH**/ ?>