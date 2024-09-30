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
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('wives.wive')->html();
} elseif ($_instance->childHasBeenRendered('5lExaDN')) {
    $componentId = $_instance->getRenderedChildComponentId('5lExaDN');
    $componentTag = $_instance->getRenderedChildComponentTagName('5lExaDN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('5lExaDN');
} else {
    $response = \Livewire\Livewire::mount('wives.wive');
    $html = $response->html();
    $_instance->logRenderedChild('5lExaDN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
    <script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/pickr/pickr.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src=" <?php echo e(asset('assets/js/app-user-list.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/extended-ui-sweetalert2.js')); ?>"></script>
    <script src=" <?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
    <script>
        //استدعاء اسم الموظف
        $(document).ready(function() {
            window.initWorkersDrop = () => {
                $('#modalWiveworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addwiveModal')
                });
            }
            initWorkersDrop();
            $('#modalWiveworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initWorkersDrop();
            });
        });

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

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode < 48 || ASCIICode > 57)
                return false;
            return true;
        }

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
                icon: 'success',
                title: event.detail.message
            })
        })


        $(document).ready(function() {
            window.initWorkersDrop = () => {
                $('#modalWiveworkers_id').select2({
                    placeholder: 'اختيار',
                    dropdownParent: $('#addwiveModal')
                });
            }
            initWorkersDrop();
            $('#modalWiveworkers_id').on('change', function(e) {
                livewire.emit('SelectWorkersId', e.target.value);
            });
            window.livewire.on('select2', () => {
                initWorkersDrop();
            });
        });


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/content/Wives/index.blade.php ENDPATH**/ ?>