<?php $__env->startSection('title', 'Graduations'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet"href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
    <link rel = "stylesheet"href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
    <link rel=" stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
    <link rel=" stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')); ?>">
    <link rel=" stylesheet" href=" <?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
    <link rel=" stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
    <link rel=" stylesheet" href=" <?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
    <link rel=" stylesheet" href=" <?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
    <link rel=" stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
        <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?> 
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('graduations.graduation')->html();
} elseif ($_instance->childHasBeenRendered('4yoDCyG')) {
    $componentId = $_instance->getRenderedChildComponentId('4yoDCyG');
    $componentTag = $_instance->getRenderedChildComponentTagName('4yoDCyG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('4yoDCyG');
} else {
    $response = \Livewire\Livewire::mount('graduations.graduation');
    $html = $response->html();
    $_instance->logRenderedChild('4yoDCyG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src=" <?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/cleavejs/cleave.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/cleavejs/cleave-phone.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src=" <?php echo e(asset('assets/js/app-user-list.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
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

        window.addEventListener('GraduationModalShow', event => {
            setTimeout(() => {
             $('#id').focus();
               }, 100);  
        })
      
        window.addEventListener('success', event => {
            $('#addgraduationModal').modal('hide');
            $('#editgraduationModal').modal('hide');
            $('#removegraduationModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removegraduationModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })
           
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\HR\resources\views/content/Graduations/index.blade.php ENDPATH**/ ?>