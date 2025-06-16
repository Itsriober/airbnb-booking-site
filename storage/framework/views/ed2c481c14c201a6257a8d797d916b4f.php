<?php if($policies): ?>
    <h4 class="mt-50"><?php echo e($hotels->policy_title ? $hotels->policy_title : translate('Policies')); ?></h4>
    <div class="accordion tour-plan" id="tourPlan">
        <?php $__currentLoopData = $policies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($policy['title']): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo e($key); ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo e($key); ?>" aria-expanded="<?php echo e($key === 0 ? 'true' : 'false'); ?>"
                        aria-controls="collapseOne">
                        <span><?php echo e($key + 0); ?> </span> <?php echo e($policy['title']); ?>

                    </button>
                </h2>
                <div id="collapse<?php echo e($key); ?>" class="accordion-collapse collapse <?php echo e($key === 1 ? 'show' : ''); ?>"
                    aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#tourPlan">
                    <div class="accordion-body">
                        <ul>
                            <li><?php echo nl2br($policy['content']); ?>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/partials/policies.blade.php ENDPATH**/ ?>