<?php $__env->startSection('title', 'حسابات المستخدمين'); ?>

<?php $__env->startSection('vendor-style'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.customers-accounts.customers-accounts')->html();
} elseif ($_instance->childHasBeenRendered('qTHrObf')) {
    $componentId = $_instance->getRenderedChildComponentId('qTHrObf');
    $componentTag = $_instance->getRenderedChildComponentTagName('qTHrObf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qTHrObf');
} else {
    $response = \Livewire\Livewire::mount('users.customers-accounts.customers-accounts');
    $html = $response->html();
    $_instance->logRenderedChild('qTHrObf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
	<script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
	<script src="<?php echo e(asset('assets/js/app-user-list.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>

	<script>

		$(document).ready(function() {
            window.initAdministratorRolesDrop=()=>{
                $('#SearchRole').select2({
					placeholder: 'حدد دور المشرف'
				})
            }
            initAdministratorRolesDrop();
            $('#SearchRole').on('change', function (e) {
                livewire.emit('SelectAdministratorRoles', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initAdministratorRolesDrop();
            });
        });

		$(document).ready(function() {
            window.initCreateUserStoreDrop=()=>{
                $('#CreateUserStore').select2({
					placeholder: 'حدد المحل',
					dropdownParent: $('#addUserModal')
				})
            }
            initCreateUserStoreDrop();
            $('#CreateUserStore').on('change', function (e) {
                livewire.emit('SelectUserStore', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initCreateUserStoreDrop();
            });
        });
		$(document).ready(function() {
            window.initUserStoreDrop=()=>{
                $('#UserStore').select2({
					placeholder: 'حدد المحل',
					dropdownParent: $('#EditUserModal')
				})
            }
            initUserStoreDrop();
            $('#UserStore').on('change', function (e) {
                livewire.emit('SelectUserStore', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initUserStoreDrop();
            });
        });

		$(document).ready(function() {
            window.initAdministratorStatusDrop=()=>{
                $('#SearchStatus').select2({
					placeholder: 'حدد حالة الحساب'
				})
            }
            initAdministratorStatusDrop();
            $('#SearchStatus').on('change', function (e) {
                livewire.emit('SelectAdministratorStatus', e.target.value)
            });
            window.livewire.on('select2',()=>{
                initAdministratorStatusDrop();
            });
        });

		const Toast = Swal.mixin({
			toast: true,
			position: 'top-start',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		window.addEventListener('success', event => {
			$('#addCustomerModal').modal('hide');
			$('#EditCustomerModal').modal('hide');
			Toast.fire({
				icon: 'success',
				title: event.detail.message
			})
        })
		window.addEventListener('error', event => {
			$('#RmoveCustomerModal').modal('hide');
			Toast.fire({
				icon: 'error',
				title: event.detail.message,
				timer: 5000,
			})
			//$('#EditUserModal').modal('show');
        })
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel 2024\HR\HR\resources\views/content/Users/CustomersAccounts/index.blade.php ENDPATH**/ ?>