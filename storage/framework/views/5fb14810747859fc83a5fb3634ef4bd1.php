<?php if($total_reviews > 0 || ($have_booking && $have_review == null)): ?>
<div class="review-wrapper mt-70">

    <h4><?php echo e(translate('Customer Review')); ?></h4>
    <div class="review-box">
        <?php if($total_reviews > 0): ?>
        <div class="total-review">
            <h2><?php echo e($average_rating ?? 0); ?></h2>
            <div class="review-wrap">
                <?php $ave_rating = $average_rating; ?>
                <ul class="star-list">
                    <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($ave_rating > 0): ?>
                            <?php if($ave_rating > 0.5): ?>
                                <li><i class="bi bi-star-fill"></i></li>
                            <?php else: ?>
                                <li><i class="bi bi-star-half"></i></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><i class="bi bi-star"></i></li>
                        <?php endif; ?>
                        <?php $ave_rating--; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <span><?php echo e($total_reviews ?? 0); ?> <?php echo e(translate('Reviews')); ?></span>
            </div>
        </div>
        <?php endif; ?>
        <?php if($have_booking && $have_review == null): ?>
            <a class="primary-btn1" data-bs-toggle="modal" href="#staticBackdrop2"
                role="button"><?php echo e(translate('GIVE A RATING')); ?></a>
        <?php endif; ?>
    </div>
    <div class="review-area">
        <ul class="comment">
            <?php if($reviews): ?>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="single-comment-area">
                            <div class="author-img">
                                <?php if($review->users?->image): ?>
                                    <img src="<?php echo e(asset('uploads/users/' . $review->users?->image)); ?>"
                                        alt="<?php echo e($review->users?->username); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('uploads/users/user.png')); ?>"
                                        alt="<?php echo e($review->users?->username); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="comment-content">
                                <div class="author-name-deg">
                                    <h6><?php echo e($review->users?->fname ? $review->users?->fname . ' ' . $review->users?->lname : $review->users?->username); ?>,
                                    </h6>
                                    <span><?php echo e($review->created_at->diffForHumans()); ?></span>
                                </div>
                                <ul class="review-item-list">
                                    <li>
                                        <?php $rating = $review->rating; ?>
                                        <ul class="star-list">
                                            <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($rating > 0): ?>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                <?php else: ?>
                                                    <li><i class="bi bi-star"></i></li>
                                                <?php endif; ?>
                                                <?php $rating--; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                </ul>
                                <p><?php echo e($review->review); ?></p>
                            </div>
                        </div>
                        <?php if($review->replies?->count() > 0): ?>
                            <ul class="comment-replay">
                                <?php $__currentLoopData = $review->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="single-comment-area">
                                            <div class="author-img">
                                                <?php if($reply->users?->image): ?>
                                                    <img src="<?php echo e(asset('uploads/users/' . $reply->users?->image)); ?>"
                                                        alt="<?php echo e($reply->users?->username); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('uploads/users/user.png')); ?>"
                                                        alt="<?php echo e($reply->users?->username); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="comment-content">
                                                <div class="author-name-deg">
                                                    <h6><?php echo e($reply->users?->fname ? $reply->users?->fname . ' ' . $reply->users?->lname : $reply->users?->username); ?>,
                                                    </h6>
                                                    <span><?php echo e($reply->created_at->diffForHumans()); ?></span>
                                                </div>
                                                <p><?php echo e($reply->review); ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <li class="text-center"><?php echo e(translate('No Comment Found')); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/includes/review_area.blade.php ENDPATH**/ ?>