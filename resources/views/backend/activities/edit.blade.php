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
                        <a href="{{ route('activities.edit', ['id' => $activitiesSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('activities.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('activities.update', $activitiesSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('activities Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input"
                            value="{{ old('title', $activitiesSingle->getTranslation('title', $lang)) }}" name="title"
                            placeholder="{{ translate('Name of the activities') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Label') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input" value="{{ old('shoulder', $activitiesSingle->getTranslation('shoulder', $lang)) }}"
                            name="shoulder" placeholder="{{ translate('Name of the Label') }}">
                        @error('shoulder')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content">{{ old('content', $activitiesSingle->getTranslation('content', $lang)) }}</textarea>
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
                                @if($activitiesSingle->youtube_image)
                                <img class="mt-3" src="{{asset('uploads/activities/youtube/'.$activitiesSingle->youtube_image)}}" alt="{{$activitiesSingle->youtube_image}}" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('YouTube Video URL') }}</label>
                                <input type="text" class="username-input"
                                    value="{{ old('youtube_video', $activitiesSingle->youtube_video) }}" name="youtube_video"
                                    placeholder="{{ translate('Youtube Video Link') }}">
                                @error('youtube_video')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('FAQs') }}</b></label>
                                <input type="text" class="username-input" value="{{ old('faq_title',$activitiesSingle->faq_title) }}"
                                name="faq_title" placeholder="{{ translate('Enter FAQs Title') }}">
                            @error('faq_title')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
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
                                            <button id="faqsRemoveRow" type="button" class="eg-btn btn--red rounded px-3">
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
                                <input type="text" class="username-input" value="{{ old('include_title',$activitiesSingle->include_title) }}"
                                name="include_title" placeholder="{{ translate('Enter Include Title') }}">
                            @error('include_title')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
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
                                <input type="text" class="username-input" value="{{ old('exclude_title',$activitiesSingle->exclude_title) }}"
                                name="exclude_title" placeholder="{{ translate('Enter Exclude Title') }}">
                            @error('exclude_title')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
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
                                <input type="text" class="username-input" value="{{ old('highlight_title',$activitiesSingle->highlight_title) }}"
                                name="highlight_title" placeholder="{{ translate('Enter Highlight Title') }}">
                            @error('highlight_title')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
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
                                                <input type="text" value="{{ $highlight->title }}"
                                                    name="highlights[{{ $key }}][title]" class="m-input"
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
                </div>

                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Extra Info') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('No. of Days') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('days', $activitiesSingle->days) }}" name="days"
                                    placeholder="{{ translate('Ex: 5') }}">
                                @error('days')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('No. of Nights') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('nights', $activitiesSingle->nights) }}" name="nights"
                                    placeholder="{{ translate('Ex: 4') }}">
                                @error('nights')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Max Peoples') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('max_people', $activitiesSingle->max_people) }}" name="max_people"
                                    placeholder="{{ translate('Max Peoples') }}">
                                @error('max_people')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum advance reservations') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_advance_reservations', $activitiesSingle->min_advance_reservations) }}"
                                    name="min_advance_reservations" placeholder="{{ translate('Ex: 3') }}">
                                <small>Leave blank if you dont need to use the min day option</small>
                                @error('min_advance_reservations')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum day stay requirements') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_stay', $activitiesSingle->min_stay) }}" name="min_stay"
                                    placeholder="{{ translate('Ex: 2') }}">
                                <small>{{translate('Leave blank if you dont need to set minimum day stay option')}}</small>
                                @error('min_stay')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
                                <label>{{ translate('Adult Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('price', $activitiesSingle->price) }}" name="price"
                                    placeholder="{{ translate('Adult Price') }}">
                                @error('price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Adult Sale Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('sale_price', $activitiesSingle->sale_price) }}" name="sale_price"
                                    placeholder="{{ translate('Adult Sale Price') }}">
                                @error('sale_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Children Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('child_price', $activitiesSingle->child_price) }}" name="child_price"
                                    placeholder="{{ translate('Children Price') }}">
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
                                {{ $activitiesSingle->enable_service_fee == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Service Fee') }}</b>
                        </label>
                    </div>
                    <div
                        class="form-inner mb-25 {{ $activitiesSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Service Fee') }}</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $activitiesSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
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
                        <input type="text" class="username-input"
                            value="{{ old('address', $activitiesSingle->getTranslation('address', $lang)) }}"
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
                                            {{ old('country_id', $activitiesSingle->country_id) == $country->id ? 'selected' : '' }}>
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
                                    @if ($activitiesSingle->state_id)
                                        <option value="{{ $activitiesSingle->state_id }}" selected>
                                            {{ $activitiesSingle->states?->name }}</option>
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
                                    @if ($activitiesSingle->city_id)
                                        <option value="{{ $activitiesSingle->city_id }}" selected>
                                            {{ $activitiesSingle->cities?->name }}</option>
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
                                    value="{{ old('zip_code', $activitiesSingle->zip_code) }}" class="username-input"
                                    placeholder="{{ translate('Zip/Postal') }}">
                                @error('zip_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Latitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lat" value="{{ $activitiesSingle->map_lat }}"
                                    class="username-input" placeholder="{{ translate('Latitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/"
                                    target="_blank">{{ translate('Go Here to get Latitude from address') }}</a>
                                @error('map_lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Longitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lng" value="{{ $activitiesSingle->map_lng }}"
                                    class="username-input" placeholder="{{ translate('Longitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/"
                                    target="_blank">{{ translate('Go Here to get Longitude from address') }}</a>
                                @error('map_lng')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Surroundings') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="mb-3 row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('Activities Plan') }}</b></label>
                                <input type="text" class="username-input" value="{{ old('plan_title',$activitiesSingle->plan_title) }}"
                                name="plan_title" placeholder="{{ translate('Enter Activities Plan Title') }}">
                            @error('plan_title')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-inner mb-35 mt-3">
                        <div id="activities_plan">
                            @if ($data['activities_plan'])
                                @foreach ($data['activities_plan'] as $key => $plan)
                                    <div class="row activitiesPlanFormRow">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-inner mb-25">
                                                        <input type="number" value="{{ $plan->day }}"
                                                            name="activities_plan[{{ $key }}][day]"
                                                            class="m-input" placeholder="Enter Day No"
                                                            autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-inner mb-25">
                                                        <input type="text" value="{{ $plan->title }}"
                                                            name="activities_plan[{{ $key }}][title]"
                                                            class="m-input" placeholder="Enter Title" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $plan->morning }}"
                                                    name="activities_plan[{{ $key }}][morning]" class="m-input"
                                                    placeholder="Enter Morning Activities" autocomplete="off">
                                            </div>
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $plan->midday }}"
                                                    name="activities_plan[{{ $key }}][midday]" class="m-input"
                                                    placeholder="Enter Midday Activities" autocomplete="off">
                                            </div>
                                            <div class="form-inner mb-25">
                                                <input type="text"
                                                    value="{{ $plan->afternoon }}"name="activities_plan[{{ $key }}][afternoon]"
                                                    class="m-input" placeholder="Enter Afternoon Activities"
                                                    autocomplete="off">
                                            </div>
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $plan->evening }}"
                                                    name="activities_plan[{{ $key }}][evening]" class="m-input"
                                                    placeholder="Enter Evening Activities" autocomplete="off">
                                            </div>
                                            <div class="form-inner mb-25">
                                                <input type="text" value="{{ $plan->night }}"
                                                    name="activities_plan[{{ $key }}][night]" class="m-input"
                                                    placeholder="Enter Night Activities" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="activitiesPlanRemoveRow" type="button"
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
                            <button id="activitiesPlanAddRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct"
                                        {{ old('enable_seo', $activitiesSingle->enable_seo) == 1 ? 'checked' : '' }}>
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title"
                                        value="{{ old('meta_title', $activitiesSingle->meta_title) }}">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description">{{ old('meta_description', $activitiesSingle->meta_desc) }}</textarea>
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
                                        @if (isset($activitiesSingle->meta_keyward) && count($activitiesSingle?->meta_keyward) > 0)

                                            @foreach ($activitiesSingle->meta_keyward as $key => $keyward)
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

                                    @if ($activitiesSingle->meta_img)
                                        <img src="{{ asset('uploads/activities/meta/' . $activitiesSingle->meta_img) }}"
                                            alt="{{ $activitiesSingle->meta_title }}" width="80">
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
                @if ($attributes->count() > 0)
                    @foreach ($attributes as $attribute)
                        @php
                            $terms = App\Models\ActivitiesAttributeTerm::where('attribute_id', $attribute->id)
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
                                    @if ($activitiesSingle->feature_img)
                                        <img src="{{ asset('uploads/activities/features/' . $activitiesSingle->feature_img) }}"
                                            alt="{{ $activitiesSingle->title }}" width="100">
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
                                                <span class="activities_exist_remove exist_remove_btn"
                                                    data-gellery_id="{{ $gallery->id }}">X</span>
                                                <img class="img-thumb"
                                                    src="{{ asset('uploads/activities/gallery/' . $gallery->image) }}"
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

        </div>
    </form>
@endsection
