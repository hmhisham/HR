<!-- Edit Permission Modal -->
<div wire:ignore.self class="modal fade" id="editPermissionModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0">
				<div class="mb-4 text-center">
					<h3 class="pb-1 mb-2">تحرير التصريح</h3>
					<p>تعديل التصريح وفقا لمتطلباتك.</p>
				</div>
				<div class="alert alert-warning" role="alert">
					<h6 class="mb-2 alert-heading">تحذير</h6>
					<p class="mb-0">من خلال تحرير اسم التصريح ، قد تكسر وظائف تصاريح النظام. يرجى التأكد من أنك متأكد تمامًا قبل المتابعة.</p>
				</div>
				<form id="editPermissionForm" class="pt-2 row" onsubmit="return false">
					
					<div class="mb-3 col-sm-9">
						<div class="form-floating form-floating-outline">
							<input wire:model='name' type="text" id="editPermissionName" name="editPermissionName" class="form-control <?php if(strlen($name) > 0): ?> is-filled <?php endif; ?> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>""
								placeholder="اسم التصريح" tabindex="-1" />
							<label for="editPermissionName">اسم التصريح</label>
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
					<div class="mt-1 mb-3 col-sm-3">
						<button wire:click='update' type="submit" class="mt-1 btn btn-primary mt-sm-0">تعديل</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
<!--/ Edit Permission Modal --><?php /**PATH C:\Users\11\Desktop\HR\resources\views/livewire/owner/permissions-roles/permissions/modals/edit-permission.blade.php ENDPATH**/ ?>