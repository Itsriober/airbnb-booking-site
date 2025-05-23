@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @php
        $product_id = $transports->id;
        $product_type = 'transports';
        $author_id = $transports->author_id;
    @endphp
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')
    <!-- Start Transport Details section -->
    <div class="transport-details-section  pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">

                    <div class="transport-image-area mb-50">
                        <div class="tab-content mb-30" id="myTab5Content">
                            <div class="tab-pane fade show active" id="exterior" role="tabpanel"
                                aria-labelledby="exterior-tab">
                                <div class="transport-img">
                                    <div class="slider-btn-group">
                                        <div class="product-stand-next swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                            </svg>
                                        </div>
                                        <div class="product-stand-prev swiper-arrow">
                                            <svg width="8" height="13" viewBox="0 0 8 13"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="swiper product-img-slider">
                                        <div class="swiper-wrapper">
                                            @if ($transports->feature_img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('uploads/transports/features/' . $transports->feature_img) }}"
                                                        alt="image">
                                                </div>
                                            @endif
                                            @foreach ($galleries as $gallery)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('uploads/transports/gallery/' . $gallery->image) }}"
                                                        alt="image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <h3>{{ $transports->title }}</h3>

                    <p>{!! $transports->content !!}</p>
                    @if ($attributes->count() > 0)
                        @foreach ($attributes as $attribute)
                            @php

                                $attributeTerms = json_decode($transports->attribute_terms);

                                if (is_array($attributeTerms) && count($attributeTerms) > 0) {
                                    $terms = App\Models\TransportAttributeTerm::where('attribute_id', $attribute->id)
                                        ->whereIn('id', $attributeTerms)
                                        ->orderBy('name', 'asc')
                                        ->get();
                                } else {
                                    $terms = collect();
                                }
                            @endphp
                            @if ($terms->count() > 0)
                                <h4>{{ $attribute->getTranslation('name') }}</h4>
                                <ul class="room-features extra-service">
                                    @foreach ($terms as $term)
                                        <li>
                                            @if ($term->icon)
                                                <i class="{{ $term->icon }}"></i>
                                            @elseif ($term->image)
                                                <img src="{{ asset('uploads/transports/attribute/' . $term->image) }}"
                                                    alt="{{ $term->name }}">
                                            @endif
                                            {{ $term->getTranslation('name') }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    @endif

                    @if ($includes && $excludes)
                        <div class="includ-and-exclud-area mb-20">
                            @if ($includes)
                                <ul>
                                    <h4>{{ $transports->include_title ? $transports->include_title : translate('Includes') }}
                                    </h4>
                                    @forelse ($includes as $include)
                                        @if($include['title'])
                                        <li><i class="bi bi-check-lg"></i>{{ $include['title'] }}</li>
                                        @endif
                                    @empty
                                        <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                                    @endforelse
                                </ul>
                            @endif
                            @if ($excludes)
                                <ul class="exclud">
                                    <h4>{{ $transports->exclude_title ? $transports->exclude_title : translate('Excludes') }}
                                    </h4>
                                    @forelse ($excludes as $exclude)
                                        @if($exclude['title'])
                                        <li><i class="bi bi-x-lg"></i>{{ $exclude['title'] }}</li>
                                        @endif
                                    @empty
                                        <h2 class="text-center">{{ translate('No Data Found') }}</h2>
                                    @endforelse
                                </ul>
                            @endif
                        </div>
                    @endif
                    @if ($faqs)
                        <div class="faq-content-wrap mb-80">
                            <div class="faq-content-title mb-20">
                                <h4>{{ $transports->faq_title ? $transports->faq_title : translate('Frequently Asked & Question') }}
                                </h4>
                            </div>
                            <div class="faq-content">
                                <div class="accordion" id="accordionTravel">
                                    @forelse ($faqs ?? [] as $key => $faq)
                                    @if($faq['title'])
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="travelheading{{ $key }}">
                                                <button class="accordion-button {{ $key === 1 ? '' : 'collapsed' }}"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#travelcollapse{{ $key }}"
                                                    aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                                    aria-controls="travelcollapse{{ $key }}">
                                                    {{ $faq['title'] }}
                                                </button>
                                            </h2>
                                            <div id="travelcollapse{{ $key }}"
                                                class="accordion-collapse collapse {{ $key === 1 ? 'show' : '' }}"
                                                aria-labelledby="travelheading{{ $key }}"
                                                data-bs-parent="#accordionTravel">
                                                <div class="accordion-body">
                                                    {{ $faq['content'] }}
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
                    @if ($transports->map_lng && $transports->map_lat)
                        <div class="tour-location">
                            <h4>{{ translate('Location Map') }}</h4>
                            <div class="map-area mb-30">
                                <iframe width="300" height="170" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?q={{ $transports->map_lat }},{{ $transports->map_lng }}&hl=es&z=14&amp;output=embed">
                                </iframe>
                            </div>
                        </div>
                    @endif
                    @if ($transports->youtube_video)
                        <iframe width="860" height="345" src="{{ youtube_link($transports->youtube_video) }}">
                        </iframe>
                    @endif
                    @if (Auth::check() && Auth::user()->role == 1)
                        @include('frontend.template-' . $templateId . '.includes.review_area')
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="transport-sidebar">
                        <div class="booking-form-wrap">
                            @include('frontend.template-' . $templateId . '.includes.transport.booking')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Transport Details section -->
    @include('frontend.template-' . $templateId . '.includes.review_modal')
@endsection
