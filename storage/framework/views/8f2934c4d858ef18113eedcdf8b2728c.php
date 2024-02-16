<?php
    $configData = Helper::appClasses();
?>
<div class="mt-n3">
    <div class="app-academy">
        <div class="card p-0 mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                <div class="app-academy-md-25 card-body py-0">
                    <img src="<?php echo e(asset('assets/img/illustrations/bulb-'.$configData['style'].'.png')); ?>"
                         class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand"
                         data-app-light-img="illustrations/bulb-light.png"
                         data-app-dark-img="illustrations/bulb-dark.png" height="90"/>
                </div>
                <div class="app-academy-md-50 card-body d-flex  flex-column text-md-center mb-4">
                    <span class="card-title mb-3 lh-lg px-md-5 display-6 text-heading">
                      المعارض والمؤتمرات.
                      <span class="text-primary text-nowrap">كل ذلك في مكان واحد.</span>
                    </span>
                    <p class="mb-3 px-2">
                        قم بتنمية مهاراتك من خلال الدورات التدريبية والشهادات الأكثر موثوقية عبر الإنترنت في مجال التسويق وتكنولوجيا المعلومات والبرمجة وعلوم البيانات.
                    </p>
                    <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                        <input type="search" class="form-control me-2" placeholder="ابحث عن المعرض أو المؤتمر"/>
                        <button type="submit" class="btn btn-primary btn-icon"><i class="mdi mdi-magnify"></i></button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center app-academy-md-80 mt-4 mb-n4">
                        <a href="<?php echo e(Route('Events.create')); ?>" type="submit" class="btn btn-primary">
                            <i class="mdi mdi-calendar-plus fs-3 me-2"></i> اضافة حدث جديد
                        </a>
                    </div>
                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                    <img src="<?php echo e(asset('assets/img/illustrations/pencil-rocket.png')); ?>" alt="pencil rocket" height="188" class="scaleX-n1-rtl"/>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header border-bottom">
                <div class="card-title d-flex flex-wrap justify-content-between gap-3 mb-0 me-1">
                    <div>
                        <h5 class="mb-1">الاحداث</h5>
                        <p class="mb-0">إجمالي <?php echo e(count($events)); ?> احداث تمت اضافتها</p>
                    </div>
                    <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
                        <div class="">
                            <select wire:model="eventsPreview"  class="form-select w-100" id="select2_course_select" data-placeholder="جميع الاحداث">
                                <option value="all events">جميع الاحداث</option>
                                <option value="published events">الاحداث المنشورة</option>
                                <option value="draft events">مسودات الاحداث</option>
                            </select>
                        </div>
                        <div class="">
                            <label class="switch">
                                <input wire:click='eventsComplete("<?php echo e(!$eventComplete); ?>")' type="checkbox" value="<?php echo e($eventComplete); ?>" class="switch-input" <?php echo e($eventComplete ? 'checked':''); ?>/>
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                </span>
                                <span class="switch-label text-nowrap mb-0">اخفاء الاحداث المكتملة</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card-header border-bottom <?php echo e(in_array($eventsPreview, ['all events', 'published events']) ? '':'hidden'); ?>">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">الاحداث المنشورة</h5>
                    <p class="mb-0">إجمالي <?php echo e($eventsPublished ? count($eventsPublished) : 0); ?> احداث تم نشرها</p>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 gy-4 mb-4">
                        <?php $__currentLoopData = $eventsPublished; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventPublished): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <div class="card p-2 h-100 shadow border" >
                                    <div class="dropdown position-absolute">
                                        <button class="btn p-0" type="button" id="topic" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="topic">
                                            <a href="javascript:void(0);" type="button" class="dropdown-item btn-card-block-overlay">
                                                <div class="d-flex justify-content-between">
                                                    <label class="switch switch-primary">
                                                        <input wire:click='SetActiveDeactivate("<?php echo e($eventPublished->id); ?>", <?php echo e($eventPublished->active ? 0 : 1); ?>)' type="checkbox" value="<?php echo e($eventPublished->active); ?>" class="switch-input" <?php echo e($eventPublished->active ? 'checked':''); ?>/>
                                                        <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </span>
                                                    </label>
                                                    <p class="p-0 m-0 w-100 ms-5"><?php echo e($eventPublished->active ? 'الغاء تفعيل الحدث' : 'تفعيل الحدث'); ?></p>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" wire:click='draftEvent("<?php echo e($eventPublished->id); ?>")' type="button" class="dropdown-item btn-card-block-overlay">
                                                <i class="mdi mdi-tray-arrow-down mdi-24px me-2"></i>الغاء  نشر الحدث
                                            </a>
                                            <a href="<?php echo e(Route('Events.edit', $eventPublished->id)); ?>" class="dropdown-item">
                                                <i class="mdi mdi-text-box-edit mdi-24px me-2"></i> تعديل بيانات الحدث
                                            </a>
                                            <a href="javascript:void(0);" wire:click='GetEvent("<?php echo e($eventPublished->id); ?>")' type="button" class="dropdown-item btn-card-block-overlay"
                                               data-bs-toggle="modal" data-bs-target="#eventArchiveModal">
                                                <span class="mdi mdi-close-thick mdi-24px me-2"></span> ارشفة الحدث
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body px-3 pt-2">
                                        <div class="rounded-2 fit-content text-center mb-3" style="height: 200px!important; width: 100%!important;">
                                            <a href="<?php echo e(url('app/academy/course-details')); ?>">
                                                <img class="fit-content" src="<?php echo e(asset('storage/event-img/'.$eventPublished->photo)); ?>" alt="tutor image 1"/>
                                            </a>
                                        </div>
                                        <a href="<?php echo e(url('app/academy/course-details')); ?>" class="h5">
                                            <?php echo e($eventPublished->title_ar); ?>

                                        </a>
                                        <p class="h6 mt-2">
                                            <?php echo e($eventPublished->description_ar); ?>

                                        </p>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-2">
                                            <div class="col">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventPublished->event_start_date); ?>

                                            </div>
                                            <div class="col text-end">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventPublished->event_end_date); ?>

                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-n4 mt-2">
                                            <div class="col">
                                                سعر الحدث
                                            </div>
                                            <div class="col text-end h4">
                                                $<?php echo e(number_format($eventPublished->price)); ?>

                                            </div>
                                        </div>
                                        <div wire:poll.60s class="mt-3 <?php echo e(\Carbon\Carbon::parse($eventPublished->event_end_date)->lt(now()) ? 'hidden':''); ?>">
                                            <?php
                                                date_default_timezone_set('Asia/Baghdad');
                                                Carbon\Carbon::setWeekStartsAt(Carbon\Carbon::SUNDAY);

                                                $totalDays = \Carbon\Carbon::parse($eventPublished->created_at)->diffInDays(\Carbon\Carbon::parse($eventPublished->event_start_date));
                                                $daysLeft = now()->diffInDays(Carbon\Carbon::parse($eventPublished->event_start_date));
                                                $percentage = round(($totalDays - $daysLeft) / $totalDays * 100);
                                            ?>
                                            
                                            <div class="progress rounded-pill" style="height: 3px">
                                                <div class="progress-bar progress-<?php echo e($percentage); ?>" role="progressbar" aria-valuenow="<?php echo e($percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="">
                                                <?php echo e(Carbon\Carbon::parse($eventPublished->event_start_date)->diffForHumans(['parts' => 2,'join' => ', ',],)); ?>

                                                (<?php echo e(Carbon\Carbon::parse($eventPublished->event_start_date)->diffInDays()); ?> يوم)
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center text-primary mb-n3 <?php echo e(Carbon\Carbon::parse($eventPublished->event_end_date)->gt(now()) ? 'sr-only':''); ?>">
                                            <i class="mdi mdi-check me-2"></i>اكتمل
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            
            <div class="card-header border-bottom <?php echo e(in_array($eventsPreview, ['all events', 'draft events']) ? '':'hidden'); ?>">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">مسودات الاحداث</h5>
                    <p class="mb-0">إجمالي <?php echo e($eventsDraft ? count($eventsDraft) : 0); ?> احداث محفوظة لم تنشر بعد</p>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 gy-4 mb-4">
                        <?php $__currentLoopData = $eventsDraft; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventDraft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <div class="card p-2 h-100 shadow border">
                                    <div class="dropdown position-absolute">
                                        <button class="btn p-0" type="button" id="topic" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical mdi-24px"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="topic">
                                            <a href="javascript:void(0);" type="button" class="dropdown-item btn-card-block-overlay">
                                                <div class="d-flex justify-content-between">
                                                    <label class="switch switch-primary">
                                                        <input wire:click='SetActiveDeactivate("<?php echo e($eventDraft->id); ?>", <?php echo e($eventDraft->active ? 0 : 1); ?>)' type="checkbox" value="<?php echo e($eventDraft->active); ?>" class="switch-input" <?php echo e($eventDraft->active ? 'checked':''); ?>/>
                                                        <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                    <span class="switch-off"></span>
                                                                </span>
                                                            </span>
                                                    </label>
                                                    <p class="p-0 m-0 w-100 ms-5"><?php echo e($eventDraft->active ? 'الغاء تفعيل الحدث' : 'تفعيل الحدث'); ?></p>
                                                </div>
                                            </a>
                                            <a href="javascript:void(0);" wire:click='publishEvent("<?php echo e($eventDraft->id); ?>")' type="button" class="dropdown-item btn-card-block-overlay">
                                                <i class="mdi mdi-tray-arrow-up mdi-24px me-2"></i> نشر الحدث
                                            </a>
                                            <a  href="<?php echo e(Route('Events.edit', $eventDraft->id)); ?>" class="dropdown-item">
                                                <i class="mdi mdi-text-box-edit mdi-24px me-2"></i> تعديل بيانات الحدث
                                            </a>
                                            <a href="javascript:void(0);" type="button" class="dropdown-item btn-card-block-overlay">
                                                <span class="mdi mdi-close-thick mdi-24px me-2"></span> ارشفة الحدث
                                            </a>
                                        </div>
                                    </div>

                                    <div class="card-body px-3 pt-2">
                                        <div class="rounded-2 text-center mb-3" style="height: 200px!important; width: 100%!important;">
                                            <a href="<?php echo e(url('app/academy/course-details')); ?>">
                                                <img class="fit-content" src="<?php echo e(asset('storage/event-img/'.$eventDraft->photo)); ?>" alt="tutor image 1"/>
                                            </a>
                                        </div>
                                        <a href="<?php echo e(url('app/academy/course-details')); ?>" class="h5">
                                            <?php echo e($eventDraft->title_ar); ?>

                                        </a>
                                        <p class="h6 mt-2">
                                            <?php echo e($eventDraft->description_ar); ?>

                                        </p>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 g-2">
                                            <div class="col">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventDraft->event_start_date); ?>

                                            </div>
                                            <div class="col text-end">
                                                <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventDraft->event_end_date); ?>

                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-n4 mt-2">
                                            <div class="col">
                                                سعر الحدث
                                            </div>
                                            <div class="col text-end h4">
                                                $<?php echo e(number_format($eventDraft->price)); ?>

                                            </div>
                                        </div>
                                        <div wire:poll.60s class="mt-3 <?php echo e(\Carbon\Carbon::parse($eventDraft->event_end_date)->lt(now()) ? 'hidden':''); ?>">
                                            <?php
                                                date_default_timezone_set('Asia/Baghdad');
                                                Carbon\Carbon::setWeekStartsAt(Carbon\Carbon::SUNDAY);

                                                $totalDays = \Carbon\Carbon::parse($eventDraft->created_at)->diffInDays(\Carbon\Carbon::parse($eventDraft->event_start_date));
                                                $daysLeft = now()->diffInDays(\Carbon\Carbon::parse($eventDraft->event_start_date));
                                                $percentage = round(($totalDays - $daysLeft) / $totalDays * 100);
                                            ?>
                                            
                                            <div class="progress rounded-pill" style="height: 3px">
                                                <div class="progress-bar progress-<?php echo e($percentage); ?>" role="progressbar" aria-valuenow="<?php echo e($percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="">
                                                <?php echo e(Carbon\Carbon::parse($eventDraft->event_start_date)->diffForHumans(['parts' => 2,'join' => ', ',],)); ?>

                                                (<?php echo e(Carbon\Carbon::parse($eventDraft->event_start_date)->diffInDays()); ?> يوم)
                                            </div>
                                            <div class="d-flex align-items-center text-primary mb-n5 <?php echo e(Carbon\Carbon::parse($eventDraft->event_end_date)->gt(now()) ? 'sr-only':''); ?>">
                                                <i class="mdi mdi-check me-2"></i>اكتمل
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <?php echo $__env->make('livewire.events.modals.archive-events', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Modal -->








            <div class="card-body">
                <div class="row gy-4 mb-4">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>">
                                    <img class="img-fluid" src="https://jaz.iq/storage/app/public/img-eventmain/6HQbiChl3V-1692777554.jpg" alt="tutor image 1"/>
                                </a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>" class="h5">Basics of Angular</a>
                                <p class="mt-2">Introductory course for Angular and framework basics in web development.</p>
                                <p class="d-flex align-items-center"><i class="mdi mdi-timer-outline me-2"></i>30 minutes</p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="w-100 btn btn-outline-secondary d-flex align-items-center">
                                        <i class="mdi mdi-sync align-middle me-1"></i>
                                        <span>Start Over</span>
                                    </a>
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="w-100 btn btn-outline-primary d-flex align-items-center">
                                        <span class="me-1">Continue</span>
                                        <i class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>">
                                    <img class="img-fluid" src="https://jaz.iq/storage/app/public/img-eventmain/6JKBvR2i1W-1692776712.png" alt="tutor image 2">
                                </a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <a class="h5" href="<?php echo e(url('app/academy/course-details')); ?>">Figma & More</a>
                                <p class="mt-2">Introductory course for design and framework basics in web development.</p>
                                <p class="d-flex align-items-center">
                                    <i class="mdi mdi-timer-outline me-2"></i>16 hours
                                </p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a class="w-100 btn btn-outline-secondary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <i class="mdi mdi-sync align-middle me-1"></i><span>Start Over</span>
                                    </a>
                                    <a class="w-100 btn btn-outline-primary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <span class="me-1">Continue</span><i
                                            class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/img/pages/app-academy-tutor-3.png')); ?>" alt="tutor image 3">
                                </a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <a class="h5" href="<?php echo e(url('app/academy/course-details')); ?>">Keyword Research</a>
                                <p class="mt-2">Keyword suggestion tool provides comprehensive details & keyword
                                    suggestions.</p>
                                <p class="d-flex align-items-center"><i class="mdi mdi-timer-outline me-2"></i>7 hours
                                </p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-50" role="progressbar" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a class="w-100 btn btn-outline-secondary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <i class="mdi mdi-sync align-middle me-1"></i><span>Start Over</span>
                                    </a>
                                    <a class="w-100 btn btn-outline-primary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <span class="me-1">Continue</span><i
                                            class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>"><img class="img-fluid"
                                                                                     src="<?php echo e(asset('assets/img/pages/app-academy-tutor-4.png')); ?>"
                                                                                     alt="tutor image 4"></a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge rounded-pill bg-label-info">Music</span>
                                    <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        3.8 <span class="text-warning"><i class="mdi mdi-star me-1"></i></span><span
                                            class="fw-noraml"> (634)</span>
                                    </p>
                                </div>
                                <a class="h5" href="<?php echo e(url('app/academy/course-details')); ?>">Basics to Advanced</a>
                                <p class="mt-2">20 more lessons like this about music production, writing, mixing,
                                    mastering</p>
                                <p class="d-flex align-items-center"><i class="mdi mdi-timer-outline me-2"></i>30
                                    minutes</p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a class="w-100 btn btn-outline-secondary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <i class="mdi mdi-sync align-middle me-1"></i><span>Start Over</span>
                                    </a>
                                    <a class="w-100 btn btn-outline-primary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <span class="me-1">Continue</span><i
                                            class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>"><img class="img-fluid"
                                                                                     src="<?php echo e(asset('assets/img/pages/app-academy-tutor-5.png')); ?>"
                                                                                     alt="tutor image 5"></a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge rounded-pill bg-label-warning">Painting</span>
                                    <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        4.7 <span class="text-warning"><i class="mdi mdi-star me-1"></i></span><span
                                            class="fw-noraml"> (34)</span>
                                    </p>
                                </div>
                                <a class="h5" href="<?php echo e(url('app/academy/course-details')); ?>">Art & Drawing</a>
                                <p class="mt-2">Easy-to-follow video & guides show you how to draw animals, people &
                                    more.</p>
                                <p class="d-flex align-items-center text-success"><i class="mdi mdi-check me-2"></i>Completed
                                </p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-100" role="progressbar" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a class="w-100 btn btn-outline-primary" href="<?php echo e(url('app/academy/course-details')); ?>"><i
                                        class="mdi mdi-sync me-2"></i>Start Over</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>"><img class="img-fluid"
                                                                                     src="<?php echo e(asset('assets/img/pages/app-academy-tutor-6.png')); ?>"
                                                                                     alt="tutor image 6"></a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge rounded-pill bg-label-danger">UI/UX</span>
                                    <p class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                        3.6 <span class="text-warning"><i class="mdi mdi-star me-1"></i></span><span
                                            class="fw-noraml"> (2.5k)</span>
                                    </p>
                                </div>
                                <a class="h5" href="<?php echo e(url('app/academy/course-details')); ?>">Basics Fundamentals</a>
                                <p class="mt-2">This guide will help you develop a systematic approach user
                                    interface.</p>
                                <p class="d-flex align-items-center"><i class="mdi mdi-timer-outline me-2"></i>16 hours
                                </p>
                                <div class="progress rounded-pill mb-4" style="height: 8px">
                                    <div class="progress-bar w-25" role="progressbar" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div
                                    class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a class="w-100 btn btn-outline-secondary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <i class="mdi mdi-sync align-middle me-1"></i><span>Start Over</span>
                                    </a>
                                    <a class="w-100 btn btn-outline-primary d-flex align-items-center"
                                       href="<?php echo e(url('app/academy/course-details')); ?>">
                                        <span class="me-1">Continue</span><i
                                            class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                    <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i class="tf-icon mdi mdi-chevron-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="tf-icon mdi mdi-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row gy-4 mb-4">
            <div class="col-lg-6">
                <div class="card shadow-none bg-label-info h-100">
                    <div class="card-body d-flex justify-content-between flex-wrap-reverse">
                        <div
                            class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                            <div class="card-title">
                                <h5 class="text-info mb-2">Earn a Certificate</h5>
                                <p class="text-heading w-sm-80 app-academy-xl-100">
                                    Get the right professional certificate program for you.
                                </p>
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-info">View Programs</button>
                            </div>
                        </div>
                        <div
                            class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                            <img class="img-fluid scaleX-n1-rtl"
                                 src="<?php echo e(asset('assets/img/illustrations/boy-app-academy.png')); ?>"
                                 alt="boy illustration"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-none bg-label-danger h-100">
                    <div class="card-body d-flex justify-content-between flex-wrap-reverse">
                        <div
                            class="mb-0 w-100 app-academy-sm-60 d-flex flex-column justify-content-between text-center text-sm-start">
                            <div class="card-title">
                                <h5 class="text-danger mb-2">Best Rated Courses</h5>
                                <p class="text-heading app-academy-sm-60 app-academy-xl-100">
                                    Enroll now in the most popular and best rated courses.
                                </p>
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-danger">View Courses</button>
                            </div>
                        </div>
                        <div
                            class="w-100 app-academy-sm-40 d-flex justify-content-center justify-content-sm-end h-px-150 mb-3 mb-sm-0">
                            <img class="img-fluid scaleX-n1-rtl"
                                 src="<?php echo e(asset('assets/img/illustrations/girl-app-academy.png')); ?>"
                                 alt="girl illustration"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body row gy-4">
                <div class="col-sm-12 col-lg-4 text-center pt-md-5 px-3">
                    <span class="badge bg-label-primary mb-3"><i class="mdi mdi-wallet-giftcard mdi-36px"></i></span>
                    <h3 class="card-title display-6">Today's Free Courses</h3>
                    <p class="card-text">
                        We offers 284 Free Online courses from top tutors and companies to help you start or advance
                        your career
                        skills. Learn online for free and fast today!
                    </p>
                    <button class="btn btn-primary">Get premium courses</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/events/event.blade.php ENDPATH**/ ?>