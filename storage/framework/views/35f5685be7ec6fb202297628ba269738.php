<?php $__env->startSection('title', 'Add Workers'); ?>
<?php $__env->startSection('vendor-style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <style>
        .sticky-button {
            position: fixed;
            top: 100px;
            left: 40px;
            z-index: 1;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('workers.add-worker')->html();
} elseif ($_instance->childHasBeenRendered('7BatANM')) {
    $componentId = $_instance->getRenderedChildComponentId('7BatANM');
    $componentTag = $_instance->getRenderedChildComponentTagName('7BatANM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7BatANM');
} else {
    $response = \Livewire\Livewire::mount('workers.add-worker');
    $html = $response->html();
    $_instance->logRenderedChild('7BatANM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        /* المحافظة */
        $(document).ready(function() {
            window.initGovernorateDrop = () => {
                $('#governorate_id').select2({
                    placeholder: 'حدد المحافظة',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initGovernorateDrop();
            $('#governorate_id').on('change', function(e) {
                livewire.emit('GetDistricts', e.target.value)
            });
            window.livewire.on('select2', () => {
                initGovernorateDrop();
            });
        });
        /* القضاء */
        $(document).ready(function() {
            window.initDistrictDrop = () => {
                $('#district_id').select2({
                    placeholder: 'حدد القضاء',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initDistrictDrop();
            $('#district_id').on('change', function(e) {
                livewire.emit('GetAreas', e.target.value)
            });
            window.livewire.on('select2', () => {
                initDistrictDrop();
            });
        });
        /* الناحية */
        $(document).ready(function() {
            window.initAreaDrop = () => {
                $('#modalEmployeearea_id').select2({
                    placeholder: 'حدد الناحية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initAreaDrop();
            $('#modalEmployeearea_id').on('change', function(e) {
                livewire.emit('SelectArea', e.target.value)
            });
            window.livewire.on('select2', () => {
                initAreaDrop();
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
        /*  تاريخ البطاقة الوطنية */
        $(document).ready(function() {
            window.initNationalCardDateDrop = () => {
                $('#national_card_date').flatpickr({
                    placeholder: 'تاريخ البطاقة الوطنية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initNationalCardDateDrop();
            $('#national_card_date').on('change', function(e) {
                livewire.emit('employeeNationalCardDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initNationalCardDateDrop();
            });
        });

        /*  تاريخ البطاقة التموينية */
        $(document).ready(function() {
            window.initRationCardDateDrop = () => {
                $('#ration_card_date').flatpickr({
                    placeholder: 'تاريخ البطاقة التموينية',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initRationCardDateDrop();
            $('#ration_card_date').on('change', function(e) {
                livewire.emit('employeeRationCardDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initRationCardDateDrop();
            });
        });

        /*  تاريخ التنظيم */
        $(document).ready(function() {
            window.initOrganizationDateDrop = () => {
                $('#organization_date').flatpickr({
                    placeholder: 'تاريخ التنظيم',
                    //dropdownParent: $('#addPatientModal')
                })
            }
            initOrganizationDateDrop();
            $('#organization_date').on('change', function(e) {
                livewire.emit('employeeOrganizationDate', e.target.value)
            });
            window.livewire.on('flatpickr', () => {
                initOrganizationDateDrop();
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

        window.addEventListener('success', event => {
            Toast.fire({
                icon: 'success',
                title: event.detail.message
            })
        })
        window.addEventListener('error', event => {
            Toast.fire({
                icon: 'error',
                title: event.detail.message,
                timer: 5000,
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\11\Desktop\HR\resources\views/content/Workers/addWorker.blade.php ENDPATH**/ ?>