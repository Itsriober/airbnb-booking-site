<?php $__env->startSection('content'); ?>
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">

                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area">
                        <h3><?php echo e(translate('Customer Register')); ?></h3>
                        <form action="<?php echo e(route('register')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('First Name')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e(old('first_name')); ?>"
                                            class="<?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name"
                                            placeholder="<?php echo e(translate('First Name')); ?>" required>
                                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Last Name')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e(old('last_name')); ?>"
                                            class="<?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name"
                                            placeholder="<?php echo e(translate('Last Name')); ?>" required>
                                        <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Username')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e(old('username')); ?>"
                                            class="<?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username"
                                            placeholder="<?php echo e(translate('Username')); ?>" required>
                                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Enter Your Email')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                            placeholder="<?php echo e(translate('Enter Your Email')); ?>" value="<?php echo e(old('email')); ?>" required>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Password')); ?> <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="password <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password"
                                                placeholder="<?php echo e(translate('Enter Password...')); ?>">
                                            <i class="bi bi-eye-slash togglePassword" style="cursor: pointer;"></i>
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Confirm Password')); ?> <span
                                                class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="password" id="password"
                                                name="password_confirmation"
                                                placeholder="<?php echo e(translate('Confirm Password...')); ?>">
                                            <i class="bi bi-eye-slash togglePassword" style="cursor: pointer;"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-20">
                                    <div class="form-agreement d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input me-1" type="checkbox" name="terms_policy"
                                                    value="1" id="remember terms_policy"
                                                    <?php echo e(old('terms_policy') == 1 ? 'checked' : ''); ?> required>
                                                <label for="terms_policy">
                                                    <?php echo e(translate('I agree to the Terms & Policy')); ?></label>
                                                <br>
                                                <span class="terms_policy" style="display:none;">
                                                    <strong
                                                        class="text-danger"><?php echo e(translate('The Terms & Policy field is required')); ?>.</strong>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner d-flex justify-content-between align-items-center">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            <?php echo e(translate('Register Now')); ?>

                                        </button>                                     
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <!-- Login link -->
                                        <p class="mt-3"><?php echo e(translate("Already have an account")); ?>?
                                            <a class="text-info"
                                                href="<?php echo e(route('login')); ?>"><?php echo e(translate('Login Here')); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . selectedTheme() . '.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/auth/register.blade.php ENDPATH**/ ?>