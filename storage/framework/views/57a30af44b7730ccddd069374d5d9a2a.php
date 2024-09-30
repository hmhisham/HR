<?php $__env->startSection('title', 'Units'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('units.unit')->html();
} elseif ($_instance->childHasBeenRendered('bbElKyi')) {
    $componentId = $_instance->getRenderedChildComponentId('bbElKyi');
    $componentTag = $_instance->getRenderedChildComponentTagName('bbElKyi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bbElKyi');
} else {
    $response = \Livewire\Livewire::mount('units.unit');
    $html = $response->html();
    $_instance->logRenderedChild('bbElKyi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/pickr/pickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>

    <script>
        /* addSection */
        $(document).ready(function() {
            window.initAddSectionDrop = () => {
                $('#addSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#addunitModal')
                })
            }
            initAddSectionDrop();
            $('#addSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddSectionDrop();
            });
        });
        /* AddBranch */
        $(document).ready(function() {
            window.initAddBranchDrop = () => {
                $('#addBranch').select2({
                    placeholder: 'حدد الشعبة',
                    dropdownParent: $('#addunitModal')
                })
            }
            initAddBranchDrop();
            $('#addBranch').on('change', function(e) {
                livewire.emit('GetBranch', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAddBranchDrop();
            });
        });
        /* editSection */
        $(document).ready(function() {
            window.initEditSectionDrop = () => {
                $('#editSection').select2({
                    placeholder: 'حدد القسم',
                    dropdownParent: $('#editunitModal')
                })
            }
            initEditSectionDrop();
            $('#editSection').on('change', function(e) {
                livewire.emit('GetSection', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditSectionDrop();
            });
        });
        /* editbranch */
        $(document).ready(function() {
            window.initEditBranchDrop = () => {
                $('#editbranch').select2({
                    placeholder: 'حدد الشعبة',
                    dropdownParent: $('#editunitModal')
                })
            }
            initEditBranchDrop();
            $('#editbranch').on('change', function(e) {
                livewire.emit('GetBranch', e.target.value)
            });
            window.livewire.on('select2', () => {
                initEditBranchDrop();
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

        window.addEventListener('UnitModalShow', event => {
            setTimeout(() => {
             $('#id').focus();
               }, 100);
        })

        window.addEventListener('success', event => {
            $('#addunitModal').modal('hide');
            $('#editunitModal').modal('hide');
            $('#removeunitModal').modal('hide');
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            $('#removeunitModal').modal('hide');
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/content/Units/index.blade.php ENDPATH**/ ?>