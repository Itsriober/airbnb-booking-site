<?php
$limit = 3;
$orderBy = 'asc';
if (isset($singelWidgetData->widget_content)) {
    $widgetContent = $singelWidgetData->getTranslation('widget_content');
    $limit = isset($widgetContent['display_per_page']) ? $widgetContent['display_per_page'] : 9;
    $orderBy = isset($widgetContent['order_by']) ? $widgetContent['order_by'] : 'asc';
}
$destinations = destinations('', $perPage = $limit, $orderBy);
?>

@if($destinations) 
<div class="destination-section pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5 mb-70">
            @if($destinations->count()>0)
            @foreach($destinations as $item)
            <div class="col-xl-3 col-lg-4 col-sm-6">
                @include('frontend.template-'.$templateId.'.partials.destination_card')
            </div>
            @endforeach
            @else
            <div class="col-xl-12 col-lg-12 col-sm-12"><h2 class="text-center">{{translate('No Data Found')}}</h2></div>
            @endif
        </div>
        <div class="row">
            {!! $destinations->links('vendor.pagination.custom') !!}
        </div>
    </div>
</div>
@endif