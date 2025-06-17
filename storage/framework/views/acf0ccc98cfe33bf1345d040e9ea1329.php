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
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>"
                                    name="content[0][recent_news_shoulder]"
                                    value="<?php echo e(isset($widgetContents['recent_news_shoulder']) ? $widgetContents['recent_news_shoulder'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Title')); ?>"
                                    name="content[0][recent_news_main_title]"
                                    value="<?php echo e(isset($widgetContents['recent_news_main_title']) ? $widgetContents['recent_news_main_title'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display Recent News')); ?>"
                                    name="content[0][total_display_recent_news]"
                                    value="<?php echo e(isset($widgetContents['total_display_recent_news']) ? $widgetContents['total_display_recent_news'] : 4); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][recent_news_order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc"
                                        <?php echo e(isset($widgetContents['recent_news_order_by']) && $widgetContents['recent_news_order_by'] == 'desc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc"
                                        <?php echo e(isset($widgetContents['recent_news_order_by']) && $widgetContents['recent_news_order_by'] == 'asc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>


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
                <form enctype="multipart/form-data" data-action="<?php echo e(route('pages.widget.save')); ?>" class="form"
                    method="POST">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="ui_card_number" value="<?php echo e($randomId); ?>">
                    <input type="hidden" name="page_id" value="<?php echo e($pageId); ?>">
                    <input type="hidden" name="widget_slug" class="widget-slug" value="<?php echo e($slug); ?>">

                    <div class="row">
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>"
                                    name="content[0][recent_news_shoulder]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Title')); ?>"
                                    name="content[0][recent_news_main_title]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display Recent News')); ?>"
                                    name="content[0][total_display_recent_news]" value="4">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][recent_news_order_by]">
                                    <option disabled selected><?php echo e(translate('Select Option')); ?></option>
                                    <option selected value="desc"> <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc">  <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>

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
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/our-recent-news.blade.php ENDPATH**/ ?>