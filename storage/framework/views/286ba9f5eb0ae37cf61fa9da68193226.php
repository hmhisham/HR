<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/fonts/materialdesignicons.css'))); ?>" />

<!-- Core CSS -->
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css' .$configData['rtlSupport'] .'/core.css'))); ?>" class="<?php echo e($configData['hasCustomizer'] ? 'template-customizer-core-css' : ''); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css' .$configData['rtlSupport'] .'/' .$configData['theme'].'.css'))); ?>" class="<?php echo e($configData['hasCustomizer'] ? 'template-customizer-theme-css' : ''); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/css/demo.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css/pages/front-page.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css/custom.css'))); ?>" />

<link href="<?php echo e(asset('assetsWebsite/fonts/Tajawal.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assetsWebsite/fonts/Roboto.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assetsWebsite/fonts/materialdesignicons.css')); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css/preloader.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assetsWebsite/vendor/css/style.css'))); ?>" />
<!-- Vendor Styles -->
<?php echo $__env->yieldContent('vendor-style'); ?>


<!-- Page Styles -->
<?php echo $__env->yieldContent('page-style'); ?>

<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layoutsWebsite/sections/stylesFront.blade.php ENDPATH**/ ?>