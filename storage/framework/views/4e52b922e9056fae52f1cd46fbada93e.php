<!-- Remove Role Modal -->
<div wire:ignore.self class="modal fade" id="removeRoleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0">
				<div class="mb-4 text-center">
					<h3 class="pb-0 mb-2 role-title text-danger">حذف الدور</h3>
					<p>حذف الدور مع صلاحياته</p>
				</div>
				<!-- Remove role form -->
				<form id="removeRoleForm" class="row g-3">
					<div class="mb-1 col-12">
						<div class="form-floating form-floating-outline">
							<input wire:model.defer='name' type="text" id="RoleNameModal" name="RoleNameModal" autofocus
								class="form-control <?php if(strlen($name) > 0): ?> is-filled <?php endif; ?> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								placeholder="أسم الدور" tabindex="-1" disabled/>
							<label for="RoleNameModal">أسم الدور</label>
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
					<div class="mb-3 col-12">
						<h5>صلاحيات الدور</h5>
						<div class="d-flex justify-content-center">
							<div class="mx-1 text-nowrap fw-semibold">صلاحيات المسؤول 
								<i class="mdi mdi-information-outline" data-bs-toggle="tooltip"
									data-bs-placement="top" title="يسمح بالوصول الكامل إلى النظام"></i>
							</div>
							<div class="mx-1"> 
								<label class="switch switch-primary">
									<input wire:click='CheckAll' type="checkbox" class="switch-input" id="selectAll" <?php echo e($CheckAll); ?> disabled/>
									<span class="switch-toggle-slider">
										<span class="switch-on"></span>
										<span class="switch-off"></span>
									</span>
									<span class="switch-label">تحديد كل الأدوار</span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="row">
							<?php $__currentLoopData = $Permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="mb-3 col-3">
									<label class="switch switch-primary">
										<input wire:model.defer='SetPermission.<?php echo e($Permission->id); ?>' type="checkbox" value="<?php echo e($Permission->name); ?>" class="switch-input" disabled />
										<span class="switch-toggle-slider">
											<span class="switch-on"></span>
											<span class="switch-off"></span>
										</span>
										<span class="switch-label text-dark fw-bolder"><?php echo e($Permission->name); ?></span>
									</label>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="text-center col-12">
						<hr>
						<button wire:click='destroy' type="button" class="btn btn-danger me-sm-3 me-1">حذف الدور</button>
						<button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
							aria-label="Close">تجاهل</button>
					</div>
				</form>
				<!--/ Remove role form -->
			</div>
		</div>
	</div>
</div>
<!--/ Remove Role Modal -->


<?php /**PATH F:\LaravelProjects\JAZContentManagement-Copy\resources\views/livewire/owner/permissions-roles/roles/modals/remove-role.blade.php ENDPATH**/ ?>