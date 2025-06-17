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
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>"
                                    name="content[0][testimonial_shoulder]"
                                    value="<?php echo e(isset($widgetContents['testimonial_shoulder']) ? $widgetContents['testimonial_shoulder'] : ''); ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input" placeholder="<?php echo e(translate('Enter Title')); ?>" value="<?php echo e(isset($widgetContents['testimonial_title']) ? $widgetContents['testimonial_title'] : ''); ?>" name="content[0][testimonial_title]">
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Tripadvisor')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-tripadvisor">

                        <?php if(isset($widgetContents['testimonials']['tripadvisor'])): ?>
                            <?php
                                $count = 0;
                            ?>
                            <?php $__currentLoopData = $widgetContents['testimonials']['tripadvisor']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tripadvisor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php

                                    $count++;
                                ?>

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][name]"
                                                        value="<?php echo e(isset($tripadvisor['name']) ? $tripadvisor['name'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        value="<?php echo e(isset($tripadvisor['country']) ?   $tripadvisor['country']  : ''); ?>"
                                                        name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][rating]"
                                                        value="<?php echo e(isset($tripadvisor['rating']) ? $tripadvisor['rating'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][time]" value="<?php echo e(isset($tripadvisor['time']) ? $tripadvisor['time'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($tripadvisor['img']) ? $tripadvisor['img'] : ''); ?>">

                                                        <?php if(isset($tripadvisor['img'])): ?>
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="<?php echo e(asset('uploads/testimonials/' . $tripadvisor['img'])); ?>"
                                                                    alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <?php
                                                $tripadvisor_review= isset($tripadvisor['review']) ?   $tripadvisor['review']  : '';
                                                $tripadvisor_review=  html_entity_decode($tripadvisor_review);
                                                $tripadvisor_review=  prelaceScript($tripadvisor_review);
                                              ?>
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][tripadvisor][<?php echo e($count); ?>][review]"><?php echo e($tripadvisor_review); ?></textarea>
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
                        <button type="button" class="add-tripadvisor-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Facebook')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-facebook">

                        <?php if(isset($widgetContents['testimonials']['facebook'])): ?>
                            <?php
                                $count = 0;
                            ?>
                            <?php $__currentLoopData = $widgetContents['testimonials']['facebook']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $facebook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php

                                    $count++;
                                ?>

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][facebook][<?php echo e($count); ?>][name]"
                                                        value="<?php echo e(isset($facebook['name']) ? $facebook['name'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        value="<?php echo e(isset($facebook['country']) ?   $facebook['country']  : ''); ?>"
                                                        name="content[0][testimonials][facebook][<?php echo e($count); ?>][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][facebook][<?php echo e($count); ?>][rating]"
                                                        value="<?php echo e(isset($facebook['rating']) ? $facebook['rating'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][facebook][<?php echo e($count); ?>][time]" value="<?php echo e(isset($facebook['time']) ? $facebook['time'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][facebook][<?php echo e($count); ?>][img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($facebook['img']) ? $facebook['img'] : ''); ?>">

                                                        <?php if(isset($facebook['img'])): ?>
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="<?php echo e(asset('uploads/testimonials/' . $facebook['img'])); ?>"
                                                                    alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <?php
                                                $facebook_review= isset($facebook['review']) ?   $facebook['review']  : '';
                                                $facebook_review=  html_entity_decode($facebook_review);
                                                $facebook_review=  prelaceScript($facebook_review);
                                              ?>
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][facebook][<?php echo e($count); ?>][review]"><?php echo e($facebook_review); ?></textarea>
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
                        <button type="button" class="add-facebook-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Google')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-google">

                        <?php if(isset($widgetContents['testimonials']['google'])): ?>
                            <?php
                                $count = 0;
                            ?>
                            <?php $__currentLoopData = $widgetContents['testimonials']['google']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $google): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php

                                    $count++;
                                ?>

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Name')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Name')); ?>"
                                                        name="content[0][testimonials][google][<?php echo e($count); ?>][name]"
                                                        value="<?php echo e(isset($google['name']) ? $google['name'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Country')); ?></label>
                                                    <input type="text" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Country')); ?>"
                                                        value="<?php echo e(isset($google['country']) ?   $google['country']  : ''); ?>"
                                                        name="content[0][testimonials][google][<?php echo e($count); ?>][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Rating')); ?></label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="<?php echo e(translate('Enter Rating')); ?>"
                                                        name="content[0][testimonials][google][<?php echo e($count); ?>][rating]"
                                                        value="<?php echo e(isset($google['rating']) ? $google['rating'] : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> <?php echo e(translate('Time')); ?></label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="<?php echo e(translate('Enter Time')); ?>"
                                                        name="content[0][testimonials][google][<?php echo e($count); ?>][time]" value="<?php echo e(isset($google['time']) ? $google['time'] : ''); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Image')); ?></label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][google][<?php echo e($count); ?>][img]"
                                                            id="old_file"
                                                            value="<?php echo e(isset($google['img']) ? $google['img'] : ''); ?>">

                                                        <?php if(isset($google['img'])): ?>
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="<?php echo e(asset('uploads/testimonials/' . $google['img'])); ?>"
                                                                    alt="">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <?php
                                                $google_review= isset($google['review']) ?   $google['review']  : '';
                                                $google_review=  html_entity_decode($google_review);
                                                $google_review=  prelaceScript($google_review);
                                              ?>
                                                <div class="form-inner">
                                                    <label><?php echo e(translate('Review')); ?></label>
                                                    <textarea name="content[0][testimonials][google][<?php echo e($count); ?>][review]"><?php echo e($google_review); ?></textarea>
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
                        <button type="button" class="add-google-btn eg-btn btn--primary back-btn">
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
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Shoulder')); ?></label>
                                <input type="text" class="username-input"
                                    placeholder="<?php echo e(translate('Enter Shoulder')); ?>"
                                    name="content[0][testimonial_shoulder]">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Title')); ?></label>
                                <input type="text" class="username-input" placeholder="<?php echo e(translate('Enter Title')); ?>" name="content[0][testimonial_title]">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Tripadvisor')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-tripadvisor">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-tripadvisor-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Facebook')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-facebook">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-facebook-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label><?php echo e(translate('Google')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-google">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-google-btn eg-btn btn--primary back-btn">
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
<?php /**PATH /mnt/c/Users/jstnh/airbnb-booking-site/resources/views/backend/pages/widgets/testimonial.blade.php ENDPATH**/ ?>