
<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="AreaSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-create')): ?>
                        <button wire:click='AddAreaModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addareaModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.areas.modals.add-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
   <th Class="text-center">رقم المحافظة</th>
<th Class="text-center">رقم القضاء</th>
<th Class="text-center">رقم الناحية</th>
<th Class="text-center">اسم الناحية</th>
<th Class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody>  <?php $__currentLoopData = $Areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                              <td><?php echo e($loop->iteration); ?></td>
                                   <td Class="text-center"><?php echo e($Area->governorate_id); ?></td>
 <td Class="text-center"><?php echo e($Area->district_id); ?></td>
 <td Class="text-center"><?php echo e($Area->area_id); ?></td>
 <td Class="text-center"><?php echo e($Area->area_name); ?></td>

                                  <td Class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-edit')): ?>
                                             <button wire:click="GetArea(<?php echo e($Area->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editareaModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('area-delete')): ?>
                                             <button wire:click="GetArea(<?php echo e($Area->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Area->active ? 'disabled' : ''); ?>"
                                                 data-bs-toggle = "modal" data-bs-target="#removeareaModal">
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
            <?php echo $__env->make('livewire.areas.modals.edit-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.areas.modals.remove-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
   </div>
<?php /**PATH C:\Users\HISHAM\Desktop\HR\HR\resources\views/livewire/areas/area.blade.php ENDPATH**/ ?>