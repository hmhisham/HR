<?php
    $configData = Helper::appClasses();
    $isFront = 'front'
?>

<?php $__env->startSection('layoutContent'); ?>

    

    <?php echo $__env->make('layouts/sections/navbar/navbar-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="preloader">
        <div id="loading-wrapper" class="show">
            <div id="loading-text">
                <img src="<?php echo e(asset("assets/img/logos/logojaz2.png")); ?>" alt="">
            </div>
            <div id="loading-content"></div>
        </div>
    </div>

    <!-- Sections:Start -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- / Sections:End -->

    <?php echo $__env->make('layouts/sections/footer/footer-front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layouts/layoutFront.blade.php ENDPATH**/ ?>