<?php $__env->startSection('content'); ?>
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area">
                        <h3><?php echo e(translate('User Login')); ?></h3>
                        <form action="<?php echo e(route('login')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Enter Your Email')); ?> <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e(old('login')); ?>"
                                            class="<?php if($errors->any()): ?> is-invalid <?php endif; ?>"
                                            name="login" id="login"
                                            placeholder="<?php echo e(translate('Enter Username or Email')); ?>">
                                            <?php if($errors->any()): ?>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($error); ?></strong>
                                            </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label><?php echo e(translate('Password')); ?> <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="password" id="password" name="password"
                                                placeholder="<?php echo e(translate('Enter your password...')); ?>">
                                            <i class="bi bi-eye-slash togglePassword" style="cursor: pointer;"></i>
                                        </div>
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


                                <div class="col-lg-12 mb-20">
                                    <div class="form-agreement d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input me-1" type="checkbox" name="remember"
                                                    value="1" id="remember"
                                                    <?php echo e(old('remember') == 1 ? 'checked' : ''); ?>>
                                                <?php echo e(__('Remember Me')); ?>


                                            </label>
                                        </div>
                                        <?php if(Route::has('password.request')): ?>
                                            <a id="forgotpass" href="<?php echo e(route('password.request')); ?>"
                                                class="forgot-pass"><?php echo e(translate('Forgotten Password')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if(get_setting('google_recapcha_check') == 1): ?>
                                    <div class="g-recaptcha mb-3" data-sitekey="<?php echo e(get_setting('recaptcha_key')); ?>"></div>
                                    <?php if(Session::has('g-recaptcha-response')): ?>
                                        <p class="text-danger"> <?php echo e(Session::get('g-recaptcha-response')); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            <?php echo e(translate('Login')); ?>

                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <!-- Registration link -->
                                        <p class="mt-3"><?php echo e(translate("Don't have an account")); ?>?
                                            <a class="text-info"
                                                href="<?php echo e(route('register')); ?>"><?php echo e(translate('Register Here')); ?></a>
                                        </p>
                                    </div>
                                </div>
                                <?php if(get_setting('GOOGLE_CLIENT_ID') && get_setting('GOOGLE_CLIENT_SECRET') && get_setting('GOOGLE_REDIRECT_URL')): ?>
                                <div class="divider text-center">
                                    <span><?php echo e(translate('or')); ?></span>
                                </div>
                                <div class="py-2">
                                    <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>"
                                        class="google-login-btn eg-btn google-btn d-flex align-items-center">
                                        <div class="icon">
                                            <img src="<?php echo e(asset('frontend/img/home1/icon/google-icon.svg')); ?>"
                                                alt="Google Login">
                                        </div>
                                        <?php echo e(translate('Sign in with Google')); ?>

                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.template-' . selectedTheme() . '.partials.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/frontend/template-1/auth/login.blade.php ENDPATH**/ ?>