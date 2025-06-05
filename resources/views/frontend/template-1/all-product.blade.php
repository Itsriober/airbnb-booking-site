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
                class="@if ($sidebar_enable == 'yes') col-lg-8 @if ($sidebar_position == 'left') order-lg-2 @else order-lg-1 @endif
@else
col-lg-12 @endif">
                <div class="package-inner-title-section mb-40">
                    <p>{{ translate('Showing') }} <strong class="show_count">
                            {{ $products->count() }}</strong> {{ translate('result') }}</p>
                    <div class="selector-and-grid">
                        <div class="selector">
                            <select class="price_order_by" id="price_order_by">
                                <option value="desc" selected>{{ translate('Default Sorting') }}</option>
                                <option value="asc">{{ translate('Price Low to High') }}</option>
                                <option value="desc">{{ translate('Price High to Low') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="list-grid-product-wrap mb-70">
                    <div class="circle-loader"></div>
                    <div class="row gy-4" id="loadProducts">

                        @include('frontend.template-' . $templateId . '.partials.filter-products', [
                            'products' => $products,
                        ])

                    </div>
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                </div>

            </div>
            <input type="hidden" id="productType" value="{{ $productType }}">
            <input type="hidden" id="widget_name" value="all-product">
            <input type="hidden" id="item_show" value="{{ $displyProduct }}">
            @if ($sidebar_enable == 'yes')
                <div class="col-lg-4 @if ($sidebar_position == 'left') order-lg-1 @else order-lg-2 @endif">
                    <div class="sidebar-area">


                        <div class="single-widget mb-30">
                            <h5 class="widget-title">{{ translate('Search Here') }}</h5>
                            <div class="search-box">
                                <input type="text" class="keyword" placeholder="{{ translate('Search Here') }}">
                                <button class="keyword-search"><i class="bx bx-search"></i></button>
                            </div>
                        </div>

                        <div class="single-widget mb-30">
                            <h5 class="shop-widget-title">{{ translate('Price Filter') }}</h5>
                            <div class="range-wrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="hidden" id="min_value" class="min_value">
                                        <input type="hidden" id="max_value" class="min_value">
                                        <input type="hidden" id="highest_price" value="{{ $highest_price }}">
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
                                    <div class="priceRange btn-hover primary-btn1 primary-btn-sm">{{ translate('Apply') }}</div>
                                    <div class="caption">
                                        <span id="slider-range-value2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($productType == 'tour')
                            <div class="single-widget mb-30">
                                <h5 class="widget-title">{{ translate('Destinations') }}</h5>
                                @if ($filter_destinations->count() > 0)
                                    <ul class="category-list two destination_id">
                                        @foreach ($filter_destinations as $destination)
                                        @if($destination->tours->count() > 0)
                                            <li data-destination-id="{{ $destination->id }}">
                                                <div class="destination">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="destination{{ $destination->id }}">
                                                    <input class="form-check-input mt-0" type="radio" name="destination" id="destination{{ $destination->id }}">
                                                        
                                                            {{ $destination->destination }}
                                                        </label>
                                                      </div>
                                                    
                                                    <span>{{ $destination->tours->count() }}</span>
                                                </div>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="col-lg-12 col-md-12">
                                        <h2 class="text-center">{{ translate('Yoo! Nothings Here Bruhv') }}</h2>
                                    </div>
                                @endif
                            </div>
                        @endif

                        @if ($sidebarProducts)
                            <div class="single-widget mb-30">
                                <h5 class="widget-title">{{ translate('Most Popular') }}</h5>
                                @foreach ($sidebarProducts as $item)
                                    @include('frontend.template-1.partials.view_filter_product')
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
<!-- End Package Grid With Sidebar section -->

@push('js')
    <script src="{{ asset('frontend/js/range-slider.js?v=') }}{{ rand(1000, 9999) }}"></script>
    <script src="{{ asset('frontend/js/product-filter.js?v=') }}{{ rand(1000, 9999) }}"></script>
@endpush
