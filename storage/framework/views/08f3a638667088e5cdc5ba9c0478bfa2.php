 
<div class="mt-n4">
    <h4 Class="mb-1fw-semiboyld">قائمة</h4>
    <Div Class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="SpecializationclassificatioSearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specializationclassificatio-create')): ?>
                        <button wire:click='AddSpecializationclassificatioModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addspecializationclassificatioModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.specializationclassification.modals.add-specializationclassificatio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specializationclassificatio-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
   <th Class="text-center">تصنيف التخصص</th>
<th Class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
  <?php $__currentLoopData = $Specializationclassification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Specializationclassificatio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                    <?php $i++; ?>
                                    <td><?php echo e($i); ?></td>
                                   <td Class="text-center"><?php echo e($Specializationclassificatio->specializationclassification_name); ?></td>

                                  <td Class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specializationclassificatio-edit')): ?>
                                             <button wire:click="GetSpecializationclassificatio(<?php echo e($Specializationclassificatio->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editspecializationclassificatioModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specializationclassificatio-delete')): ?>
                                             <button wire:click="GetSpecializationclassificatio(<?php echo e($Specializationclassificatio->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Specializationclassificatio->active ? 'disabled' : ''); ?>"
                                                 data-bs-toggle = "modal" data-bs-target="#removespecializationclassificatioModal">
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
            <?php echo $__env->make('livewire.specializationclassification.modals.edit-specializationclassificatio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.specializationclassification.modals.remove-specializationclassificatio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
   </div>
<?php /**PATH D:\laravel\HR\resources\views/livewire/specializationclassification/specializationclassificatio.blade.php ENDPATH**/ ?>