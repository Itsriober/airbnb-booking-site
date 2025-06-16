<?php $__env->startSection('content'); ?>
    <?php
        $product_id = $hotels->id;
        $product_type = 'hotel';
        $author_id = $hotels->author_id;
    ?>
    <?php echo $__env->make('frontend.template-' . $templateId . '.breadcrumb.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <!-- Start Room Details section -->
    <div class="room-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="co-lg-12">
                    <div class="room-img-group mb-50">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap">
                                    <img src="<?php echo e(asset('uploads/hotel/features/' . $hotels->feature_img)); ?>" alt="<?php echo e($hotels->title); ?>">
                                    <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/hotel/features/' . $hotels->feature_img)); ?>"><i
                                            class="bi bi-eye"></i> <?php echo e(translate('View Room')); ?></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    <?php
                                        if($hotels->youtube_image && $hotels->youtube_video){
                                            $gallery = $galleries->slice(0, 3);
                                        }else{
                                            $gallery = $galleries->slice(0, 4);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($hotels->youtube_video && $hotels->youtube_image == ''): ?>
                                    <?php if($loop->remaining == 1 && $galleries->count() > $gallery->count()): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo e(translate('View More Images')); ?></button>   
                                        </div>
                                    </div>
                                    <?php elseif($loop->last): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01"
                                                href="<?php echo e($hotels->youtube_video); ?>"><i
                                                    class="bi bi-play-circle"></i> <?php echo e(translate('Watch Video')); ?></a>   
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if($loop->last && $galleries->count() > $gallery->count()): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo e(translate('View More Images')); ?></button>   
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/hotel/gallery/' . $image->image)); ?>"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($hotels->youtube_image &&  $hotels->youtube_video): ?>                                    
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/hotel/youtube/'.$hotels->youtube_image)); ?>" alt="<?php echo e($hotels->youtube_image); ?>">
                                            <a data-fancybox="gallery-01"
                                                href="<?php echo e($hotels->youtube_video); ?>"><i
                                                    class="bi bi-play-circle"></i> <?php echo e(translate('Watch Video')); ?></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($galleries): ?>
            <div class="others-image-wrap d-none"> 
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset('uploads/hotel/gallery/' . $img->image)); ?>" data-fancybox="images"><img src="<?php echo e(asset('uploads/hotel/gallery/' . $img->image)); ?>" alt="image"></a>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> 
            <?php endif; ?> 
 
            <div class="row g-xl-4 gy-5">
                <div class="col-xl-8">
                    <div class="location-and-review">
                        <div class="location">
                            <p><i class="bi bi-geo-alt"></i> <?php echo e($hotels->address); ?>, <?php echo e($hotels['cities']['name']); ?>,
                                <?php echo e($hotels['states']['name']); ?>,
                                <?php echo e($hotels['countries']['name']); ?> - <a
                                    href="#location-map"><?php echo e(translate('See Map')); ?></a></p>
                        </div>
                        <div class="review-area">
                            <?php
                                $total_reviews = $hotels->reviews?->count();
                                $total_rating = $hotels->reviews?->sum('rating');
                                $rating = $total_reviews > 0 && $total_rating > 0 ? $total_rating / $total_reviews : 0;
                                $rating_view = $rating;
                            ?>
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
                            <span><strong><?php echo e($total_reviews > 0 ? $rating_view : 0); ?>

                                    <?php echo e(translate('Excellent')); ?></strong> <?php echo e($total_reviews); ?>

                                <?php echo e(translate('reviews')); ?></span>
                        </div>
                    </div>
                    <h2><?php echo e($hotels->getTranslation('title')); ?></h2>
                    <div class="price-area">
                        <h6><?php echo e(currency_symbol() . $hotels->price); ?>/<span><?php echo e(translate('per night')); ?></span></h6>
                    </div>
                    <p><?php echo $hotels->getTranslation('content'); ?></p>
                    <?php if($attributes->count() > 0): ?>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $attributeTerms = json_decode($hotels->attribute_terms);

                                if (is_array($attributeTerms) && count($attributeTerms) > 0) {
                                    $terms = App\Models\HotelAttributeTerm::where('attribute_id', $attribute->id)
                                        ->whereIn('id', $attributeTerms)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                } else {
                                    $terms = collect();
                                }

                            ?>
                            <?php if($terms->count() > 0): ?>
                                <h4><?php echo e($attribute->getTranslation('name')); ?></h4>
                                <ul class="room-features">
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
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    
                    <?php echo $__env->make('frontend.template-1.partials.policies', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    
                    
                    <?php if(Auth::check() && Auth::user()->role == 1): ?>
                        <?php echo $__env->make('frontend.template-' . $templateId . '.includes.review_area', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4">
                    <div class="booking-form-wrap mb-30">
                        <?php echo $__env->make('frontend.template-' . $templateId . '.includes.hotel.booking', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div class="banner2-card">
                        <?php echo $__env->make('frontend.template-' . $templateId . '.includes.hotel.banner2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('frontend.template-' . $templateId . '.includes.review_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- End Room Details section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . $templateId . '.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/hotel_details.blade.php ENDPATH**/ ?>