<!-- Start Footer Section -->
<footer class="footer-section">
        <div class="container">
            <div class="footer-top">
                <div class="row g-lg-4 gy-5 justify-content-center">
                <?php

$col_count = 0;
$column = '';
if (get_setting('footer1_status') == 1) {
    $col_count += 1;
}
if (get_setting('footer2_status') == 1) {
    $col_count += 1;
}
if (get_setting('footer3_status') == 1) {
    $col_count += 1;
}

if (get_setting('footer4_status') == 1) {
    $col_count += 1;
}

if ($col_count == 4) {
    $column = 'col-lg-3 col-md-6 col-sm-6';
}
if ($col_count == 3) {
    $column = 'col-lg-4 col-md-4 col-sm-4';
}
if ($col_count == 2) {
    $column = 'col-lg-6 col-md-6 col-sm-6';
}
if ($col_count == 1) {
    $column = 'col-lg-12 col-md-12 col-sm-12';
}
?>

                    <?php if(get_setting('footer1_status') == 1): ?>
                    <div class="<?php echo e($column); ?>">
                        <div class="footer-widget">
                            <?php if(get_setting('footer_logo')): ?>
                            <div class="footer-logo">
                                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('assets/logo/'.get_setting('footer_logo'))); ?>" alt="Footer Logo"></a>
                            </div>
                            <?php endif; ?>
                            <?php if(get_setting('footer_marketing_title')): ?>
                            <h3><?php echo e(get_setting('footer_marketing_title')); ?></h3>
                            <?php endif; ?>
                            <?php if(get_setting('footer_marketing_btn_link')): ?>
                            <a href="<?php echo e(get_setting('footer_marketing_btn_link')); ?>" class="primary-btn1"><?php echo e(get_setting('footer_marketing_btn_text') ? get_setting('footer_marketing_btn_text') : 'Book A Tour'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(get_setting('footer2_status') == 1): ?>
                    <div class="<?php echo e($column); ?> d-flex justify-content-lg-center justify-content-sm-start">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5><?php echo e(get_setting('footer1_title') ? get_setting('footer1_title') : 'Quick Link'); ?></h5>
                            </div>
                            <?php if(footer_menus()->count() > 0): ?>
                            <ul class="widget-list">
                            <?php $__currentLoopData = footer_menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerMenu2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a target="<?php echo e($footerMenu2->menu_type == 'custom' ? ($footerMenu2->new_tap == 1 ? '__blank' : '') : ''); ?>"
                                                href="<?php if($footerMenu2->menu_type == 'page'): ?> <?php echo e($footerMenu2->slug == 'home' ? url('/') : $footerMenu2->slug); ?> <?php elseif($footerMenu2->menu_type == 'custom'): ?><?php echo e($footerMenu2->target); ?> <?php else: ?><?php echo e('/blog/' . $footerMenu2->slug); ?> <?php endif; ?>">
                                                <?php if($footerMenu2->menu_type == 'page'): ?>
                                                    <?php echo e($footerMenu2?->page?->getTranslation('page_name')); ?>

                                                <?php elseif($footerMenu2->menu_type == 'blog'): ?>
                                                    <?php echo e($footerMenu2?->blog?->getTranslation('title')); ?>

                                                <?php else: ?>
                                                    <?php echo e($footerMenu2->getTranslation('title')); ?>

                                                <?php endif; ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(get_setting('footer3_status') == 1): ?>
                    <div class="<?php echo e($column); ?> d-flex justify-content-lg-center justify-content-md-start">
                        <div class="footer-widget">
                            <?php if(get_setting('footer_phone')): ?>
                            <div class="single-contact mb-30">
                                <div class="widget-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <g clip-path="url(#clip0_1139_225)">
                                            <path
                                                d="M17.5107 13.2102L14.9988 10.6982C14.1016 9.80111 12.5765 10.16 12.2177 11.3262C11.9485 12.1337 11.0514 12.5822 10.244 12.4028C8.44974 11.9542 6.0275 9.62168 5.57894 7.73772C5.3098 6.93027 5.84808 6.03314 6.65549 5.76404C7.82176 5.40519 8.18061 3.88007 7.28348 2.98295L4.77153 0.470991C4.05382 -0.156997 2.97727 -0.156997 2.34929 0.470991L0.644745 2.17553C-1.0598 3.96978 0.82417 8.72455 5.04066 12.941C9.25716 17.1575 14.0119 19.1313 15.8062 17.337L17.5107 15.6324C18.1387 14.9147 18.1387 13.8382 17.5107 13.2102Z" />
                                        </g>
                                    </svg>
                                    <h5><?php echo e(translate('More Inquiry')); ?></h5>
                                </div>
                                <a href="tel:<?php echo e(get_setting('footer_phone')); ?>"><?php echo e(get_setting('footer_phone')); ?></a>
                            </div>
                            <?php endif; ?>
                            <?php if(get_setting('footer_email')): ?>
                            <div class="single-contact mb-35">
                                <div class="widget-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <g clip-path="url(#clip0_1139_218)">
                                            <path
                                                d="M6.56266 13.2091V16.6876C6.56324 16.8058 6.60099 16.9208 6.67058 17.0164C6.74017 17.112 6.83807 17.1832 6.9504 17.22C7.06274 17.2569 7.18382 17.2574 7.29648 17.2216C7.40915 17.1858 7.5077 17.1155 7.57817 17.0206L9.61292 14.2516L6.56266 13.2091ZM17.7639 0.104306C17.6794 0.044121 17.5799 0.00848417 17.4764 0.00133654C17.3729 -0.00581108 17.2694 0.015809 17.1774 0.0638058L0.302415 8.87631C0.205322 8.92762 0.125322 9.00617 0.0722333 9.1023C0.0191447 9.19844 -0.00472288 9.30798 0.00355981 9.41749C0.0118425 9.52699 0.0519151 9.6317 0.11886 9.71875C0.185804 9.80581 0.276708 9.87143 0.380415 9.90756L5.07166 11.5111L15.0624 2.96856L7.33141 12.2828L15.1937 14.9701C15.2717 14.9963 15.3545 15.0051 15.4363 14.996C15.5181 14.9868 15.5969 14.9599 15.6672 14.9171C15.7375 14.8743 15.7976 14.8167 15.8433 14.7482C15.8889 14.6798 15.9191 14.6021 15.9317 14.5208L17.9942 0.645806C18.0094 0.543093 17.996 0.438159 17.9554 0.342598C17.9147 0.247038 17.8485 0.164569 17.7639 0.104306Z"/>
                                        </g>
                                    </svg>
                                    <h5><?php echo e(translate('Send Mail')); ?></h5>
                                </div>
                                <a href="mailto:<?php echo e(get_setting('footer_email')); ?>"><?php echo e(get_setting('footer_email')); ?></a>
                            </div>
                            <?php endif; ?>
                            <?php if(get_setting('footer_address')): ?>
                            <div class="single-contact">
                                <div class="widget-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <g clip-path="url(#clip0_1137_183)">
                                            <path
                                                d="M14.3281 3.08241C13.2357 1.19719 11.2954 0.0454395 9.13767 0.00142383C9.04556 -0.000474609 8.95285 -0.000474609 8.86071 0.00142383C6.70303 0.0454395 4.76268 1.19719 3.67024 3.08241C2.5536 5.0094 2.52305 7.32408 3.5885 9.27424L8.05204 17.4441C8.05405 17.4477 8.05605 17.4513 8.05812 17.4549C8.25451 17.7963 8.60632 18 8.99926 18C9.39216 18 9.74397 17.7962 9.94032 17.4549C9.94239 17.4513 9.9444 17.4477 9.9464 17.4441L14.4099 9.27424C15.4753 7.32408 15.4448 5.0094 14.3281 3.08241ZM8.99919 8.15627C7.60345 8.15627 6.46794 7.02076 6.46794 5.62502C6.46794 4.22928 7.60345 3.09377 8.99919 3.09377C10.3949 3.09377 11.5304 4.22928 11.5304 5.62502C11.5304 7.02076 10.395 8.15627 8.99919 8.15627Z"/>
                                        </g>
                                    </svg>
                                    <h5><?php echo e(translate('Address')); ?></h5>
                                </div>
                                <a href="<?php echo e(get_setting('footer_map') ? get_setting('footer_map') : '#'); ?>"><?php echo e(get_setting('footer_address')); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php echo e($column); ?> d-flex justify-content-lg-end justify-content-sm-end">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h5><?php echo e(get_setting('footer_latest_title')); ?></h5>
                            </div>
                            <p><?php echo e(get_setting('footer_desc_' . active_language())); ?></p>
                            <?php if(get_setting('payment_method_img')): ?>
                            <div class="payment-partner">
                                <div class="widget-title">
                                    <h5><?php echo e(translate('Payment Partner')); ?></h5>
                                </div>
                                <div class="icons">
                                    <ul>
                                        <li><img src="<?php echo e(asset('assets/logo/' . get_setting('payment_method_img'))); ?>" alt="Payment Partner"></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(get_setting('hide_footer_bottom') == 1): ?>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-md-row flex-column align-items-center justify-content-md-between justify-content-center flex-wrap gap-3">
                        <ul class="social-list">
                        <?php if(get_setting('facebook_link')): ?>
                            <li><a href="<?php echo e(get_setting('facebook_link')); ?>"><i class='bx bxl-facebook'></i></a></li>
                        <?php endif; ?>
                        <?php if(get_setting('twitter_link')): ?>
                            <li><a href="<?php echo e(get_setting('twitter_link')); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                            </svg></a></li>
                        <?php endif; ?>
                        <?php if(get_setting('linkedin_link')): ?>
                            <li><a href="<?php echo e(get_setting('linkedin_link')); ?>"><i class='bx bxl-linkedin'></i></a></li>
                        <?php endif; ?>
                        <?php if(get_setting('youtube_link')): ?>
                            <li><a href="<?php echo e(get_setting('youtube_link')); ?>"><i class='bx bxl-youtube'></i></a></li>
                        <?php endif; ?>
                        <?php if(get_setting('instagram_link')): ?>
                            <li><a href="<?php echo e(get_setting('instagram_link')); ?>"><i class='bx bxl-instagram'></i></a></li>
                        <?php endif; ?>
                        <?php if(get_setting('pinterest_link')): ?>
                            <li><a href="<?php echo e(get_setting('pinterest_link')); ?>"><i class='bx bxl-pinterest-alt'></i></a></li>
                        <?php endif; ?>
                        </ul>
                        <p><?php echo clean(get_setting('front_copyright' . '_' . active_language())); ?></p>
                        <?php if(get_setting('footer3_status') == 1): ?>
                        <div class="footer-right">
                            <ul>
                            <?php $__currentLoopData = footer_bottom_menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerMenu3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a target="<?php echo e($footerMenu3->menu_type == 'custom' ? ($footerMenu3->new_tap == 1 ? '__blank' : '') : ''); ?>"
                                                href="<?php if($footerMenu3->menu_type == 'page'): ?> <?php echo e($footerMenu3->slug == 'home' ? url('/') : $footerMenu3->slug); ?><?php elseif($footerMenu3->menu_type == 'custom'): ?><?php echo e($footerMenu3->target); ?><?php else: ?><?php echo e('/blog/' . $footerMenu3->slug); ?> <?php endif; ?>">
                                                <?php if($footerMenu3->menu_type == 'page'): ?>
                                                    <?php echo e($footerMenu3?->page?->getTranslation('page_name')); ?>

                                                <?php elseif($footerMenu3->menu_type == 'blog'): ?>
                                                    <?php echo e($footerMenu3?->blog?->getTranslation('title')); ?>

                                                <?php else: ?>
                                                    <?php echo e($footerMenu3->getTranslation('title')); ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <!-- End Footer Section -->
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/partials/footer.blade.php ENDPATH**/ ?>