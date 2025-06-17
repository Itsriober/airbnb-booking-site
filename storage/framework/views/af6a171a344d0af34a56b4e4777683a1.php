<?php $__env->startSection('content'); ?>
<?php if(Request::url() === url('/') && get_setting('show_preloader') == 1): ?>
<!-- preloader -->
<div class="egns-preloader">
    <div class="preloader-close-btn">
        <span><i class="bi bi-x-lg"></i> Close</span>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="circle-border">
                    <div class="moving-circle"></div>
                    <div class="moving-circle"></div>
                    <div class="moving-circle"></div>
                    <svg width="180px" height="150px" viewBox="0 0 187.3 93.7"
                        preserveAspectRatio="xMidYMid meet"
                        style="left: 50%; top: 50%; position: absolute; transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);">
                        <path stroke="#D90A2C" id="outline" fill="none" stroke-width="4"
                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                            d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                        <path id="outline-bg" opacity="0.05" fill="none" stroke="#959595"
                            stroke-width="4" stroke-linecap="round" stroke-linejoin="round"
                            stroke-miterlimit="10"
                            d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

    <?php if(isset($is_bread_crumb)): ?>
       <?php if($is_bread_crumb==1): ?>
            <?php echo $__env->make('frontend.template-'.$templateId.'.breadcrumb.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
       <?php endif; ?>
    <?php endif; ?>

    <?php if(count($activeWidgets)>0): ?>
        <?php $__currentLoopData = $activeWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $where = array('ui_card_number' => $item->ui_card_number);
                $singelWidgetData=\App\Models\WidgetContent::where($where)->first();
            ?>
            <?php echo $__env->make('frontend.template-'.$templateId.'.'.$singelWidgetData->widget_slug,['singelWidgetData'=>$singelWidgetData,'params'=>$params,'templateId'=>$templateId], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="pt-120 mb-120">
        <h2 class="text-center"><?php echo e(translate('No Data Found')); ?></h2>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-'.$templateId.'.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/index.blade.php ENDPATH**/ ?>