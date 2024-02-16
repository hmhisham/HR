<!-- BEGIN: Theme CSS-->
<!-- Fonts -->


<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/fonts/fontawesome.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/fonts/materialdesignicons.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/fonts/Tajawal/Tajawal-font.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/libs/node-waves/node-waves.css'))); ?>" />

<!-- Core CSS -->
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/css' .$configData['rtlSupport'] .'/core' .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css'))); ?>" class="<?php echo e($configData['hasCustomizer'] ? 'template-customizer-core-css' : ''); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/css' .$configData['rtlSupport'] .'/' .$configData['theme'] .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css'))); ?>" class="<?php echo e($configData['hasCustomizer'] ? 'template-customizer-theme-css' : ''); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/css/demo.css'))); ?>" />

<!-- Vendor Styles -->
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/libs/typeahead-js/typeahead.css'))); ?>" />
<link rel="stylesheet" href="<?php echo e(asset(mix('assets/vendor/css/custom.css'))); ?>" />

<?php echo $__env->yieldContent('vendor-style'); ?>

<!-- Page Styles -->
<?php echo $__env->yieldContent('page-style'); ?>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layouts/sections/styles.blade.php ENDPATH**/ ?>