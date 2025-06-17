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
                $widgetContents= $widgetContent->getTranslation("widget_content",$lang);
               ?>

                <form enctype="multipart/form-data" data-action="<?php echo e(route('pages.widget.save')); ?>" class="form"
                    method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="ui_card_number" value="<?php echo e($widgetContent->ui_card_number); ?>">
                    <input type="hidden" name="page_id" value="<?php echo e($widgetContent->page_id); ?>">
                    <input type="hidden" name="widget_slug" class="widget-slug"
                        value="<?php echo e($widgetContent->widget_slug); ?>">

                    <div class="row">
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Main Title')); ?>"
                                    name="content[0][features_main_title]"
                                    value="<?php echo e(isset($widgetContents['features_main_title']) ? $widgetContents['features_main_title'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-8 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Sub Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Sub Title')); ?>"
                                    name="content[0][features_sub_title]"
                                    value="<?php echo e(isset($widgetContents['features_sub_title']) ? $widgetContents['features_sub_title'] : ''); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="features-area shadow-sm p-3 rounded">
                        <?php if(isset($widgetContents['features'])): ?>
                            <?php
                                $count = 0;
                            ?>

                            <?php $__currentLoopData = $widgetContents['features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $count++;
                                ?>
                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][features][<?php echo e($count); ?>][name]"
                                                        value="<?php echo e(isset($feature['name']) ? $feature['name'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-7 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Icon')); ?></label>

                                                    <div class="d-flex">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/features/">
                                                        <input type="hidden"
                                                            name="content[0][features][<?php echo e($count); ?>][img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($feature['img']) ? $feature['img'] : ''); ?>">

                                                        <?php if(isset($feature['img'])): ?>
                                                            <img width="60"
                                                                src="<?php echo e(asset('uploads/features/' . $feature['img'])); ?>"
                                                                alt="image">
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-11 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Short Description')); ?></label>
                                                    <textarea class="form-control" name="content[0][features][<?php echo e($count); ?>][descriptions]"> <?php echo e(isset($feature['descriptions']) ? $feature['descriptions'] : ''); ?>  </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi  bi-trash"></i>
                                        </button>
                                    </div>



                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <div class="add-row">
                        <button type="button" class="add-features-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
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
                            data-action="<?php echo e(route('pages.widget.status.change', $randomId)); ?>" checked type="checkbox"
                            role="switch" id="<?php echo e($randomId); ?>">
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
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Main Title')); ?>"
                                    name="content[0][features_main_title]">
                            </div>
                        </div>
                        <div class="col-sm-8 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Sub Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Sub Title')); ?>"
                                    name="content[0][features_sub_title]"
                                    value="<?php echo e(isset($widgetContents['features_sub_title']) ? $widgetContents['features_sub_title'] : ''); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="features-area shadow-sm p-3 rounded">


                    </div>
                    <div class="add-row">
                        <button type="button" class="add-features-btn eg-btn btn--primary back-btn">
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
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/features.blade.php ENDPATH**/ ?>