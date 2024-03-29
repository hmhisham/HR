<!-- Show Administrator Modal -->
<div wire:ignore.self class="modal fade" id="ShowCustomerModal" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="p-3 modal-content p-md-5">
			<button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
			<div class="modal-body p-md-0 mt-n4">
				<div class="mb-4 text-center">
					<h3 class="pb-1 mb-2">عرض حساب العميل</h3>
				</div>
                <hr class="text-primary mt-n2">

                <h5 wire:loading wire:target="GetUsersAccount" wire:loading.class="d-flex justify-content-center text-primary">جار معالجة البيانات...</h5>

                <div wire:loading.remove wire:target="GetUsersAccount">
                    <div class="row">
                        <div class="mb-3 col-6">
                            <div class="form-floating form-floating-outline text-primary">
                                <input wire:model='name' type="text" readonly="" class="form-control-plaintext" id="UserName">
                                <label for="UserName">أسم المستخدم</label>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="form-floating form-floating-outline text-primary">
                                <input  wire:model='email' type="text" readonly="" class="form-control-plaintext" id="UserEmail">
                                <label for="UserEmail">البريد الالكتروني</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <div class="form-floating form-floating-outline text-primary">
                                <input  wire:model='UserRolesName' type="text" readonly="" class="form-control-plaintext" id="UserRolesName">
                                <label for="UserRolesName">الدور</label>
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <div class="form-floating form-floating-outline text-primary">
                                <input  wire:model='plan' type="text" readonly="" class="form-control-plaintext" id="UserPlan">
                                <label for="UserPlan">خطة العمل</label>
                            </div>
                            <div class="form-floating form-floating-outline text-primary">
                                <input value="<?php echo e($status ? 'مفعل':'غير مفعل'); ?>" type="text" readonly="" class="form-control-plaintext" id="UserStatus">
                                <label for="UserStatus">حالة المستخدم</label>
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
<?php /**PATH D:\Laravel 2024\HR\HR\resources\views/livewire/users/customers-accounts/modals/show-customer.blade.php ENDPATH**/ ?>