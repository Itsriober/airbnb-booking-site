<!-- modal for review -->
<div class="modal fade" id="staticBackdrop2" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="row g-2">
                    <div class="col-lg-12">
                        <div class="review-from-wrapper">
                            <h4><?php echo e(translate('Write Your Review')); ?></h4>
                            <form action="<?php echo e(route('review.submit')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product_id); ?>">
                                <input type="hidden" name="product_type" value="<?php echo e($product_type); ?>">
                                <div class="row">
                                    <div class="col-lg-12 mb-40">
                                        <div class="star-rating-wrapper">
                                            <div class="rating"> <input type="radio" name="rating" value="5"
                                                    id="5"><label for="5">☆</label> <input type="radio"
                                                    name="rating" value="4" id="4"><label
                                                    for="4">☆</label> <input type="radio" name="rating"
                                                    value="3" id="3"><label for="3">☆</label> <input
                                                    type="radio" name="rating" value="2" id="2"><label
                                                    for="2">☆</label> <input type="radio" name="rating"
                                                    value="1" id="1"><label for="1">☆</label> </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="form-inner">
                                            <label><?php echo e(translate('Review')); ?>*</label>
                                            <textarea name="review" placeholder="Enter Your Review..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit"
                                            class="primary-btn1 "><?php echo e(translate('Submit Now')); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/includes/review_modal.blade.php ENDPATH**/ ?>