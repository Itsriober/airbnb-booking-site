<?php
$displyProduct = null;
$orderBy = 'DESC';
$productType = 'tour';
$sidebar_enable = 'yes';
$sidebar_position = 'left';

if (isset($singelWidgetData->widget_content)) {
    $widgetContent = $singelWidgetData->getTranslation('widget_content');

    $displyProduct = isset($widgetContent['display_per_page']) ? $widgetContent['display_per_page'] : null;
    $orderBy = isset($widgetContent['storted_by']) ? $widgetContent['storted_by'] : 'DESC';
    $productType = isset($widgetContent['product_type']) ? $widgetContent['product_type'] : 'tour';
    $sidebar_enable = isset($widgetContent['sidebar_enable']) ? $widgetContent['sidebar_enable'] : 'yes';
    $sidebar_position = isset($widgetContent['sidebar_position']) ? $widgetContent['sidebar_position'] : 'left';
}

$products = products($productType, $orderBy, $displyProduct);
$highest_price = highestPrice($productType);
$filter_destinations = filter_destinations();
$sidebarProducts = sidebarProducts($productType);
?>

<!-- Start Package Grid With Sidebar section -->
<div class="package-grid-with-sidebar-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div
                class="<?php if($sidebar_enable == 'yes'): ?> col-lg-8 <?php if($sidebar_position == 'left'): ?> order-lg-2 <?php else: ?> order-lg-1 <?php endif; ?>
<?php else: ?>
col-lg-12 <?php endif; ?>">
                <div class="package-inner-title-section mb-40">
                    <p><?php echo e(translate('Showing')); ?> <strong class="show_count">
                            <?php echo e($products->count()); ?></strong> <?php echo e(translate('result')); ?></p>
                    <div class="selector-and-grid">
                        <div class="selector">
                            <select class="price_order_by" id="price_order_by">
                                <option value="desc" selected><?php echo e(translate('Default Sorting')); ?></option>
                                <option value="asc"><?php echo e(translate('Price Low to High')); ?></option>
                                <option value="desc"><?php echo e(translate('Price High to Low')); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="list-grid-product-wrap mb-70">
                    <div class="circle-loader"></div>
                    <div class="row gy-4" id="loadProducts">

                        <?php echo $__env->make('frontend.template-' . $templateId . '.partials.filter-products', [
                            'products' => $products,
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    </div>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>

            </div>
            <input type="hidden" id="productType" value="<?php echo e($productType); ?>">
            <input type="hidden" id="widget_name" value="all-product">
            <input type="hidden" id="item_show" value="<?php echo e($displyProduct); ?>">
            <?php if($sidebar_enable == 'yes'): ?>
                <div class="col-lg-4 <?php if($sidebar_position == 'left'): ?> order-lg-1 <?php else: ?> order-lg-2 <?php endif; ?>">
                    <div class="sidebar-area">


                        <div class="single-widget mb-30">
                            <h5 class="widget-title"><?php echo e(translate('Search Here')); ?></h5>
                            <div class="search-box">
                                <input type="text" class="keyword" placeholder="<?php echo e(translate('Search Here')); ?>">
                                <button class="keyword-search"><i class="bx bx-search"></i></button>
                            </div>
                        </div>

                        <div class="single-widget mb-30">
                            <h5 class="shop-widget-title"><?php echo e(translate('Price Filter')); ?></h5>
                            <div class="range-wrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="hidden" id="min_value" class="min_value">
                                        <input type="hidden" id="max_value" class="min_value">
                                        <input type="hidden" id="highest_price" value="<?php echo e($highest_price); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="slider-range"></div>
                                    </div>
                                </div>
                                <div class="slider-labels">
                                    <div class="caption">
                                        <span id="slider-range-value1"></span>
                                    </div>
                                    <div class="priceRange btn-hover primary-btn1 primary-btn-sm"><?php echo e(translate('Apply')); ?></div>
                                    <div class="caption">
                                        <span id="slider-range-value2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($productType == 'tour'): ?>
                            <div class="single-widget mb-30">
                                <h5 class="widget-title"><?php echo e(translate('Destinations')); ?></h5>
                                <?php if($filter_destinations->count() > 0): ?>
                                    <ul class="category-list two destination_id">
                                        <?php $__currentLoopData = $filter_destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($destination->tours->count() > 0): ?>
                                            <li data-destination-id="<?php echo e($destination->id); ?>">
                                                <div class="destination">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="destination<?php echo e($destination->id); ?>">
                                                    <input class="form-check-input mt-0" type="radio" name="destination" id="destination<?php echo e($destination->id); ?>">
                                                        
                                                            <?php echo e($destination->destination); ?>

                                                        </label>
                                                      </div>
                                                    
                                                    <span><?php echo e($destination->tours->count()); ?></span>
                                                </div>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="col-lg-12 col-md-12">
                                        <h2 class="text-center"><?php echo e(translate('Yoo! Nothings Here Bruhv')); ?></h2>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($sidebarProducts): ?>
                            <div class="single-widget mb-30">
                                <h5 class="widget-title"><?php echo e(translate('Most Popular')); ?></h5>
                                <?php $__currentLoopData = $sidebarProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('frontend.template-1.partials.view_filter_product', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- End Package Grid With Sidebar section -->

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('frontend/js/range-slider.js?v=')); ?><?php echo e(rand(1000, 9999)); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/product-filter.js?v=')); ?><?php echo e(rand(1000, 9999)); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/wpgxubae/public_html/test.harmostays.com/resources/views/frontend/template-1/all-product.blade.php ENDPATH**/ ?>