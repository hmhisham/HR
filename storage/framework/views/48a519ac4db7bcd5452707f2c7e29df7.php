<?php
    $currentRouteName = Route::currentRouteName();
    $activeRoutes = ['front-pages-pricing', 'front-pages-payment', 'front-pages-checkout', 'front-pages-help-center'];
    $activeClass = in_array($currentRouteName, $activeRoutes) ? 'active' : '';
?>
    <!-- Navbar: Start -->
<nav class="layout-navbar  shadow-none py-0" style="margin-bottom: 120px">
    <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-3 py-1 px-md-4">
        <!-- Menu logo wrapper: Start -->
        <div class="navbar-brand app-brand demo d-flex py-0  me-4">
            <!-- Mobile menu toggle: Start-->
            <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="tf-icons mdi mdi-menu mdi-24px align-middle"></i>
            </button>
            <!-- Mobile menu toggle: End-->
            <a href="<?php echo e(url('front-pages/landing')); ?>" class="app-brand-link">
                <span class="app-brand-logo demo">
                    
                    <img src="<?php echo e(asset("assets/img/logos/logojaz2.png")); ?>" style="height: 100px">
                </span>
                
            </a>
        </div>
        <!-- Menu logo wrapper: End -->
        <!-- Menu wrapper: Start -->
        <div class="collapse navbar-collapse landing-nav-menu d-flex justify-content-center" id="navbarSupportedContent">
            <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tf-icons mdi mdi-close"></i>
            </button>
            <ul class="navbar-nav  p-3 p-lg-0">
                <li class="nav-item">
                    <a href="<?php echo e(Route('Home')); ?>" class="nav-link fw-medium <?php echo e(request()->is('/') ? 'border-bottom-2 text-dark fw-bolder' : ''); ?>" aria-current="page">
                        <?php echo e(trans('navbar.home')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('front-pages/landing')); ?>#landingFeatures" class="nav-link fw-medium">
                        <?php echo e(trans('navbar.Worldwide')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="<?php echo e(url('front-pages/landing')); ?>#landingTeam">
                        <?php echo e(trans('navbar.CorporateGovernance')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="<?php echo e(url('front-pages/landing')); ?>#landingFAQ">
                        <?php echo e(trans('navbar.Importantlinks')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium text-nowrap" href="<?php echo e(url('front-pages/landing')); ?>#landingContact">
                        <?php echo e(trans('navbar.AllEvents')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="<?php echo e(url('/')); ?>" target="_blank">
                        <?php echo e(trans('navbar.Venues')); ?>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="<?php echo e(url('/')); ?>" target="_blank">
                        <?php echo e(trans('navbar.ContactUs')); ?>

                    </a>
                </li>
                
            </ul>
        </div>
        <div class="landing-menu-overlay d-lg-none"></div>
        <!-- Menu wrapper: End -->
        <!-- Toolbar: Start -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <?php if($configData['hasCustomizer'] == true): ?>
                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class='mdi mdi-24px'></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                <span class="align-middle"><i class='mdi mdi-weather-sunny me-2'></i>Light</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                <span class="align-middle"><i class="mdi mdi-weather-night me-2"></i>Dark</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                <span class="align-middle"><i class="mdi mdi-monitor me-2"></i>System</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- / Style Switcher-->
            <?php endif; ?>

            <!-- navbar button: Start -->
                <!-- Style Switcher -->
                <li class="nav-item">
                    <a class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow"
                       href="javascript:void(0);">
                        <i class='mdi mdi-24px'></i>
                    </a>
                </li>
                <!--/ Style Switcher -->

                <!-- Cart -->
                <li class="nav-item navbar-dropdown dropdown-cart dropdown">
                    <a class="nav-link m-0 p-0  hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="mdi mdi-cart-outline mdi-30px"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            Item 1
                        </li>
                        <li>
                            Item 2
                        </li>
                    </ul>
                </li>
                <!-- Language -->
                <li class="nav-item dropdown-language dropdown">
                    <a class="nav-link m-0 p-0  rounded-pill btn-icon  hide-arrow"
                       href="javascript:void(0);" data-bs-toggle="dropdown">
                        
                        <?php if(app()->getLocale() == 'ar'): ?>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACT0lEQVR4nO2Wy2sTURjFD2j/AB/1D3BrrcWUtkJgcj9i1u6EEkQ32YmvFHHTRRoaRRBRCoJB0xS0ClUKdlXFGrWK1BqamZRIrWlihSbpJAN1m09usKWSZJrHBAU9cJjLfcxvvnPvMAP8l4nmgLY4cEwFzmjAgLRsx4E+OQarpQI9KjCqAT80gKt4QwNCC0B308AocEAFxlSgaAL8zXKuCoQ/A+2NVtmlASu1Ais8QHIB6KwLGgc6NEBvFLoNXogBR2qF7lOBb81Ctzm1AOypJeIxC6GbDplC5Z7Uc5DqjL2rKjg5fDWQHByMtMSBa8MVocy8K6sb67m8wa1wVjd0ySgD53JGX6ugWzaM3nKwbpyqZfEzdZYTq6lSe3z+RemazmZ4dinGI2+eckbPm1XtLgNn88aAGXBtPc8T0Vf8eP4lzyQ+ceJ7mm/MPCqNvf+i8eWpO3x+8pZ53HnDWwnsrbZgaHqU3eNDfCJ8hY8HLzLdPce3X09w/0Mfr2TW+OD1k+wMXuCzkzf5+eKcGfhSOVg33JUmy+iC76b4wcfpUsWbVtPL/CQa4dVsdqvv7VKMPywvmkRd6P8zh6tQ6Pl7Xicpn98f8Hg8kVbY5/cHUE1Op/MwERWJiC12UVGUDpiJiMJWg4UQ97GTXC7XXiJKWwhN2e32nT+LUkKIQ0SkWwAtEFF9fyFE1ElEX5sAy9SOohHZ7fb2X3tez4ErCiFCiqLsR7NSFKVb3kwIsWESqxy713CVZrLZbG0Oh6OXiE4LIbzSsi37FEXZbboY/7p+ArPRNUUu/+PdAAAAAElFTkSuQmCC">
                        <?php else: ?>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAADaklEQVR4nO2W20sUURzH96neooL6I4LKYLUZG2ay1VyScodFsstLTxVFD1Eh9NoFghCKCLf7DcK3cEbTwF3z8rAaWpnt2m7p7s6oaZmsbs7l+I2zrZd0b671UPSFHxx+5/zO58w5Z87vZ7H8VxrV1vauArBdtZccjrDWM9Rom/pon+V3SyiX8nhRvnf4hOcdACgcE1bYfMSNY8LUR/sEUbpTJNZtXTGQqXi+XnBIjwVRmhFEGQeON4dTgWkfHSM4ZMI75IdcmbQuJyjvrN8mOOTB+GQJywo8bx/pTi0LWnKwMU9wSF8WTbRcMHhRHqcfkBUUwBrTJD53m+IprmjQVgKuPOaOhCLRRgAbMoMJuYuENM30n7vg7Vou2Oas1+tehNqIaU5O3Ha1qruEmrTQ8I6CrUoR/07r7u6bhQOYCQ5OtIlHXoxmA6661Pla08yA3t8fVEtt3T/HWWOTLlfq8x7Z76xOTKiPnT7lIbHY1CydEHxtdIebaDMZ+ERVR19f//hLMj0d+3K+yqMw+dO0X7UX99BFALiR6mxXAwhGa592KDu5DwrHhobsxd1a71s/ftXbJOBmAOMUMFRW2kVjFWFHIPrwftuCuDEASx8ZAAyASQAeACaS6yuAliTgceqnu5EibhgAXQSzBKzYbYfiK+XYUIRjBmfbC23Oz1rnwbSdbZzddmgpmCk4Nz9ZJlsEzjIuwljPLgFT5x8Hs9Yzabc6o6XY6lSWdqtpagMwAKALGZTkcs1kCPkOwA2ATQZelbh9cemfggNDe/d0xlfKFwbpCwRC6K1tTQLu0Q0zMIchZGai5marwhd+pPHD+/Z49WCAptTkOZv+5DAM49vVKy0RNn8y/gCUFL3Rfe8/aLr5yfXE706Zj096BuuaQu2EkLlHR/f5Aupu2+ufYwvuWVJJ8/vzVIHzxQcW5k98u36thRhGtKE53GRzNmjZPJmVR5uHwurUq1++/lZNa8TGp89SCmt9MFxe5jVUVR35HPPSDJNLdrp8rcdrGCSUwLssmRRtb9/4fdrsvFjd411pPi6tfD7V0TnyDMBaSzbinPVbeFEe+w2FwCi3r35TVtBZ0cqBd8gDuYJ5UQrw5fJmS67FHi/Kj2gBt5xiTxDl+zkXewtFS1beId3NUN728g7pFj0my19f0P9T+gG2eKpch8Dw1QAAAABJRU5ErkJggg==">
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(url('language/ar')); ?>" data-language="ar" class="active">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACT0lEQVR4nO2Wy2sTURjFD2j/AB/1D3BrrcWUtkJgcj9i1u6EEkQ32YmvFHHTRRoaRRBRCoJB0xS0ClUKdlXFGrWK1BqamZRIrWlihSbpJAN1m09usKWSZJrHBAU9cJjLfcxvvnPvMAP8l4nmgLY4cEwFzmjAgLRsx4E+OQarpQI9KjCqAT80gKt4QwNCC0B308AocEAFxlSgaAL8zXKuCoQ/A+2NVtmlASu1Ais8QHIB6KwLGgc6NEBvFLoNXogBR2qF7lOBb81Ctzm1AOypJeIxC6GbDplC5Z7Uc5DqjL2rKjg5fDWQHByMtMSBa8MVocy8K6sb67m8wa1wVjd0ySgD53JGX6ugWzaM3nKwbpyqZfEzdZYTq6lSe3z+RemazmZ4dinGI2+eckbPm1XtLgNn88aAGXBtPc8T0Vf8eP4lzyQ+ceJ7mm/MPCqNvf+i8eWpO3x+8pZ53HnDWwnsrbZgaHqU3eNDfCJ8hY8HLzLdPce3X09w/0Mfr2TW+OD1k+wMXuCzkzf5+eKcGfhSOVg33JUmy+iC76b4wcfpUsWbVtPL/CQa4dVsdqvv7VKMPywvmkRd6P8zh6tQ6Pl7Xicpn98f8Hg8kVbY5/cHUE1Op/MwERWJiC12UVGUDpiJiMJWg4UQ97GTXC7XXiJKWwhN2e32nT+LUkKIQ0SkWwAtEFF9fyFE1ElEX5sAy9SOohHZ7fb2X3tez4ErCiFCiqLsR7NSFKVb3kwIsWESqxy713CVZrLZbG0Oh6OXiE4LIbzSsi37FEXZbboY/7p+ArPRNUUu/+PdAAAAAElFTkSuQmCC">
                                <span class="align-middle">العربية</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(url('language/en')); ?>" data-language="en">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAADaklEQVR4nO2W20sUURzH96neooL6I4LKYLUZG2ay1VyScodFsstLTxVFD1Eh9NoFghCKCLf7DcK3cEbTwF3z8rAaWpnt2m7p7s6oaZmsbs7l+I2zrZd0b671UPSFHxx+5/zO58w5Z87vZ7H8VxrV1vauArBdtZccjrDWM9Rom/pon+V3SyiX8nhRvnf4hOcdACgcE1bYfMSNY8LUR/sEUbpTJNZtXTGQqXi+XnBIjwVRmhFEGQeON4dTgWkfHSM4ZMI75IdcmbQuJyjvrN8mOOTB+GQJywo8bx/pTi0LWnKwMU9wSF8WTbRcMHhRHqcfkBUUwBrTJD53m+IprmjQVgKuPOaOhCLRRgAbMoMJuYuENM30n7vg7Vou2Oas1+tehNqIaU5O3Ha1qruEmrTQ8I6CrUoR/07r7u6bhQOYCQ5OtIlHXoxmA6661Pla08yA3t8fVEtt3T/HWWOTLlfq8x7Z76xOTKiPnT7lIbHY1CydEHxtdIebaDMZ+ERVR19f//hLMj0d+3K+yqMw+dO0X7UX99BFALiR6mxXAwhGa592KDu5DwrHhobsxd1a71s/ftXbJOBmAOMUMFRW2kVjFWFHIPrwftuCuDEASx8ZAAyASQAeACaS6yuAliTgceqnu5EibhgAXQSzBKzYbYfiK+XYUIRjBmfbC23Oz1rnwbSdbZzddmgpmCk4Nz9ZJlsEzjIuwljPLgFT5x8Hs9Yzabc6o6XY6lSWdqtpagMwAKALGZTkcs1kCPkOwA2ATQZelbh9cemfggNDe/d0xlfKFwbpCwRC6K1tTQLu0Q0zMIchZGai5marwhd+pPHD+/Z49WCAptTkOZv+5DAM49vVKy0RNn8y/gCUFL3Rfe8/aLr5yfXE706Zj096BuuaQu2EkLlHR/f5Aupu2+ufYwvuWVJJ8/vzVIHzxQcW5k98u36thRhGtKE53GRzNmjZPJmVR5uHwurUq1++/lZNa8TGp89SCmt9MFxe5jVUVR35HPPSDJNLdrp8rcdrGCSUwLssmRRtb9/4fdrsvFjd411pPi6tfD7V0TnyDMBaSzbinPVbeFEe+w2FwCi3r35TVtBZ0cqBd8gDuYJ5UQrw5fJmS67FHi/Kj2gBt5xiTxDl+zkXewtFS1beId3NUN728g7pFj0my19f0P9T+gG2eKpch8Dw1QAAAABJRU5ErkJggg==">
                                <span class="align-middle">English</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Language -->

                <!-- Quick links  -->
                
                <!-- Quick links -->

                <!-- Notification -->
                
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link m-0 p-0  hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="mdi mdi-account-circle-outline mdi-30px"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item bg-facebook text-white border-radius-5"
                               >
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <div class="flex-shrink-0 d-flex justify-content-center mb-2">
                                            <div class="avatar ">
                                                
                                                <i class="mdi mdi-account-circle-outline fw-normal mdi-48px"></i>
                                                
                                            </div>
                                        </div>
                                        <span class="fw-semibold d-block text-center">
                                            <?php if(Auth::check()): ?>
                                                <div><?php echo e(trans('navbar.Welcome')); ?>, <?php echo e(Auth::user()->name); ?></div>
                                                <div><?php echo e(Auth::user()->email); ?></div>
                                                <div>
                                                    
                                                </div>
                                            <?php else: ?>
                                                <div class="text-center"> <?php echo e(trans('navbar.browsingVisitor')); ?> </div>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        
                        <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a class="dropdown-item"
                                   >
                                    <i class="mdi mdi-account-outline me-2"></i>
                                    <span class="align-middle"><?php echo e(trans('navbar.Myprofile')); ?></span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                        <?php endif; ?>

                        <?php if(Auth::check()): ?>
                            
                            <li>
                                <a href="<?php echo e(Route('Dashboard')); ?>" class="dropdown-item">
                                    <i class="mdi mdi-web me-2"></i>
                                    <span class="align-middle"><?php echo e(trans('navbar.WebContentManagement')); ?></span>
                                </a>
                            </li>
                            

                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class='mdi mdi-logout me-2'></i>
                                    <span class="align-middle"><?php echo e(trans('navbar.logout')); ?></span>
                                </a>
                            </li>
                            <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                            </form>
                        <?php else: ?>
                            <li>
                                <a class="dropdown-item"
                                   href="<?php echo e(Route::has('login') ? route('login') : url('auth/login-basic')); ?>">
                                    <i class='mdi mdi-login me-2'></i>
                                    <span class="align-middle"><?php echo e(trans('navbar.login')); ?></span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                   href="<?php echo e(Route::has('login') ? route('register') : url('auth/login-basic')); ?>">
                                    <i class='mdi mdi-login me-2'></i>
                                    <span class="align-middle"><?php echo e(trans('navbar.register')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <!--/ User -->


            
            <!-- navbar button: End -->
        </ul>
        <!-- Toolbar: End -->
    </div>
</nav>
<!-- Navbar: End -->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layouts/sections/navbar/navbar-front.blade.php ENDPATH**/ ?>