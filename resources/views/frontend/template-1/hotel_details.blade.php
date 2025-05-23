@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @php
        $product_id = $hotels->id;
        $product_type = 'hotel';
        $author_id = $hotels->author_id;
    @endphp
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')


    <!-- Start Room Details section -->
    <div class="room-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="co-lg-12">
                    <div class="room-img-group mb-50">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap">
                                    <img src="{{ asset('uploads/hotel/features/' . $hotels->feature_img) }}" alt="{{$hotels->title}}">
                                    <a data-fancybox="gallery-01" href="{{ asset('uploads/hotel/features/' . $hotels->feature_img) }}"><i
                                            class="bi bi-eye"></i> {{translate('View Room')}}</a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-3">
                                    @php
                                        if($hotels->youtube_image && $hotels->youtube_video){
                                            $gallery = $galleries->slice(0, 3);
                                        }else{
                                            $gallery = $galleries->slice(0, 4);
                                        }
                                    @endphp
                                    @foreach ($gallery as $key=>$image)
                                    @if($hotels->youtube_video && $hotels->youtube_image == '')
                                    @if($loop->remaining == 1 && $galleries->count() > $gallery->count())
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> {{translate('View More Images')}}</button>   
                                        </div>
                                    </div>
                                    @elseif($loop->last)
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01"
                                                href="{{$hotels->youtube_video}}"><i
                                                    class="bi bi-play-circle"></i> {{translate('Watch Video')}}</a>   
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01" href="{{ asset('uploads/hotel/gallery/' . $image->image) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    @if($loop->last && $galleries->count() > $gallery->count())
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> {{translate('View More Images')}}</button>   
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="{{ asset('uploads/hotel/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01" href="{{ asset('uploads/hotel/gallery/' . $image->image) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @if($hotels->youtube_image &&  $hotels->youtube_video)                                    
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{asset('uploads/hotel/youtube/'.$hotels->youtube_image)}}" alt="{{$hotels->youtube_image}}">
                                            <a data-fancybox="gallery-01"
                                                href="{{$hotels->youtube_video}}"><i
                                                    class="bi bi-play-circle"></i> {{translate('Watch Video')}}</a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($galleries)
            <div class="others-image-wrap d-none"> 
                @foreach($galleries as $img)
                <a href="{{ asset('uploads/hotel/gallery/' . $img->image) }}" data-fancybox="images"><img src="{{ asset('uploads/hotel/gallery/' . $img->image) }}" alt="image"></a>   
                @endforeach
            </div> 
            @endif 
 
            <div class="row g-xl-4 gy-5">
                <div class="col-xl-8">
                    <div class="location-and-review">
                        <div class="location">
                            <p><i class="bi bi-geo-alt"></i> {{ $hotels->address }}, {{ $hotels['cities']['name'] }},
                                {{ $hotels['states']['name'] }},
                                {{ $hotels['countries']['name'] }} - <a
                                    href="#location-map">{{ translate('See Map') }}</a></p>
                        </div>
                        <div class="review-area">
                            @php
                                $total_reviews = $hotels->reviews?->count();
                                $total_rating = $hotels->reviews?->sum('rating');
                                $rating = $total_reviews > 0 && $total_rating > 0 ? $total_rating / $total_reviews : 0;
                                $rating_view = $rating;
                            @endphp
                            <ul class="star-list">
                                @foreach (range(1, 5) as $i)
                                    @if ($rating > 0)
                                        @if ($rating > 0.5)
                                            <li><i class="bi bi-star-fill"></i></li>
                                        @else
                                            <li><i class="bi bi-star-half"></i></li>
                                        @endif
                                    @else
                                        <li><i class="bi bi-star"></i></li>
                                    @endif
                                    @php $rating--; @endphp
                                @endforeach
                            </ul>
                            <span><strong>{{ $total_reviews > 0 ? $rating_view : 0 }}
                                    {{ translate('Excellent') }}</strong> {{ $total_reviews }}
                                {{ translate('reviews') }}</span>
                        </div>
                    </div>
                    <h2>{{ $hotels->getTranslation('title') }}</h2>
                    <div class="price-area">
                        <h6>{{ currency_symbol() . $hotels->price }}/<span>{{ translate('per night') }}</span></h6>
                    </div>
                    <p>{!! $hotels->getTranslation('content') !!}</p>
                    @if ($attributes->count() > 0)
                        @foreach ($attributes as $attribute)
                            @php
                                $attributeTerms = json_decode($hotels->attribute_terms);

                                if (is_array($attributeTerms) && count($attributeTerms) > 0) {
                                    $terms = App\Models\HotelAttributeTerm::where('attribute_id', $attribute->id)
                                        ->whereIn('id', $attributeTerms)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                } else {
                                    $terms = collect();
                                }

                            @endphp
                            @if ($terms->count() > 0)
                                <h4>{{ $attribute->getTranslation('name') }}</h4>
                                <ul class="room-features">
                                    @foreach ($terms as $term)
                                        <li>
                                            @if ($term->icon)
                                                <i class="{{ $term->icon }}"></i>
                                            @elseif($term->image)
                                                <img src="{{ asset('uploads/hotel/attribute/' . $term->image) }}"
                                                    alt="{{ $term->name }}">
                                            @endif
                                            {{ $term->getTranslation('name') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    @endif

                    {{-- Policies --}}
                    @include('frontend.template-1.partials.policies')
                    {{-- End Policies --}}
                    @if ($hotels->map_lng && $hotels->map_lat)
                        <div id="location-map" class="tour-location">
                            <h4>{{ translate('Location Map') }}</h4>
                            <div class="map-area mb-30">
                                <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?q={{ $hotels->map_lat }},{{ $hotels->map_lng }}&hl=es&z=14&amp;output=embed">
                                </iframe>
                            </div>
                        </div>
                    @endif

                    @if (Auth::check() && Auth::user()->role == 1)
                        @include('frontend.template-' . $templateId . '.includes.review_area')
                    @endif
                </div>
                <div class="col-xl-4">
                    <div class="booking-form-wrap mb-30">
                        @include('frontend.template-' . $templateId . '.includes.hotel.booking')
                    </div>
                    <div class="banner2-card">
                        @include('frontend.template-' . $templateId . '.includes.hotel.banner2')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.template-' . $templateId . '.includes.review_modal')
    <!-- End Room Details section -->
@endsection
