<?php $__env->startSection('title', 'Specializations'); ?>
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
    $html = \Livewire\Livewire::mount('specializations.specialization')->html();
} elseif ($_instance->childHasBeenRendered('A516FZ5')) {
    $componentId = $_instance->getRenderedChildComponentId('A516FZ5');
    $componentTag = $_instance->getRenderedChildComponentTagName('A516FZ5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('A516FZ5');
} else {
    $response = \Livewire\Livewire::mount('specializations.specialization');
    $html = $response->html();
    $_instance->logRenderedChild('A516FZ5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

        //add graduations
        $(document).ready(function() {
            window.initAddGraduationsDrop = () => {
                $('#addgraduations').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addspecializationModal')
                });
            }
            initAddGraduationsDrop();
            $('#addgraduations').on('change', function(e) {
                livewire.emit('SelectGraduationsId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initAddGraduationsDrop();
            });
        });
        //edit graduations
        $(document).ready(function() {
            window.initEditGraduationsDrop = () => {
                $('#editgraduations').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#editspecializationModal')
                });
            }
            initEditGraduationsDrop();
            $('#editgraduations').on('change', function(e) {
                livewire.emit('SelectGraduationsId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initEditGraduationsDrop();
            });
        });
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

        window.addEventListener('SpecializationModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addspecializationModal').modal('hide');
            $('#editspecializationModal').modal('hide');
            $('#removespecializationModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removespecializationModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/content/Specializations/index.blade.php ENDPATH**/ ?>