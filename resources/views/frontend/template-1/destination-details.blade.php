@extends('frontend.template-' . $templateId . '.partials.master')
@section('content')
    @include('frontend.template-' . $templateId . '.breadcrumb.breadcrumb')

    <div class="destination-details-wrap mb-120 pt-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <h2>{{ $destinations->getTranslation('title') }}</h2>
                    <p>{{ $destinations->short_desc }}</p>
                    <div class="destination-gallery mb-40 mt-40">
                        <div class="row g-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="gallery-img-wrap">
                                    @if (fileExists('uploads/destination/features/', $destinations->features_image) != false &&
                                            $destinations->features_image != null)
                                        <img src="{{ asset('uploads/destination/features/' . $destinations->features_image) }}"
                                            alt="{{ $destinations->title }}">
                                        <a data-fancybox="gallery-01"
                                            href="{{ asset('uploads/destination/features/' . $destinations->features_image) }}"><i
                                                class="bi bi-eye"></i>{{ $destinations->destination }}</a>
                                    @else
                                        <img src="{{ asset('uploads/author-cover-placeholder.webp') }}" alt="">
                                        <a data-fancybox="gallery-01"
                                            href="{{ asset('uploads/author-cover-placeholder.webp') }}"><i
                                                class="bi bi-eye"></i> {{ $destinations->destination }}</a>
                                    @endif

                                </div>
                            </div>
                            @foreach ($galleries->take(5) as $index => $images)
                                @php
                                    $colClassLg = '';
                                    $colClassSm = '';

                                    if ($index == 0) {
                                        $colClassLg = 'col-lg-5';
                                        $colClassSm = 'col-sm-6';
                                    } elseif ($index == 1) {
                                        $colClassLg = 'col-lg-3';
                                        $colClassSm = 'col-sm-6';
                                    } elseif ($index == 2) {
                                        $colClassLg = 'col-lg-3';
                                        $colClassSm = 'col-sm-6';
                                    } elseif ($index == 3) {
                                        $colClassLg = 'col-lg-4';
                                        $colClassSm = 'col-sm-6';
                                    } elseif ($index == 4) {
                                        $colClassLg = 'col-lg-5';
                                        $colClassSm = 'col-sm-6';
                                    } else 
                                @endphp 
                                <div class="{{ $colClassLg }} {{ $colClassSm }}">
                                    <div class="gallery-img-wrap">
                                        <img src="{{ asset('uploads/destination/gallery/' . $images->image) }}" alt="">
                                        <a data-fancybox="gallery-01" href="{{ asset('uploads/destination/gallery/' . $images->image) }}"><i
                                                class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p>{!! $destinations->getTranslation('content') !!}</p>
                </div>
                <div class="col-lg-4">
                    <div class="destination-sidebar">
                        <div class="destination-info mb-30">
                            <div class="single-info">
                                <span>{{ translate('Destination') }}:</span>
                                <h5>{{ $destinations->destination }}</h5>
                            </div>
                            <div class="single-info">
                                <span>{{ translate('Population') }}:</span>
                                <h5>{{ $destinations->population }}</h5>
                            </div>
                            <div class="single-info">
                                <span>{{ translate('Capital City') }}:</span>
                                <h5>{{ $destinations->city }}</h5>
                            </div>
                            <div class="single-info">
                                <span>{{ translate('Language') }}:</span>
                                <h5>{{ $destinations->language }}</h5>
                            </div>
                            <div class="single-info">
                                <span>{{ translate('Currency') }}:</span>
                                <h5>{{ $destinations->currency }}</h5>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
