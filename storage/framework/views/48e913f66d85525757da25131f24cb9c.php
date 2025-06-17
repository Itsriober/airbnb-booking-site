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
                        <div class="col-md-12 text-start">
                            <label><?php echo e(translate('Enable Search')); ?></label><br>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][tour]" value="1" role="switch" id="tourcheck" <?php echo e(isset($widgetContents['search'][0]['tour']) && $widgetContents['search'][0]['tour'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(translate('Enable Tour Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][hotel]" value="1" role="switch" id="hotelcheck" <?php echo e(isset($widgetContents['search'][0]['hotel']) && $widgetContents['search'][0]['hotel'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(translate('Enable Hotel Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][activities]" value="1" role="switch" id="activitiescheck" <?php echo e(isset($widgetContents['search'][0]['activities']) && $widgetContents['search'][0]['activities'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(translate('Enable Activities Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="visacheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][visa]" value="1" role="switch" id="visacheck" <?php echo e(isset($widgetContents['search'][0]['visa']) && $widgetContents['search'][0]['visa'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(translate('Enable Visa Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][transport]" value="1" role="switch" id="transportcheck" <?php echo e(isset($widgetContents['search'][0]['transport']) && $widgetContents['search'][0]['transport'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(translate('Enable Transport Search')); ?></label>
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
                        <div class="col-md-12 text-start">
                            <label><?php echo e(translate('Enable Search')); ?></label><br>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][tour]" value="1" role="switch" id="tourcheck">
                            <?php echo e(translate('Enable Tour Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][hotel]" value="1" role="switch" id="hotelcheck">
                            <?php echo e(translate('Enable Hotel Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][activities]" value="1" role="switch" id="activitiescheck">
                            <?php echo e(translate('Enable Activities Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="visacheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][visa]" value="1" role="switch" id="visacheck">
                            <?php echo e(translate('Enable Visa Search')); ?></label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][transport]" value="1" role="switch" id="transportcheck">
                            <?php echo e(translate('Enable Transport Search')); ?></label>
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
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/search.blade.php ENDPATH**/ ?>