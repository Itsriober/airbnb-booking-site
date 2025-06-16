<!-- Login Modal -->
<div class="modal login-modal" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-clode-btn" data-bs-dismiss="modal"></div>
            <div class="modal-header">
                <img src="<?php echo e(asset('frontend/img/home1/login-modal-header-img.jpg')); ?>" alt="">
            </div>
            <div class="modal-body">
                <div class="login-registration-form">
                    <div class="form-title">
                        <h2><?php echo e(translate('Sign in to continue')); ?></h2>
                        <p><?php echo e(translate('Enter your email address for Login.')); ?></p>
                    </div>
                    <form action="<?php echo e(route('login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-inner mb-20">
                            <input type="text" value="<?php echo e(old('login')); ?>" class="<?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> mb-1" name="login" placeholder="User name or Email *">
                            
                            <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="text-danger"><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <div class="form-inner mb-20">
                            <input type="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" id="password" placeholder="Enter Password *">            
                        </div>
                        

                        <button type="submit" class="login-btn mb-25"><?php echo e(translate('Sign In')); ?></button>
                        <div class="col-lg-12">
                            <div class="form-inner">
                                <!-- Registration link -->
                                <p><?php echo e(translate("Don't have an account")); ?>?
                                    <a class="text-info" href="<?php echo e(route('register')); ?>"><?php echo e(translate('Register Here')); ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="divider">
                            <span><?php echo e(translate('or')); ?></span>
                        </div>
                        <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>" class="google-login-btn eg-btn google-btn d-flex align-items-center">
                            <div class="icon">
                                <img src="<?php echo e(asset('frontend/img/home1/icon/google-icon.svg')); ?>" alt="">
                            </div>
                            <?php echo e(translate('Sign in with Google')); ?>

                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/partials/login_modal.blade.php ENDPATH**/ ?>