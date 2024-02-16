<div class="mt-n4">
    <div class="mb-4 row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-primary">
                                <div class="mdi mdi-account-outline mdi-24px"></div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e($Customers->count()); ?></h5>
                            </div>
                            <small class="text-muted">العملاء</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-warning">
                                <div class="mdi mdi-poll mdi-24px"></div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e($Customers->count()); ?></h5>
                            </div>
                            <small class="text-muted">اجمالي المدفوعات</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-info">
                                <div class="mdi mdi-trending-up mdi-24px"></div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">2,450K</h5>
                            </div>
                            <small class="text-muted">معاملة جديدة</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-success">
                                <div class="mdi mdi-currency-usd mdi-24px"></div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">$48.2K</h5>
                            </div>
                            <small class="text-muted">إجمالي الإيرادات</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-2">
                <div class="col">
                    <input wire:model='SearchName' type="text" class="form-control" id="SearchName" placeholder="الأسم">
                </div>
                <div class="col">
                    <input wire:model='SearchEmail' type="text" class="form-control" id="SearchEmail" placeholder="البريد الالكتروني">
                </div>
            </div>
        </div>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer-list')): ?>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>العميل</th>
                        <th>البريد الالكتروني</th>
                        <th class="text-center">حالة الحساب</th>
                        <th>تاريخ التسجيل</th>
                        <th>اخر ظهور</th>
                        <th>الحجوزات</th>
                        <th class="text-center">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $Customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$index); ?></td>
                            <td><?php echo e($Customer->name); ?></td>
                            <td><?php echo e($Customer->email); ?></td>
                            <td class="text-center">
                                <i class="mdi <?php echo e($Customer->status ? 'mdi-account-lock-open' : 'mdi-account-lock text-danger'); ?> fs-1"></i>
                            </td>
                            <td>
                                <?php if($Customer->created_at->format('A') == 'PM'): ?>
                                    <?php
                                        $APM = ' مساءاً ';
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $APM = ' صباحاً ';
                                    ?>
                                <?php endif; ?>
                                <div><?php echo e($Customer->created_at->format('h-i-s') . $APM); ?></div>
                                <div><?php echo e($Customer->created_at->format('Y-m-d')); ?></div>
                            </td>
                            <td>
                                <?php echo e(Carbon\Carbon::parse($Customer->created_at)->diffForHumans()); ?>

                            </td>
                            <td>

                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex position-relative">
                                    <div class="avatar d-inline-flex position-relative">
                                        <button wire:click="GetCustomer(<?php echo e($Customer->id); ?>)" class="btn rounded-pill btn-icon btn-outline-dark waves-effect"
                                                data-bs-toggle="modal" data-bs-target="#SendEmailModal">
                                            <i class="mdi mdi-email fs-3"></i>
                                        </button>
                                        <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-dark text-white"><?php echo e($Customer->GetCustomerEmailSend->count() > 10 ? '10+' : $Customer->GetCustomerEmailSend->count()); ?></span>
                                    </div>

                                    <button wire:click="GetCustomer(<?php echo e($Customer->id); ?>)" class="btn rounded-pill btn-icon <?php echo e($Customer->status ? 'btn-outline-primary' : 'btn-outline-success'); ?>  waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#ChangeActivatedModal">
                                        <i class="mdi <?php echo e($Customer->status ? 'mdi-account-lock' : 'mdi-account-lock-open'); ?> fs-3"></i>
                                    </button>
                                    <button wire:click="GetCustomer(<?php echo e($Customer->id); ?>)" class="btn rounded-pill btn-icon btn-outline-warning waves-effect"
                                            data-bs-toggle="modal" data-bs-target="#ArchiveCustomerAccountModal">
                                        <i class="mdi mdi-account-remove fs-3"></i>
                                    </button>
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
            <?php echo $__env->make('livewire.customers.modals.send-email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.customers.modals.change-activated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('livewire.customers.modals.archive-customer-account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->
        <?php endif; ?>
    </div>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/customers/customer.blade.php ENDPATH**/ ?>