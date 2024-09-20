<?php $__env->startSection('title', 'Add Workers'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/core.css')); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/rtl/theme-default.css')); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/pickr/pickr-themes.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <style>
        .sticky-button {
            position: fixed;
            top: 100px;
            left: 40px;
            z-index: 1;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('workers.add-worker')->html();
} elseif ($_instance->childHasBeenRendered('2XoOOhf')) {
    $componentId = $_instance->getRenderedChildComponentId('2XoOOhf');
    $componentTag = $_instance->getRenderedChildComponentTagName('2XoOOhf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2XoOOhf');
} else {
    $response = \Livewire\Livewire::mount('workers.add-worker');
    $html = $response->html();
    $_instance->logRenderedChild('2XoOOhf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/i18n/i18n.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/typeahead-js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/pickr/pickr.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/forms-pickers.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\HR\resources\views/content/Workers/forms-pickers.blade.php ENDPATH**/ ?>