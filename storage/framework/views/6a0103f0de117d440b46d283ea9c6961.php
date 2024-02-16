
<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('assetsWebsite/vendor/js/dropdown-hover.js')); ?>"></script>
<script src="<?php echo e(asset('assetsWebsite/vendor/js/mega-dropdown.js')); ?>"></script>
<script src="<?php echo e(asset(mix('assetsWebsite/vendor/libs/popper/popper.js'))); ?>"></script>
<script src="<?php echo e(asset(mix('assetsWebsite/vendor/js/bootstrap.js'))); ?>"></script>

<script src="<?php echo e(asset(mix('assetsWebsite/vendor/js/preloader.js'))); ?>"></script>

<?php echo $__env->yieldContent('vendor-script'); ?>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo e(asset(mix('assetsWebsite/js/front-main.js'))); ?>"></script>
<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<?php echo $__env->yieldPushContent('pricing-script'); ?>
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<?php echo $__env->yieldContent('page-script'); ?>
<!-- END: Page JS-->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layoutsWebsite/sections/scriptsFront.blade.php ENDPATH**/ ?>