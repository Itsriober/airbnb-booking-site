@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4>{{ $page_title ?? '' }}</h4>
            <a href="{{ route('tours.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('tours.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Tour Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title"
                            placeholder="{{ translate('Name of the tour') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Label') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input @error('shoulder') is-invalid @enderror" value="{{ old('shoulder') }}" name="shoulder"
                            placeholder="{{ translate('Name of the Label') }}">
                        @error('shoulder')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea class="@error('title') is-invalid @enderror" id="summernote" name="content">{{ old('content') }}</textarea>
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
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('YouTube Video URL') }}</label>
                                <input type="text" class="username-input" value="{{ old('youtube_video') }}"
                                    name="youtube_video" placeholder="{{ translate('Paste the YouTube video URL here') }}">
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
                                    value="{{ old('min_people') }}" name="min_people"
                                    placeholder="{{ translate('Tour Min People') }}">
                                @error('min_people')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum advance reservations') }}</label>
                                <input type="number" class="username-input" value="{{ old('min_advance_reservations') }}"
                                    name="min_advance_reservations" placeholder="{{ translate('Ex: 3') }}">
                                <small>Leave blank if you dont need to use the min day option</small>
                                @error('min_advance_reservations')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Tour Max People') }}</label>
                                <input type="text" id="max_people" class="username-input"
                                    value="{{ old('max_people') }}" name="max_people"
                                    placeholder="{{ translate('Tour Max People') }}">
                                @error('max_people')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35 position-relative">
                                <label>{{ translate('Cancellation') }}</label>
                                <input id="cancellation" name="cancellation" placeholder="Cancellation"
                                    value="{{ old('cancellation') }}">
                                <span class="duration-icon">hours</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('FAQs') }}</b></label>
                                <input type="text" name="faq_title" value="{{ old('faq_title') }}" placeholder="{{translate('Enter FAQ Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="faqs">

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
                                <input type="text" name="include_title" value="{{ old('include_title') }}" placeholder="{{translate('Enter Include Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="includes">

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
                                <input type="text" name="exclude_title" value="{{ old('exclude_title') }}" placeholder="{{translate('Enter Exclude Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="excludes">

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
                                <input type="text" name="highlight_title" value="{{ old('highlight_title') }}" placeholder="{{translate('Enter Highlight Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="highlights">

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
                                <input type="text" name="itinerary_title" value="{{ old('itinerary_title') }}" placeholder="{{translate('Enter Itinerary Title')}}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-35 mt-3">
                        <div id="itinerary">

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
                                <label>{{ translate('Adult Price') }} <span class="text-danger">*</span></label>
                                <input type="number" class="username-input @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    name="price" placeholder="{{ translate('Adult Price') }}">
                                @error('price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Adult Sale Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('sale_price') }}" name="sale_price"
                                    placeholder="{{ translate('Adult Sale Price') }}">
                                @error('sale_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Child Price') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('child_price') }}" name="child_price"
                                    placeholder="{{ translate('Child Price') }}">
                                @error('child_price')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_service_fee">
                            <input class="form-check-input enable_service_fee" name="enable_service_fee" type="checkbox"
                                id="enable_service_fee" value="1">
                            <b>{{ translate('Enable Service Fee') }}</b>
                        </label>
                    </div>
                    <div class="form-inner mb-25 d-none service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Service Fee') }}</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="d-none service_fee_show">
                        <div id="hotel_service_fee">

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
                        <input type="text" class="username-input" value="{{ old('address') }}" name="address"
                            placeholder="{{ translate('Address') }}">
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
                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
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
                                </select>
                                @error('city_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Zip/Postal') }} <span class="text-danger">*</span></label>
                                <input type="text" name="zip_code" value="{{ old('zip_code') }}"
                                    class="username-input" placeholder="{{ translate('Zip/Postal') }}">
                                @error('zip_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Latitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lat" value="{{ old('map_lat') }}"
                                    class="username-input" placeholder="{{ translate('Latitude') }}">
                                    <a class="text-primary" href="https://www.latlong.net/" target="_blank">{{ translate('Go Here to get Latitude from
                                        address')}}</a>
                                @error('map_lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Longitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lng" value="{{ old('map_lng') }}"
                                    class="username-input" placeholder="{{ translate('Longitude') }}">
                                    <a class="text-primary" href="https://www.latlong.net/" target="_blank">{{ translate('Go Here to get Longitude from
                                        address')}}</a>
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
                                id="enable_fixed_date" value="1">
                            <b>{{ translate('Enable Fixed Date') }}</b>
                        </label>
                    </div>
                    <div class="d-none fixed_date_show">
                    <div class="form-inner mb-25" id="fixed_date_show">
                        <div class="mb-3 row dateFormRow">
                            <div class="col-md-4">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[1][start_date]" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[1][end_date]" placeholder="End Date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-inner mb-35">
                                    <input type="text" class="username-input datepicker" name="fixed_date[1][booking_date]" placeholder="Last Booking Date">
                                </div>
                            </div>
                        </div>
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
                                id="enable_open_hours" value="1">
                            <b>{{ translate('Enable Open Hours') }}</b>
                        </label>
                    </div>
                    <div class="mb-25 d-none open_hours_show">
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
                        @foreach ($weeks as $key => $value)
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <div class="form-check mb-35">
                                        <label class="form-check-label" for="enable_open_hours_day{{ $key }}">
                                            <input class="form-check-input enable_open_hours_day"
                                                name="open_hours[{{ $key }}][day]" type="checkbox"
                                                id="enable_open_hours_day{{ $key }}"
                                                value="{{ $key }}">
                                            <b>{{ $key }}</b>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <select name="open_hours[{{ $key }}][open]">
                                            <option value="00:00">00:00</option>
                                            <option value="01:00">01:00</option>
                                            <option value="02:00">02:00</option>
                                            <option value="03:00">03:00</option>
                                            <option value="04:00">04:00</option>
                                            <option value="05:00">05:00</option>
                                            <option value="06:00">06:00</option>
                                            <option value="07:00">07:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>
                                            <option value="23:00">23:00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-inner mb-35">
                                        <select name="open_hours[{{ $key }}][close]">
                                            <option value="00:00">00:00</option>
                                            <option value="01:00">01:00</option>
                                            <option value="02:00">02:00</option>
                                            <option value="03:00">03:00</option>
                                            <option value="04:00">04:00</option>
                                            <option value="05:00">05:00</option>
                                            <option value="06:00">06:00</option>
                                            <option value="07:00">07:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>
                                            <option value="23:00">23:00</option>
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
                                        id="seoProduct">
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description"> </textarea>
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
                                for="status1">{{ translate('Published') }}</label>
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
                        <select class="js-example-basic-single @error('category_id') is-invalid @enderror" name="category_id" required>
                            <option value="">{{ translate('Select Option') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <select class="js-example-basic-single @error('destination_id') is-invalid @enderror" name="destination_id" required>
                            <option value="">{{ translate('Select Option') }}</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
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
                                        {{ old('author_id') == $author->id ? 'selected' : '' }}>
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
                                                id="term{{ $term->id }}" value="{{ $term->id }}">
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
                            <input type="file" name="features_image" class="dropzone featues_image @error('features_image') is-invalid @enderror">

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
                                <div class="box-body"></div>
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
                                <div class="box-body"></div>
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
