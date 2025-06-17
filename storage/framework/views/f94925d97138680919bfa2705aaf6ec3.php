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
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>" name="content[0][latest_product_shoulder]"
                                    value="<?php echo e(isset($widgetContents['latest_product_shoulder']) ? $widgetContents['latest_product_shoulder'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Title')); ?>" name="content[0][latest_product_title]"
                                    value="<?php echo e(isset($widgetContents['latest_product_title']) ? $widgetContents['latest_product_title'] : ''); ?>">
                            </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Tour Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][tour][enable]" value="1" role="switch" id="tourcheck" <?php echo e(isset($widgetContents['tour']['enable']) && $widgetContents['tour']['enable'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(isset($widgetContents['tour']['enable']) && $widgetContents['tour']['enable'] == 1 ? translate('Disable') : translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][tour][total_display]"
                                    value="<?php echo e(isset($widgetContents['tour']['total_display']) ? $widgetContents['tour']['total_display'] : 6); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][tour][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc"
                                        <?php echo e(isset($widgetContents['tour']['order_by']) && $widgetContents['tour']['order_by'] == 'desc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc"
                                        <?php echo e(isset($widgetContents['tour']['order_by']) && $widgetContents['tour']['order_by'] == 'asc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Hotel Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][hotel][enable]" value="1" role="switch" id="hotelcheck" <?php echo e(isset($widgetContents['hotel']['enable']) && $widgetContents['hotel']['enable'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(isset($widgetContents['hotel']['enable']) && $widgetContents['hotel']['enable'] == 1 ? translate('Disable') : translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][hotel][total_display]"
                                    value="<?php echo e(isset($widgetContents['hotel']['total_display']) ? $widgetContents['hotel']['total_display'] : 6); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][hotel][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc"
                                        <?php echo e(isset($widgetContents['hotel']['order_by']) && $widgetContents['hotel']['order_by'] == 'desc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc"
                                        <?php echo e(isset($widgetContents['hotel']['order_by']) && $widgetContents['hotel']['order_by'] == 'asc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Activities Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][activities][enable]" value="1" role="switch" id="activitiescheck" <?php echo e(isset($widgetContents['activities']['enable']) && $widgetContents['activities']['enable'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(isset($widgetContents['activities']['enable']) && $widgetContents['activities']['enable'] == 1 ? translate('Disable') : translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][activities][total_display]"
                                    value="<?php echo e(isset($widgetContents['activities']['total_display']) ? $widgetContents['activities']['total_display'] : 6); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][activities][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc"
                                        <?php echo e(isset($widgetContents['activities']['order_by']) && $widgetContents['activities']['order_by'] == 'desc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc"
                                        <?php echo e(isset($widgetContents['activities']['order_by']) && $widgetContents['activities']['order_by'] == 'asc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Transport Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][transport][enable]" value="1" role="switch" id="transportcheck" <?php echo e(isset($widgetContents['transport']['enable']) && $widgetContents['transport']['enable'] == 1 ? 'checked' : ''); ?>>
                            <?php echo e(isset($widgetContents['transport']['enable']) && $widgetContents['transport']['enable'] == 1 ? translate('Disable') : translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][transport][total_display]"
                                    value="<?php echo e(isset($widgetContents['transport']['total_display']) ? $widgetContents['transport']['total_display'] : 6); ?>">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][transport][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc"
                                        <?php echo e(isset($widgetContents['transport']['order_by']) && $widgetContents['transport']['order_by'] == 'desc' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc"
                                        <?php echo e(isset($widgetContents['transport']['order_by']) && $widgetContents['transport']['order_by'] == 'asc' ? 'selected' : ''); ?>>
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
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>" name="content[0][latest_product_shoulder]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Title')); ?>" name="content[0][latest_product_title]">
                            </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Tour Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][tour][enable]" value="1" role="switch" id="tourcheck">
                            <?php echo e(translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][tour][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][tour][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc">
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc">
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Hotel Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][hotel][enable]" value="1" role="switch" id="hotelcheck">
                            <?php echo e(translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][hotel][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][hotel][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc">
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc">
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Activities Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][activities][enable]" value="1" role="switch" id="activitiescheck">
                            <?php echo e(translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][activities][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][activities][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc">
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc">
                                        <?php echo e(translate('Ascending')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label><?php echo e(translate('Transport Details')); ?></label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][transport][enable]" value="1" role="switch" id="transportcheck">
                            <?php echo e(translate('Enable')); ?></label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Total Display')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Total Display')); ?>"
                                    name="content[0][transport][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> <?php echo e(translate('Order By')); ?></label>
                                <select class="js-example-basic-single" name="content[0][transport][order_by]">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <option value="desc">
                                        <?php echo e(translate('Descending')); ?></option>
                                    <option value="asc">
                                        <?php echo e(translate('Ascending')); ?></option>
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
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/latest-product.blade.php ENDPATH**/ ?>