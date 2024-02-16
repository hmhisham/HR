<!-- Footer: Start -->
<footer class="landing-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gx-0 gy-4 g-md-5">
                <div class="col-lg-5">
                    <div class="section-head style-4 mt-n2">
                        <div>
                            <h2 class="mb-10" style="margin-bottom: -10px !important;"><span><?php echo e(trans('footer.JOINT ANNUAL ZONE')); ?><br></span> </h2>
                            <small class="text-end w-100 pe-5"><?php echo e(trans('footer.To your place')); ?></small>
                        </div>
                    </div>

                    <a href="https://jaz.iq/" class="app-brand-link d-flex mb-4" style="margin-top: -60px">
                        <div class="">
                            <?php echo $__env->make('_partials.macros',["width"=>50,"withbg"=>'var(--bs-primary)'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <div class="app-brand-text demo footer-link fw-bold">
                            <span class="h1 text-white" style="<?php echo e(session()->get('locale') == '' ? 'margin-right: 60px; margin-top: 60px':(session()->get('locale') == 'ar' ? 'margin-right: 60px; margin-top: 60px':'margin-left: 60px; margin-top: 70px')); ?>">
                                <?php echo e(trans('footer.jaz')); ?>

                            </span>
                        </div>
                    </a>

                    <div class="section-head style-4 mt-n4">
                        <p class="text-white"><?php echo e(trans('footer.company')); ?></p>
                        <p class="text-align-justify"> <?php echo e(trans('footer.DefinitionJazzCompany')); ?> </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-1">
                    <h6 class="footer-title mb-4"><?php echo e(trans('footer.pages')); ?></h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="<?php echo e(Route('Home')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.home')); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/payment')); ?>" class="footer-link fw-normal"> <?php echo e(trans('navbar.Worldwide')); ?> </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/checkout')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.CorporateGovernance')); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/help-center')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.Importantlinks')); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/help-center')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.AllEvents')); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/help-center')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.Venues')); ?></a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo e(url('/front-pages/help-center')); ?>" class="footer-link fw-normal"><?php echo e(trans('navbar.ContactUs')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h6 class="footer-title mb-4"><?php echo e(trans('footer.subscribe')); ?></h6>
                    <form>
                        <div class="d-flex mt-2 gap-3">
                            <div class="form-floating form-floating-outline w-px-250">
                                <input type="text" class="form-control bg-transparent text-white" id="newsletter-1"
                                       placeholder="<?php echo e(trans('footer.Your email')); ?>"/>
                                <label for="newsletter-1"><?php echo e(trans('footer.Subscribe to newsletter')); ?></label>
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo e(trans('footer.subscribe')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3">
        <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
            <div class="mb-2 mb-md-0">
                <span class="footer-text">
                    <?php if(app()->getLocale() == 'ar'): ?>
                        <div class="copywrite text-center">
                            <span class="copywrite">
                                <?php echo e(trans('footer.copywrite')); ?>

                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                            </span>
                        </div>
                    <?php else: ?>
                        <div class="copywrite text-center">
                            <span class="small">
                                <?php echo e(trans('footer.copywrite')); ?>

                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                            </span>
                        </div>
                    <?php endif; ?>
                </span>
            </div>
            <div>
                <a href="<?php echo e(config('variables.githubUrl')); ?>" class="footer-link me-2" target="_blank">
                    <i class="mdi mdi-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100092918302980&_rdc=1&_rdr" class="footer-link me-2" target="_blank">
                    <i class="mdi mdi-facebook"></i>
                </a>
                <a href="<?php echo e(config('variables.twitterUrl')); ?>" class="footer-link me-2" target="_blank">
                    <i class="mdi mdi-instagram"></i>
                </a>
                <a href="<?php echo e(config('variables.instagramUrl')); ?>" class="footer-link" target="_blank">
                    <i class='mdi mdi-linkedin'></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Footer: End -->
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/layouts/sections/footer/footer-front.blade.php ENDPATH**/ ?>