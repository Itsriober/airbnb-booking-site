<?php $__env->startSection('content'); ?>
    <?php
        $product_id = $tour->id;
        $product_type = 'tour';
        $author_id = $tour->author_id;
    ?>
    <?php echo $__env->make('frontend.template-' . $templateId . '.breadcrumb.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Start Activitis section -->
    <div class="package-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="co-lg-12">
                    <div class="package-img-group mb-50">
                        <div class="row align-items-center g-3">
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap">
                                    <img src="<?php echo e(asset('uploads/tour/features/' . $tour->features_image)); ?>" alt="<?php echo e($tour->title); ?>">
                                    <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/tour/features/' . $tour->features_image)); ?>"><i
                                            class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 h-100">
                                <div class="row g-3 h-100">
                                    <?php
                                        if($tour->youtube_image && $tour->youtube_video){
                                            $gallery = $galleries->slice(0, 3);
                                        }else{
                                            $gallery = $galleries->slice(0, 4);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($tour->youtube_video && $tour->youtube_image == ''): ?>
                                    <?php if($loop->remaining == 1 && $galleries->count() > $gallery->count()): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo e(translate('View More Images')); ?></button>   
                                        </div>
                                    </div>
                                    <?php elseif($loop->last): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01"
                                                href="<?php echo e($tour->youtube_video); ?>"><i
                                                    class="bi bi-play-circle"></i> <?php echo e(translate('Watch Video')); ?></a>   
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php if($loop->last && $galleries->count() > $gallery->count()): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> <?php echo e(translate('View More Images')); ?></button>   
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>" alt="gallery">
                                            <a data-fancybox="gallery-01" href="<?php echo e(asset('uploads/tour/gallery/' . $image->image)); ?>"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($tour->youtube_image && $tour->youtube_video): ?>
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="<?php echo e(asset('uploads/tour/youtube/'.$tour->youtube_image)); ?>" alt="<?php echo e($tour->youtube_image); ?>">
                                            <a data-fancybox="gallery-01"
                                                href="<?php echo e($tour->youtube_video); ?>"><i
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
                <a href="<?php echo e(asset('uploads/tour/gallery/' . $img->image)); ?>" data-fancybox="images"><img src="<?php echo e(asset('uploads/tour/gallery/' . $img->image)); ?>" alt="image"></a>   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div> 
            <?php endif; ?> 

            <div class="row g-xl-4 gy-5">
                <div class="col-xl-8">
                    <?php if(!empty($tour->shoulder)): ?>
                        <div class="eg-tag2">
                            <span><?php echo e($tour->getTranslation('shoulder')); ?></span>
                        </div>
                    <?php endif; ?>
                    <h2><?php echo e($tour->getTranslation('title')); ?></h2>
                    <div class="tour-price">
                        <h3 class="">
                            <?php if($tour->sale_price): ?>
                                <span><?php echo e(currency_symbol() . $tour->sale_price); ?>

                                <del><?php echo e(currency_symbol() . $tour->price); ?></del></span><?php else: ?><span><?php echo e(currency_symbol() . $tour->price); ?></span>
                            <?php endif; ?>
                        </h3><span>/<?php echo e(translate('per person')); ?></span>
                    </div>
                    <ul class="tour-info-metalist">
                        <?php
                            if($tour->enable_fixed_dates == 1 && $tour->fixed_dates){
                                    $dates = json_decode($tour->fixed_dates);
                          
                                    foreach ($dates as $key=>$date){
                                        if ($key == 1){
                                            $start_date =  new DateTime($date->start_date);
                                            $end_date =  new DateTime($date->end_date);
                                        }
                                    }

                                    $interval = $start_date->diff($end_date);
                                    $days = $interval->days;
                                    $nights = $days - 1;
                                }else{
                                    $start_date = null;
                                    $end_date = null;
                                    $interval = null;
                                }
                                
                            ?>
                            <?php if($start_date && $end_date): ?>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7ZM7 3.0625C7 2.94647 6.95391 2.83519 6.87186 2.75314C6.78981 2.67109 6.67853 2.625 6.5625 2.625C6.44647 2.625 6.33519 2.67109 6.25314 2.75314C6.17109 2.83519 6.125 2.94647 6.125 3.0625V7.875C6.12502 7.95212 6.14543 8.02785 6.18415 8.09454C6.22288 8.16123 6.27854 8.2165 6.3455 8.25475L9.408 10.0048C9.5085 10.0591 9.62626 10.0719 9.73611 10.0406C9.84596 10.0092 9.93919 9.93611 9.99587 9.83692C10.0525 9.73774 10.0682 9.62031 10.0394 9.50975C10.0107 9.39919 9.93982 9.30426 9.842 9.24525L7 7.62125V3.0625Z">
                                </path>
                            </svg>
                            <?php echo e($days); ?> <?php echo e(translate('Days')); ?> / <?php echo e($nights); ?> <?php echo e(translate('Nights')); ?>

                        </li>
                        <?php endif; ?>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 7C7.92826 7 8.8185 6.63125 9.47487 5.97487C10.1313 5.3185 10.5 4.42826 10.5 3.5C10.5 2.57174 10.1313 1.6815 9.47487 1.02513C8.8185 0.368749 7.92826 0 7 0C6.07174 0 5.1815 0.368749 4.52513 1.02513C3.86875 1.6815 3.5 2.57174 3.5 3.5C3.5 4.42826 3.86875 5.3185 4.52513 5.97487C5.1815 6.63125 6.07174 7 7 7ZM14 12.8333C14 14 12.8333 14 12.8333 14H1.16667C1.16667 14 0 14 0 12.8333C0 11.6667 1.16667 8.16667 7 8.16667C12.8333 8.16667 14 11.6667 14 12.8333Z">
                                </path>
                            </svg>
                            <?php echo e(translate('Max People')); ?> : <?php echo e($tour->max_people); ?>

                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 0.43748C14 0.372778 13.9856 0.308889 13.9579 0.250418C13.9302 0.191947 13.8898 0.140348 13.8398 0.0993396C13.7897 0.0583312 13.7312 0.0289339 13.6684 0.0132656C13.6057 -0.00240264 13.5402 -0.00395173 13.4768 0.00872996L9.1875 0.86623L4.89825 0.00872996C4.84164 -0.00258444 4.78336 -0.00258444 4.72675 0.00872996L0.35175 0.88373C0.252608 0.903546 0.163389 0.957088 0.099263 1.03525C0.0351366 1.11342 6.10593e-05 1.21138 0 1.31248L0 13.5625C3.90711e-05 13.6272 0.0144289 13.6911 0.0421328 13.7495C0.0698367 13.808 0.110165 13.8596 0.160212 13.9006C0.210259 13.9416 0.268779 13.971 0.331556 13.9867C0.394332 14.0024 0.459803 14.0039 0.52325 13.9912L4.8125 13.1337L9.10175 13.9912C9.15836 14.0025 9.21664 14.0025 9.27325 13.9912L13.6482 13.1162C13.7474 13.0964 13.8366 13.0429 13.9007 12.9647C13.9649 12.8865 13.9999 12.7886 14 12.6875V0.43748ZM4.375 12.3287V0.97123L4.8125 0.88373L5.25 0.97123V12.3287L4.89825 12.2587C4.84165 12.2474 4.78335 12.2474 4.72675 12.2587L4.375 12.3287ZM8.75 13.0287V1.67123L9.10175 1.74123C9.15836 1.75254 9.21664 1.75254 9.27325 1.74123L9.625 1.67123V13.0287L9.1875 13.1162L8.75 13.0287Z">
                                </path>
                            </svg>
                            <?php echo e($tour->destinations?->destination); ?>

                            
                        </li>
                    </ul>
                    <p><?php echo $tour->getTranslation('content'); ?></p>
                    <?php if($attributes): ?>
                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php

                                $attributeTerms = json_decode($tour->attribute_terms);

                                if (is_array($attributeTerms) && count($attributeTerms) > 0) {
                                
                                    $terms = App\Models\TourAttributeTerm::where('attribute_id', $attribute->id)
                                        ->whereIn('id', $attributeTerms)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                } else {
                                    $terms = collect();
                                }


                            ?>
                            <?php if($terms->count() > 0): ?>
                                <h4><?php echo e($attribute->getTranslation('name')); ?></h4>
                                <ul class="extra-service mb-20">
                                    <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <?php if($term->icon): ?>
                                                <i class="<?php echo e($term->icon); ?>"></i>
                                            <?php elseif($term->image): ?>
                                                <img src="<?php echo e(asset('uploads/tour/attribute/' . $term->image)); ?>"
                                                    alt="<?php echo e($term->name); ?>">
                                            <?php endif; ?>
                                            <?php echo e($term->getTranslation('name')); ?>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                    <div class="includ-and-exclud-area mb-20">
                        <?php if($includes): ?>
                            <ul>
                                <h4><?php echo e($tour->include_title ? $tour->include_title : translate('Includes')); ?></h4>
                                <?php $__empty_1 = true; $__currentLoopData = $includes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $include): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($include['title']): ?>
                                    <li><i class="bi bi-check-lg"></i><?php echo e($include['title']); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h2 class="text-center"><?php echo e(translate('Yoo! Nothings Here Bruhv')); ?></h2>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if($excludes): ?>
                            <ul class="exclud">
                                <h4><?php echo e($tour->exclude_title ? $tour->exclude_title : translate('Excludes')); ?></h4>
                                <?php $__empty_1 = true; $__currentLoopData = $excludes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exclude): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($exclude['title']): ?>
                                    <li><i class="bi bi-x-lg"></i> <?php echo e($exclude['title']); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h2 class="text-center"><?php echo e(translate('Yoo! Nothings Here Bruhv')); ?></h2>
                                <?php endif; ?>

                            </ul>
                        <?php endif; ?>
                    </div>

                    <?php if($highlights && count($highlights) > 0): ?>
                        <div class="highlight-tour mb-20">
                            <h4><?php echo e($tour->highlight_title ? $tour->highlight_title : translate('Highlights of the Tour')); ?></h4>
                            <ul>
                                <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($highlight['title']): ?>
                                    <li><span><i class="bi bi-check"></i></span> <?php echo e($highlight['title']); ?></li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if($itinerary): ?>
                        <h4><?php echo e($tour->itinerary_title ? $tour->itinerary_title : translate('Itinerary')); ?></h4>
                        <div class="accordion tour-plan" id="tourPlan">
                            <?php $__currentLoopData = $itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data['title']): ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?php echo e($key); ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo e($key); ?>"
                                            aria-expanded="<?php echo e($key === 0 ? 'true' : 'false'); ?>"
                                            aria-controls="collapse<?php echo e($key); ?>">
                                            <span><?php echo e(translate('Day')); ?> <?php echo e($key); ?> :</span>
                                            <?php echo e($data['title']); ?>

                                        </button>
                                    </h2>
                                    <div id="collapse<?php echo e($key); ?>"
                                        class="accordion-collapse collapse <?php echo e($key === 1 ? 'show' : ''); ?>"
                                        aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#tourPlan">
                                        <div class="accordion-body">
                                            <ul>
                                                <li><?php echo e($data['content']); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if($tour->map_lng && $tour->map_lat): ?>
                        <div class="tour-location">
                            <h4><?php echo e(translate('Location Map')); ?></h4>
                            <div class="map-area mb-30">
                                <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?q=<?php echo e($tour->map_lat); ?>,<?php echo e($tour->map_lng); ?>&hl=es&z=14&amp;output=embed">
                                </iframe>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($faqs): ?>
                        <div class="faq-content-wrap mb-80">
                            <div class="faq-content-title mb-20">
                                <h4><?php echo e($tour->faq_title ? $tour->faq_title : translate('Frequently Asked & Question')); ?></h4>
                            </div>
                            <div class="faq-content">
                                <div class="accordion" id="accordionTravel">
                                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($faq['title']): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheading<?php echo e($key); ?>">
                                                <button class="accordion-button <?php echo e($key === 1 ? '' : 'collapsed'); ?>"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#travelcollapse<?php echo e($key); ?>"
                                                    aria-expanded="<?php echo e($key === 0 ? 'true' : 'false'); ?>"
                                                    aria-controls="travelcollaps<?php echo e($key); ?>">
                                                    <?php echo e($faq['title']); ?>

                                                </button>
                                            </h2>
                                            <div id="travelcollapse<?php echo e($key); ?>"
                                                class="accordion-collapse collapse <?php echo e($key === 1 ? 'show' : ''); ?>"
                                                aria-labelledby="travelheading<?php echo e($key); ?>"
                                                data-bs-parent="#accordionTravel">
                                                <div class="accordion-body">
                                                    <?php echo e($faq['content']); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::check() && Auth::user()->role == 1): ?>
                    <div class="review-wrapper">
                        <?php echo $__env->make('frontend.template-' . $templateId . '.includes.review_area', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4">

                    <?php echo $__env->make('frontend.template-' . $templateId . '.includes.tour.booking', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <div class="banner2-card">
                        <?php echo $__env->make('frontend.template-' . $templateId . '.includes.tour.banner2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Activitis section -->
    <?php echo $__env->make('frontend.template-' . $templateId . '.includes.review_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . $templateId . '.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/tour_details.blade.php ENDPATH**/ ?>