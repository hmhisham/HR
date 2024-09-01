<?php
    $configData = Helper::appClasses();
    $customizerHidden = 'customizer-hide';
?>



<?php $__env->startSection('title', 'تسجيل الدخول'); ?>

<?php $__env->startSection('vendor-style'); ?>
    <!-- Vendor -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <!-- Page -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fonts/FugazOne/FugazOne-font.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('vendor-script'); ?>
    <script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <script src="<?php echo e(asset('assets/js/pages-auth.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="<?php echo e(url('/')); ?>" class="gap-2 auth-cover-brand d-flex align-items-center">
            <span class="app-brand-logo demo">
                <img src="<?php echo e(asset('assets/img/logo/GCPI.png')); ?>" class="rounded img-fluid" style="width: 90px;">
            </span>
            <span class="app-brand-text demo text-heading fw-bold fs-1">
                <span class="feqrah">GCPI</span>
                <h5 class="mb-2 fw-semibold text-center">موانيء العراق</h5>
            </span>
        </a>
        
        <!-- /Logo -->
        <div class="m-0 authentication-inner row">
            <!-- Login -->
            <div class="px-4 py-4 d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-5">
                <div class="pt-5 mx-auto w-px-400 pt-lg-0">
                    <h4 class="mb-2 fw-semibold text-center">مرحباً بك من جديد</h4>
                    <p class="mb-4 text-center">يرجى تسجيل الدخول إلى حسابك وبدء العمل</p>

                    <form class="mb-3" id="formAuthentication" method="POST" action="<?php echo e(Route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="mb-3 form-floating form-floating-outline">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" autofocus autocomplete="username"
                                placeholder="Enter your email or username" autofocus>
                            <label for="email">البريد الالكتروني</label>
                        </div>
                        <div class="mb-3">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <label for="password">كلمة المرور</label>
                                    </div>
                                    <span class="cursor-pointer input-group-text"><i
                                            class="mdi mdi-eye-off-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-primary d-grid w-100">
                            تسجيل الدخول
                        </button>
                    </form>
                </div>
            </div>
            <!-- /Login -->

           <!-- /Left Section -->
           <div class="p-3 pb-2 d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center">
            <img src="<?php echo e(asset('assets/img/illustrations/GCPI.png')); ?>"
                class="auth-cover-illustration w-95" alt="auth-illustration"
                data-app-light-img="illustrations/GCPI.png"
                data-app-dark-img="illustrations/GCPI.png" />
            
        </div>
        <!-- /Left Section -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/blankLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\HR\resources\views/auth/login.blade.php ENDPATH**/ ?>