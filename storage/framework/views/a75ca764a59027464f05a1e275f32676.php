<?php if(isset($pageConfigs)): ?>
    <?php echo Helper::updatePageConfig($pageConfigs); ?>

<?php endif; ?>
<?php
    $configData = Helper::appClasses();
?>



<?php
    /* Display elements */
    $contentNavbar = $contentNavbar ?? true;
    $isNavbar = $isNavbar ?? true;
    $isMenu = $isMenu ?? true;
    $isFlex = $isFlex ?? false;
    $isFooter = $isFooter ?? true;
    $customizerHidden = $customizerHidden ?? '';
    $pricingModal = $pricingModal ?? false;

    /* HTML Classes */
    $navbarDetached = 'navbar-detached';
    $menuFixed = isset($configData['menuFixed']) ? $configData['menuFixed'] : '';
    $navbarFixed = isset($configData['navbarFixed']) ? $configData['navbarFixed'] : '';
    $footerFixed = isset($configData['footerFixed']) ? $configData['footerFixed'] : '';
    $menuCollapsed = isset($configData['menuCollapsed']) ? $configData['menuCollapsed'] : '';
    $menuFlipped = isset($configData['menuFlipped']) ? $configData['menuFlipped'] : '';
    /* $menuOffcanvas = (isset($configData['menuOffcanvas']) ? $configData['menuOffcanvas'] : ''); */

    /* Content classes */
    $container = $container ?? 'container-xxl';

?>

<?php $__env->startSection('layoutContent'); ?>
    <div class="layout-wrapper layout-content-navbar <?php echo e($isMenu ? '' : 'layout-without-menu'); ?>">
        <div class="layout-container">

            <?php if($isMenu): ?>

                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', ['OWNER', 'Administrator', 'Supervisor', 'Employee'])): ?>
                    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                        <div class="app-brand demo">
                            <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
                                <span class="app-brand-logo demo">
                                    <img src="<?php echo e(asset('assets/img/logo/GCPI.png')); ?>" class="rounded img-fluid" style="width: 50px;">

                                </span>
                                <span class="app-brand-text demo menu-text fw-bold ms-2 fs-5"><?php echo e(trans('sidebar.AppName')); ?></span>
                            </a>

                            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                                        fill="currentColor" fill-opacity="0.6" />
                                    <path
                                        d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                                        fill="currentColor" fill-opacity="0.38" />
                                </svg>
                            </a>
                        </div>

                        <div class="menu-inner-shadow"></div>

                        <ul class="py-1 menu-inner">


                            <li class="menu-item <?php echo e(request()->is('/') ? 'active' : ''); ?>">
                                <a href="<?php echo e(Route('Dashboard')); ?>" class="menu-link">
                                    <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                                    <div><?php echo e(trans('sidebar.dashboard')); ?></div>
                                </a>
                            </li>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
                                <li class="menu-item <?php echo e(request()->is('Administrators-Accounts') ? 'active open' : (request()->is('Customers-Accounts') ? 'active open' : '')); ?>">
                                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                                        <i class='menu-icon tf-icons mdi mdi-account-outline'></i>
                                        <span class="menu-title"><?php echo e(trans('sidebar.Users accounts')); ?></span>
                                    </a>
                                    <ul class="menu-sub">
                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', ['OWNER', 'Administrator', 'Supervisor'])): ?>
                                            <li class="menu-item <?php echo e(request()->is('Administrators-Accounts') ? 'active' : ''); ?>">
                                                <a href="<?php echo e(Route('Administrators-Accounts.index')); ?>" class="menu-link">
                                                    <i class=""></i>
                                                    <div><?php echo e(trans('sidebar.Admin accounts')); ?></div>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li class="menu-item <?php echo e(request()->is('Customers-Accounts') ? 'active' : ''); ?>">
                                            <a href="<?php echo e(Route('Customers-Accounts.index')); ?>" class="menu-link">
                                                <i class=""></i>
                                                <div><?php echo e(trans('sidebar.Customer accounts')); ?></div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>


                            <?php if(Auth::check()): ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions-roles')): ?>
                                    <li class="menu-item <?php echo e(request()->is('Permissions&Roles/Account-Permissions') ? 'active open' : (request()->is('Permissions&Roles/Account-Roles') ? 'active open' : '')); ?>">
                                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                                            <i class='menu-icon tf-icons mdi mdi-shield-account'></i>
                                            <span class="menu-title"><?php echo e(trans('sidebar.Permissions and roles')); ?></span>
                                        </a>
                                        <ul class="menu-sub">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions')): ?>
                                                <li class="menu-item <?php echo e(request()->is('Permissions&Roles/Account-Permissions') ? 'active' : ''); ?>">
                                                    <a href="<?php echo e(Route('Account-Permissions.index')); ?>" class="menu-link">
                                                        <i class=""></i>
                                                        <div><?php echo e(trans('sidebar.Permissions')); ?></div>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles')): ?>
                                                <li class="menu-item <?php echo e(request()->is('Permissions&Roles/Account-Roles') ? 'active' : ''); ?>">
                                                    <a href="<?php echo e(Route('Account-Roles.index')); ?>" class="menu-link">
                                                        <i class=""></i>
                                                        <div><?php echo e(trans('sidebar.Roles')); ?></div>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            <?php endif; ?>


            <!-- Layout page -->
            <div class="layout-page">




                <!-- BEGIN: Navbar-->
                <?php if($isNavbar): ?>
                    <?php echo $__env->make('layouts/sections/navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <!-- END: Navbar-->


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <?php if($isFlex): ?>
                        <div class="<?php echo e($container); ?> d-flex align-items-stretch flex-grow-1 p-0">
                        <?php else: ?>
                            <div class="<?php echo e($container); ?> flex-grow-1 container-p-y">
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>

                    <!-- pricingModal -->
                    <?php if($pricingModal): ?>
                        <?php echo $__env->make('_partials/_modals/modal-pricing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <!--/ pricingModal -->

                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php if($isFooter): ?>
                    <?php echo $__env->make('layouts/sections/footer/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <?php if($isMenu): ?>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    <?php endif; ?>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/commonMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\LaravelProjects\JAZContentManagement-Copy\resources\views/layouts/contentNavbarLayout.blade.php ENDPATH**/ ?>
