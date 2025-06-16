<?php $__env->startSection('content'); ?>
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4><?php echo e($page_title ?? ''); ?></h4>
            <a href="<?php echo e(route('hotels.list')); ?>" class="eg-btn btn--primary back-btn"> <img
                    src="<?php echo e(asset('backend/images/icons/back.svg')); ?>" alt="<?php echo e(translate('Go Back')); ?>">
                <?php echo e(translate('Go Back')); ?></a>
        </div>
    </div>
    <form action="<?php echo e(route('hotels.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Stay Content')); ?></h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label><?php echo e(translate('Title')); ?> <span class="text-danger">*</span></label>
                        <input type="text" class="username-input" value="<?php echo e(old('title')); ?>" name="title"
                            placeholder="<?php echo e(translate('Name of the stay')); ?>">
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="form-inner mb-25">
                        <label><?php echo e(translate('Content')); ?> <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content"><?php echo e(old('content')); ?></textarea>
                        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('YouTube Video Thumbnail')); ?></label>
                                <input type="file" class="username-input" name="youtube_image">
                                <?php $__errorArgs = ['youtube_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('YouTube Video URL')); ?></label>
                                <input type="text" class="username-input" value="<?php echo e(old('youtube_video')); ?>"
                                    name="youtube_video" placeholder="<?php echo e(translate('Paste the YouTube video URL here')); ?>">
                                <?php $__errorArgs = ['youtube_video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Stay Policy')); ?></h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label><?php echo e(translate('Policy Title')); ?></label>
                        <input type="text" class="username-input" value="<?php echo e(old('policy_title')); ?>"
                            name="policy_title" placeholder="<?php echo e(translate('Enter Policy Title')); ?>">
                        <?php $__errorArgs = ['policy_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-inner mt-3">
                        <div id="hotel_policy">

                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="addRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="<?php echo e(asset('backend/images/icons/add-icon.svg')); ?>"
                                    alt="<?php echo e(translate('Add New')); ?>"> <?php echo e(translate('Add New')); ?></button>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Check in/out time')); ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Time for check in')); ?></label>
                                <input type="text" id="timepicker" class="username-input" value="<?php echo e(old('check_in')); ?>"
                                    name="check_in" placeholder="<?php echo e(translate('Ex: 12:00')); ?>">
                                <?php $__errorArgs = ['check_in'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Room Type')); ?></label>
                                <input type="text"  class="username-input" value="<?php echo e(old('room_type')); ?>"
                                    name="room_type" placeholder="<?php echo e(translate('Room Type')); ?>">
                                <?php $__errorArgs = ['room_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Bed Type')); ?></label>
                                <input type="text" class="username-input" value="<?php echo e(old('bed_type')); ?>"
                                    name="bed_type" placeholder="<?php echo e(translate('Bed Type')); ?>">
                                <?php $__errorArgs = ['bed_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Minimum advance reservations')); ?></label>
                                <input type="number" class="username-input" value="<?php echo e(old('min_advance_reservations')); ?>"
                                    name="min_advance_reservations" placeholder="<?php echo e(translate('Ex: 3')); ?>">
                                <small><?php echo e(translate('Leave blank if you dont need to use the min day option')); ?></small>
                                <?php $__errorArgs = ['min_advance_reservations'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Time for check out')); ?></label>
                                <input type="text" id="timepicker2" class="username-input"
                                    value="<?php echo e(old('check_out')); ?>" name="check_out"
                                    placeholder="<?php echo e(translate('Ex: 11:00')); ?>">
                                <?php $__errorArgs = ['check_out'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Maximum Guests')); ?></label>
                                <input type="number" class="username-input"
                                    value="<?php echo e(old('guest_capability')); ?>" name="guest_capability"
                                    placeholder="<?php echo e(translate('Ex: 11:00')); ?>">
                                <?php $__errorArgs = ['guest_capability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Cancellation')); ?></label>
                                <input type="text" class="username-input"
                                    value="<?php echo e(old('cancellation')); ?>" name="cancellation"
                                    placeholder="<?php echo e(translate('Cancellation')); ?>">
                                    <span class="duration-icon">hours</span>
                                <?php $__errorArgs = ['cancellation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Minimum day stay requirements')); ?></label>
                                <input type="number" class="username-input" value="<?php echo e(old('min_stay')); ?>"
                                    name="min_stay" placeholder="<?php echo e(translate('Ex: 2')); ?>">
                                <small><?php echo e(translate('Leave blank if you dont need to set minimum day stay option')); ?></small>
                                <?php $__errorArgs = ['min_stay'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Pricing')); ?></h4>
                    </div>

                    <div class="form-inner mb-35">
                        <label><?php echo e(translate('Stay Price *')); ?> <span class="text-danger">*</span></label>
                        <input type="number" class="username-input" value="<?php echo e(old('price')); ?>"
                            name="price" placeholder="<?php echo e(translate('Stay Price *')); ?>">
                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_service_fee">
                            <input class="form-check-input enable_service_fee" name="enable_service_fee" type="checkbox"
                                id="enable_service_fee" value="1">
                            <b><?php echo e(translate('Enable Service Fee')); ?></b>
                        </label>
                    </div>
                    <div class="form-inner mb-25 d-none service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b><?php echo e(translate('Service Fee')); ?></b></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-none service_fee_show">
                        <div id="hotel_service_fee">

                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="serviceFeeAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="<?php echo e(asset('backend/images/icons/add-icon.svg')); ?>"
                                    alt="<?php echo e(translate('Add New')); ?>"> <?php echo e(translate('Add New')); ?></button>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Location')); ?></h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label><?php echo e(translate('Address')); ?></label>
                        <input type="text" class="username-input" value="<?php echo e(old('address')); ?>" name="address"
                            placeholder="<?php echo e(translate('Enter Hotel Address')); ?>">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="error text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('Country')); ?> <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single country_id" name="country_id">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>"
                                            <?php echo e(old('country_id') == $country->id ? 'selected' : ''); ?>>
                                            <?php echo e($country->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('State')); ?> <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single state_id" name="state_id">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                </select>
                                <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label><?php echo e(translate('City')); ?> <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single city_id" name="city_id">
                                    <option value=""><?php echo e(translate('Select Option')); ?></option>
                                </select>
                                <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="error text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
                
                <div class="eg-card product-card">
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct">
                                    <b><?php echo e(translate('Allow SEO')); ?></b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> <?php echo e(translate('Meta Title')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title">
                                    <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="error text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> <?php echo e(translate('Meta Description')); ?></label>
                                    <textarea name="meta_description"> </textarea>
                                    <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="error text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> <?php echo e(translate('Meta Keyward')); ?></label>
                                    <select class="username-input meta-keyward" name="meta_keyward[]"
                                        multiple="multiple">
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> <?php echo e(translate('Meta Image')); ?></label>
                                    <input type="file" class="username-input" name="meta_img">
                                    <?php $__errorArgs = ['meta_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="error text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="eg-card product-card pb-70">
                    <div class="button-group">
                        <button type="submit" class="radio-button">
                            <input type="radio" id="status1" name="status" value="1" />
                            <label class="eg-btn btn--green sm-medium-btn"
                                for="status1"><?php echo e(translate('Published')); ?></label>
                        </button>
                        <button type="submit" class="radio-button">
                            <input type="radio" id="status2" name="status" value="2" />
                            <label class="eg-btn orange--btn sm-medium-btn"
                                for="status2"><?php echo e(translate('Save as Draft')); ?></label>
                        </button>
                    </div>
                </div>
                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <div class="eg-card product-card">
                        <div class="eg-card-title-sm">
                            <h4><?php echo e(translate('User Setting')); ?></h4>
                        </div>

                        <div class="form-inner">
                            <select class="js-example-basic-single" name="author_id" required>
                                <option value=""><?php echo e(translate('Select Option')); ?></option>
                                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($author->id); ?>"
                                        <?php echo e(old('author_id') == $author->id ? 'selected' : ''); ?>>
                                        <?php echo e($author->username); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['author_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="error text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                    </div>
                <?php endif; ?>

                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Breakfast')); ?></h4>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="breakfast">
                            <input class="form-check-input breakfast" value="1" name="breakfast"
                                type="checkbox" id="breakfast">
                            <b><?php echo e(translate('Breakfast included')); ?></b>
                        </label>
                    </div>
                </div>
                <?php if($attributes->count() > 0): ?>
                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $terms = App\Models\HotelAttributeTerm::where('attribute_id', $attribute->id)
                                ->orderBy('name', 'asc')
                                ->get();
                        ?>
                        <?php if($terms->count() > 0): ?>
                            <div class="eg-card product-card">
                                <div class="eg-card-title-sm">
                                    <h4><?php echo e(translate('Attribute')); ?>: <?php echo e($attribute->getTranslation('name')); ?></h4>
                                </div>
                                <?php $__currentLoopData = $terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <label class="form-check-label" for="term<?php echo e($term->id); ?>">
                                            <input class="form-check-input" name="term[]" type="checkbox"
                                                id="term<?php echo e($term->id); ?>" value="<?php echo e($term->id); ?>">
                                            <b><?php echo e($term->getTranslation('name')); ?></b>
                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Feature Image')); ?></h4>
                    </div>
                    <div class="form-inner file-upload mb-35">
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p><?php echo e(translate('Choose an image file or drag it here')); ?></p>
                            </div>
                            <input type="file" name="features_image" class="dropzone featues_image">

                        </div>


                        <div class="preview-zone hidden">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-danger btn-xs remove-preview"
                                            style="display:none;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body"></div>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['features_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4><?php echo e(translate('Image Gallery')); ?></h4>
                    </div>
                    <div class="form-inner img-upload mb-35">
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p><?php echo e(translate('Choose image files or drag it here')); ?></p>
                            </div>
                            <input type="file" id="files" name="image[]" class="dropzone image_gal" multiple>

                        </div>

                        <div class="gallery-preview-zone hidden">
                            <div class="box box-solid">
                                <div class="box-body"></div>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error text-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>
        </div>

        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/backend/hotels/create.blade.php ENDPATH**/ ?>