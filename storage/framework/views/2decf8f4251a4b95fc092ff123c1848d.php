

<div class="mt-n4">
    <h4 class="mb-1 fw-semiboyld">قائمة</h4>
    <div class="card">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <input wire:model="HolidaySearch" type="text" class="form-control" placeholder="بحث...">
                </div>
                <div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-create')): ?>
                        <button wire:click='AddHolidayModalShow' class="mb-3 add-new btn btn-primary mb-md-0"
                            data-bs-toggle="modal" data-bs-target="#addholidayModal">أضــافــة</button>
                        <?php echo $__env->make('livewire.holidays.modals.add-holiday', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                     <th>#</th>
                     <th class="text-center">رقم الحاسبة</th>
<th class="text-center">رقم الامر الاداري</th>
<th class="text-center">نوع الاجازه</th>
<th class="text-center">عدد الايام</th>
<th class="text-center">تاريخ الانفكاك</th>
<th class="text-center">العملية</th>

                    </tr>
            </thead>
            <tbody> 
                 <?php $i = 0; ?>
                  <?php $__currentLoopData = $Holidays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Holiday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                                    <?php $i++; ?>
                                    <td><?php echo e($i); ?></td>
                                   <td class="text-center"><?php echo e($Holiday->calculator_number); ?></td>
 <td class="text-center"><?php echo e($Holiday->order_number); ?></td>
 <td class="text-center"><?php echo e($Holiday->holiday_type); ?></td>
 <td class="text-center"><?php echo e($Holiday->days_count); ?></td>
 <td class="text-center"><?php echo e($Holiday->separation_date); ?></td>

                                  <td class="text-center">
                                     <div class="btn-group" role="group" aria-label="First group">
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-edit')): ?>
                                             <button wire:click="GetHoliday(<?php echo e($Holiday->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-success waves-effect" data-bs-toggle="modal"
                                                 data-bs-target="#editholidayModal">
                                                 <i class="tf-icons mdi mdi-pencil fs-3"></i>
                                             </button>
                                         <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday-delete')): ?>
                                             <button wire:click="GetHoliday(<?php echo e($Holiday->id); ?>)"
                                                 class="p-0 px-1 btn btn-outline-danger waves-effect <?php echo e($Holiday->active ? 'disabled' : ''); ?>"
                                                 data-bs-toggle = "modal" data-bs-target="#removeholidayModal">
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
            <?php echo $__env->make('livewire.holidays.modals.edit-holiday', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.holidays.modals.remove-holiday', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
</div>
   </div>
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/holidays/holiday.blade.php ENDPATH**/ ?>