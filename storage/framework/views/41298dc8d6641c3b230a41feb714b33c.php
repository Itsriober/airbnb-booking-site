<?php
    $funFactsDataItem = [];
    if (isset($singelWidgetData->widget_content)) {
        $funFactsDataItem = $singelWidgetData->getTranslation("widget_content");
    }
?>
<!-- =============== counter-section start =============== -->
<?php if($funFactsDataItem['fun_facts']): ?>
<!-- =============== counter-section end =============== -->
<div class="container">
<div class="activities-counter mb-50">
    
    <div class="row justify-content-center g-lg-4 gy-5">
        <?php $__currentLoopData = $funFactsDataItem['fun_facts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-sm-6 divider d-flex justify-content-sm-center fun_facts">
            <div class="single-activity">
                <div class="icon">
                    <?php if(isset($facts['title'])): ?>
                    <img src="<?php echo e(asset('uploads/fun_facts/'.$facts['img'])); ?>" alt="<?php echo e($facts['title']); ?>">
                    <?php endif; ?>
                </div>
                <div class="content">
                    <div class="number">
                        <h5 class=""><?php echo e($facts['number_count']); ?></h5>
                       
                    </div>
                    <p><?php echo e($facts['title'] ?? ''); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</div>
<?php endif; ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/fun-facts.blade.php ENDPATH**/ ?>