<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.template-' . $templateId . '.breadcrumb.breadcrumb', [
        'slugName' => 'errors',
        'title' => '404 Error',
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.template-' . $templateId . '.404', [], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . $templateId . '.partials.master', ['title' => '404 Error'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/errors/index.blade.php ENDPATH**/ ?>