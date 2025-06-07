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
                        <a href="{{ route('hotels.edit', ['id' => $hotelSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('hotels.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('hotels.update', $hotelSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Stay Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input"
                            value="{{ old('title', $hotelSingle->getTranslation('title', $lang)) }}" name="title"
                            placeholder="{{ translate('Name of the stay') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content">{{ old('content', $hotelSingle->getTranslation('content', $lang)) }}</textarea>
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
                                @if($hotelSingle->youtube_image)
                                <img class="mt-3" src="{{asset('uploads/hotel/youtube/'.$hotelSingle->youtube_image)}}" alt="{{$hotelSingle->youtube_image}}" width="100">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('YouTube Video URL') }}</label>
                                <input type="text" class="username-input"
                                    value="{{ old('youtube_video', $hotelSingle->youtube_video) }}" name="youtube_video"
                                    placeholder="{{ translate('Youtube Video Link') }}">
                                @error('youtube_video')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Stay Policy') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Policy Title') }}</label>
                        <input type="text" class="username-input"
                            value="{{ old('policy_title', $hotelSingle->policy_title) }}" name="policy_title"
                            placeholder="{{ translate('Enter Policy Title') }}">
                        @error('policy_title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inner mt-3">
                        <div id="hotel_policy">
                            @if ($data['policies'])
                                @foreach ($data['policies'] as $key => $policy)
                                @if($policy->title)
                                    <div class="mb-3 row g-3 inputFormRow">
                                        <div class="col-md-5">
                                            <input type="text" name="policy[{{ $key }}][title]"
                                                value="{{ $policy->title }}" class="m-input" placeholder="Enter Title"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="policy[{{ $key }}][content]" class="n-input" placeholder="Enter Content">{!! $policy->content !!}</textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="removeRow" type="button" class="eg-btn btn--red rounded px-3">
                                                <i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="add-btn-area d-flex jusify-content-center pt-4">
                            <button id="addRow" type="button" class="eg-btn btn--dark mx-auto"> <img
                                    src="{{ asset('backend/images/icons/add-icon.svg') }}"
                                    alt="{{ translate('Add New') }}"> {{ translate('Add New') }}</button>
                        </div>
                    </div>
                </div>
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Check in/out time') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Time for check in') }}</label>
                                <input type="text" id="timepicker" class="username-input"
                                    value="{{ old('check_in', $hotelSingle->check_in) }}" name="check_in"
                                    placeholder="{{ translate('Ex: 12:00') }}">
                                @error('check_in')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Room Type') }}</label>
                                <input type="text" class="username-input" value="{{ $hotelSingle->room_type }}"
                                    name="room_type" placeholder="{{ translate('Room Type') }}">
                                @error('room_type')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Bed Type') }}</label>
                                <input type="text" class="username-input" value="{{ $hotelSingle->bed_type }}"
                                    name="bed_type" placeholder="{{ translate('Bed Type') }}">
                                @error('bed_type')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum advance reservations') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_advance_reservations', $hotelSingle->min_advance_reservations) }}"
                                    name="min_advance_reservations" placeholder="{{ translate('Ex: 3') }}">
                                <small>{{ translate('Leave blank if you dont need to use the min day option') }}</small>
                                @error('min_advance_reservations')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Time for check out') }}</label>
                                <input type="text" id="timepicker2" class="username-input"
                                    value="{{ old('check_out', $hotelSingle->check_out) }}" name="check_out"
                                    placeholder="{{ translate('Ex: 11:00') }}">
                                @error('check_out')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Maximum Guests') }}</label>
                                <input type="number" class="username-input" value="{{ $hotelSingle->guest_capability }}"
                                    name="guest_capability" placeholder="{{ translate('Maximum Guests') }}">
                                @error('guest_capability')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Cancellation Hours') }}</label>
                                <input type="text" class="username-input" value="{{ $hotelSingle->cancellation }}"
                                    name="cancellation" placeholder="{{ translate('Cancellation Hours') }}">
                                @error('cancellation')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum day stay requirements') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_stay', $hotelSingle->min_stay) }}" name="min_stay"
                                    placeholder="{{ translate('Ex: 2') }}">
                                <small>{{ translate('Leave blank if you dont need to set minimum day stay option') }}</small>
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

                    <div class="form-inner mb-35">
                        <label>{{ translate('Stay Price *') }}</label>
                        <input type="number" class="username-input"
                            value="{{ old('price', $hotelSingle->price) }}" name="price"
                            placeholder="{{ translate('Stay Price *') }}">
                        @error('price')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_service_fee">
                            <input class="form-check-input enable_service_fee" name="enable_service_fee" type="checkbox"
                                id="enable_service_fee" value="1"
                                {{ $hotelSingle->enable_service_fee == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Service Fee') }}</b>
                        </label>
                    </div>
                    <div
                        class="form-inner mb-25 {{ $hotelSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Service Fee') }}</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $hotelSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
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
                            value="{{ old('address', $hotelSingle->getTranslation('address', $lang)) }}" name="address"
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
                                            {{ old('country_id', $hotelSingle->country_id) == $country->id ? 'selected' : '' }}>
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
                                    @if ($hotelSingle->state_id)
                                        <option value="{{ $hotelSingle->state_id }}" selected>
                                            {{ $hotelSingle->states?->name }}</option>
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
                                    @if ($hotelSingle->city_id)
                                        <option value="{{ $hotelSingle->city_id }}" selected>
                                            {{ $hotelSingle->cities?->name }}</option>
                                    @endif
                                </select>
                                @error('city_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        {{--
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Zip/Postal') }} <span class="text-danger">*</span></label>
                                <input type="text" name="zip_code"
                                    value="{{ old('zip_code', $hotelSingle->zip_code) }}" class="username-input"
                                    placeholder="{{ translate('Zip/Postal') }}">
                                @error('zip_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        --}}
                        {{--
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Latitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lat" value="{{ $hotelSingle->map_lat }}"
                                    class="username-input" placeholder="{{ translate('Latitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/"
                                    target="_blank">{{ translate('Go Here to get Latitude from address') }}</a>
                                @error('map_lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        --}}
                        {{--
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Longitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lng" value="{{ $hotelSingle->map_lng }}"
                                    class="username-input" placeholder="{{ translate('Longitude') }}">
                                <a class="text-primary" href="https://www.latlong.net/"
                                    target="_blank">{{ translate('Go Here to get Longitude from address') }}</a>
                                @error('map_lng')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                <div class="eg-card product-card">

                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct"
                                        {{ old('enable_seo', $hotelSingle->enable_seo) == 1 ? 'checked' : '' }}>
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title"
                                        value="{{ old('meta_title', $hotelSingle->meta_title) }}">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description">{{ old('meta_description', $hotelSingle->meta_desc) }}</textarea>
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
                                        @if (isset($hotelSingle->meta_keyward) && count($hotelSingle?->meta_keyward) > 0)

                                            @foreach ($hotelSingle->meta_keyward as $key => $keyward)
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

                                    @if ($hotelSingle->meta_img)
                                        <img src="{{ asset('uploads/hotel/meta/' . $hotelSingle->meta_img) }}"
                                            alt="{{ $hotelSingle->meta_title }}" width="80">
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
                        <h4>{{ translate('Breakfast') }}</h4>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="breakfast">
                            <input class="form-check-input is_featured" value="1" name="breakfast"
                                type="checkbox" id="breakfast" {{ $hotelSingle->breakfast == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Breakfast included') }}</b>
                        </label>
                    </div>
                </div>
                @if ($attributes->count() > 0)
                    @foreach ($attributes as $attribute)
                        @php
                            $terms = App\Models\HotelAttributeTerm::where('attribute_id', $attribute->id)
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
                                    @if ($hotelSingle->feature_img)
                                        <img src="{{ asset('uploads/hotel/features/' . $hotelSingle->feature_img) }}"
                                            alt="{{ $hotelSingle->title }}" width="100">
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
                                                <span class="hotel_exist_remove exist_remove_btn"
                                                    data-gellery_id="{{ $gallery->id }}">X</span>
                                                <img class="img-thumb"
                                                    src="{{ asset('uploads/hotel/gallery/' . $gallery->image) }}"
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