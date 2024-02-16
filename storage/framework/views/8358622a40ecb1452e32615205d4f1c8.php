<div>
    <div class="container">
        <h1>Resize Image Uploading Demo</h1>
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo e($message); ?></strong>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Original Image:</strong>
                <br/>
                <img src="/images/<?php echo e(Session::get('imageName')); ?>" />
            </div>
            <div class="col-md-4">
                <strong>Thumbnail Image:</strong>
                <br/>
                <img src="/thumbnail/<?php echo e(Session::get('imageName')); ?>" />
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <section class="carousel mb-5">
            <div id="carouselExampleFade" class="mt-3 carousel slider-container slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active"></button>
                    <?php $__currentLoopData = $Slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="<?php echo e(++$key); ?>" ></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo e(asset('assetsWebsite/img/slider/' . $firstSlide->filename)); ?>" class="d-block w-100" alt="...">
                        <div class="content">
                            <h1><?php echo e($firstSlide->titel); ?></h1>
                            <p class="fw-normal"><?php echo e($firstSlide->description); ?></p>
                        </div>
                    </div>
                    <?php $__currentLoopData = $Slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item">
                            <img src="<?php echo e(asset('assetsWebsite/img/slider/' . $Slide->filename)); ?>" class="d-block w-100" alt="...">
                            <div class="content">
                                <h1><?php echo e($Slide->titel); ?></h1>
                                <p class="fw-normal"><?php echo e($Slide->description); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </div>

    <form enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <br/>
                <input wire:model="title" type="text" class="form-control" placeholder="Add Title"/>
            </div>
            <div class="col-md-4">
                <br/>
                <input wire:model="description" type="text" class="form-control" placeholder="Add Description"/>
            </div>
            <div class="col-md-12">
                <br/>
                <input wire:model="image" type="file" class="image" accept=".jpg, .png"/>
            </div>

            <div class="col-md-12">
                <br/>
                <button wire:click="resizeImagePost" type="button" class="btn btn-success">Upload Image</button>
            </div>
        </div>
    </form>
</div>
<?php /**PATH F:\LaravelProjects\JAZContentManagement\resources\views/livewire/slideshow/slideshow.blade.php ENDPATH**/ ?>