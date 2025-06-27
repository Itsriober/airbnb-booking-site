<?php $__env->startSection('content'); ?>
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4><?php echo e($page_title ?? ''); ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-wrapper">
                <table class="eg-table table">
                    <thead>
                        <tr>
                            <th><?php echo e(translate('No.')); ?></th>
                            <th><?php echo e(translate('Image')); ?></th>
                            <th><?php echo e(translate('Method')); ?></th>
                            <th><?php echo e(translate('Mode')); ?></th>
                            <th><?php echo e(translate('Status')); ?></th>
                            <th><?php echo e(translate('Option')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="S.N">
                                    <?php echo e(($payment_methods->currentpage() - 1) * $payment_methods->perpage() + $key + 1); ?></td>
                                <td data-label="Logo">
                                    <?php if(!empty($payment_method->logo)): ?>
                                        <img src="<?php echo e(asset('uploads/payment_methods/' . $payment_method->logo)); ?>"
                                            alt="<?php echo e($payment_method->method_name); ?>" height="40">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('uploads/payment_methods/' . $payment_method->default_logo)); ?>"
                                            alt="<?php echo e($payment_method->method_name); ?>" height="40">
                                    <?php endif; ?>
                                </td>
                                <td data-label="Method" class="text-capitalize"><?php echo e($payment_method->method_name); ?></td>
                                <td data-label="Mode">
                                    <?php if($payment_method->mode == 1): ?>
                                    <button class="eg-btn orange-light--btn">Sandbox</button><?php else: ?><button
                                            class="eg-btn green-light--btn">Live</button>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Status">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                            data-activations-status="<?php echo e($payment_method->status); ?>"
                                            data-id="<?php echo e($payment_method->id); ?>" data-type="payment_method"
                                            id="flexSwitchCheckStatus<?php echo e($payment_method->id); ?>"
                                            <?php if($key == 0): ?> disabled <?php endif; ?>
                                            <?php echo e($payment_method->status == 1 ? 'checked' : ''); ?>>
                                    </div>
                                </td>
                                <td data-label="Option">
                                    <div
                                        class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                        <a href="javascript:void(0)" data-toggle="tooltip"
                                            data-method_id="<?php echo e($payment_method->id); ?>" data-original-title="Edit"
                                            class="eg-btn add--btn editPaymentMethods">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                      
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $__env->make('backend.payment_methods.modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php $__env->startPush('footer'); ?>
        <div class="d-flex justify-content-center custom-pagination">
            <?php echo $payment_methods->links(); ?>

        </div>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/payment_methods/index.blade.php ENDPATH**/ ?>