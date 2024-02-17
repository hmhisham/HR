<?php
    $customizerHidden = 'customizer-hide';
    $configData = Helper::appClasses();
?>



<?php $__env->startSection('title', 'وصول خاطئ'); ?>

<?php $__env->startSection('page-style'); ?>
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-misc.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row row-cols-1 row-cols-lg-2 g-4 center p-5 m-4">
        <div class="col">
            <h2 class="mb-4 mx-2 text-center">403 - تم رفض الوصول</h2>
            <h4 class="mb-4 mx-2 text-center">عفوًا، ليس لديك إذن للوصول إلى هذه الصفحة.</h4>
            <h6 class="mx-2 text-center">
                <a href="<?php echo e(Route('login')); ?>" class="mx-2 text-center btn btn-primary waves-effect waves-light">تسجيل الدخول</a>
            </h6>

            
        </div>
        <div class="col text-center">
            <img src="<?php echo e(asset('assets/img/illustrations/misc-coming-soon-illustration.png')); ?>" alt="misc-coming-soon" class="img-fluid zindex-1" width="190">
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel 2024\HR\HR\resources\views/errors/403.blade.php ENDPATH**/ ?>