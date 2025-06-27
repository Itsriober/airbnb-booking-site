 <!-- Modal -->
 <div class="modal fade" id="testMail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="testMailLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <div class="modal-header">
                 <h5 class="modal-title" id="testMailLabel"><?php echo e(translate('Test Your Email')); ?></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="<?php echo e(route('backend.testmail')); ?>" method="POST">
                 <?php echo csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-inner mb-35">
                         <label><?php echo e(translate('Email')); ?> <span class="text-danger">*</span></label>
                         <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="username-input"
                             placeholder="<?php echo e(translate('Enter Email')); ?>" required>
                         <?php $__errorArgs = ['email'];
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
                         <label><?php echo e(translate('Message')); ?></label>
                         <textarea name="message"><?php echo e(old('message')); ?></textarea>
                         <?php $__errorArgs = ['message'];
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
                 </div>
                 <div class="modal-footer border-white">
                     <button type="button" class="eg-btn btn--red py-1 px-3 rounded"
                         data-bs-dismiss="modal"><?php echo e(translate('Close')); ?></button>
                     <button type="submit"
                         class="eg-btn btn--primary py-1 px-3 rounded"><?php echo e(translate('Send')); ?></button>
                 </div>
             </form>
         </div>
     </div>
 </div>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/backend_setting/modal.blade.php ENDPATH**/ ?>