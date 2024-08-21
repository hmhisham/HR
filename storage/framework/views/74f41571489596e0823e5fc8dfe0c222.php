<!-- Add Permission Modal -->
<div wire:ignore.self class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0">
				<div class="mb-4 text-center">
					<h3 class="pb-1 mb-2">أضف تصريحاً جديداً</h3>
					<p>التصاريح التي يمكنك استخدامها وتعيينها للمستخدمين.</p>
				</div>
				<form  id="addPermissionForm" class="row">
					<div class="mb-3 col-12">
						<div class="form-floating form-floating-outline">
							<input wire:model='name' type="text" id="modalPermissionName" placeholder="اسم التصريح" autofocus
								class="form-control <?php if(strlen($name) > 0): ?> is-filled <?php endif; ?> <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid is-filled <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"/>
							<label for="modalPermissionName">اسم التصريح</label>
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
					
					<div class="text-center col-12 demo-vertical-spacing">
						<button wire:click='store' type="submit" class="btn btn-primary me-sm-3 me-1">إنشاء التصريح</button>
						<button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
							aria-label="Close">تجاهل</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--/ Add Permission Modal --><?php /**PATH F:\LaravelProjects\HR\resources\views/livewire/owner/permissions-roles/permissions/modals/add-permission.blade.php ENDPATH**/ ?>