<!DOCTYPE html>
<?php if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()?->rtl == 1): ?>
    <html dir="rtl" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php else: ?>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php endif; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($page_title ?? ''); ?></title>
    <link rel="icon" href="<?php echo e(asset('assets/logo/' . get_setting('front_favicon'))); ?>" type="image/x-icon" width="50">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/libraries/cutealert/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/boxicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/jquery-ui.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/jquery-ui-timepicker-addon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/summernote-lite.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/libraries/dropzone/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/select2.min.css')); ?>">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet"href="<?php echo e(asset('backend/libraries/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap-tagsinput.css')); ?>">
        <?php echo $__env->yieldPushContent('css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('backend/css/style.css?v=')); ?><?php echo e(rand(1000,9999)); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('backend/css/toastr.min.css')); ?>">

        <?php if(Session::has('locale')): ?>
            <?php if(Session::get('locale') == 'sa'): ?>
                <link rel="stylesheet" href="<?php echo e(asset('backend/css/rtl.css?v=')); ?><?php echo e(rand(1000,9999)); ?>">
            <?php endif; ?>
        <?php endif; ?>
        <script>
            var successAlertImage = "<?php echo e(asset('backend/libraries/cutealert/img/success.svg')); ?>";
            var errorAlertImage = "<?php echo e(asset('backend/libraries/cutealert/img/error.svg')); ?>";
            var questionAlertImage = "<?php echo e(asset('backend/libraries/cutealert/img/question.svg')); ?>";
            var warningALertImage = "<?php echo e(asset('backend/libraries/cutealert/img/warning.svg')); ?>";
        </script>
</head>

<body>

    <div class="layout-wrapper">

        <?php echo $__env->make('backend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="main-container">
            <!-- sidebar-area -->
            <?php echo $__env->make('backend.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <!-- main-content -->
            <div class="main-content">
                <!-- page-content -->
                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <div class="footer">
                <?php echo $__env->yieldPushContent('footer'); ?>
            </div>
        </div>
    </div>

    <script>
        let baseUrl = "<?php echo e(url('/')); ?>"
    </script>

    <script src="<?php echo e(asset('backend/js/jquery-3.7.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/jquery-ui.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/summernote-lite.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/fontawesome.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/libraries/cutealert/js/cute-alert.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/libraries/sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/jquery-ui-timepicker-addon.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/html2pdf.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/libraries/dropzone/dropzone.min.js')); ?>"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo e(asset('backend/libraries/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/bootstrap-tagsinput.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/egns.js')); ?>"></script>

    <!-- Font Awesome Icon Picker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js">
    </script>
    <script>
        $(function() {
            $('.icon-picker').iconpicker({
                hideOnSelect: true
            });
        });
    </script>
    <?php echo $__env->yieldPushContent('js'); ?>

    <script>
        $('.icp-auto').iconpicker();

        <?php if(Session::has('success')): ?>
            cuteToast({
                type: "success",
                message: "<?php echo e(session('success')); ?>",
                img: successAlertImage,
                timer: 2000
            });
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            cuteToast({
                type: "error",
                message: "<?php echo e(session('error')); ?>",
                img: errorAlertImage,
                timer: 2000
            });
        <?php endif; ?>
        <?php if($errors->any()): ?>
            var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            document.onreadystatechange = function() {
                myModal.show();
            };
        <?php endif; ?>
    </script>

</body>

</html>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/layouts/master.blade.php ENDPATH**/ ?>