<?php $__env->startSection('title', 'الاحداث'); ?>

<?php $__env->startSection('vendor-style'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/spinkit/spinkit.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/libs/nouislider/nouislider.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/libs/swiper/swiper.css')); ?>"/>

    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/css/pages/front-page-landing.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('slideshow.slideshow')->html();
} elseif ($_instance->childHasBeenRendered('JChLgwh')) {
    $componentId = $_instance->getRenderedChildComponentId('JChLgwh');
    $componentTag = $_instance->getRenderedChildComponentTagName('JChLgwh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JChLgwh');
} else {
    $response = \Livewire\Livewire::mount('slideshow.slideshow');
    $html = $response->html();
    $_instance->logRenderedChild('JChLgwh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/block-ui/block-ui.js')); ?>"></script>

    <script src="<?php echo e(asset('assetsWebsite/vendor/libs/nouislider/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('assetsWebsite/vendor/libs/swiper/swiper.js')); ?>"></script>
    <script src="<?php echo e(asset('assetsWebsite/vendor/js/swiper/swiper-element-bundle.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
	<script src="<?php echo e(asset('assets/js/app-user-list.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
	<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/extended-ui-blockui.js')); ?>"></script>

    <script src="<?php echo e(asset('assetsWebsite/js/front-page-landing.js')); ?>"></script>

	<script>

		/* $(document).ready(function() {
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
        }); */

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

		window.addEventListener('CustomerModalShow', event => {
			$('#modalCustomerName').focus();
        })

		window.addEventListener('success', event => {
			$('#ChangeActivatedModal').modal('hide');
			$('#SendEmailModal').modal('hide');
			Toast.fire({
				icon: 'success',
				title: event.detail.message
			})
        })
		window.addEventListener('error', event => {
			$('#RmoveUserModal').modal('hide');
			Toast.fire({
				icon: 'error',
				title: event.detail.message,
				timer: 5000,
			})
			//$('#EditUserModal').modal('show');
        })
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/content/Slideshow/index.blade.php ENDPATH**/ ?>