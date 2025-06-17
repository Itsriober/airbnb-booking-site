<?php if(@isset($widgetContent)): ?>
    <div class="sortable-item accordion-item allowPrimary" data-code="<?php echo e($widgetContent->ui_card_number); ?>">
        <div class="accordion-header">
            <div class="section-name"> <?php echo e($widgetContent->widget?->widget_name); ?>

                <div class="collapsed d-flex">
                    <div class="form-check form-switch me-2">
                        <input class="form-check-input status-change"
                            data-action="<?php echo e(route('pages.widget.status.change', $widgetContent->id)); ?>"
                            <?php echo e($widgetContent->status == 1 ? 'checked' : ''); ?> type="checkbox" role="switch"
                            id="<?php echo e($widgetContent->id); ?>">
                        <label class="form-check-label d-none" for="<?php echo e($widgetContent->id); ?>"> </label>
                    </div>

                    <div class="collapsed-action-btn edit-action action-icon me-2">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="action-icon delete-action" data-id="<?php echo e($widgetContent->id); ?>">
                        <i class="bi bi-trash"></i>
                    </div>

                </div>
            </div>
        </div>


        <div class="accordion-collapse collapse ">
            <div class="accordion-body">
                <?php
                    $widgetContents = $widgetContent->getTranslation('widget_content', $lang);
                ?>
                <form enctype="multipart/form-data" data-action="<?php echo e(route('pages.widget.save')); ?>" class="form"
                    method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="ui_card_number" value="<?php echo e($widgetContent->ui_card_number); ?>">
                    <input type="hidden" name="page_id" value="<?php echo e($widgetContent->page_id); ?>">
                    <input type="hidden" name="widget_slug" class="widget-slug"
                        value="<?php echo e($widgetContent->widget_slug); ?>">

                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Main Title')); ?>" name="content[0][title]"
                                    value="<?php echo e(isset($widgetContents['title']) ? $widgetContents['title'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>" name="content[0][shoulder]"
                                    value="<?php echo e(isset($widgetContents['shoulder']) ? $widgetContents['shoulder'] : ''); ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-area">

                        <?php if(isset($widgetContents['tabs'])): ?>
                            <?php
                                $count = 0;
                            ?>
                            <?php $__currentLoopData = $widgetContents['tabs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $count++;
                                ?>

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">

                                                    <label><?php echo e(translate('Tab Title')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Tab Title')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][tab_title]"
                                                        value="<?php echo e(isset($tab['tab_title']) ? $tab['tab_title'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Tab Icon')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][<?php echo e($count); ?>][tab_img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($tab['tab_img']) ? $tab['tab_img'] : ''); ?>">

                                                        <?php if(isset($tab['tab_img'])): ?>
                                                            <div class="ms-2">
                                                                <img height="50" width="auto"
                                                                    src="<?php echo e(asset('uploads/tabs/' . $tab['tab_img'])); ?>"
                                                                    alt="image">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Tab Label')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Tab Label')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][label]"
                                                        value="<?php echo e(isset($tab['label']) ? $tab['label'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Main Title')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Main Title')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][main_title]"
                                                        value="<?php echo e(isset($tab['main_title']) ? $tab['main_title'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Description')); ?></label>
                                                    <textarea type="text" class="username-input" name="content[0][tabs][<?php echo e($count); ?>][description]" placeholder="<?php echo e(translate('Enter Description')); ?>"><?php echo e(isset($tab['description']) ? $tab['description'] : ''); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Button Text')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Button Text')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][button_text]"
                                                        value="<?php echo e(isset($tab['button_text']) ? $tab['button_text'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Button Link')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Button Link')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][button_link]"
                                                        value="<?php echo e(isset($tab['button_link']) ? $tab['button_link'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Video Text')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Video Text')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][video_text]"
                                                        value="<?php echo e(isset($tab['video_text']) ? $tab['video_text'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Video Link')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Video Link')); ?>"
                                                        name="content[0][tabs][<?php echo e($count); ?>][video_link]"
                                                        value="<?php echo e(isset($tab['video_link']) ? $tab['video_link'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner mb-3">
                                                    <label><?php echo e(translate('Image 1')); ?></label>
                                                    <div class="d-flex">
                                                        <input type="file"
                                                            class="username-input widget-image-upload" name="image1"
                                                            data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][<?php echo e($count); ?>][img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($tab['img']) ? $tab['img'] : ''); ?>">

                                                        <?php if(isset($tab['img'])): ?>
                                                            <div class="ms-4">
                                                                <img width="100"
                                                                    src="<?php echo e(asset('uploads/tabs/' . $tab['img'])); ?>"
                                                                    alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner mb-3">
                                                    <label><?php echo e(translate('Image 2')); ?></label>
                                                    <div class="d-flex">
                                                        <input type="file"
                                                            class="username-input widget-image-upload" name="image2"
                                                            data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][<?php echo e($count); ?>][img2]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($tab['img2']) ? $tab['img2'] : ''); ?>">

                                                        <?php if(isset($tab['img2'])): ?>
                                                            <div class="ms-4">
                                                                <img width="100"
                                                                    src="<?php echo e(asset('uploads/tabs/' . $tab['img2'])); ?>"
                                                                    alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 tabs-freatues">
                                                <div class="form-inner mb-3">
                                                    <label class="form-label fw-bold"
                                                        for=""><?php echo e(translate('Tab Package Include')); ?></label>
                                                    <div class="tabs-features-area">
                                                        <ul>
                                                            <?php $__currentLoopData = $tab['include']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-inner mb-1">
                                                                    <input type="text" class="form-control"
                                                                        name="content[0][tabs][<?php echo e($count); ?>][include][<?php echo e($index); ?>][item]"
                                                                        value="<?php echo e($item['item']); ?>"
                                                                        placeholder="<?php echo e(translate('Enter Feature Item')); ?>" />
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 tabs-exclude">
                                                <div class="form-inner mb-3">
                                                    <label class="form-label fw-bold"
                                                        for=""><?php echo e(translate('Plan Package Exclude')); ?></label>
                                                    <div class="tabs-exclude-area">
                                                        <ul>
                                                            <?php if(isset($tabs['exclude']) && !empty($tabs['exclude'])): ?>
                                                            <?php $__currentLoopData = $tabs['exclude']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="form-inner mb-1">
                                                                    <input type="text" class="form-control"
                                                                        name="content[0][tabs][<?php echo e($count); ?>][exclude][<?php echo e($index); ?>][item]"
                                                                        value="<?php echo e($item['item']); ?>"
                                                                        placeholder="<?php echo e(translate('Enter Feature Item')); ?>" />
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                    

                    <div class="add-row">
                        <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>

                    <div class="button-area text-end">
                        <button type="submit"
                            class="eg-btn btn--green medium-btn shadow"><?php echo e(translate('Update')); ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php else: ?>
    <div class="sortable-item accordion-item allowPrimary" data-code="<?php echo e($randomId); ?>">
        <div class="accordion-header" id="herosection">
            <div class="section-name"> <?php echo e($widgetName); ?>

                <div class="collapsed d-flex">
                    <div class="form-check form-switch me-2">
                        <input class="form-check-input status-change"
                            data-action="<?php echo e(route('pages.widget.status.change', $randomId)); ?>" checked
                            type="checkbox" role="switch" id="<?php echo e($randomId); ?>">
                        <label class="form-check-label d-none" for="<?php echo e($randomId); ?>"> </label>
                    </div>
                    <div class="collapsed-action-btn edit-action action-icon me-2">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="action-icon delete-action" data-id="<?php echo e($randomId); ?>">
                        <i class="bi bi-trash"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-collapse collapse show">
            <div class="accordion-body">
                <form eenctype="multipart/form-data" data-action="<?php echo e(route('pages.widget.save')); ?>" class="form"
                    method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="ui_card_number" value="<?php echo e($randomId); ?>">
                    <input type="hidden" name="page_id" value="<?php echo e($pageId); ?>">
                    <input type="hidden" name="widget_slug" class="widget-slug" value="<?php echo e($slug); ?>">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Main Title')); ?>" name="content[0][title]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>" name="content[0][shoulder]">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-area">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>

                    <div class="button-area text-end">
                        <button type="submit"
                            class="eg-btn btn--green medium-btn shadow"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/tab-activities.blade.php ENDPATH**/ ?>