<div class="mt-n4">
    <h4 class="mb-2">
        <span class="text-muted fw-light">الاحداث /</span><span> تحرير حدث </span>
    </h4>

    <div class="app-ecommerce">
        <!-- Add Product -->
        <div wire:ignore id="sticky-wrapper" class="sticky-wrapper">
            <div class="sticky-element card px-3 py-0 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
                <div class="d-flex flex-column justify-content-center">
                    <h4 class="mb-1 mt-3">تحرير الحدث</h4>
                    <p>الاحداث التي سوف تقدم من خلال النشر في الموقع الالكتروني</p>
                </div>
                <div class="d-flex align-content-center flex-wrap gap-3">
                    <button wire:click="CancelPublishDraft" class="btn btn-outline-secondary">تجاهل</button>
                    <button wire:click="UodatePublishDraft('draft')" class="btn btn-outline-primary">تعديل وحفظ المسودة</button>
                    <button wire:click="UodatePublishDraft('published')" class="btn btn-primary">تعديل ونشر الحدث</button>
                </div>
            </div>
        </div>

        <div class="row mt-2">

            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">معلومات الحدث</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-floating form-floating-outline mb-4">
                            <input wire:model.defer="TitleAR" wire:keyup="changeArabicEventTitle($event.target.value)" type="text" class="form-control" id="eventTitle" placeholder="عنوان الحدث">
                            <label for="ecommerce-product-name" class="flat">عنوان الحدث باللغة العربية</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <input wire:model.defer="TitleEN" wire:keyup="changeEventEnglishTitle($event.target.value)" type="text" dir="ltr" class="form-control" id="ecommerce-product-name" placeholder="عنوان الحدث" name="productTitle" aria-label="Product title">
                            <label for="ecommerce-product-name" class="flat">عنوان الحدث باللغة الانكليزية</label>
                        </div>

                        <!-- Arabic Comment -->
                        <div>
                            <label class="form-label fw-bolder">تفاصيل الحدث <span class="text-muted">(باللغة العربية)</span></label>
                            <div class="form-control p-0 pt-1">
                                <textarea wire:model.defer="DescriptionAR" wire:keyup="changeEventArabicDescription($event.target.value)" class="form-control"></textarea>
                                
                            </div>
                        </div>
                        <!-- Arabic Comment -->

                        <!-- English Comment -->
                        <div class="mt-3 mb-4">
                            <label class="form-label fw-bolder">تفاصيل الحدث <span class="text-muted">(باللغة الانكليزية)</span></label>
                            <div class="form-control p-0 pt-1">
                                <textarea wire:model.defer="DescriptionEN" wire:keyup="changeEventEnglishDescription($event.target.value)" class="form-control"></textarea>

                                
                            </div>
                        </div>
                        <!-- English Comment -->

                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-4 g-2 mb-0">
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer="Price" wire:keyup="changeEventPrice($event.target.value)" type="text" class="form-control" id="event-price" autocomplete="off" placeholder="سعر الحدث" onkeypress="return onlyNumberKey(event)">
                                    <label for="event-price" class="flat">سعر الحدث</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer="StartDate" type="text" autocomplete="off" class="form-control flatpickr-input" id="EventStartDate" />
                                    <label for="EventStartDate">تاريخ بداية الحدث</label>
                                </div>
                                <?php $__errorArgs = ['StartDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class='text-danger'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input wire:model.defer="EndDate" type="text" autocomplete="off" class="form-control flatpickr-input" id="EventEndDate" />
                                    <label for="EventEndDate">تاريخ نهاية الحدث</label>
                                </div>
                                <?php $__errorArgs = ['EndDate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class='text-danger'> <?php echo e($message); ?> </small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col">
                                <div class="d-flex justify-content-between align-items-center pt-3">
                                    <div class="w-25 d-flex justify-content-end">
                                        <label class="switch switch-primary">
                                            <input wire:model.defer="Active" wire:click='SetActiveDeactivate' type="checkbox" class="switch-input" >
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on">
                                                    <span class="switch-off"></span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>
                                    <p class="mb-0">تفعيل الحدث</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Information -->

                <!-- Media -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title"> صورة الغلاف <small class="text-muted">(اصورة رئيسية للحدث)</small> </h5>
                    </div>
                    <div class="card-body">
                        <label for="images" class="drop-container" id="dropcontainer">
                            <div class="<?php echo e($photo ? 'd-flex justify-content-between' : ''); ?> w-100">
                                <div class="col d-flex align-items-center flex-column align-self-center">
                                    <span class="drop-title">انقر هنا لتصفح الصور</span>
                                    <span class="drop-title">Click here to browse photos</span>
                                    <?php $__errorArgs = ['editPhoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="error mt-auto text-center"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col">
                                    <div wire:loading wire:target="photo" class="text-center w-100">جارٍ التحميل...</div>
                                    <div wire:loading.remove wire:target="photo" class="">
                                        <?php if($photo and !$editPhoto): ?>
                                            <div class="d-flex align-items-center flex-column align-self-center" style="height: 190px!important;">
                                                <img src="<?php echo e(asset('storage/event-img/'. $photo)); ?>" class="fit-content">
                                            </div>
                                            
                                            <div class="badge <?php echo e($eventPhotoSize > 1024 ? 'bg-label-danger':'bg-label-success'); ?>" style="position: absolute; left: 15%; top: 80%">حجم الصورة: <?php echo e($suffixesPhotoSize); ?></div>
                                        <?php endif; ?>
                                        <?php if($editPhoto): ?>
                                            <div class="d-flex align-items-center flex-column align-self-center" style="height: 190px!important;">
                                                <img src="<?php echo e($editPhoto->temporaryUrl()); ?>" class="fit-content">
                                            </div>
                                            <button wire:click="removeUpload" type="button" id="removeUpload" class="btn rounded-pill btn-icon btn-outline-danger waves-effect" style="position: absolute; left: 10px; top: 10px">
                                                <span class="tf-icons mdi mdi-image-remove fs-3"></span>
                                            </button>
                                            <div class="badge <?php echo e($eventEditPhotoSize > 1024 ? 'bg-label-danger':'bg-label-success'); ?>" style="position: absolute; left: 15%; top: 80%">حجم الصورة: <?php echo e($suffixesEditPhotoSize); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <input wire:model="editPhoto" type="file" id="images" accept="image/.jpg,.jpeg,.png" style="display: none">
                            </div>
                        </label>

                        <script>
                            const dropContainer = document.getElementById("dropcontainer")
                            const fileInput = document.getElementById("images")

                            dropContainer.addEventListener("dragover", (e) => {//alert(1)
                                // prevent default to allow drop
                                e.preventDefault()
                            }, false)

                            dropContainer.addEventListener("dragenter", () => {
                                dropContainer.classList.add("drag-active")
                            })

                            dropContainer.addEventListener("dragleave", () => {
                                dropContainer.classList.remove("drag-active")
                            })

                            dropContainer.addEventListener("drop", (e) => {
                                e.preventDefault()
                                dropContainer.classList.remove("drag-active")
                                fileInput.files = e.dataTransfer.files
                            })
                        </script>
                    </div>
                </div>

                
                <!-- /Media -->
            </div>
            <!-- /First column -->

            <!-- Second column -->
            <div class="col-12 col-lg-4 col-auto">
                <!-- Preview the event -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="card-title d-flex justify-content-between mb-n3">
                            <div class="col">
                                <h5>معاينة الحدث</h5>
                            </div>
                            <div class="col">
                                <div class="btn-group mt-n2" role="group" aria-label="Basic example">
                                    <button wire:click="ChangePreview('ar')" class="btn btn-secondary btn-sm waves-effect waves-light">
                                        <span class="mdi mdi-chevron-left scaleX-n1-rtl"></span>
                                        عربي
                                    </button>
                                    <button wire:click="ChangePreview('en')" class="btn btn-secondary btn-sm waves-effect waves-light">
                                        EN
                                        <span class="mdi mdi-chevron-right scaleX-n1-rtl"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Instock switch -->
                        <div class="card p-2 h-100 shadow-none border">
                            <div class="rounded-2 text-center mb-3" style="height: 200px!important; width: 100%!important;">
                                <?php if($photo and !$editPhoto): ?>
                                    <img src="<?php echo e(asset('storage/event-img/' . $photo)); ?>" class="fit-content img-fluid rounded" alt="event image">
                                <?php else: ?>
                                    <img src="<?php echo e($editPhoto->temporaryUrl()); ?>" class="fit-content img-fluid rounded" alt="event image"/>
                                <?php endif; ?>
                            </div>

                            
                            <div class="card-body <?php echo e($PreviewLayout == 'ar' ? '':'hidden'); ?> p-3 pt-2" style="text-align: right; direction: rtl;">
                                <a href="<?php echo e(url('app/academy/course-details')); ?>" class="h5">
                                    <?php echo e($eventArabicTitle); ?>

                                </a>
                                <p class="mt-2">
                                    <?php echo e($eventArabicDescription); ?>

                                </p>
                                <p>
                                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2">
                                        <div class="col">
                                            <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventStartDate); ?>

                                        </div>
                                        <div class="col text-end">
                                            <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventEndDate); ?>

                                        </div>
                                    </div>
                                </p>

                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-0 mt-3">
                                    <div class="col">
                                        سعر الحدث
                                    </div>
                                    <div class="col text-end h4">
                                        $<?php echo e(number_format($eventPrice)); ?>

                                    </div>
                                </div>

                                

                                

                                

                                <div class="d-flex flex-column justify-content-center flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap mb-n3">
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="btn rounded-pill btn-icon btn-secondary btn-fab demo waves-effect waves-light">
                                        <i class="mdi mdi-cart me-1"></i>
                                    </a>
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="btn rounded-pill btn-icon btn-secondary btn-fab demo waves-effect waves-light">
                                        <i class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>

                            
                            <div class="card-body <?php echo e($PreviewLayout == 'en' ? '':'hidden'); ?> p-3 pt-2" style="text-align: left; direction: ltr;">
                                <a  class="h5">
                                    <?php echo e($eventEnglishTitle); ?>

                                </a>
                                <p class="mt-2">
                                    <?php echo e($eventEnglishDescription); ?>

                                </p>
                                <p>
                                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2">
                                        <div class="col">
                                            <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventStartDate); ?>

                                        </div>
                                        <div class="col text-start">
                                            <i class="mdi mdi-calendar-multiselect"></i> <?php echo e($eventEndDate); ?>

                                        </div>
                                    </div>
                                </p>

                                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mb-0">
                                    <div class="col">
                                        Event price
                                    </div>
                                    <div class="col text-start h4">
                                        $<?php echo e(number_format($eventPrice)); ?>

                                    </div>
                                </div>

                                

                                
                                

                                <div class="d-flex flex-column justify-content-center flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap mb-n3">
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="btn rounded-pill btn-icon btn-secondary btn-fab demo waves-effect waves-light">
                                        <i class="mdi mdi-cart me-1"></i>
                                    </a>
                                    <a href="<?php echo e(url('app/academy/course-details')); ?>" class="btn rounded-pill btn-icon btn-secondary btn-fab demo waves-effect waves-light">
                                        <i class="mdi mdi-arrow-right lh-1 scaleX-n1-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Preview the event -->
            </div>
            <!-- /Second column -->
        </div>
    </div>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/events/edit-events.blade.php ENDPATH**/ ?>