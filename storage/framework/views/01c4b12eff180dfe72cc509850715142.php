<!-- Remove Administrator Modal -->
<div wire:ignore.self class="modal fade" id="RmoveAdministrator" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0 mt-n4">
				<div class="mb-4 text-center">
					<h3 class="pb-1 mb-2 text-danger">حذف بيانات المشرف</h3>
					<p>خذف بيانات المستخدم بصفة مشرف .</p>
				</div>
                <hr class="text-danger mt-n2">

                <h5 wire:loading wire:target="GetAdministratorsAccount" wire:loading.class="d-flex justify-content-center text-danger">جار معالجة البيانات...</h5>

                <div wire:loading.remove>
                    <div class="alert alert-danger <?php echo e($status ? '':'hidden'); ?> " role="alert">
                        <h4 class="alert-heading d-flex align-items-center">
                            <i class="mdi mdi-alert-circle-outline mdi-24px me-2"></i>حساب المشرف!!
                        </h4>
                        <hr>
                        <p class="mb-0">
                            يجب ان يكون حساب المشرف غير مغعل لاتمام عملية الحذف.
                        </p>
                    </div>

				    <form id="removeAdministratorForm" class="pt-2 row" onsubmit="return false">
					    <div class="row">
                            <div class="mb-3 col-6">
                                <div class="text-danger">
                                    <label for="AdministratorName">أسم المشرف</label>
                                    <div class="form-control-plaintext mt-n2"><?php echo e($name); ?></div>
                                </div>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="text-danger">
                                    <label for="AdministratorEmail">البريد الالكتروني</label>
                                    <div class="form-control-plaintext mt-n2"><?php echo e($email); ?></div>
                                </div>
                            </div>
                        </div>

					    <div class="row">
                            <div class="mb-3 col-6">
                                <label for="AdministratorRole" class="text-danger mb-n5">الدور</label>
                                <?php if($AdministratorAccount): ?>
                                    <?php $__currentLoopData = $AdministratorAccount->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RolesName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-control-plaintext py-0"><?php echo e($RolesName); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3 col-6">
                                <div class="text-danger">
                                    <label for="AdministratorPlan">خطة العمل</label>
                                    <div class="form-control-plaintext mt-n2"><?php echo e($plan); ?></div>
                                </div>
                                <div class="text-danger">
                                    <label for="AdministratorStatus">حالة المستخدم</label>
                                    <div class="form-control-plaintext mt-n2"><?php echo e($status ? 'مفعل':'غير مفعل'); ?></div>
                                </div>
                            </div>
                        </div>

                        <hr class="text-danger mt-n2">

                        <div class="text-center col-12 mb-n4">
                            <button wire:click='destroy' <?php echo e($status ? 'disabled':''); ?> type="submit" class="btn btn-danger me-sm-3 me-1">حذف</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">تجاهل</button>
                        </div>
				    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<!--/ Remove Administrator Modal -->
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/users/administrators-accounts/modals/remove-administrator.blade.php ENDPATH**/ ?>