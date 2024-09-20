<?php if(isset($pageConfigs)): ?>
    <?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>
<?php

    $configData = Helper::appClasses();

    /* Display elements */
    $customizerHidden = ($customizerHidden ?? '');

?>



<?php $__env->startSection('layoutContent'); ?>

    <!-- Content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!--/ Content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/layouts/blankLayout.blade.php ENDPATH**/ ?>