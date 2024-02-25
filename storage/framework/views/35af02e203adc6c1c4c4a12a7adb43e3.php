<!-- Edit Administrator Modal -->
<div wire:ignore.self class="modal fade" id="EditCustomerModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0 mt-n4">
				<div class="mb-4 text-center">
					<h3 class="pb-1 mb-2 text-primary">تحرير حساب العميل</h3>
				</div>
                <hr class="text-primary mt-n2">

                <h5 wire:loading wire:target="GetUsersAccount" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>
                <h5 wire:loading wire:target="update" wire:loading.class="d-flex justify-content-center text-primary">جار حفظ البيانات...</h5>

                <div wire:loading.remove wire:target="GetUsersAccount">
                    <form id="editUserForm" class="pt-2 row" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-6">
                                <div class="form-floating form-floating-outline text-primary">
                                    <input wire:model.defer='name' type="text" id="modalName" class="form-control" placeholder="اسم المشرف">
                                    <label for="modalName">اسم المستخدم</label>
                                </div>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="form-floating form-floating-outline text-primary">
                                    <input wire:model.defer='email' type="text" id="modalEmail" class="form-control" placeholder="البريد الالكتروني">
                                    <label for="modalEmail">البريد الالكتروني</label>
                                </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='password' type="text" id="Password" class="form-control" placeholder="كلمة المرور" />
                                    <label for="Password">كلمة المرور</label>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-6">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer='ConfirmPassword' type="text" id="Confirm-Password" class="form-control" placeholder="تأكيد كلمة المرور" />
                                    <label for="Confirm-Password">تأكيد كلمة المرور</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <div class="form-floating form-floating-outline text-primary">
                                    <select wire:model.defer='UserRoles' id="UserRoles" class="form-select h-100" multiple data-placeholder="Select a Roles">
                                        <?php $__currentLoopData = $Roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $Role->name != 'OWNER' AND $Role->name != 'Supervisor' ): ?>
                                                <option value="<?php echo e($Role->id); ?>"><?php echo e($Role->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </select>
                                    <label for="UserRoles">الدور</label>
                                </div>
                                <?php $__errorArgs = ['UserRoles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="form-floating form-floating-outline">
                                    <select wire:model.defer="plan" class="form-control" id="AdministratorPlan">
                                        <option value="Customer">عميل</option>
                                    </select>
                                    <label id="AdministratorPlan">خطة العمل</label>
                                    <?php $__errorArgs = ['plan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-2 form-floating form-floating-outline mt-3">
                                    <select wire:model.defer="status" class="form-control" id="AdministratorStatus">
                                        <option value=""></option>
                                        <option value="1">مفعل</option>
                                        <option value="0">غير مفعل</option>
                                    </select>
                                    <label id="AdministratorStatus">حالة المستخدم</label>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class='text-danger inputerror'> <?php echo e($message); ?> </small>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <hr class="text-primary mt-n2">

                        <div class="text-center col-12 mb-n4">
                            <button wire:click='update' type="submit" class="btn btn-primary me-sm-3 me-1">تعديل</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
                    </form>
			    </div>
			</div>
		</div>
	</div>
</div>
<!--/ Edit Administrator Modal -->
<?php /**PATH C:\Users\HISHAM\Desktop\HR\HR\resources\views/livewire/users/customers-accounts/modals/edit-customer.blade.php ENDPATH**/ ?>