<?php
$limit = 9;
$orderBy = 'asc';
if (isset($singelWidgetData->widget_content)) {
    $widgetContent = $singelWidgetData->getTranslation('widget_content');
    $limit = isset($widgetContent['display_per_page']) ? $widgetContent['display_per_page'] : 9;
    $orderBy = isset($widgetContent['order_by']) ? $widgetContent['order_by'] : 'asc';
}
$visas = visa('', $perPage = $limit, $orderBy);
?>

@if($visas) 
<div class="visa-with-sidebar-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-12">
                <div class="list-grid-product-wrap mb-70 grid-group-wrapper">
                    <div class="row gy-4">
                        @foreach($visas as $item)
                        <div class="col-md-4">
                            @include('frontend.template-'.$templateId.'.partials.visa-card')
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    {!! $visas->links('vendor.pagination.custom') !!}
                </div>
            </div>
        </div>
    </div>
   </div>
@endif