<?php $__env->startSection('title', 'Childrens'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>">
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>">
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>">
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')); ?>">
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
    <link rel = "stylesheet" href="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('childrens.children')->html();
} elseif ($_instance->childHasBeenRendered('LiiStKn')) {
    $componentId = $_instance->getRenderedChildComponentId('LiiStKn');
    $componentTag = $_instance->getRenderedChildComponentTagName('LiiStKn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LiiStKn');
} else {
    $response = \Livewire\Livewire::mount('childrens.children');
    $html = $response->html();
    $_instance->logRenderedChild('LiiStKn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <script src=" <?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/pickr/pickr.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src=" <?php echo e(asset('assets/js/app-user-list.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
    <script>
        /* تاريخ التولد */
        $(document).ready(function() {
            window.initBirthDateDrop = () => {
                $('#birth_date').flatpickr({
                    placeholder: 'تاريخ التولد',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initBirthDateDrop();
            $('#birth_date').on('change', function(e) {
                livewire.emit('employeeBirthDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initBirthDateDrop();
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

        window.addEventListener('ChildrenModalShow', event => {
            setTimeout(() => {
                $('#id').focus();
            }, 100);
        })

        window.addEventListener('success', event => {
            $('#addchildrenModal').modal('hide');
            $('#editchildrenModal').modal('hide');
            $('#removechildrenModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })




        window.addEventListener('error', event => {
            $('#removechildrenModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })

        $(document).ready(function() {
            window.initWivesDrop = () => {
                $('#modalChildrenwives_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addchildrenModal')
                });
            }
            initWivesDrop();
            $('#modalChildrenwives_id').on('change', function(e) {
                livewire.emit('SelectWivesId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initWivesDrop();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/content/Childrens/index.blade.php ENDPATH**/ ?>