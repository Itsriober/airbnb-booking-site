<?php if($paginator->hasPages()): ?>
<nav class="inner-pagination-area">
    <ul class="pagination-list">
        <?php if($paginator->onFirstPage()): ?>
        <li class="disabled">
            <span class="shop-pagi-btn" tabindex="-1"><i class="bi bi-chevron-left"></i></span>
        </li>
        <?php else: ?>
        <li>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="shop-pagi-btn" tabindex="-1"><i class="bi bi-chevron-left"></i></a>
        </li>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(is_string($element)): ?>
            <li class="disabled"><span><?php echo e($element); ?></span></li>
        <?php endif; ?>

        
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <li class="active" aria-current="page">
                        <span><?php echo e($page); ?></span>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if($paginator->hasMorePages()): ?>
    <li><a class="shop-pagi-btn" href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="bi bi-chevron-right"></i></a>
    </li>
<?php else: ?>
    <li class="disabled"><span class="shop-pagi-btn"
            href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="bi bi-chevron-right"></i></span></li>
<?php endif; ?>
    </ul>
</nav>
<?php endif; ?>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/vendor/pagination/custom.blade.php ENDPATH**/ ?>