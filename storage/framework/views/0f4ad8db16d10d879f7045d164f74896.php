<?php $__env->startSection('content'); ?>

    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">

            <p></p>
            <a href="<?php echo e(route('page.list')); ?>" class="eg-btn btn--primary back-btn"> <img
                    src="<?php echo e(asset('backend/images/icons/back.svg')); ?>" alt="<?php echo e(translate('Go Back')); ?>">
                <?php echo e(translate('Go Back')); ?></a>
        </div>
    </div>

    <div class="row">
        <div class="wrap_menu">
            <div class="col-lg-12">
                <div class="eg-card product-card">
                    <form class="form" data-action="<?php echo e(route('page.update', $page->id)); ?>" enctype="multipart/form-data">
                        <?php echo method_field('patch'); ?>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="lang" id="lang" value="<?php echo e($lang); ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-inner mb-25">
                                    <label> <?php echo e(translate('Menu Name')); ?> <span class="text-danger"><b>*</b></span></label>
                                    <input type="text" class="username-input" placeholder="Enter Your Name"
                                        name="page_name" value="<?php echo e($page->getTranslation('page_name' ,$lang)); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-inner mb-25">
                                    <label> <?php echo e(translate('Slug Name')); ?> <span class="text-danger"><b>*</b></span> </label>
                                    <input type="text" class="username-input" placeholder="Enter Your Name"
                                        name="page_slug" value="<?php echo e($page->getTranslation('page_slug' ,$lang)); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-check">
                                    <label class="form-check-label" for="seoPage">
                                        <input class="form-check-input seo-page-checkbox" name="enable_seo"
                                            <?php echo e($page->enable_seo ? 'checked' : ''); ?> type="checkbox" id="seoPage">
                                        <b><?php echo e(translate('Allow Page SEO')); ?></b>
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-3 seo-content">
                                <div class="col-xl-6">
                                    <div class="form-inner mb-35">
                                        <label> <?php echo e(translate('Meta Title')); ?> <span
                                                class="text-danger"><b>*</b></span></label>
                                        <input type="text" class="username-input" name="meta_title"
                                            value="<?php echo e($page->getTranslation('meta_title' ,$lang)); ?>" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-inner mb-35">
                                        <label> <?php echo e(translate('Meta Keyward')); ?></label>
                                        <select class="username-input meta-keyward" name="meta_keyward[]"
                                            multiple="multiple">
                                            <?php if(isset($page->meta_keyward) && count($page?->meta_keyward) > 0): ?>

                                                <?php $__currentLoopData = $page->getTranslation('meta_keyward', $lang); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($keyward); ?>" selected><?php echo e($keyward); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-inner mb-35">
                                        <label> <?php echo e(translate('Meta Description')); ?></label>
                                        <textarea class="summernote" name="meta_description"> <?php echo e(clean( $page->getTranslation('meta_description', $lang))); ?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="is_bread_crumb">
                                    <input class="form-check-input is_bread_crumb" name="is_bread_crumb"
                                        <?php echo e($page->is_bread_crumb ? 'checked' : ''); ?> type="checkbox" id="is_bread_crumb">
                                    <b><?php echo e(translate('Bread Crumb Enable')); ?></b>
                                </label>
                            </div>
                        </div>

                        <div class="form-inner mb-35 mt-3">

                            <button type="submit"
                                class="eg-btn btn--green btn shadow  me-3"><?php echo e(translate('Published')); ?></button>
                            <a class="eg-btn btn--primary btn shadow  me-3"
                                href="<?php echo e($page->page_slug == 'home' ? url('/') : url($page->page_slug)); ?>"><?php echo e(translate('View Page')); ?></a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-sm-3 widget-item widget-item-list ">
            <div class="row">
                <?php $__currentLoopData = $widgetList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6">
                        <div class="widget-name add-element text-center" data-slug="<?php echo e($item->widget_slug); ?>"
                            data-page-id="<?php echo e($page->id); ?>" data-widget-name="<?php echo e($item->widget_name); ?>">
                            <div class="icon mb-3"> <?php echo $item->icon; ?> </div>
                            <div class="section-name">
                                <p><?php echo e($item->widget_name); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="col-sm-9 dragSortableItems">
            <div class="eg-card product-card">
                <div name="active_widget_list" class="sortable-list active_widget_list  accordion sortable-widget-item">
                    <?php if($page->widgetContents->count() > 0): ?>
                        <?php $__currentLoopData = $page->widgetContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widgetContent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('backend.pages.widgets.' . $widgetContent->widget_slug, [
                                'widgetContent' => $widgetContent,
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('backend/js/sweetalert2.js')); ?>"></script>
    <?php echo $__env->make('js.admin.widget-js', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/edit.blade.php ENDPATH**/ ?>