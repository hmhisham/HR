<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">نافذة العناوين الوظيفية</h4>
    <Div Class="card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <input wire:model="JobtitleSearch" type="text" class="form-control" placeholder="بحث...">
                    </div>
                    <div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobtitle-create')): ?>
                            <button wire:click='AddJobtitleModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                                data-bs-toggle="modal" data-bs-target="#addjobtitleModal">أضــافــة</button>
                            <?php echo $__env->make('livewire.jobtitles.modals.add-jobtitle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobtitle-list')): ?>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th Class="text-center">الدرجة</th>
                            <th Class="text-center">العنوان الوظيفي</th>
                            <th Class="text-center">العملية</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        <?php $__currentLoopData = $Jobtitles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Jobtitle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php $i++; ?>
                                <td><?php echo e($i); ?></td>
                                
                                <td class="text-center"><?php echo e($Jobtitle->Getgrade ? $Jobtitle->Getgrade->grades_name : ''); ?>

                                </td>
                                <td Class="text-center"><?php echo e($Jobtitle->jobtitles_name); ?></td>
                                <td Class="text-center">
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobtitle-edit')): ?>
                                            <button wire:click="GetJobtitle(<?php echo e($Jobtitle->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                data-bs-target="#editjobtitleModal">
                                                <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jobtitle-delete')): ?>
                                            <button wire:click="GetJobtitle(<?php echo e($Jobtitle->id); ?>)"
                                                class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Jobtitle->active ? 'disabled' : ''); ?>"
                                                data-bs-toggle = "modal" data-bs-target="#removejobtitleModal">
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
                <?php echo $__env->make('livewire.jobtitles.modals.edit-jobtitle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('livewire.jobtitles.modals.remove-jobtitle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Modal -->
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/jobtitles/jobtitle.blade.php ENDPATH**/ ?>