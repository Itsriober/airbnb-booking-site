@if ($products)
    <input type="hidden" id="live_limit" value="{{ $products->count() }}">
    @foreach ($products as $key => $item)
        <div class="col-lg-6 col-md-6">
            @if ($productType == 'tour')
                @include('frontend.template-' . $templateId . '.partials.tour_card')
            @elseif($productType == 'hotel')
                @include('frontend.template-' . $templateId . '.partials.hotel_card')
            @elseif($productType == 'activities')
                @include('frontend.template-' . $templateId . '.partials.activities_card')
            @elseif($productType == 'transport')
                @include('frontend.template-' . $templateId . '.partials.transport_card')
            @endif
        </div>
    @endforeach

    <div class="row mt-3">
        {!! prelaceScript($products->links('vendor.pagination.custom')) !!}
    </div>
@else
    <h1 class="text-center">
        {{ translate('Yoo! Nothings Here Bruhv') }}</h1>
@endif
