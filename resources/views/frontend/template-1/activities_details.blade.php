@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @php
        $product_id = $activities->id;
        $product_type = 'activities';
        $author_id = $activities->author_id;
    @endphp
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')


    <!-- Start Activitis section -->
    <div class="package-details-area pt-120 mb-120">
        <div class="container">
            <div class="row">
                <div class="co-lg-12">
                    <div class="package-img-group mb-50">
                        <div class="row align-items-center g-3">
                            <div class="col-lg-6">
                                <div class="gallery-img-wrap">
                                    <img src="{{ asset('uploads/activities/features/' . $activities->feature_img) }}" alt="{{$activities->title}}">
                                    <a data-fancybox="gallery-01" href="{{ asset('uploads/activities/features/' . $activities->feature_img) }}"><i
                                            class="bi bi-eye"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 h-100">
                                <div class="row g-3 h-100">
                                    @php
                                        if($activities->youtube_image && $activities->youtube_video){
                                            $gallery = $galleries->slice(0, 3);
                                        }else{
                                            $gallery = $galleries->slice(0, 4);
                                        }
                                    @endphp
                                    @foreach ($gallery as $key=>$image)
                                    @if($activities->youtube_video && $activities->youtube_image == '')
                                    @if($loop->remaining == 1 && $galleries->count() > $gallery->count())
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/activities/gallery/' . $image->image) }}" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> {{translate('View More Images')}}</button>   
                                        </div>
                                    </div>
                                    @elseif($loop->last)
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/activities/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01"
                                                href="{{$activities->youtube_video}}"><i
                                                    class="bi bi-play-circle"></i> {{translate('Watch Video')}}</a>   
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="{{ asset('uploads/activities/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01" href="{{ asset('uploads/activities/gallery/' . $image->image) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    @if($loop->last && $galleries->count() > $gallery->count())
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{ asset('uploads/activities/gallery/' . $image->image) }}" alt="gallery">
                                            <button class="StartSlideShowFirstImage"><i class="bi bi-plus-lg"></i> {{translate('View More Images')}}</button>   
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-6">
                                        <div class="gallery-img-wrap">
                                            <img src="{{ asset('uploads/activities/gallery/' . $image->image) }}" alt="gallery">
                                            <a data-fancybox="gallery-01" href="{{ asset('uploads/activities/gallery/' . $image->image) }}"><i
                                                    class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @endforeach
                                    @if($activities->youtube_image &&  $activities->youtube_video)
                                    <div class="col-6">
                                        <div class="gallery-img-wrap active">
                                            <img src="{{asset('uploads/activities/youtube/'.$activities->youtube_image)}}" alt="{{$activities->youtube_image}}">
                                            <a data-fancybox="gallery-01"
                                                href="{{$activities->youtube_video}}"><i
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
                <a href="{{ asset('uploads/activities/gallery/' . $img->image) }}" data-fancybox="images"><img src="{{ asset('uploads/activities/gallery/' . $img->image) }}" alt="image"></a>   
                @endforeach
            </div> 
            @endif 
            <div class="row g-xl-4 gy-5">
                <div class="col-xl-8">
                    @if (!empty($activities->shoulder))
                        <div class="eg-tag2">
                            <span>{{ $activities->getTranslation('shoulder') }}</span>
                        </div>
                    @endif
                    <h2>{{ $activities->getTranslation('title') }}</h2>
                    <div class="tour-price">
                        <h3>{{ $activities->sale_price > 0 ? currency_symbol() . $activities->sale_price : currency_symbol() . $activities->price }}/
                        </h3><span>{{ translate('per person') }}</span>
                    </div>
                    <ul class="tour-info-metalist">
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14 7C14 8.85652 13.2625 10.637 11.9497 11.9497C10.637 13.2625 8.85652 14 7 14C5.14348 14 3.36301 13.2625 2.05025 11.9497C0.737498 10.637 0 8.85652 0 7C0 5.14348 0.737498 3.36301 2.05025 2.05025C3.36301 0.737498 5.14348 0 7 0C8.85652 0 10.637 0.737498 11.9497 2.05025C13.2625 3.36301 14 5.14348 14 7ZM7 3.0625C7 2.94647 6.95391 2.83519 6.87186 2.75314C6.78981 2.67109 6.67853 2.625 6.5625 2.625C6.44647 2.625 6.33519 2.67109 6.25314 2.75314C6.17109 2.83519 6.125 2.94647 6.125 3.0625V7.875C6.12502 7.95212 6.14543 8.02785 6.18415 8.09454C6.22288 8.16123 6.27854 8.2165 6.3455 8.25475L9.408 10.0048C9.5085 10.0591 9.62626 10.0719 9.73611 10.0406C9.84596 10.0092 9.93919 9.93611 9.99587 9.83692C10.0525 9.73774 10.0682 9.62031 10.0394 9.50975C10.0107 9.39919 9.93982 9.30426 9.842 9.24525L7 7.62125V3.0625Z">
                                </path>
                            </svg>
                            {{ $activities->days }} {{ translate('Days') }} / {{ $activities->nights }}
                            {{ translate('Night') }}
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 7C7.92826 7 8.8185 6.63125 9.47487 5.97487C10.1313 5.3185 10.5 4.42826 10.5 3.5C10.5 2.57174 10.1313 1.6815 9.47487 1.02513C8.8185 0.368749 7.92826 0 7 0C6.07174 0 5.1815 0.368749 4.52513 1.02513C3.86875 1.6815 3.5 2.57174 3.5 3.5C3.5 4.42826 3.86875 5.3185 4.52513 5.97487C5.1815 6.63125 6.07174 7 7 7ZM14 12.8333C14 14 12.8333 14 12.8333 14H1.16667C1.16667 14 0 14 0 12.8333C0 11.6667 1.16667 8.16667 7 8.16667C12.8333 8.16667 14 11.6667 14 12.8333Z">
                                </path>
                            </svg>
                            {{ translate('Max People') }} : {{ $activities->max_people }}
                        </li>
                        <li>
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M14 0.43748C14 0.372778 13.9856 0.308889 13.9579 0.250418C13.9302 0.191947 13.8898 0.140348 13.8398 0.0993396C13.7897 0.0583312 13.7312 0.0289339 13.6684 0.0132656C13.6057 -0.00240264 13.5402 -0.00395173 13.4768 0.00872996L9.1875 0.86623L4.89825 0.00872996C4.84164 -0.00258444 4.78336 -0.00258444 4.72675 0.00872996L0.35175 0.88373C0.252608 0.903546 0.163389 0.957088 0.099263 1.03525C0.0351366 1.11342 6.10593e-05 1.21138 0 1.31248L0 13.5625C3.90711e-05 13.6272 0.0144289 13.6911 0.0421328 13.7495C0.0698367 13.808 0.110165 13.8596 0.160212 13.9006C0.210259 13.9416 0.268779 13.971 0.331556 13.9867C0.394332 14.0024 0.459803 14.0039 0.52325 13.9912L4.8125 13.1337L9.10175 13.9912C9.15836 14.0025 9.21664 14.0025 9.27325 13.9912L13.6482 13.1162C13.7474 13.0964 13.8366 13.0429 13.9007 12.9647C13.9649 12.8865 13.9999 12.7886 14 12.6875V0.43748ZM4.375 12.3287V0.97123L4.8125 0.88373L5.25 0.97123V12.3287L4.89825 12.2587C4.84165 12.2474 4.78335 12.2474 4.72675 12.2587L4.375 12.3287ZM8.75 13.0287V1.67123L9.10175 1.74123C9.15836 1.75254 9.21664 1.75254 9.27325 1.74123L9.625 1.67123V13.0287L9.1875 13.1162L8.75 13.0287Z">
                                </path>
                            </svg>
                            {{ $activities->countries->name }}.
                        </li>
                    </ul>
                    <p>{!! $activities->getTranslation('content') !!}</p>

                    @if ($attributes->count() > 0)
                        @foreach ($attributes as $attribute)
                            @php

                                $attributeTerms = json_decode($activities->attribute_terms);

                                if (is_array($attributeTerms) && count($attributeTerms) > 0) {
                                    $terms = App\Models\ActivitiesAttributeTerm::where('attribute_id', $attribute->id)
                                        ->whereIn('id', $attributeTerms)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                } else {
                                    $terms = collect();
                                }

                            @endphp
                            @if ($terms->count() > 0)
                                <h4>{{ $attribute->getTranslation('name') }}</h4>
                                <ul class="activities-features">
                                    @foreach ($terms as $term)
                                        <li>
                                            @if ($term->icon)
                                                <i class="{{ $term->icon }}"></i>
                                            @elseif($term->image)
                                                <img src="{{ asset('uploads/activities/attribute/' . $term->image) }}"
                                                    alt="{{ $term->name }}">
                                            @endif
                                            {{ $term->getTranslation('name') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    @endif

                    @if($includes && $excludes)
                    <div class="includ-and-exclud-area mb-20">
                        <ul>
                            <h4>{{ $activities->include_title ? $activities->include_title : translate('Includes') }}</h4>
                            @forelse ($includes as $include)
                                @if($include['title'])
                                <li><i class="bi bi-check-lg"></i>{{ $include['title'] }}</li>
                                @endif
                            @empty
                                <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                            @endforelse
                        </ul>
                        <ul class="exclud">
                            <h4>{{ $activities->exclude_title ? $activities->exclude_title : translate('Excludes') }}</h4>
                            @forelse ($excludes as $exclude)
                                @if($exclude['title'])
                                <li><i class="bi bi-x-lg"></i>{{ $exclude['title'] }}</li>
                                @endif
                            @empty
                                <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                            @endforelse
                        </ul>
                    </div>
                    @endif

                    @if ($highlights && count($highlights) > 0)
                        <div class="highlight-tour mb-20">
                            <h4>{{ $activities->highlight_title ? $activities->highlight_title : translate('Highlights of the Tour') }}</h4>

                            <ul>
                                @foreach ($highlights as $highlight)
                                @if($highlight['title'])
                                    <li><span><i class="bi bi-check"></i></span> {{ $highlight['title'] }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($activities_plan)
                        <h4>{{ $activities->plan_title ? $activities->plan_title : translate('Activities Plan') }}</h4>
                        <div class="accordion tour-plan" id="tourPlan">
                            @forelse ($activities_plan as $key => $plan)
                            @if($plan['title'])
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $key }}">
                                            <span>{{ translate('Day') }} {{ $plan['day'] }} :</span>
                                            {{ $plan['title'] }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}"
                                        class="accordion-collapse collapse {{ $key === 1 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $key }}" data-bs-parent="#tourPlan">
                                        <div class="accordion-body">
                                            <ul>
                                                @if(!empty($plan['morning']))
                                                <li><i
                                                        class="bi bi-check-lg"></i><strong>{{ translate('Morning') }}:</strong>
                                                    {{ $plan['morning'] }}</li>
                                                    @endif
                                                    @if(!empty($plan['midday']))
                                                <li><i
                                                        class="bi bi-check-lg"></i><strong>{{ translate('Midday') }}:</strong>
                                                    {{ $plan['midday'] }}</li>
                                                    @endif

                                                @if (!empty($plan['afternoon']))
                                                    <li><i
                                                            class="bi bi-check-lg"></i><strong>{{ translate('Afternoon') }}:</strong>
                                                        {{ $plan['afternoon'] }}</li>
                                                @endif
                                                @if (!empty($plan['evening']))
                                                    <li><i
                                                            class="bi bi-check-lg"></i><strong>{{ translate('Evening') }}:</strong>
                                                        {{ $plan['evening'] }}</li>
                                                @endif
                                                @if (!empty($plan['night']))
                                                    <li><i
                                                            class="bi bi-check-lg"></i><strong>{{ translate('Night') }}:</strong>
                                                        {{ $plan['night'] }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @empty
                                <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                            @endforelse
                        </div>
                    @endif
                    <div class="tour-location">
                        <h4>{{ translate('Location Map') }}</h4>
                        <div class="map-area mb-30">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193325.0481540361!2d-74.06757856146028!3d40.79052383652264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1660366711448!5m2!1sen!2sbd"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    @if ($frequently && count($frequently) > 0)
                        <div class="faq-content-wrap mb-80">
                            <div class="faq-content-title mb-20">
                                <h4>{{ $activities->faq_title ? $activities->faq_title : translate('Frequently Asked & Question') }}</h4>
                            </div>
                            <div class="faq-content">
                                <div class="accordion" id="accordionTravel">
                                    @forelse ($frequently as $key => $faqs)
                                    @if($faqs['title'])
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheading{{ $key }}">
                                                <button class="accordion-button {{ $key === 1 ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#travelcollapse{{ $key }}"
                                                    aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                                    aria-controls="travelcollapse{{ $key }}">
                                                    {{ $faqs['title'] }}
                                                </button>
                                            </h2>
                                            <div id="travelcollapse{{ $key }}"
                                                class="accordion-collapse collapse {{ $key === 1 ? 'show' : '' }}"
                                                aria-labelledby="travelheading{{ $key }}"
                                                data-bs-parent="#accordionTravel">
                                                <div class="accordion-body">
                                                    {{ $faqs['content'] }}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @empty
                                        <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 1)
                    <div class="review-wrapper">
                        @include('frontend.template-' . $templateId . '.includes.review_area')
                    </div>
                    @endif
                </div>
                <div class="col-xl-4">
                    <div class="booking-form-wrap mb-30">
                        @include('frontend.template-' . $templateId . '.includes.activities.booking')
                    </div>
                    <div class="banner2-card">
                        @include('frontend.template-' . $templateId . '.includes.activities.banner2')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Activitis section -->
    @include('frontend.template-' . $templateId . '.includes.review_modal')
@endsection
