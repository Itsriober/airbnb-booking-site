@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')
    <div class="activites-pages pt-120 mb-120">
        <div class="container">
            @if ($products && $products->isNotEmpty())
                <div class="row g-4">
                    @foreach ($products as $key => $item)
                    @if($type == 'tour')
                    <?php
                        if($item->enable_fixed_dates == 1 && $item->fixed_dates){
                            $dates = json_decode($item->fixed_dates);
                            foreach ($dates as $key=>$date){
                                if ($key == 1){
                                    $start_date =  new DateTime($date->start_date);
                                    $end_date =  new DateTime($date->end_date);
                                }
                            }
            
                            $interval = $start_date->diff($end_date);
                            $days = $interval->days;
                            $nights = $days - 1;
                        }else{
                            $start_date = null;
                            $end_date = null;
                            $interval = null;
                            $days = '';
                            $nights = '';
                        }
                    ?>
                    @endif
                    @if($type == 'tour' && isset($request->duration) && !empty($request->duration))
                    @if($request->duration == $days)
                        <div
                            class="@if ($type == 'visa') col-xl-6 col-lg-6 @else col-xl-4 col-lg-4 @endif col-sm-6">
                            @include('frontend.template-' . $templateId . '.partials.tour_card')
                        </div>
                    @endif
                    @else
                    <div
                            class="@if ($type == 'visa') col-xl-6 col-lg-6 @else col-xl-4 col-lg-4 @endif col-sm-6">
                            @if ($type == 'tour')
                                @include('frontend.template-' . $templateId . '.partials.tour_card')
                            @elseif($type == 'hotel')
                                @include('frontend.template-' . $templateId . '.partials.hotel_card')
                            @elseif($type == 'activities')
                                @include('frontend.template-' . $templateId . '.partials.activities_card')
                            @elseif($type == 'visa')
                                @include('frontend.template-' . $templateId . '.partials.visa-card')
                            @elseif($type == 'transport')
                                @include('frontend.template-' . $templateId . '.partials.transport_card')
                            @endif
                        </div>
                        @endif
                    @endforeach
                </div>

                <div class="row ">
                    {!! prelaceScript($products->links('vendor.pagination.custom')) !!}
                </div>
            @else
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-sm-12">
                        <h1 class="text-center">
                            {{ translate('Yoo! Nothings Here Bruhv') }}</h1>
                    </div>
                </div>
            @endif
            
        </div>
    </div>
@endsection
