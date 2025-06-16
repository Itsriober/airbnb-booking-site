<?php if($products): ?>
    <input type="hidden" id="live_limit" value="<?php echo e($products->count()); ?>">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-6 col-md-6">
            <?php if($productType == 'tour'): ?>
                <?php echo $__env->make('frontend.template-' . $templateId . '.partials.tour_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($productType == 'hotel'): ?>
                <?php echo $__env->make('frontend.template-' . $templateId . '.partials.hotel_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($productType == 'activities'): ?>
                <?php echo $__env->make('frontend.template-' . $templateId . '.partials.activities_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php elseif($productType == 'transport'): ?>
                <?php echo $__env->make('frontend.template-' . $templateId . '.partials.transport_card', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="row mt-3">
        <?php echo prelaceScript($products->links('vendor.pagination.custom')); ?>

    </div>
<?php else: ?>
    <h1 class="text-center">
        <?php echo e(translate('Yoo! Nothings Here Bruhv')); ?></h1>
<?php endif; ?>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/partials/filter-products.blade.php ENDPATH**/ ?>