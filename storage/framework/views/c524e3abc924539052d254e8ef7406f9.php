<?php
    $configData = Helper::appClasses();
?>
<div>
    <div data-bs-spy="scroll" class="scrollspy-example">

        <section class="" style="margin-top: 120px">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3">
                    <div class="col text-center align-self-center">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/GCPI.png')); ?>" class="d-none d-sm-none d-md-block d-lg-inline-block" style="height: 150px;">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/GCPI.png')); ?>" class="d-lg-none d-md-none d-sm-inline-block mt-4" style="height: 75px">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/logojaz22.png')); ?>" class="d-lg-none d-md-none d-sm-inline-block mt-4" style="height: 75px">
                    </div>
                    <?php if(app()->getLocale() == 'ar'): ?>
                        <div class="col text-center align-self-center">
                            <h6 class="fw-bolder text-dark">التغيير الذي تود رؤيته في العالم</h6>
                            <h6 class="fw-normal lh-base">ننظم المعارض والمؤتمرات التجارية في العراق وفي جميع أنحاء العالم ، ونجمع الصناعات والعلاقات والخبرات معًا. نحن نهتم بالكوكب.</h6>
                            <h6 class="fw-bolder text-success-dark"># معا نبني العراق</h6>
                        </div>
                    <?php else: ?>
                        <div class="text-center col align-self-center">
                            <h6 class="fw-bolder text-dark">The change you would like to see in the world</h6>
                            <h6 class="fw-normal lh-base">We organize trade shows and conferences in Iraq and throughout the world.We bring industries, relationships and experiences together. We care about the planet .</h6>
                            <h6 class="fw-bolder text-success-dark">#Together we will build iraq</h6>
                        </div>
                    <?php endif; ?>
                    <div class="text-center col align-self-center">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/logojaz22.png')); ?>" class="d-none d-sm-none d-md-block d-lg-inline-block" style="height: 120px;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Carousel: Start -->
        <section class="carousel mb-5">
            <div id="carouselExampleFade" class="mt-3 carousel slider-container slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo e(asset('assetsWebsite/img/slider/10010-1.jpg')); ?>" class="d-block w-100" alt="...">
                        <div class="content">
                            <h1>JOINT ANNUAL ZONE</h1>
                            <p class="fw-normal">في جاز للمؤتمرات والمعارض ، نقدم مجموعة واسعة من الخدمات لمساعدة عملائنا على تخطيط وتنفيذ الأحداث الناجحة. </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo e(asset('assetsWebsite/img/slider/10010-2.jpg')); ?>" class="d-block w-100" alt="...">
                        <div class="content">
                            <h1>JOINT ANNUAL ZONE</h1>
                            <p class="fw-normal">نحن نقدم المؤتمر الشامل
                                خدمات الإدارة ، بما في ذلك اختيار المكان ، المتحدث مانا
                                الأحجار الكريمة وإدارة التسجيل وتسويق الأحداث والموقع
                                يدعم.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo e(asset('assetsWebsite/img/slider/10010-3.jpg')); ?>" class="d-block w-100" alt="...">
                        <div class="content">
                            <h1>WATER TECHNOLOGY</h1>
                            <p class="fw-normal">في الفترة من 1 إلى 8 تشرين الثاني 2023</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- Carousel: End -->


        <section id="landingReviews" class="section-py landing-reviews bg-body">
            <div class="container">
                <h3 class="text-center"><?php echo e(trans('home.UPCOMING EXHIBITIONS')); ?></h3>
            </div>

            <div class="row">
                <div class="col w-100 d-block d-sm-block d-md-none d-lg-none">
                    <div class="card h-100">
                        <img src="<?php echo e(asset('assetsWebsite/img/hot-sale-price-labels-template-designs-with-flame-png.webp')); ?>" class="position-absolute" width="50">
                        <div class="card-body text-body d-flex flex-column justify-content-between">
                            <div class="mb-1 rounded-2 position-relative p-0 m-0" style="height: 200px!important; width: 100%!important;">
                                <img src="<?php echo e(asset('storage/event-img/'.$eventHot->photo)); ?>" class="fit-content position-absolute top-50 start-50 translate-middle" alt="client logo"/>
                            </div>
                            <div class="text-center multiline-ellipsis-3 mb-3">
                                <a href="javascript:voide(0)" class="text-dark h5">
                                    <?php echo e(app()->getLocale() == 'ar' ? $eventHot->title_ar : $eventHot->title_en); ?>

                                </a>
                            </div>
                            <div class="text-center text-align-justify multiline-ellipsis-5 mb-3">
                                <?php echo e(app()->getLocale() == 'ar' ? $eventHot->description_ar : $eventHot->description_en); ?>

                            </div>
                            <div class="text-center">
                                <h6 class="mb-1">Eugenia Moore</h6>
                                <p class="mb-0">Founder of Hubspot</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-2">

                <div class="col-3 d-none d-sm-none d-md-block d-lg-block py-3 rounded">
                    <div class="card h-100">
                        <img src="<?php echo e(asset('assetsWebsite/img/hot-sale-price-labels-template-designs-with-flame-png.webp')); ?>" class="position-absolute" width="50">
                        <div class="card-body text-body d-flex flex-column justify-content-between">
                            <div class="mb-1 rounded-2 position-relative p-0 m-0" style="height: 200px!important; width: 100%!important;">
                                <img src="<?php echo e(asset('storage/event-img/'.$eventHot->photo)); ?>" class="fit-content position-absolute top-50 start-50 translate-middle" alt="client logo"/>
                            </div>
                            <div class="text-center multiline-ellipsis-2 mb-3">
                                <a href="javascript:voide(0)" class="text-dark h5">
                                    <?php echo e(app()->getLocale() == 'ar' ? $eventHot->title_ar : $eventHot->title_en); ?>

                                </a>
                            </div>
                            <div class="text-center text-align-justify multiline-ellipsis-4 mb-3">
                                <?php echo e(app()->getLocale() == 'ar' ? $eventHot->description_ar : $eventHot->description_en); ?>

                            </div>
                            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-2 text-center mb-3">
                                <div class="col">
                                    <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventHot->event_start_date); ?>

                                </div>
                                <div class="col ">
                                    <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventHot->event_end_date); ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-9 my-3 <?php echo e(count($events) == 1 ? 'hidden' : ''); ?>">
                    <swiper-container class="mySwiper py-3 my-3" lazyLoading="true" loop="true" autoplay="true" pagination="true" pagination-clickable="true" slides-per-view="<?php echo e(count($events) <= 2 ? 2 : 3); ?>" space-between="30" free-mode="true">
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <swiper-slide>
                                <div class="card h-100">
                                    <img src="<?php echo e(asset('assetsWebsite/img/hot-sale-price-labels-template-designs-with-flame-png.webp')); ?>" class="position-absolute" width="50">
                                    <div class="card-body text-body d-flex flex-column justify-content-between">
                                        <div class="mb-1 rounded-2 position-relative p-0 m-0" style="height: 200px!important; width: 100%!important;">
                                            <img src="<?php echo e(asset('storage/event-img/'.$eventHot->photo)); ?>" class="fit-content position-absolute top-50 start-50 translate-middle" alt="client logo"/>
                                        </div>
                                        <div class="text-center multiline-ellipsis-2 mb-3">
                                            <a href="javascript:voide(0)" class="text-dark h5">
                                                <?php echo e(app()->getLocale() == 'ar' ? $eventHot->title_ar : $eventHot->title_en); ?>

                                            </a>
                                        </div>
                                        <div class="text-center text-align-justify multiline-ellipsis-4 mb-3">
                                            <?php echo e(app()->getLocale() == 'ar' ? $eventHot->description_ar : $eventHot->description_en); ?>

                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-2 text-center mb-3">
                                            <div class="col">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventHot->event_start_date); ?>

                                            </div>
                                            <div class="col ">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventHot->event_end_date); ?>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </swiper-slide>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </swiper-container>
                </div>
            </div>
        </section>


        <section id="landingFeatures" class="section-py">
            <div class="container mb-5">
                <h3 class="text-center"><?php echo e(trans('home.JOINT ANNUAL ZONE')); ?></h3>
                <?php if(app()->getLocale() == 'ar'): ?>
                    <h5 class="text-align-justify lh-base" style="">
                        شركة جاز للمعارض والمؤتمرات هي شركة رائدة في إدارة الفعاليات مقرها في العراق ، وتقوم الشركة بتنظيم معارض ومؤتمرات ناجحة في مختلف الصناعات مثل الرعاية الصحية والتعليم والتكنولوجيا وغيرها. تشتهر شركة JIZ للمعارض والمؤتمرات بنهجها المبتكر في إدارة الأحداث ، حيث توفر حلولًا مخصصة لتلبية الاحتياجات المحددة لعملائها. يضمن فريق الشركة من المهنيين ذوي الخبرة تنفيذ كل حدث بسلاسة ، من التخطيط إلى التنفيذ. مع التركيز القوي على رضا العملاء وتقديم خدمات عالية الجودة ، حصلت شركة JAZ Exhibitions and Conferences Company على جائزة سمعة كواحدة من أكثر شركات إدارة الأحداث موثوقية في المنطقة.
                    </h5>
                <?php else: ?>
                    <h5 class="text-align-justify lh-base" style="">
                        JAZ Exhibitions and Conferences Company is a leading event management company based in IRAQ, The company has been organizing successful exhibitions and conferences across various industries such as healthcare, education, technology, and more. JIZ Exhibitions and Conferences Company is known for its innovative approach to event management, providing customized solutions to meet the specific needs of its clients. The company's team of experienced professionals ensures that every event is executed seamlessly, from planning to execution. With a strong focus on customer satisfaction and quality service delivery, JAZ Exhibitions and Conferences Company has earned a reputation as one of the most reliable event management companies in the region.
                    </h5>
                <?php endif; ?>
            </div>

            <div class="container">
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="card card-border-shadow-dark card-shadow border-2 border-dark bg-label-secondary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <h4 class="ms-1 mb-0 display-6"><?php echo e(trans('home.Mission')); ?></h4>
                                </div>
                                <hr class="line-head">
                                <p class="mb-0 text-heading text-align-justify">
                                    <?php echo e(trans('home.MissionText')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="card card-border-shadow-dark card-shadow border-2 border-dark bg-label-secondary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <h4 class="ms-1 mb-0 display-6"><?php echo e(trans('home.Valuable')); ?></h4>
                                </div>
                                <hr class="line-head">
                                <p class="mb-0 text-heading text-align-justify">
                                    <?php echo e(trans('home.ValuableText')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                        <div class="card card-border-shadow-dark card-shadow border-2 border-dark bg-label-secondary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <h4 class="ms-1 mb-0 display-6"><?php echo e(trans('home.Ethics')); ?></h4>
                                </div>
                                <hr class="line-head">
                                <p class="mb-0 text-heading text-align-justify">
                                    <?php echo e(trans('home.EthicsText')); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="landingFeatures" class="section-py bg-body">
            <div class="container text-center">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-3">
                    <div class="col">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/profile.jpg')); ?>" style="height: 300px">
                    </div>
                    <div class="col">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/magazine.jpg')); ?>" style="height: 300px">
                    </div>
                    <div class="col">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/People-of-Determination.jpg')); ?>" style="height: 300px">
                    </div>
                    <div class="col">
                        <img src="<?php echo e(asset('assetsWebsite/img/logos/Health-insurance.jpg')); ?>" style="height: 300px">
                    </div>
                </div>
            </div>
        </section>


        <section id="landingFeatures" class="section-py">
            <div class="container">
                <h3 class="text-center"><?php echo e(trans('home.EXHIBITIONS GROUP')); ?></h3>
            </div>

            <div class="gap-3 px-5 mt-5 mb-5 card-group">
                <div class="card shadow-none mb-3">
                    <div class="row g-0">
                        <div class="col-md-4" style="height: 101px">
                            <img src="<?php echo e(asset('assetsWebsite/img/img-eventmain/1zSZ3CJ2hz-1693209275.jpg')); ?>" class="card-img <?php echo e(session()->get('locale') == 'ar' ? 'card-img-left':'card-img-right'); ?> h-100" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-title">
                                <p class="multiline-ellipsis-3 pt-3 px-0 pe-3">
                                    International Ramadan Shopping Exhibition (RAMADAN FEST) Iraq - Erbil
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text multiline-ellipsis-5">
                            International Ramadan Shopping Exhibition (RAMADAN FEST) Iraq - Erbil.
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>

                <div class="card shadow-none mb-3">
                    <div class="row g-0">
                        <div class="col-md-4" style="height: 101px">
                            <img src="<?php echo e(asset('assetsWebsite/img/img-eventmain/6HQbiChl3V-1692777554.jpg')); ?>" class="card-img <?php echo e(session()->get('locale') == 'ar' ? 'card-img-left':'card-img-right'); ?> h-100" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-title">
                                <p class="multiline-ellipsis-3 pt-3 px-0 pe-3">
                                    An international conference in Germany in the field of business administration and social innovation from the IIERD organization
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text multiline-ellipsis-5">
                            This card has supporting text below as a natural lead-in to additional content.
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>

                <div class="card shadow-none mb-3">
                    <div class="row g-0">
                        <div class="col-md-4" style="height: 101px">
                            <img src="<?php echo e(asset('assetsWebsite/img/img-eventmain/u4oAEmF19b-1691206432.jpg')); ?>" class="card-img <?php echo e(session()->get('locale') == 'ar' ? 'card-img-left':'card-img-right'); ?> h-100" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-title">
                                <p class="multiline-ellipsis-3 pt-3 px-0 pe-3">
                                    The International Conference in the Emirates for Modern Smart Materials Research
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text multiline-ellipsis-5">
                            This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        </section>

        <!-- Real customers reviews: Start -->
        <section id="landingReviews" class="section-py landing-reviews pb-0">
            <div class="container">
                <h3 class="text-center"><?php echo e(trans('home.THE SHOW PARTNERS')); ?></h3>
            </div>
            <div class="swiper-reviews-carousel overflow-hidden mb-5 pt-4">
                <div class="swiper" id="swiper-reviews">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/minawi.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/millennium.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/baghdad.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/najaf-International.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>

                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/minawi.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/millennium.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/baghdad.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                        <div class="swiper-slide" style="height: 100px; width: 100px">
                            <img src="<?php echo e(asset('assetsWebsite/img/venues/najaf-International.png')); ?>" class="mx-auto rounded-10  img-fluid d-block" style="height: 100px; width: 100px">
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Real customers reviews: End -->

        <!-- Contact Us: Start -->

        <!-- Contact Us: End -->
    </div>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/website/home/home.blade.php ENDPATH**/ ?>
