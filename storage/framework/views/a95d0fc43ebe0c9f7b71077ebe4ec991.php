<div class="room-suits-card two">
    <div class="row g-0">
        <div class="col-md-12">
            <div class="swiper hotel-img-slider">
                <?php if($item->breakfast == 1): ?>
                    <span class="batch"><?php echo e(translate('Breakfast included')); ?></span>
                <?php endif; ?>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="room-img">
                            <?php if($item->feature_img): ?>
                                <img src="<?php echo e(asset('uploads/hotel/features/' . $item->feature_img)); ?>"
                                    alt="<?php echo e($item->title); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset('uploads/placeholder.jpg')); ?>" alt="<?php echo e($data->title); ?>">
                            <?php endif; ?>

                        </div>
                    </div>
                
                    <?php $__currentLoopData = $item->hotel_galleries->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="room-img">
                                <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
                <div class="swiper-pagination5"></div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="room-content">
                <div class="content-top">
                    <?php
                        $total_reviews = $item->reviews?->count();
                        $total_rating = $item->reviews?->sum('rating');
                        $rating = $total_reviews > 0 && $total_rating > 0 ? $total_rating / $total_reviews : 0;
                    ?>

                        <div class="reviews">
                            <ul class="star-list">
                                <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($rating > 0): ?>
                                        <?php if($rating > 0.5): ?>
                                            <li><i class="bi bi-star-fill"></i></li>
                                        <?php else: ?>
                                            <li><i class="bi bi-star-half"></i></li>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <li><i class="bi bi-star"></i></li>
                                    <?php endif; ?>
                                    <?php $rating--; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <span><?php echo e($total_reviews); ?> <?php echo e(translate('reviews')); ?></span>
                        </div>

                    <h5><a href="<?php echo e(route('hotel.details', ['slug' => $item->slug])); ?>"><?php echo e($item->getTranslation('title')); ?></a></h5>

                    <ul class="loaction-area">
                        <li><i class="bi bi-geo-alt"></i><?php echo e($item['cities']['name']); ?>,
                            <?php echo e($item['countries']['name']); ?></li>
                        <li><a
                                href="<?php echo e(route('hotel.details', ['slug' => $item->slug])); ?>#location-map"><?php echo e(translate('Show on map')); ?></a>
                        </li>
                    </ul>
                    <?php
                        $terms_id = json_decode($item->attribute_terms);
                        if (is_null($terms_id)) {
                            $terms_id = [];
                        }
                        $terms = App\Models\HotelAttributeTerm::whereIn('id', $terms_id)->take(5)->get();
                    ?>
                    <ul class="facilisis">
                        <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php if($term->icon): ?>
                                    <i class="<?php echo e($term->icon); ?>"></i>
                                <?php elseif($term->image): ?>
                                    <img src="<?php echo e(asset('uploads/hotel/attribute/' . $term->image)); ?>"
                                        alt="<?php echo e($term->name); ?>">
                                <?php endif; ?>
                                <?php echo e($term->getTranslation('name')); ?>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="content-bottom">
                    <div class="room-type">
                        <h6><?php echo e($item->room_type); ?></h6>
                        <span><?php echo e($item->bed_type); ?></span>
                        <div class="deals">
                            <span><strong><?php echo e(translate('Free cancellation')); ?></strong> <br> <?php echo e(translate('before')); ?>

                                <?php echo e($item->cancellation); ?>

                                <?php echo e(translate(' hours')); ?></span>
                        </div>
                    </div>
                    <div class="price-and-book">
                        <div class="price-area">
                            <p>1 night, <?php echo e($item->guest_capability); ?> <?php echo e(translate('adults')); ?></p>
                            <span><?php echo e(currency_symbol() . $item->price); ?></span>

                        </div>
                        <div class="book-btn">
                            <a href="<?php echo e(route('hotel.details', ['slug' => $item->slug])); ?>"
                                class="primary-btn2"><?php echo e('Check Availability'); ?>

                                <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/partials/hotel_card.blade.php ENDPATH**/ ?>