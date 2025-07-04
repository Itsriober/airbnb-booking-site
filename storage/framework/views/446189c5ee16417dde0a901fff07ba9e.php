<?php
    $sliderDataItem = [];
    if (isset($singelWidgetData->widget_content)) {
        $sliderDataItem = $singelWidgetData->getTranslation('widget_content');
    }
?>
<?php if(isset($sliderDataItem['slider'])): ?>
<div class="home1-banner-area">
        <div class="container-fluid">
            <div class="swiper home1-banner-slider">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $sliderDataItem['slider']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $itemData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($itemData['img'])): ?>
                    <div class="swiper-slide">
                        <div class="home1-banner-wrapper"
                            style="background-image: linear-gradient(180deg, rgba(16, 12, 8, 0.4) 0%, rgba(16, 12, 8, 0.4) 100%), url(<?php echo e(asset('uploads/sliders/' . $itemData['img'])); ?>);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="home1-banner-content">
                                            <div class="eg-tag">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                        viewBox="0 0 18 18">
                                                        <path
                                                            d="M12.005 11.8928C13.9204 8.88722 13.6796 9.2622 13.7348 9.18383C14.4322 8.20023 14.8008 7.04257 14.8008 5.83594C14.8008 2.63602 12.2041 0 9 0C5.80634 0 3.19922 2.63081 3.19922 5.83594C3.19922 7.0418 3.57553 8.22976 4.29574 9.22662L5.99491 11.8929C4.17822 12.172 1.08984 13.004 1.08984 14.8359C1.08984 15.5037 1.52571 16.4554 3.60218 17.197C5.05209 17.7148 6.96906 18 9 18C12.7978 18 16.9102 16.9287 16.9102 14.8359C16.9102 13.0037 13.8254 12.1726 12.005 11.8928ZM5.17672 8.6465C5.17093 8.63744 5.16487 8.62856 5.15855 8.61985C4.55924 7.79537 4.25391 6.81824 4.25391 5.83594C4.25391 3.19859 6.37755 1.05469 9 1.05469C11.617 1.05469 13.7461 3.19954 13.7461 5.83594C13.7461 6.81982 13.4465 7.7638 12.8796 8.56656C12.8288 8.63357 13.0939 8.22182 9 14.6457L5.17672 8.6465ZM9 16.9453C4.85177 16.9453 2.14453 15.726 2.14453 14.8359C2.14453 14.2377 3.53559 13.2541 6.61809 12.8707L8.55527 15.9104C8.60291 15.9852 8.66863 16.0467 8.74636 16.0893C8.82408 16.132 8.91131 16.1543 8.99996 16.1543C9.08862 16.1543 9.17584 16.132 9.25357 16.0893C9.3313 16.0467 9.39702 15.9852 9.44466 15.9104L11.3818 12.8707C14.4644 13.2541 15.8555 14.2377 15.8555 14.8359C15.8555 15.7184 13.1726 16.9453 9 16.9453Z" />
                                                        <path
                                                            d="M9 3.19922C7.54611 3.19922 6.36328 4.38205 6.36328 5.83594C6.36328 7.28982 7.54611 8.47266 9 8.47266C10.4539 8.47266 11.6367 7.28982 11.6367 5.83594C11.6367 4.38205 10.4539 3.19922 9 3.19922ZM9 7.41797C8.12767 7.41797 7.41797 6.70827 7.41797 5.83594C7.41797 4.96361 8.12767 4.25391 9 4.25391C9.87233 4.25391 10.582 4.96361 10.582 5.83594C10.582 6.70827 9.87233 7.41797 9 7.41797Z" />
                                                    </svg>
                                                    <?php echo e($itemData['location']); ?>

                                                </span>
                                            </div>
                                            <h1><?php echo e($itemData['title']); ?></h1>
                                            <p><?php echo e($itemData['description']); ?></p>
                                            <div class="banner-content-bottom">
                                                <?php if(isset($itemData['button_text'])): ?>
                                                <a href="<?php echo e($itemData['button_url']); ?>" class="primary-btn1"><?php echo e($itemData['button_text']); ?> </a>
                                                <?php endif; ?>
                                                <?php if($itemData['rating']): ?>
                                                <div class="rating-area">
                                                    <?php if($itemData['rating_logo']): ?>
                                                    <div class="icon">
                                                        <img width="50" src="<?php echo e(asset('uploads/sliders/' . $itemData['rating_logo'])); ?>" alt="icon">
                                                    </div>
                                                    <?php endif; ?>
                                                    <div class="content">
                                                        <div class="rating">
                                                            <ul>
                                                            <?php $rating = $itemData['rating']; ?>
                                                                <?php $__currentLoopData = range(1,5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($rating > 0): ?>
                                                                <?php if($rating > .9): ?>
                                                                <li><i class="bi bi-circle-fill"></i></li>
                                                                <?php else: ?>
                                                                <li><i class="bi bi-circle-half"></i></li>
                                                                <?php endif; ?>
                                                                <?php else: ?>
                                                                <li><i class="bi bi-circle"></i></li>
                                                                <?php endif; ?>

                                                                <?php $rating--; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>

                                                            <span><?php echo e($itemData['rating'] ? $itemData['rating'].'/5.0' : ''); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="slider-btn-grp">
                <div class="slider-btn home1-banner-prev">
                    <i class="bi bi-arrow-left"></i>
                </div>
                <div class="slider-btn home1-banner-next">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/sliders.blade.php ENDPATH**/ ?>