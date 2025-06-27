 <!-- Modal -->
 <div class="modal fade" id="paymentMethodsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="paymentMethodsModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <div class="modal-header">
                 <h5 class="modal-title" id="paymentMethodsModalLabel"><?php echo e(translate('Edit Payment Method')); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <form action="<?php echo e(route('payment.methods.update')); ?>" method="POST" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>
                 <input type="hidden" name="method_id" id="method_id">
                 <div class="modal-body">
                     <div class="form-inner mb-35">
                         <label><?php echo e(translate('Method')); ?>*</label>
                         <input type="text" id="method_name" class="username-input"
                             placeholder="<?php echo e(translate('Enter Method')); ?>" readonly>
                         <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <div class="error text-danger"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-inner mb-25">
                         <label><?php echo e(translate('Logo')); ?>*</label>
                         <input type="file" name="logo" class="username-input" accept="image/*">
                         <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <div class="error text-danger"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                         <img id="payment_method_logo" src="" alt="Payment Method Logo" height="40">
                     </div>
                     <div class="d-flex mb-25" id="method_mode_div">
                         <label><?php echo e(translate('Change Mode')); ?>:</label>
                         <div class="form-check form-switch ms-2 me-2">
                             <input class="form-check-input method_mode" type="checkbox" id="method_mode"
                                 name="mode">
                         </div>
                         <button id="method_mode_btn" class="eg-btn orange-light--btn">Sandbox</button>
                     </div>
                     <div class="form-inner mb-35" id="method_key_div">
                         <label><?php echo e(translate('Key')); ?>*</label>
                         <input type="text" id="method_key" name="method_key" class="username-input"
                             placeholder="<?php echo e(translate('Enter Key')); ?>" required>
                         <?php $__errorArgs = ['method_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <div class="error text-danger"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-inner mb-35" id="method_secret_div">
                         <label><?php echo e(translate('Secret')); ?>*</label>
                         <input type="text" id="method_secret" name="method_secret" class="username-input"
                             placeholder="<?php echo e(translate('Enter Secret')); ?>" required>
                         <?php $__errorArgs = ['method_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <div class="error text-danger"><?php echo e($message); ?></div>
                         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                     </div>
                     <div class="form-inner mb-35 conversion-rate" id="method_conversion_rate_div">
                         <label><?php echo e(translate('Conversion Rate')); ?>* (<?php echo e($default_currency->name); ?>)</label>
                         <input type="hidden" id="conversion_currency_id" name="conversion_currency_id" value="1">
                         <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                 <span class="input-group-text" id="conversion_currency_label">$1 = </span>
                             </div>
                             <input type="text" class="form-control" id="conversion_currency_rate"
                                 name="conversion_currency_rate" placeholder="0.00"
                                 aria-label="Amount (to the nearest dollar)" required>
                             <div class="input-group-append">
                                 <span class="input-group-text"><?php echo e($default_currency->code); ?></span>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer border-white">
                     <button type="button" class="eg-btn btn--red py-1 px-3 rounded"
                         data-bs-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                     <button type="submit"
                         class="eg-btn btn--primary py-1 px-3 rounded"><?php echo e(translate('Update')); ?></button>
                 </div>
             </form>
         </div>
     </div>
 </div>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/payment_methods/modal.blade.php ENDPATH**/ ?>