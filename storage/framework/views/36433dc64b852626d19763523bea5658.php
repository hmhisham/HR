<?php $__env->startSection('title', 'انشاء حدث جديد'); ?>

<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/typography.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/katex.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/quill/editor.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/select2/select2.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/dropzone/dropzone.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/tagify/tagify.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/animate-css/animate.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
<style>
    .drop-container {
        position: relative;
        display: flex;
        gap: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        padding: 20px;
        border-radius: 10px;
        border: 2px dashed #555;
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover,
    .drop-container.drag-active {
        background: #eee;
        border-color: #111;
    }

    .drop-container:hover .drop-title,
    .drop-container.drag-active .drop-title {
        color: #222;
    }

    .drop-title {
        color: #444;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        transition: color .2s ease-in-out;
    }

    input[type=file] {
        width: 350px;
        max-width: 100%;
        color: #444;
        padding: 5px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #555;
    }

    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
        background: #0d45a5;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('events.edit-events', ['eventID' => $eventID])->html();
} elseif ($_instance->childHasBeenRendered('PjB1ktJ')) {
    $componentId = $_instance->getRenderedChildComponentId('PjB1ktJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('PjB1ktJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PjB1ktJ');
} else {
    $response = \Livewire\Livewire::mount('events.edit-events', ['eventID' => $eventID]);
    $html = $response->html();
    $_instance->logRenderedChild('PjB1ktJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/quill/katex.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/quill/quill.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/dropzone/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/tagify/tagify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/jquery-sticky/jquery-sticky.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/app-ecommerce-product-add.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form-layouts.js')); ?>"></script>

    <script>

        function onlyNumberKey(evt) {
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && (ASCIICode < 45 || ASCIICode > 47))
                return false;
            return true;
        }

        /*function fileUpload() {
            return {
                isDropping: false,
                isUploading: false,
                progress: 0,
                handleFileSelect(event) {
                    if (event.target.files.length) {
                        console.log(event.target.files)
                    }
                },
            }
        }*/

        $(document).ready(function() {
            window.initEventStartDateDrop=()=>{
                $("#EventStartDate").flatpickr({
                    dateFormat: "Y-m-d",
                    disableMobile: false,
                    minDate: new Date(),
                    //mode: 'single', //"single", "multiple", or "range"
                    //dropdownParent: $('#addStatementModal')
                });
            }
            initEventStartDateDrop();
            $('#EventStartDate').on('change', function (e) {
                livewire.emit('EventStartDate', e.target.value)
            });
            window.livewire.on('EventStartDate',()=>{
                initEventStartDateDrop();
            });
        });

        $(document).ready(function() {
            window.initEventEndDateDrop=()=>{
                $("#EventEndDate").flatpickr({
                    dateFormat: "Y-m-d",
                    disableMobile: false,
                    minDate: new Date(),
                    //dropdownParent: $('#addStatementModal')
                });
            }
            initEventEndDateDrop();
            $('#EventEndDate').on('change', function (e) {
                livewire.emit('EventEndDate', e.target.value)
            });
            window.livewire.on('EventEndDate',()=>{
                initEventEndDateDrop();
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

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/content/Events/Events/edit.blade.php ENDPATH**/ ?>