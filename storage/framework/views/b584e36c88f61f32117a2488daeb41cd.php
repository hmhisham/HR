<?php $__env->startSection('title', 'Wives'); ?>
<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
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
    $html = \Livewire\Livewire::mount('wives.wive')->html();
} elseif ($_instance->childHasBeenRendered('iGHTM4i')) {
    $componentId = $_instance->getRenderedChildComponentId('iGHTM4i');
    $componentTag = $_instance->getRenderedChildComponentTagName('iGHTM4i');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iGHTM4i');
} else {
    $response = \Livewire\Livewire::mount('wives.wive');
    $html = $response->html();
    $_instance->logRenderedChild('iGHTM4i', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        toast: true
        , position: 'top-start'
        , showConfirmButton: false
        , timer: 3000
        , timerProgressBar: true
        , didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    window.addEventListener('WiveModalShow', event => {
        setTimeout(() => {
            $('#id').focus();
        }, 100);
    })

    window.addEventListener('success', event => {
        $('#addwiveModal').modal('hide');
        $('#editwiveModal').modal('hide');
        $('#removewiveModal').modal('hide');
        Toast.fire({
            icon: 'success'
            , title: event.detail.message
        })
    })

    /* الجهات  */

    $(document).ready(function() {
    // Initialize the select2 dropdown for selecting the organization name
    window.initDepartmentDrop = () => {
        $('#modalThanksgrantor').select2({
            placeholder: 'حدد الموظف',
            dropdownParent: $('#addthankModal')
        });
    };

    // Call the initialization function
    initDepartmentDrop();

    // Emit the Livewire event when a new organization is selected
    $('#modalThanksgrantor').on('change', function(e) {
        livewire.emit('SelectGrantor', e.target.value);
    });

    // Re-initialize select2 when necessary (e.g., after Livewire updates)
    window.livewire.on('select2', () => {
        initDepartmentDrop();
    });

    // Listen for error events and display a Toast message
    window.addEventListener('error', event => {
        $('#removewiveModal').modal('hide'); // Hide the modal on error
        Toast.fire({
            icon: 'error',
            title: event.detail.message,
            timer: 5000
        });
    });
});


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel 2024\HR\HR\resources\views/content/Wives/index.blade.php ENDPATH**/ ?>