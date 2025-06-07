@extends('backend.layouts.master')
@section('content')

    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4>{{ $page_title ?? '' }}</h4>
            <div class="language-changer">
                <span>{{ translate('Language Translation') }}: </span>
                @foreach (\App\Models\Language::all() as $key => $language)
                    @if ($lang == $language->code)
                        <img src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3" height="16">
                    @else
                        <a href="{{ route('tours.edit', ['id' => $tourSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('tours.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('tours.update', $tourSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Tour Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input"
                            value="{{ old('title', $tourSingle->getTranslation('title', $lang)) }}" name="title"
                            placeholder="{{ translate('Name of the tour') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Label') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input" value="{{ old('shoulder', $tourSingle->getTranslation('shoulder', $lang)) }}"
                            name="shoulder" placeholder="{{ translate('Name of the Label') }}">
                        @error('shoulder')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content">{{ old('content', $tourSingle->getTranslation('content', $lang)) }}</textarea>
                        @error('content')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('YouTube Video Thumbnail') }}</label>
                                <input type="file" class="username-input" name="youtube_image">
                                @error('youtube_image')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                                @if($tourSingle->youtube_image)
                                <img class="mt-3" src="{{asset('uploads/tour/youtube/'.$tourSingle->youtube_image)}}" alt="{{$tourSingle->youtube_image}}" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('YouTube Video URL') }}</label>
                                <input type="text" class="username-input"
                                    value="{{ old('youtube_video', $tourSingle->youtube_video) }}" name="youtube_video"
                                    placeholder="{{ translate('Youtube Video Link') }}">
                                @error('youtube_video')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                        <div class="form-inner mb-35">
                            <label> {{ translate('Sub Destination') }}</label>
                            <select class="username-input sub_destination" name="sub_destination[]"
                                multiple="multiple">
                                @if (isset($tourSingle->sub_destination) && count($tourSingle?->sub_destination) > 0)

                                    @foreach ($tourSingle->sub_destination as $key => $sub_des)
                                        <option value="{{ $sub_des }}" selected>{{ $sub_des }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Minimum/Maximum People') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Min People') }}</label>
                                <input type="text" id="min_people" class="username-input"
                                    value="{{ old('min_people', $tourSingle->min_people) }}" name="min_people"
                                    placeholder="{{ translate('Tour Min People') }}">
                                @error('min_people')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum advance reservations') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_advance_reservations', $tourSingle->min_advance_reservations) }}"
                                    name="min_advance_reservations" placeholder="{{ translate('Ex: 3') }}">
                                <small>{{ translate('Leave blank if you dont need to use the min day option') }}</small>
                                @error('min_advance_reservations')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Max People') }}</label>
                                <input type="text" id="max_people" class="username-input"
                                    value="{{ old('max_people', $tourSingle->max_people) }}" name="max_people"
                                    placeholder="{{ translate('Tour Max People') }}">
                                @error('max_people')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35 position-relative">
                                <label>{{ translate('Cancellation') }}</label>
                                <input id="cancellation" name="cancellation" placeholder="Cancellation"
                                    value="{{ old('cancellation', $tourSingle->cancellation) }}">
                                <span class="duration-icon">{{ translate('hours') }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('FAQs') }}</b></label>
                                <input type="text" name="faq_title" value="{{ old('faq_title', $tourSingle->faq_title) }}" placeholder="{{translate('Enter FAQ Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="faqs">
                            @if ($data['faqs'])
                                @foreach ($data['faqs'] as $key => $faq)
                                    <div class="row faqsFormRow">
                                        <div class="col-md-5">
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $faq->title }}"
                                                    name="faqs[{{ $key }}][title]" class="m-input"
                                                    placeholder="Enter Title" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <textarea name="faqs[{{ $key }}][content]" class="n-input" placeholder="Enter Content">{{ $faq->content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="faqsRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="faqsAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('Include') }}</b></label>
                                <input type="text" name="include_title" value="{{ old('include_title', $tourSingle->include_title) }}" placeholder="{{translate('Enter Include Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="includes">
                            @if ($data['includes'])
                                @foreach ($data['includes'] as $key => $include)
                                    <div class="row includeFormRow">
                                        <div class="col-md-11">
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $include->title }}"
                                                    name="includes[{{ $key }}][title]" class="m-input"
                                                    placeholder="Enter Title" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="includeRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="includeAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('Exclude') }}</b></label>
                                <input type="text" name="exclude_title" value="{{ old('exclude_title', $tourSingle->exclude_title) }}" placeholder="{{translate('Enter Exclude Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="excludes">
                            @if ($data['excludes'])
                                @foreach ($data['excludes'] as $key => $exclude)
                                    <div class="row excludeFormRow">
                                        <div class="col-md-11">
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $exclude->title }}"
                                                    name="excludes[{{ $key }}][title]" class="m-input"
                                                    placeholder="Enter Title" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="excludeRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="excludeAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('Highlights') }}</b></label>
                                <input type="text" name="highlight_title" value="{{ old('highlight_title', $tourSingle->highlight_title) }}" placeholder="{{translate('Enter Highlight Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="highlights">
                            @if ($data['highlights'])
                                @foreach ($data['highlights'] as $key => $highlight)
                                    <div class="row highlightFormRow">
                                        <div class="col-md-11">
                                            <div class="form-inner mb-25">
                                                <input type="text" name="highlights[{{ $key }}][title]"
                                                    value="{{ $highlight->title }}" class="m-input"
                                                    placeholder="Enter Title" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="highlightRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="highlightAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('Itinerary') }}</b></label>
                                <input type="text" name="itinerary_title" value="{{ old('itinerary_title', $tourSingle->itinerary_title) }}" placeholder="{{translate('Enter Itinerary Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="itinerary">
                            @if ($data['itinerary'])
                                @foreach ($data['itinerary'] as $key => $itinerary)
                                    <div class="row itineraryFormRow">
                                        <div class="col-md-5">
                                            <div class="form-inner mb-25">
                                                <input type="text" name="itinerary[{{ $key }}][title]"
                                                    value="{{ $itinerary->title }}" class="m-input mb-2"
                                                    placeholder="Enter Title" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-inner mb-25">
                                                <textarea name="itinerary[{{ $key }}][content]" class="n-input" placeholder="Enter Content">{{ $itinerary->content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="itineraryRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="itineraryAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Pricing') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Price') }} <span class="text-danger">*</span></label>
                                <input type="number" class="username-input"
                                    value="{{ old('price', $tourSingle->price) }}" name="price"
                                    placeholder="{{ translate('Tour Price') }}">
                                @error('price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Sale Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('sale_price', $tourSingle->sale_price) }}" name="sale_price"
                                    placeholder="{{ translate('Tour Sale Price') }}">
                                @error('sale_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Child Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('child_price', $tourSingle->child_price) }}" name="child_price"
                                    placeholder="{{ translate('Tour Child Price') }}">
                                @error('child_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_service_fee">
                            <input class="form-check-input enable_service_fee" name="enable_service_fee" type="checkbox"
                                id="enable_service_fee" value="1"
                                {{ $tourSingle->enable_service_fee == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Service Fee') }}</b>
                        </label>
                    </div>
                    <div
                        class="form-inner mb-25 {{ $tourSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Service Fee') }}</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $tourSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show mb-3">
                        <div id="hotel_service_fee">
                            @if ($data['service_fees'])
                                @foreach ($data['service_fees'] as $key => $service)
                                    <div class="mb-3 row g-3 serviceFormRow">
                                        <div class="col-md-7">
                                            <div class="form-inner mb-25">
                                                <input type="text" name="service_fee[{{ $key }}][name]"
                                                    value="{{ $service->name }}" class="m-input" placeholder="Fee Name"
                                                    autocomplete="off">
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-inner mb-25">
                                                    <input type="number"
                                                        name="service_fee[{{ $key }}][price]"
                                                        value="{{ $service->price }}" class="n-input" placeholder="Price">
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-inner mb-25">
                                                    <select name="service_fee[{{ $key }}][unit]">
                                                        <option value="fixed"
                                                            {{ $service->unit == 'fixed' ? 'selected' : '' }}>{{ translate('Fixed') }}</option>
                                                        <option value="percent"
                                                            {{ $service->unit == 'percent' ? 'selected' : '' }}>{{ translate('Percent') }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <label class="form-check-label" for="price_type{{ $key }}1">
                                                    <input class="form-check-input" type="radio"
                                                        name="service_fee[{{ $key }}][price_type]"
                                                        value="one_time" id="price_type{{ $key }}1"
                                                        {{ $service->price_type == 'one_time' ? 'checked' : '' }}>
                                                    {{ translate('Price One Time') }}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="price_type{{ $key }}2">
                                                    <input class="form-check-input" type="radio"
                                                        name="service_fee[{{ $key }}][price_type]"
                                                        value="per_person" id="price_type{{ $key }}2"
                                                        {{ $service->price_type == 'per_person' ? 'checked' : '' }}>
                                                    {{ translate('Price Per Person') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="serviceFeeRemoveRow" type="button"
                                                class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="serviceFeeAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
      
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Location') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Address') }}</label>
                        <input type="text" class="username-input" value="{{ old('address', $tourSingle->address) }}"
                            name="address" placeholder="{{ translate('Address') }}">
                        @error('address')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Country') }} <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single country_id" name="country_id">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id', $tourSingle->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('State') }} <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single state_id" name="state_id">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    @if ($tourSingle->state_id)
                                        <option value="{{ $tourSingle->state_id }}" selected>
                                            {{ $tourSingle->states?->name }}</option>
                                    @endif
                                </select>
                                @error('state_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('City') }} <span class="text-danger">*</span></label>
                                <select class="js-example-basic-single city_id" name="city_id">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    @if ($tourSingle->state_id)
                                        <option value="{{ $tourSingle->state_id }}" selected>
                                            {{ $tourSingle->states?->name }}</option>
                                    @endif
                                </select>
                                @error('city_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Zip/Postal') }} <span class="text-danger">*</span></label>
                                <input type="text" name="zip_code"
                                    value="{{ old('zip_code', $tourSingle->zip_code) }}" class="username-input"
                                    placeholder="{{ translate('Zip/Postal') }}">
                                @error('zip_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Latitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lat" value="{{ old('map_lat', $tourSingle->map_lat) }}"
                                    class="username-input" placeholder="{{ translate('Latitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/" target="_blank">{{translate('Go Here to get
                                    Latitude from
                                    address')}}</a>
                                @error('map_lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Longitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lng" value="{{ $tourSingle->map_lng }}"
                                    class="username-input" placeholder="{{ translate('Longitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/" target="_blank">Go Here to get
                                    Longitude from
                                    address</a>
                                @error('map_lng')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Availability') }}</h4>
                    </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_fixed_date">
                            <input class="form-check-input enable_fixed_date" name="enable_fixed_dates" type="checkbox"
                                id="enable_fixed_date" value="1"
                                {{ $tourSingle->enable_fixed_dates == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Fixed Date') }}</b>
                        </label>
                    </div>
                    <div class="{{ $tourSingle->enable_fixed_dates == 1 ? '' : 'd-none' }} fixed_date_show">
                        <div class="form-inner mb-25" id="fixed_date_show">
                            @if($data['fixed_dates'])
                            @foreach($data['fixed_dates'] as $key=>$fixed_date)
                            <div class="mb-3 row dateFormRow">
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <input type="text" class="username-input datepicker" name="fixed_date[{{$key}}][start_date]" value="{{$fixed_date->start_date}}" placeholder="Start Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <input type="text" class="username-input datepicker" name="fixed_date[{{$key}}][end_date]" value="{{$fixed_date->end_date}}" placeholder="End Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <input type="text" class="username-input datepicker" name="fixed_date[{{$key}}][booking_date]" value="{{$fixed_date->booking_date}}" placeholder="Last Booking Date">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="add-btn-area d-flex jusify-content-center mb-35">
                            <button id="dateAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                        </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_open_hours">
                            <input class="form-check-input enable_open_hours" name="enable_open_hours" type="checkbox"
                                id="enable_open_hours" value="1"
                                {{ $tourSingle->enable_open_hours == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Open Hours') }}</b>
                        </label>
                    </div>
                    <div class="mb-25 {{ $tourSingle->enable_open_hours == 1 ? '' : 'd-none' }} open_hours_show">
                        @php
                            $weeks = [
                                'Monday' => 1,
                                'Tuesday' => 2,
                                'Wednesday' => 3,
                                'Thursday' => 4,
                                'Friday' => 5,
                                'Saturday' => 6,
                                'Sunday' => 7,
                            ];
                        @endphp
                        @foreach ($data['open_hours'] ?? $weeks as $key => $value)
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <div class="form-check mb-35">
                                        <label class="form-check-label" for="enable_open_hours_day{{ $key }}">
                                            <input class="form-check-input enable_open_hours_day"
                                                name="open_hours[{{ $key }}][day]" type="checkbox"
                                                id="enable_open_hours_day{{ $key }}"
                                                value="{{ $key }}" {{ isset($value->day) ? 'checked' : '' }}>
                                            <b>{{ $key }}</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <select name="open_hours[{{ $key }}][open]">
                                            <option value="00:00"
                                                {{ isset($value->open) && $value->open == '00:00' ? 'selected' : '' }}>
                                                00:00</option>
                                            <option value="01:00"
                                                {{ isset($value->open) && $value->open == '01:00' ? 'selected' : '' }}>
                                                01:00</option>
                                            <option value="02:00"
                                                {{ isset($value->open) && $value->open == '02:00' ? 'selected' : '' }}>
                                                02:00</option>
                                            <option value="03:00"
                                                {{ isset($value->open) && $value->open == '03:00' ? 'selected' : '' }}>
                                                03:00</option>
                                            <option value="04:00"
                                                {{ isset($value->open) && $value->open == '04:00' ? 'selected' : '' }}>
                                                04:00</option>
                                            <option value="05:00"
                                                {{ isset($value->open) && $value->open == '05:00' ? 'selected' : '' }}>
                                                05:00</option>
                                            <option value="06:00"
                                                {{ isset($value->open) && $value->open == '06:00' ? 'selected' : '' }}>
                                                06:00</option>
                                            <option value="07:00"
                                                {{ isset($value->open) && $value->open == '07:00' ? 'selected' : '' }}>
                                                07:00</option>
                                            <option value="08:00"
                                                {{ isset($value->open) && $value->open == '08:00' ? 'selected' : '' }}>
                                                08:00</option>
                                            <option value="09:00"
                                                {{ isset($value->open) && $value->open == '09:00' ? 'selected' : '' }}>
                                                09:00</option>
                                            <option value="10:00"
                                                {{ isset($value->open) && $value->open == '10:00' ? 'selected' : '' }}>
                                                10:00</option>
                                            <option value="11:00"
                                                {{ isset($value->open) && $value->open == '11:00' ? 'selected' : '' }}>
                                                11:00</option>
                                            <option value="12:00"
                                                {{ isset($value->open) && $value->open == '12:00' ? 'selected' : '' }}>
                                                12:00</option>
                                            <option value="13:00"
                                                {{ isset($value->open) && $value->open == '13:00' ? 'selected' : '' }}>
                                                13:00</option>
                                            <option value="14:00"
                                                {{ isset($value->open) && $value->open == '14:00' ? 'selected' : '' }}>
                                                14:00</option>
                                            <option value="15:00"
                                                {{ isset($value->open) && $value->open == '15:00' ? 'selected' : '' }}>
                                                15:00</option>
                                            <option value="16:00"
                                                {{ isset($value->open) && $value->open == '16:00' ? 'selected' : '' }}>
                                                16:00</option>
                                            <option value="17:00"
                                                {{ isset($value->open) && $value->open == '17:00' ? 'selected' : '' }}>
                                                17:00</option>
                                            <option value="18:00"
                                                {{ isset($value->open) && $value->open == '18:00' ? 'selected' : '' }}>
                                                18:00</option>
                                            <option value="19:00"
                                                {{ isset($value->open) && $value->open == '19:00' ? 'selected' : '' }}>
                                                19:00</option>
                                            <option value="20:00"
                                                {{ isset($value->open) && $value->open == '20:00' ? 'selected' : '' }}>
                                                20:00</option>
                                            <option value="21:00"
                                                {{ isset($value->open) && $value->open == '21:00' ? 'selected' : '' }}>
                                                21:00</option>
                                            <option value="22:00"
                                                {{ isset($value->open) && $value->open == '22:00' ? 'selected' : '' }}>
                                                22:00</option>
                                            <option value="23:00"
                                                {{ isset($value->open) && $value->open == '23:00' ? 'selected' : '' }}>
                                                23:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <select name="open_hours[{{ $key }}][close]">
                                            <option value="00:00"
                                                {{ isset($value->close) && $value->close == '00:00' ? 'selected' : '' }}>
                                                00:00</option>
                                            <option value="01:00"
                                                {{ isset($value->close) && $value->close == '01:00' ? 'selected' : '' }}>
                                                01:00</option>
                                            <option value="02:00"
                                                {{ isset($value->close) && $value->close == '02:00' ? 'selected' : '' }}>
                                                02:00</option>
                                            <option value="03:00"
                                                {{ isset($value->close) && $value->close == '03:00' ? 'selected' : '' }}>
                                                03:00</option>
                                            <option value="04:00"
                                                {{ isset($value->close) && $value->close == '04:00' ? 'selected' : '' }}>
                                                04:00</option>
                                            <option value="05:00"
                                                {{ isset($value->close) && $value->close == '05:00' ? 'selected' : '' }}>
                                                05:00</option>
                                            <option value="06:00"
                                                {{ isset($value->close) && $value->close == '06:00' ? 'selected' : '' }}>
                                                06:00</option>
                                            <option value="07:00"
                                                {{ isset($value->close) && $value->close == '07:00' ? 'selected' : '' }}>
                                                07:00</option>
                                            <option value="08:00"
                                                {{ isset($value->close) && $value->close == '08:00' ? 'selected' : '' }}>
                                                08:00</option>
                                            <option value="09:00"
                                                {{ isset($value->close) && $value->close == '09:00' ? 'selected' : '' }}>
                                                09:00</option>
                                            <option value="10:00"
                                                {{ isset($value->close) && $value->close == '10:00' ? 'selected' : '' }}>
                                                10:00</option>
                                            <option value="11:00"
                                                {{ isset($value->close) && $value->close == '11:00' ? 'selected' : '' }}>
                                                11:00</option>
                                            <option value="12:00"
                                                {{ isset($value->close) && $value->close == '12:00' ? 'selected' : '' }}>
                                                12:00</option>
                                            <option value="13:00"
                                                {{ isset($value->close) && $value->close == '13:00' ? 'selected' : '' }}>
                                                13:00</option>
                                            <option value="14:00"
                                                {{ isset($value->close) && $value->close == '14:00' ? 'selected' : '' }}>
                                                14:00</option>
                                            <option value="15:00"
                                                {{ isset($value->close) && $value->close == '15:00' ? 'selected' : '' }}>
                                                15:00</option>
                                            <option value="16:00"
                                                {{ isset($value->close) && $value->close == '16:00' ? 'selected' : '' }}>
                                                16:00</option>
                                            <option value="17:00"
                                                {{ isset($value->close) && $value->close == '17:00' ? 'selected' : '' }}>
                                                17:00</option>
                                            <option value="18:00"
                                                {{ isset($value->close) && $value->close == '18:00' ? 'selected' : '' }}>
                                                18:00</option>
                                            <option value="19:00"
                                                {{ isset($value->close) && $value->close == '19:00' ? 'selected' : '' }}>
                                                19:00</option>
                                            <option value="20:00"
                                                {{ isset($value->close) && $value->close == '20:00' ? 'selected' : '' }}>
                                                20:00</option>
                                            <option value="21:00"
                                                {{ isset($value->close) && $value->close == '21:00' ? 'selected' : '' }}>
                                                21:00</option>
                                            <option value="22:00"
                                                {{ isset($value->close) && $value->close == '22:00' ? 'selected' : '' }}>
                                                22:00</option>
                                            <option value="23:00"
                                                {{ isset($value->close) && $value->close == '23:00' ? 'selected' : '' }}>
                                                23:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct"
                                        {{ old('enable_seo', $tourSingle->enable_seo) == 1 ? 'checked' : '' }}>
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title"
                                        value="{{ old('meta_title', $tourSingle->meta_title) }}">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description">{{ old('meta_description', $tourSingle->meta_desc) }}</textarea>
                                    @error('meta_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Keyward') }}</label>
                                    <select class="username-input meta-keyward" name="meta_keyward[]"
                                        multiple="multiple">
                                        @if (isset($tourSingle->meta_keyward) && count($tourSingle?->meta_keyward) > 0)

                                            @foreach ($tourSingle->meta_keyward as $key => $keyward)
                                                <option value="{{ $keyward }}" selected>{{ $keyward }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Image') }}</label>
                                    <input type="file" class="username-input" name="meta_img">
                                    @error('meta_img')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror

                                    @if ($tourSingle->meta_img)
                                        <img src="{{ asset('uploads/tour/meta/' . $tourSingle->meta_img) }}"
                                            alt="{{ $tourSingle->meta_title }}" width="80">
                                    @endif
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="eg-card product-card pb-70">
                    <div class="button-group">
                        <button type="submit" class="radio-button">
                            <input type="radio" id="status1" name="status" value="1" />
                            <label class="eg-btn btn--green sm-medium-btn"
                                for="status1">{{ translate('Update') }}</label>
                        </button>
                        <button type="submit" class="radio-button">
                            <input type="radio" id="status2" name="status" value="2" />
                            <label class="eg-btn orange--btn sm-medium-btn"
                                for="status2">{{ translate('Save as Draft') }}</label>
                        </button>
                    </div>
                </div>
                
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Category') }}</h4>
                    </div>

                    <div class="form-inner">
                        <select class="js-example-basic-single" name="category_id" required>
                            <option value="">{{ translate('Select Option') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $tourSingle->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Destination') }}</h4>
                    </div>

                    <div class="form-inner">
                        <select class="js-example-basic-single" name="destination_id" required>
                            <option value="">{{ translate('Select Option') }}</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id', $tourSingle->destination_id) == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->destination }}</option>
                            @endforeach
                        </select>
                        @error('destination_id')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                @admin
                    <div class="eg-card product-card">
                        <div class="eg-card-title-sm">
                            <h4>{{ translate('User Setting') }}</h4>
                        </div>

                        <div class="form-inner">
                            <select class="js-example-basic-single" name="author_id" required>
                                <option value="">{{ translate('Select Option') }}</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $tourSingle->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->username }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                @endadmin
                @if ($attributes->count() > 0)
                    @foreach ($attributes as $attribute)
                        @php
                            $terms = App\Models\TourAttributeTerm::where('attribute_id', $attribute->id)
                                ->orderBy('name', 'asc')
                                ->get();
                        @endphp
                        @if ($terms->count() > 0)
                            <div class="eg-card product-card">
                                <div class="eg-card-title-sm">
                                    <h4>{{ translate('Attribute') }}: {{ $attribute->getTranslation('name') }}</h4>
                                </div>
                                @foreach ($terms as $term)
                                    <div class="form-check">
                                        <label class="form-check-label" for="term{{ $term->id }}">
                                            <input class="form-check-input" name="term[]" type="checkbox"
                                                id="term{{ $term->id }}" value="{{ $term->id }}"
                                                {{ $data['attribute_terms'] && in_array($term->id, $data['attribute_terms']) ? 'checked' : '' }}>
                                            <b>{{ $term->getTranslation('name') }}</b>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                @endif
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Feature Image') }}</h4>
                    </div>
                    <div class="form-inner file-upload mb-35">
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p>{{ translate('Choose an image file or drag it here') }}</p>
                            </div>
                            <input type="file" name="features_image" class="dropzone featues_image">

                        </div>


                        <div class="preview-zone hidden">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-danger btn-xs remove-preview"
                                            style="display:none;">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    @if ($tourSingle->features_image)
                                        <img src="{{ asset('uploads/tour/features/' . $tourSingle->features_image) }}"
                                            alt="{{ $tourSingle->title }}" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('features_image')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Image Gallery') }}</h4>
                    </div>
                    <div class="form-inner img-upload mb-35">
                        <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                                <i class="glyphicon glyphicon-download-alt"></i>
                                <p>{{ translate('Choose image files or drag it here') }}</p>
                            </div>
                            <input type="file" id="files" name="image[]" class="dropzone image_gal" multiple>

                        </div>

                        <div class="gallery-preview-zone hidden">
                            <div class="box box-solid">
                                <div class="box-body">
                                    @if ($galleries->count() > 0)
                                        @foreach ($galleries as $gallery)
                                            <div class="img-thumb-wrapper card shadow" id="gallery{{ $gallery->id }}">
                                                <span class="tour_exist_remove exist_remove_btn"
                                                    data-gellery_id="{{ $gallery->id }}">X</span>
                                                <img class="img-thumb"
                                                    src="{{ asset('uploads/tour/gallery/' . $gallery->image) }}"
                                                    title="{{ $gallery->image }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

    </form>
@endsection
