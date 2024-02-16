<div class="mt-n4">
    <div class="mb-4 row g-4">
        <div class="col-sm-6 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-primary">
                                <div class="mdi mdi-shield-account mdi-24px"></div>
                            </div>
                        </div>

                        <?php if(!Auth::User()->hasRole('OWNER')): ?>
                            <?php
                                $Role = Spatie\Permission\Models\Role::whereNot('name', 'OWNER')->pluck('name');
                                $Administrators = App\Models\User::whereIn('plan', ['Supervisor', 'Employee'])->with('roles')->get()
                                    ->filter(fn ($user) => $user->roles->whereIn('name', $Role)->toArray());

                                /*$admins = App\Models\User::whereHas('roles', function ($q) {
                                    $adminRole = Spatie\Permission\Models\Role::whereNot('name', 'OWNER')->pluck('name');
                                    $q->whereIn('roles.name', $adminRole); // or whatever constraint you need here
                                })->get();*/
                            ?>
                        <?php endif; ?>

                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e($Administrators->count()); ?></h5>
                            </div>
                            <small class="text-muted">المشرفين</small>
                        </div>

                        <div class="ms-auto <?php echo e(Auth::User()->hasRole('OWNER') ? '':'hidden'); ?>">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e(App\Models\User::whereIn('plan', ['Supervisor', 'Employee'])->with('roles')->get()->filter(fn ($user) => $user->roles->where('name', 'OWNER')->toArray())->count()); ?></h5>
                            </div>
                            <small class="text-muted">OWNER</small>
                        </div>

                        <div class="ms-auto">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e(count(App\Models\User::role('Administrator')->get())); ?></h5>
                            </div>
                            <small class="text-muted">Administrator</small>
                        </div>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e(count(App\Models\User::role('Supervisor')->get()->pluck('name'))); ?></h5>
                            </div>
                            <small class="text-muted">Supervisor</small>
                        </div>
                        <div class="ms-auto">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e(count(App\Models\User::role('Employee')->get()->pluck('name'))); ?></h5>
                            </div>
                            <small class="text-muted">Employee</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <div class="rounded avatar-initial bg-label-warning">
                                <div class="mdi mdi-account-lock mdi-24px"></div>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e($Administrators->where('plan', 'Supervisor')->count()); ?></h5>
                            </div>
                            <small class="text-muted">اSupervisor</small>
                        </div>

                        <div class="ms-auto">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0"><?php echo e($Administrators->where('plan', 'Employee')->count()); ?></h5>
                            </div>
                            <small class="text-muted">Employee</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">مشرفي النظام</h5>
            <div>
               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-create')): ?>
                    <button wire:click='AdministratorsAccountAdd' class="mb-3 add-new btn btn-primary mb-md-0"
                        data-bs-toggle="modal" data-bs-target="#addAdministratorModal">أضف مشرفاً</button>

                        <?php echo $__env->make('livewire.users.administrators-accounts.modals.add-administrator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="card-header d-flex align-items-center mt-n4">
            <div class="col">
                <input wire:model='SearchName' type="text" class="form-control" id="SearchName" placeholder="أسم المشرف">
            </div>
            <div class="col">
                <input wire:model='SearchEmail' type="text" class="form-control" id="SearchEmail" placeholder="البريد الالكتروني">
            </div>
            <div class="col">
                <select class="form-select" id="SearchRole">
                    <option value="0" <?php echo e(0 == $RoleSelect?"selected":''); ?>>Any</option>
                    <?php $__currentLoopData = $Roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Role->id); ?>" <?php echo e($Role->id == $RoleSelect?"selected":''); ?>><?php echo e($Role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="SearchStatus">
                    <option value="0" <?php echo e(0 == $StatusSelect?"selected":''); ?>>Any</option>
                    <option value="مفعل" <?php echo e('مفعل' == $StatusSelect?"selected":''); ?>>مفعل </option>
                    <option value="غير مفعل" <?php echo e('غير مفعل' == $StatusSelect?"selected":''); ?>>غير مفعل</option>
                    
                </select>
            </div>
        </div>



        <div class="card-datatable table-responsive">
            <table class=" table border">
                <thead class="table-light">
                    <tr>
                        <th>الاسم</th>
                        <th>الدور / خطة العمل</th>
                        <th>تاريخ التسجيل</th>
                        <th>حلة الحساب</th>
                        <th class="text-center">الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $Administrators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Administrator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($Administrator->name); ?>

                                <div>
                                    <small><?php echo e($Administrator->email); ?></small>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $roles_count = count($Administrator->getRoleNames());
                                    $i = 0;
                                    $disease = '';
                                ?>
                                <?php $__currentLoopData = $Administrator->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $coma = ''; $i++; if($i < $roles_count) { $coma = ' , '; } ?>
                                    <?php echo e($roles .$coma); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($Administrator->plan); ?></div>
                            </td>
                            <td>
                                <?php echo e($Administrator->created_at); ?>

                                <div dir="ltr">
                                    <?php echo e(Carbon\Carbon::parse($Administrator->created_at)->diffForHumans()); ?>

                                </div>
                            </td>
                            <td>
                                <?php $Status = 'text-dark'; ?>
                                <?php if($Administrator->status): ?>
                                    <?php $Status = 'text-success'; ?>
                                <?php else: ?>
                                    <?php $Status = 'text-danger'; ?>
                                <?php endif; ?>
                                <small class="<?php echo e($Status); ?>"><?php echo e($Administrator->status ? 'مفعل':'غير مفعل'); ?></small>

                                <?php if(Cache::has('user-online' . $Administrator->id)): ?>
                                    <small class="text-success">متصل</small>
                                <?php else: ?>
                                    <small class="text-danger">غير متصل</small>
                                <?php endif; ?>
                                <div>
                                    <?php if($Administrator->last_seen != null): ?>
                                        <span class="" dir="ltr"><?php echo e(Carbon\Carbon::parse($Administrator->last_seen)->diffForHumans()); ?></span>
                                    <?php else: ?>
                                        <small>لم يظهر ابداً</small>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <?php if(Auth::User()->hasRole('OWNER') OR !in_array('OWNER', $Administrator->getRoleNames()->toArray()) ): ?>
                                    <div class="btn-group" role="group" aria-label="First group">
                                        <button wire:click='GetAdministratorsAccount(<?php echo e($Administrator->id); ?>)' type="button" class="p-0 px-1 btn btn-outline-primary waves-effect rounded-circle" data-bs-toggle="modal" data-bs-target="#ShowAdministrators">
                                            <i class="tf-icons mdi mdi-account-eye-outline fs-3"></i>
                                        </button>
                                        <?php if(Auth::User()->id == $Administrator->id OR !in_array('OWNER', $Administrator->getRoleNames()->toArray())): ?>
                                            <button wire:click='GetAdministratorsAccount(<?php echo e($Administrator->id); ?>)' type="button" class="p-0 px-1 btn btn-outline-success waves-effect rounded-circle" data-bs-toggle="modal" data-bs-target="#EditAdministrator">
                                                <i class="tf-icons mdi mdi-account-edit-outline fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                        <?php if(Auth::User()->hasRole('OWNER') AND !in_array('OWNER', $Administrator->getRoleNames()->toArray())): ?>
                                            <button wire:click='GetAdministratorsAccount(<?php echo e($Administrator->id); ?>)' type="button" class="p-0 px-1 btn btn-outline-danger waves-effect rounded-circle" data-bs-toggle="modal" data-bs-target="#RmoveAdministrator">
                                                <i class="tf-icons mdi mdi-account-remove-outline fs-3"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <div class="mt-2 d-flex justify-content-center">
            <?php echo e($links->links()); ?>

        </div>

        <!-- Administrators Modal -->
        <?php echo $__env->make('livewire.users.administrators-accounts.modals.show-administrator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.users.administrators-accounts.modals.edit-administrator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('livewire.users.administrators-accounts.modals.remove-administrator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- / Administrators Modal -->

    </div>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/users/administrators-accounts/administrators-accounts.blade.php ENDPATH**/ ?>