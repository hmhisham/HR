<?php
    $configData = Helper::appClasses();
?>



<?php $__env->startSection('title', trans('navbar.home')); ?>

<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/libs/nouislider/nouislider.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/libs/swiper/swiper.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assetsWebsite/vendor/css/pages/front-page-landing.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('website.home.home')->html();
} elseif ($_instance->childHasBeenRendered('0awPQh3')) {
    $componentId = $_instance->getRenderedChildComponentId('0awPQh3');
    $componentTag = $_instance->getRenderedChildComponentTagName('0awPQh3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0awPQh3');
} else {
    $response = \Livewire\Livewire::mount('website.home.home');
    $html = $response->html();
    $_instance->logRenderedChild('0awPQh3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assetsWebsite/vendor/libs/nouislider/nouislider.js')); ?>"></script>
    <script src="<?php echo e(asset('assetsWebsite/vendor/libs/swiper/swiper.js')); ?>"></script>
    <script src="<?php echo e(asset('assetsWebsite/vendor/js/swiper/swiper-element-bundle.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assetsWebsite/js/front-page-landing.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutsWebsite/layoutFront', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/content/Website/home.blade.php ENDPATH**/ ?>