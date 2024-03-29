<!-- Show Administrator Modal -->
<div wire:ignore.self class="modal fade" id="ShowAdministrators" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0 mt-n4">
				<div class="mb-4 text-center">
					<h3 class="text-primary pb-1 mb-2">عرض بيانات المشرف</h3>
					<p>عرض بيانات المستخدم بصفة مشرف .</p>
				</div>
                <hr class="text-primary mt-n2">

                <h5 wire:loading wire:target="GetAdministratorsAccount" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>

                <div wire:loading.remove>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <div class="text-primary">
                                <label for="AdministratorName">أسم المشرف</label>
                                <div class="form-control-plaintext mt-n2"><?php echo e($name); ?></div>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="text-primary">
                                <label for="AdministratorEmail">البريد الالكتروني</label>
                                <div class="form-control-plaintext mt-n2"><?php echo e($email); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6 h-100">
                            <div class="text-primary">
                                <label for="AdministratorRole" class="text-primary mb-n2">الدور</label>
                                <?php if($AdministratorAccount): ?>
                                    <?php $__currentLoopData = $AdministratorAccount->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $RolesName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-control-plaintext py-0"><?php echo e($RolesName); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="text-primary">
                                <label for="AdministratorPlan">خطة العمل</label>
                                <div class="form-control-plaintext mt-n2"><?php echo e($plan); ?></div>
                            </div>
                            <div class="text-primary mt-3">
                                <label for="AdministratorStatus">حالة المشرف</label>
                                <div class="form-control-plaintext mt-n2"><?php echo e($status ? 'مفعل':'غير مفعل'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="text-primary mt-n2">

                <div class="d-grid gap-2 mx-auto mb-n4">
					<button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">حسناً</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/ Show Administrator Modal -->
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/users/administrators-accounts/modals/show-administrator.blade.php ENDPATH**/ ?>