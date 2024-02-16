<?php $__env->startSection('title', 'تصاريح حسابات المستخدمين'); ?>

<?php $__env->startSection('vendor-style'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('owner.permissions-roles.permissions.account-permissions')->html();
} elseif ($_instance->childHasBeenRendered('5um8JU1')) {
    $componentId = $_instance->getRenderedChildComponentId('5um8JU1');
    $componentTag = $_instance->getRenderedChildComponentTagName('5um8JU1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5um8JU1');
} else {
    $response = \Livewire\Livewire::mount('owner.permissions-roles.permissions.account-permissions');
    $html = $response->html();
    $_instance->logRenderedChild('5um8JU1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
	<script src="<?php echo e(asset('assets/js/app-access-permission.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/modal-add-permission.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/modal-edit-permission.js')); ?>"></script>

	<script src="<?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>

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

		window.addEventListener('PermissionModalShow', event => 
            {
                $("#modalPermissionName").focus();
            }
        );
		window.addEventListener('PermissionAddSuccess', 
            event => {
				Toast.fire({
					icon: 'success',
					title: 'تم اضافة التصريح بنجاح'
				})

				$("#modalPermissionName").focus();
            }
        );
		window.addEventListener('PermissionUpdateSuccess', 
            event => {
                $('#editPermissionModal').modal('hide');

				Toast.fire({
					icon: 'success',
					title: 'تم تعديل التصريح بنجاح'
				})

				$("#modalPermissionName").focus();
            }
        );
		window.addEventListener('PermissionDestroySuccess', 
            event => {
                $('#removePermissionModal').modal('hide');

				Toast.fire({
					icon: 'success',
					title: 'تم حذف التصريح بنجاح'
				})
            }
        );
		window.addEventListener('PermissionNotFond', 
            event => {
                Toast.fire({
					icon: 'error',
					title: 'لم يتم العثور على تصريح'
				})
            }
        );
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement-Copy\resources\views/content/Owner/Permission&Roles/Permissions/index.blade.php ENDPATH**/ ?>