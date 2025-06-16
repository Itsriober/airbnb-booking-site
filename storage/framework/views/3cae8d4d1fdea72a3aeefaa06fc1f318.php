<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/css/codemirror.css')); ?>">
    <script src="<?php echo e(asset('backend/js/codemirror.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/js/codemirror_javascript.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-title2">
        <img src="<?php echo e(asset('backend/images/bg/title-loog.svg')); ?>" class="title-logo" alt="logo">
        <h5><?php echo e(translate('Frontend Settings')); ?></h5>
        <a class="clear-cache"  href="<?php echo e(route('backend.cache-clear')); ?>"><i class="bi bi-eraser"></i>
            <?php echo e(translate('Clear Cache')); ?></a>
    </div>
    <form action="<?php echo e(route('frontend.settings.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="tab-area settings-area">
            <div class="nav flex-row jusify-content-start nav-pills" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-general-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-general" type="button" role="tab" aria-controls="v-pills-general"
                    aria-selected="true"><?php echo e(translate('General')); ?></button>

                <button class="nav-link" id="v-pills-theme-color-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-theme-color" type="button" role="tab" aria-controls="v-pills-theme-color"
                    aria-selected="true"><?php echo e(translate('Theme Color')); ?></button>
                <button class="nav-link" id="v-pills-header-setting-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-header-setting" type="button" role="tab"
                    aria-controls="v-pills-header-setting" aria-selected="true"><?php echo e(translate('Header')); ?></button>

                <button class="nav-link" id="v-pills-footer-bottom-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-footer-bottom" type="button" role="tab"
                    aria-controls="v-pills-footer-bottom" aria-selected="true"><?php echo e(translate('Footer')); ?></button>
                <button class="nav-link" id="v-pills-breadcamp-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-breadcamp" type="button" role="tab" aria-controls="v-pills-breadcamp"
                    aria-selected="true"><?php echo e(translate('Breadcrumbs')); ?></button>
                <button class="nav-link" id="v-pills-basic-seo-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-basic-seo" type="button" role="tab" aria-controls="v-pills-basic-seo"
                    aria-selected="true"><?php echo e(translate('SEO')); ?></button>
                <button class="nav-link" id="v-pills-google-analytics-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-google-analytics" type="button" role="tab"
                    aria-controls="v-pills-google-analytics"
                    aria-selected="true"><?php echo e(translate('Google Analytics')); ?></button>

                <button class="nav-link" id="v-pills-google-login-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-google-login" type="button" role="tab"
                    aria-controls="v-pills-google-login" aria-selected="true"><?php echo e(translate('Google Login')); ?></button>

                <button class="nav-link" id="v-pills-gdpr-tab" data-bs-toggle="pill" data-bs-target="#v-pills-gdpr"
                    type="button" role="tab" aria-controls="v-pills-gdpr"
                    aria-selected="true"><?php echo e(translate('GDPR Cookie')); ?></button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel"
                    aria-labelledby="v-pills-general-tab">
                    <!-- temparory content -->
                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Header Logo')); ?></label>
                                    <input type="file" class="form-control" name="header_logo"
                                        placeholder="<?php echo e(translate('Header Logo')); ?>">
                                    <?php if(get_setting('header_logo')): ?>
                                        <img class="mt-2"
                                            src="<?php echo e(asset('assets/logo/' . get_setting('header_logo'))); ?>"
                                            alt="Header Logo" width="100">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Favicon')); ?></label>
                                    <input type="file" class="form-control" name="front_favicon"
                                        placeholder="<?php echo e(translate('Favicon')); ?>">
                                    <?php if(get_setting('front_favicon')): ?>
                                        <img class="mt-2"
                                            src="<?php echo e(asset('assets/logo/' . get_setting('front_favicon'))); ?>"
                                            alt="Favicon" width="50">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Term & Conditions Page Link')); ?></label>
                                    <input type="text" class="form-control" name="term_conditions_link"
                                        value="<?php echo e(get_setting('term_conditions_link')); ?>">

                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Privacy & Policy Page Link')); ?></label>
                                    <input type="text" class="form-control" name="privacy_policy_link"
                                        value="<?php echo e(get_setting('privacy_policy_link')); ?>">

                                </div>
                            </div>

                        </div>
                        <div class="form-inner mb-35 d-flex justify-content-between flex-wrap position-relative">
                            <div class="form-group">
                                <input type="checkbox" name="show_preloader" id="show_preloader" value="1"
                                    <?php echo e(old('show_preloader', get_setting('show_preloader')) == 1 ? 'checked' : ''); ?>>
                                <label for="show_preloader"><?php echo e(translate('Show Preloader')); ?></label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-theme-color" role="tabpanel"
                    aria-labelledby="v-pills-theme-color-tab">

                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Primary Color')); ?></label>
                                    <div class="input-group primary-color">
                                        <input type="text" id="primary-color" class="form-control" name="primary_color"
                                            value="<?php echo e(old('primary_color', get_setting('primary_color'))); ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"
                                                    style="color: <?php echo e(get_setting('primary_color') ?? '#32c36c'); ?>;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Secondary Color')); ?></label>
                                    <div class="input-group secondary-color">
                                        <input type="text" class="form-control" name="secondary_color"
                                            value="<?php echo e(old('secondary_color', get_setting('secondary_color'))); ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"
                                                    style="color: <?php echo e(get_setting('secondary_color') ?? '#1F2230'); ?>;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-header-setting" role="tabpanel"
                    aria-labelledby="v-pills-header-setting-tab">
                    <div class="eg-card product-card">
                        <div class="row">

                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Facebook Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('facebook_link', get_setting('facebook_link'))); ?>"
                                        name="facebook_link" placeholder="<?php echo e(translate('Facebook Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Twitter Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('twitter_link', get_setting('twitter_link'))); ?>"
                                        name="twitter_link" placeholder="<?php echo e(translate('Twitter Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Linkedin Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('linkedin_link', get_setting('linkedin_link'))); ?>"
                                        name="linkedin_link" placeholder="<?php echo e(translate('Linkedin Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Youtube Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('youtube_link', get_setting('youtube_link'))); ?>"
                                        name="youtube_link" placeholder="<?php echo e(translate('Youtube Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Instagram Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('instagram_link', get_setting('instagram_link'))); ?>"
                                        name="instagram_link" placeholder="<?php echo e(translate('Instagram Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Pinterest Link')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('pinterest_link', get_setting('pinterest_link'))); ?>"
                                        name="pinterest_link" placeholder="<?php echo e(translate('Pinterest Link')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Marchant Signup Button Name')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('marchant_btn', get_setting('marchant_btn'))); ?>"
                                        name="marchant_btn" placeholder="<?php echo e(translate('Marchant Signup Button Name')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Customer Signup Button Name')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('customer_btn', get_setting('customer_btn'))); ?>"
                                        name="customer_btn" placeholder="<?php echo e(translate('Customer Signup Button Name')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Sigin Button Name')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('login_btn', get_setting('login_btn'))); ?>" name="login_btn"
                                        placeholder="<?php echo e(translate('Sigin Button Name')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Email Address')); ?></label>
                                    <input type="email" class="form-control"
                                        value="<?php echo e(old('email_address', get_setting('email_address'))); ?>"
                                        name="email_address" placeholder="<?php echo e(translate('Email Address')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Hotline Text')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('hotline_text', get_setting('hotline_text'))); ?>"
                                        name="hotline_text" placeholder="<?php echo e(translate('Hotline Text')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Hotline Phone Number')); ?></label>
                                    <input type="text" class="form-control"
                                        value="<?php echo e(old('hotline_phone', get_setting('hotline_phone'))); ?>"
                                        name="hotline_phone" placeholder="<?php echo e(translate('Hotline Phone Number')); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Top Header Marketing')); ?></label>
                                    <textarea id="summernote" name="topbar_marketing_text"><?php echo e(old('topbar_marketing_text', get_setting('topbar_marketing_text'))); ?></textarea>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="row mb-3">
                                    <label class="col-sm-4"><b><?php echo e(('Top Header')); ?>

                                            <?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                    <div class="form-check form-switch col-sm-4">
                                        <input class="form-check-input" value="1" name="top_header_show"
                                            <?php echo e(get_setting('top_header_show') == 1 ? 'checked' : ''); ?>

                                            type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-footer-bottom" role="tabpanel"
                    aria-labelledby="v-pills-footer-bottom-tab">
                    <div class="eg-card product-card">
                        <div class="card-header mb-3">
                            <h6><?php echo e(translate('Footer Top')); ?></h6>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <h6><b><?php echo e(translate('Footer Marketing')); ?></b></h6>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="col-xl-12">
                                            <div class="form-inner mb-35">
                                                <label><?php echo e(translate('Footer Logo')); ?></label>
                                                <input type="file" class="form-control" name="footer_logo"
                                                    placeholder="<?php echo e(translate('Footer Logo')); ?>">
                                                <?php if(get_setting('footer_logo')): ?>
                                                    <img class="mt-2"
                                                        src="<?php echo e(asset('assets/logo/' . get_setting('footer_logo'))); ?>"
                                                        alt="Footer Logo" width="100">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-inner mb-35">
                                                <label><?php echo e(translate('Title')); ?></label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e(get_setting('footer_marketing_title')); ?>"
                                                    name="footer_marketing_title"
                                                    placeholder="<?php echo e(translate('Footer Marketing Title')); ?>">
                                            </div>
                                        </div>

                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Button Text')); ?></label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(get_setting('footer_marketing_btn_text')); ?>"
                                                name="footer_marketing_btn_text"
                                                placeholder="<?php echo e(translate('Button Text')); ?>">
                                        </div>

                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Button Link')); ?></label>
                                            <input type="text" class="form-control"
                                                value="<?php echo e(get_setting('footer_marketing_btn_link')); ?>"
                                                name="footer_marketing_btn_link"
                                                placeholder="<?php echo e(translate('Button Link')); ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-inner mb-35">
                                                    <label><?php echo e(translate('Mailchimp API Key')); ?></label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo e(old('MAILCHIMP_API_KEY', get_setting('MAILCHIMP_API_KEY'))); ?>"
                                                        name="MAILCHIMP_API_KEY"
                                                        placeholder="<?php echo e(translate('Mailchimp API Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-inner mb-35">
                                                    <label><?php echo e(translate('Mailchimp List ID')); ?></label>
                                                    <input type="text" class="form-control"
                                                        value="<?php echo e(old('MAILCHIMP_LIST_ID', get_setting('MAILCHIMP_LIST_ID'))); ?>"
                                                        name="MAILCHIMP_LIST_ID"
                                                        placeholder="<?php echo e(translate('Mailchimp List ID')); ?>">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-sm-4"><b>
                                                        <?php echo e(translate('Mailchimp Enabled/Disabled')); ?></b></label>
                                                <div class="form-check form-switch col-sm-4">
                                                    <input class="form-check-input" value="1"
                                                        name="footer_mailchimp_status"
                                                        <?php echo e(get_setting('footer_mailchimp_status') == 1 ? 'checked' : ''); ?>

                                                        type="checkbox">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-3">
                                            <label class="col-sm-4"><b><?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                            <div class="form-check form-switch col-sm-4">
                                                <input class="form-check-input" value="1" name="footer1_status"
                                                    <?php echo e(get_setting('footer1_status') == 1 ? 'checked' : ''); ?>

                                                    type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6 mb-3">
                                <h6><b><?php echo e(translate('Footer Menu')); ?></b></h6>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Title')); ?></label>
                                            <input type="text" name="footer1_title"
                                                value="<?php echo e(old('footer1_title', get_setting('footer1_title'))); ?>">
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-4"><b> <?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                            <div class="form-check form-switch col-sm-4">
                                                <input class="form-check-input" value="1"
                                                    <?php echo e(get_setting('footer2_status') == 1 ? 'checked' : ''); ?>

                                                    name="footer2_status" type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mt-3"><b><?php echo e(translate('Footer Address')); ?></b></h6>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Phone')); ?></label>
                                            <input type="text" name="footer_phone"
                                                value="<?php echo e(old('footer_phone', get_setting('footer_phone'))); ?>">
                                        </div>
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Email')); ?></label>
                                            <input type="text" name="footer_email"
                                                value="<?php echo e(old('footer_email', get_setting('footer_email'))); ?>">
                                        </div>
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Address')); ?></label>
                                            <input type="text" name="footer_address"
                                                value="<?php echo e(old('footer_address', get_setting('footer_address'))); ?>">
                                        </div>
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Map Link')); ?></label>
                                            <input type="text" name="footer_map"
                                                value="<?php echo e(old('footer_map', get_setting('footer_map'))); ?>">
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-4"><b><?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                            <div class="form-check form-switch col-sm-4">
                                                <input class="form-check-input" value="1"
                                                    <?php echo e(get_setting('footer3_status') == 1 ? 'checked' : ''); ?>

                                                    name="footer3_status" type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mt-3"><b><?php echo e(translate('Footer Description')); ?></b></h6>
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Title')); ?></label>
                                            <input type="text" name="footer_latest_title"
                                                value="<?php echo e(old('footer_latest_title', get_setting('footer_latest_title'))); ?>">
                                        </div>
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Description')); ?>

                                                <?php echo e(strtoupper(active_language())); ?></label>
                                            <textarea class="form-control" rows="5" name="footer_desc_<?php echo e(active_language()); ?>"
                                                placeholder="<?php echo e(translate('Footer Description')); ?>"><?php echo e(get_setting('footer_desc_' . active_language())); ?></textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-4"><b> <?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                            <div class="form-check form-switch col-sm-4">
                                                <input class="form-check-input" value="1" name="footer4_status"
                                                    <?php echo e(get_setting('footer4_status') == 1 ? 'checked' : ''); ?>

                                                    type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header mt-3">
                            <h6><?php echo e(translate('Footer Bottom')); ?></h6>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Payment Method Image')); ?></label>
                                    <input type="file" class="form-control" name="payment_method_img"
                                        placeholder="<?php echo e(translate('Payment Method')); ?>">
                                    <?php if(get_setting('payment_method_img')): ?>
                                        <img class="mt-2"src="<?php echo e(asset('assets/logo/' . get_setting('payment_method_img'))); ?>"
                                            width="250">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Footer Copyright')); ?>

                                                <?php echo e(strtoupper(active_language())); ?> </label>
                                            <textarea class="form-control summernote" name="front_copyright_<?php echo e(active_language()); ?>"><?php echo e(clean(get_setting('front_copyright_' . active_language()))); ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>




                            <div class="row mb-3">
                                <label class="col-sm-3"><b><?php echo e(translate('Footer Bottom Enabled/Disabled')); ?></b></label>
                                <div class="form-check form-switch col-sm-1">
                                    <input class="form-check-input" value="1"
                                        <?php echo e(get_setting('hide_footer_bottom') == 1 ? 'checked' : ''); ?>

                                        name="hide_footer_bottom" type="checkbox">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-breadcamp" role="tabpanel"
                    aria-labelledby="v-pills-breadcamp-tab">
                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Breadcrumb Image')); ?></label>
                                    <input type="file" class="form-control" name="breadcamp_img"
                                        placeholder="<?php echo e(translate('Upload BreadCamp')); ?>">
                                    <?php if(get_setting('breadcamp_img')): ?>
                                        <img class="mt-2"
                                            src="<?php echo e(asset('assets/logo/' . get_setting('breadcamp_img'))); ?>"
                                            alt="breadcamp image" width="200">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Breadcrumb Color')); ?></label>
                                    <div class="input-group primary-color">
                                        <input type="text" class="form-control" name="breadcrumb_color"
                                            value="<?php echo e(old('breadcrumb_color', get_setting('breadcrumb_color'))); ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"
                                                    style="color: <?php echo e(get_setting('breadcrumb_color') ?? ''); ?>;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-basic-seo" role="tabpanel"
                    aria-labelledby="v-pills-basic-seo-tab">

                    <div class="eg-card product-card">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Meta Image')); ?></label>
                                    <input type="file" class="form-control" name="meta_img"
                                        placeholder="<?php echo e(translate('Upload Meta Image')); ?>">
                                    <?php if(get_setting('meta_img')): ?>
                                        <img class="mt-2" src="<?php echo e(asset('assets/logo/' . get_setting('meta_img'))); ?>"
                                            alt="meta image" width="200">
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Meta Title')); ?></label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="<?php echo e(old('meta_title', get_setting('meta_title'))); ?>"
                                        placeholder="<?php echo e(translate('Meta Title')); ?>">
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Meta Keywords')); ?></label>
                                    <select class="username-input meta-keyward" name="meta_keyward[]"
                                        multiple="multiple">
                                        <?php if(get_setting('meta_keyward') && count(explode(',', get_setting('meta_keyward'))) > 0): ?>
                                            <?php $__currentLoopData = explode(',', get_setting('meta_keyward')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($keyward); ?>" selected><?php echo e($keyward); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Meta Description')); ?></label>
                                <textarea class="form-control summernote" rows="5" name="meta_description"
                                    placeholder="<?php echo e(translate('Meta Description')); ?>"><?php echo e(clean(get_setting('meta_description'))); ?></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-gdpr" role="tabpanel" aria-labelledby="v-pills-gdpr-tab">

                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-4 mb-35">
                                <div class="row">
                                    <label class="col-sm-2"><b><?php echo e(translate('Enabled/Disabled')); ?></b></label>
                                    <div class="form-check form-switch col-sm-10">
                                        <input class="form-check-input" value="1" name="gdpr_cookie_enabled"
                                            <?php echo e(get_setting('gdpr_cookie_enabled') == 1 ? 'checked' : ''); ?>

                                            type="checkbox">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Cookie Title')); ?>

                                                <?php echo e(strtoupper(active_language())); ?></label>
                                            <input type="text" class="form-control"
                                                name="gdpr_title_<?php echo e(active_language()); ?>"
                                                value="<?php echo e(get_setting('gdpr_title_' . active_language())); ?>"
                                                placeholder="<?php echo e(translate('Cookie Title')); ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-inner mb-35">
                                            <label><?php echo e(translate('Description')); ?> <?php echo e(strtoupper(active_language())); ?>

                                            </label>
                                            <textarea name="gdpr_description_<?php echo e(active_language()); ?>" class="summernote"><?php echo e(clean(get_setting('gdpr_description_' . active_language()))); ?></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-google-analytics" role="tabpanel"
                    aria-labelledby="v-pills-google-analytics-tab">

                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('Measurement ID / Tracking ID')); ?></label>
                                    <input type="text" class="form-control" name="analytics_id"
                                        value="<?php echo e(old('analytics_id', get_setting('analytics_id'))); ?>"
                                        placeholder="<?php echo e(translate('Measurement ID / Tracking ID')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-google-login" role="tabpanel"
                    aria-labelledby="v-pills-google-login-tab">

                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('GOOGLE CLIENT ID')); ?></label>
                                    <input type="text" class="form-control" name="GOOGLE_CLIENT_ID"
                                        value="<?php echo e(old('GOOGLE_CLIENT_ID', get_setting('GOOGLE_CLIENT_ID'))); ?>"
                                        placeholder="<?php echo e(translate('GOOGLE CLIENT ID')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('GOOGLE CLIENT SECRET')); ?></label>
                                    <input type="text" class="form-control" name="GOOGLE_CLIENT_SECRET"
                                        value="<?php echo e(old('GOOGLE_CLIENT_SECRET', get_setting('GOOGLE_CLIENT_SECRET'))); ?>"
                                        placeholder="<?php echo e(translate('GOOGLE CLIENT SECRET')); ?>">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('GOOGLE REDIRECT URL')); ?></label>
                                    <input type="text" class="form-control" name="GOOGLE_REDIRECT_URL"
                                        value="<?php echo e(old('GOOGLE_REDIRECT_URL', get_setting('GOOGLE_REDIRECT_URL'))); ?>"
                                        placeholder="<?php echo e(translate('GOOGLE REDIRECT URL')); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-css-js" role="tabpanel" aria-labelledby="v-pills-css-js-tab">

                    <div class="eg-card product-card">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('CSS')); ?></label>
                                    <textarea class="form-control editorContainer" rows="10" name="custom_css"
                                        placeholder="<?php echo e(translate('Custom CSS')); ?>"><?php echo e(old('custom_css', get_setting('custom_css'))); ?></textarea>
                                </div>
                                <div class="form-inner mb-35">
                                    <label><?php echo e(translate('JS')); ?></label>
                                    <textarea class="form-control editorContainer" rows="10" name="custom_js"
                                        placeholder="<?php echo e(translate('Custom JS')); ?>"><?php echo e(old('custom_js', get_setting('custom_js'))); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <div class="button-group mt-15">
                    <input type="submit" class="eg-btn btn--green medium-btn me-3" value="<?php echo e('Update'); ?>">
                </div>
            </div>
        </div>
    </form>

    <?php echo $__env->make('backend.backend_setting.modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/backend/frontend_setting/index.blade.php ENDPATH**/ ?>