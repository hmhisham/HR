

<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="DistrictSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('district-create')): ?>
                        <button wire:click='AddDistrictModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#adddistrictModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.districts.modals.add-district', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('district-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">رقم المحافظة</th>
<th class="text-center">رقم القضاء</th>
<th class="text-center">اسم القضاء</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  <?php $__currentLoopData = $Districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $District): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                    <?php $i++; ?>
                                    <td><?php echo e($i); ?></td>
                                   <td class="text-center"><?php echo e($District->governorate_id); ?></td>
 <td class="text-center"><?php echo e($District->district_number); ?></td>
 <td class="text-center"><?php echo e($District->district_name); ?></td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('district-edit')): ?>
                                             <button wire:click="GetDistrict(<?php echo e($District->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editdistrictModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('district-delete')): ?>
                                             <button wire:click="GetDistrict(<?php echo e($District->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($District->active ? 'disabled' : ''); ?>"
                                                 data-bs-toggle = "modal" data-bs-target="#removedistrictModal">
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
            <?php echo $__env->make('livewire.districts.modals.edit-district', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.districts.modals.remove-district', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
   </div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/districts/district.blade.php ENDPATH**/ ?>