<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($page_title ?? ''); ?></title>
    <link rel="icon" href="<?php echo e(asset('assets/logo/' . get_setting('front_favicon'))); ?>" type="image/gif" sizes="20x20">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/boxicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css')); ?>">
</head>

<body>
    <div class="login-bg d-flex jusify-content-center align-items-center">
        <img src="<?php echo e(asset('backend/images/bg/login-vector.png')); ?>" class="img-fluid login-vector">
        <div class="login-form-area">
            <div class="form-title">
                <h4><?php echo e(translate('Wellcome To')); ?> <span><?php echo e(get_setting('company_name')); ?></span></h4>
                <p><?php echo e($page_title ?? ''); ?></p>
            </div>
            <form class="admin-login" action="<?php echo e(route('admin.login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-inner mb-35">
                    <label><?php echo e(translate('Username or Email')); ?> <span class="text-danger">*</span></label>
                    <input type="text" name="login" value="<?php echo e(old('login')); ?>"
                        class="<?php $__errorArgs = ['login'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php if(Session::has('error')): ?> is-invalid <?php endif; ?>"
                        placeholder="<?php echo e(translate('Enter Username or Email')); ?>">
                    <img src="<?php echo e(asset('backend/images/icons/user-icon.png')); ?>" class="input-icon" alt="username">
                    <?php $__errorArgs = ['login'];
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
                    <?php if(Session::has('error')): ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e(session('error')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-inner mb-25">
                    <label><?php echo e(translate('Password')); ?> <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="*******">
                    <img src="<?php echo e(asset('backend/images/icons/pass-icon.png')); ?>" class="input-icon" alt="password">
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

                <button type="submit" class="eg-btn btn--primary login-btn"> <img
                        src="<?php echo e(asset('backend/images/icons/login-user.svg')); ?>" alt=""> <?php echo e(translate('Login')); ?></button>
            </form>
        </div>
    </div>
    <script src="<?php echo e(asset('backend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/fontawesome.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/auth/admin_login.blade.php ENDPATH**/ ?>