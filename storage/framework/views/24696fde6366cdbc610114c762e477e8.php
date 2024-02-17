<?php $__env->startSection('title', 'ادوار المستخدمين'); ?>

<?php $__env->startSection('vendor-style'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('owner.permissions-roles.roles.account-roles')->html();
} elseif ($_instance->childHasBeenRendered('bkQe6FE')) {
    $componentId = $_instance->getRenderedChildComponentId('bkQe6FE');
    $componentTag = $_instance->getRenderedChildComponentTagName('bkQe6FE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bkQe6FE');
} else {
    $response = \Livewire\Livewire::mount('owner.permissions-roles.roles.account-roles');
    $html = $response->html();
    $_instance->logRenderedChild('bkQe6FE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
	<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
	<script src="<?php echo e(asset('assets/js/app-access-roles.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/modal-add-role.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>

	<script>
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
		window.addEventListener('RoleModalShow', event => 
            {
                $("#RoleNameModal").focus();
            }
        );

		window.addEventListener('RoleAddSuccess', 
            event => {
				Toast.fire({
					icon: 'success',
					title: 'تم اضافة الدور بنجاح'
				})

				$("#RoleNameModal").focus();
            }
        );
		window.addEventListener('RoleAddError', 
            event => {
				Toast.fire({
					icon: 'error',
					title: 'لم يتم تحديد صلاحيات للدور'
				})

				$("#RoleNameModal").focus();
            }
        );
		window.addEventListener('RoleUpdateSuccess', 
            event => {
                $('#editRoleModal').modal('hide');

				Toast.fire({
					icon: 'success',
					title: 'تم تعديل الدور بنجاح'
				})
            }
        );
		window.addEventListener('RoleDestroySuccess', 
            event => {
                $('#removeRoleModal').modal('hide');

				Toast.fire({
					icon: 'success',
					title: 'تم حذف الدور بنجاح'
				})
            }
        );
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel 2024\HR\HR\resources\views/content/Owner/Permission&Roles/Roles/index.blade.php ENDPATH**/ ?>