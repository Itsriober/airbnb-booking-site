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
                        <a href="{{ route('transports.edit', ['id' => $transportSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('transports.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('transports.update', $transportSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Transport Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input" value="{{ old('title', $transportSingle->title) }}"
                            name="title" placeholder="{{ translate('Name of the Transport') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content">{{ old('content', $transportSingle->content) }}</textarea>
                        @error('content')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Youtube Video') }}</label>
                        <input type="text" class="username-input"
                            value="{{ old('youtube_video', $transportSingle->youtube_video) }}" name="youtube_video"
                            placeholder="{{ translate('Youtube Video Link') }}">
                        @error('youtube_video')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-35">
                        <div class="row">
                            <div class="col-md-12">
                                <label> <b>{{ translate('FAQs') }}</b></label> 
                                <input type="text" class="username-input" value="{{old('faq_title', $transportSingle->faq_title) }}"
                            name="faq_title" placeholder="{{ translate('Enter Faq Title') }}">
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
                                <label> <b>{{ translate('Includes') }}</b></label>
                                <input type="text" class="username-input" value="{{old('include_title', $transportSingle->include_title) }}"
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
                                <label> <b>{{ translate('Excludes') }}</b></label>
                                <input type="text" class="username-input" value="{{old('exclude_title', $transportSingle->exclude_title) }}"
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


                </div>

                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Extra Info') }}</h4>
                    </div>
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-inner mb-35">
                                <label>{{ translate('Minimum advance reservations') }}</label>
                                <input type="number" class="username-input"
                                    value="{{ old('min_advance_reservations', $transportSingle->min_advance_reservations) }}"
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
                                    value="{{ old('min_stay', $transportSingle->min_stay) }}" name="min_stay"
                                    placeholder="{{ translate('Ex: 2') }}">
                                <small>Leave blank if you dont need to set minimum day stay option</small>
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
                        <ul class="nav nav-tabs" id="priceTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="car-tab" data-bs-toggle="tab"
                                    data-bs-target="#car-tab-pane" type="button" role="tab"
                                    aria-controls="car-tab-pane" aria-selected="true">{{ translate('Car') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="bus-tab" data-bs-toggle="tab"
                                    data-bs-target="#bus-tab-pane" type="button" role="tab"
                                    aria-controls="bus-tab-pane" aria-selected="false">{{ translate('Bus') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="train-tab" data-bs-toggle="tab"
                                    data-bs-target="#train-tab-pane" type="button" role="tab"
                                    aria-controls="train-tab-pane"
                                    aria-selected="false">{{ translate('Train') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="boat-tab" data-bs-toggle="tab"
                                    data-bs-target="#boat-tab-pane" type="button" role="tab"
                                    aria-controls="boat-tab-pane" aria-selected="false">{{ translate('Boat') }}</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="priceTabContent">
                            <div class="tab-pane fade show active" id="car-tab-pane" role="tabpanel"
                                aria-labelledby="car-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Type') }}</label>
                                            <input type="text" class="username-input"
                                                value="{{ old('car_type', $transportSingle->car_type) }}" name="car_type"
                                                placeholder="{{ translate('Enter Car Type') }}">
                                            @error('car_type')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Person') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('car_person', $transportSingle->car_person) }}"
                                                name="car_person" placeholder="{{ translate('Enter Person') }}">
                                            @error('car_person')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-inner mb-35">
                                            <label>{{ translate('Price') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="username-input"
                                                value="{{ old('car_price', $transportSingle->car_price) }}"
                                                name="car_price" placeholder="{{ translate('Enter Adult Price') }}">
                                            @error('car_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-inner mb-35">
                                            <label>{{ translate('Sale Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('car_sale_price', $transportSingle->car_sale_price) }}"
                                                name="car_sale_price"
                                                placeholder="{{ translate('Enter Adult Sale Price') }}">
                                            @error('car_sale_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="bus-tab-pane" role="tabpanel" aria-labelledby="bus-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Price') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="username-input"
                                                value="{{ old('bus_price', $transportSingle->bus_price) }}"
                                                name="bus_price" placeholder="{{ translate('Enter Adult Price') }}">
                                            @error('bus_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Sale Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('bus_sale_price', $transportSingle->bus_sale_price) }}"
                                                name="bus_sale_price"
                                                placeholder="{{ translate('Enter Adult Sale Price') }}">
                                            @error('bus_sale_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Child Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('bus_child_price', $transportSingle->bus_child_price) }}"
                                                name="bus_child_price"
                                                placeholder="{{ translate('Enter Child Price') }}">
                                            @error('bus_child_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="train-tab-pane" role="tabpanel" aria-labelledby="train-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Price') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="username-input"
                                                value="{{ old('train_price', $transportSingle->train_price) }}"
                                                name="train_price" placeholder="{{ translate('Enter Adult Price') }}">
                                            @error('train_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Sale Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('train_sale_price', $transportSingle->train_sale_price) }}"
                                                name="train_sale_price"
                                                placeholder="{{ translate('Enter Adult Sale Price') }}">
                                            @error('train_sale_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Child Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('train_child_price', $transportSingle->train_child_price) }}"
                                                name="train_child_price"
                                                placeholder="{{ translate('Enter Child Price') }}">
                                            @error('train_child_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="boat-tab-pane" role="tabpanel" aria-labelledby="boat-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Price') }} <span class="text-danger">*</span></label>
                                            <input type="number" class="username-input"
                                                value="{{ old('boat_price', $transportSingle->boat_price) }}"
                                                name="boat_price" placeholder="{{ translate('Enter Adult Price') }}">
                                            @error('boat_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Adult Sale Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('boat_sale_price', $transportSingle->boat_sale_price) }}"
                                                name="boat_sale_price"
                                                placeholder="{{ translate('Enter Adult Sale Price') }}">
                                            @error('boat_sale_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-inner mb-35 pt-3">
                                            <label>{{ translate('Child Price') }}</label>
                                            <input type="number" class="username-input"
                                                value="{{ old('boat_child_price', $transportSingle->boat_child_price) }}"
                                                name="boat_child_price"
                                                placeholder="{{ translate('Enter Child Price') }}">
                                            @error('boat_child_price')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="form-check mb-35">
                        <label class="form-check-label" for="enable_service_fee">
                            <input class="form-check-input enable_service_fee" name="enable_service_fee" type="checkbox"
                                id="enable_service_fee" value="1"
                                {{ $transportSingle->enable_service_fee == 1 ? 'checked' : '' }}>
                            <b>{{ translate('Enable Extra Service') }}</b>
                        </label>
                    </div>
                    <div
                        class="form-inner mb-25 {{ $transportSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Service Fee') }}</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $transportSingle->enable_service_fee == 1 ? '' : 'd-none' }} service_fee_show">
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
                            value="{{ old('address', $transportSingle->address) }}" name="address"
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
                                            {{ old('country_id', $transportSingle->country_id) == $country->id ? 'selected' : '' }}>
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
                                    <option value="{{ $transportSingle->state_id }}" selected>
                                        {{ $transportSingle->states?->name }}</option>
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
                                    <option value="{{ $transportSingle->city_id }}" selected>
                                        {{ $transportSingle->cities?->name }}</option>
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
                                    value="{{ old('zip_code', $transportSingle->zip_code) }}" class="username-input"
                                    placeholder="{{ translate('Zip/Postal') }}">
                                @error('zip_code')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Latitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lat" value="{{ old('map_lat', $transportSingle->map_lat) }}"
                                    class="username-input" placeholder="{{ translate('Latitude') }}">
                                    <a class="text-primary" href="https://www.latlong.net/" target="_blank">Go Here to get Latitude from
                                        address</a>
                                @error('map_lat')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Longitude') }} <span class="text-danger">*</span></label>
                                <input type="text" name="map_lng" value="{{ $transportSingle->map_lng }}"
                                    class="username-input" placeholder="{{ translate('Longitude') }}">
                                    <a class="text-primary" href="https://www.latlong.net/" target="_blank">{{ translate('Go Here to get Longitude from
                                        address')}}</a>
                                @error('map_lng')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct" {{ $transportSingle->enable_seo == 1 ? 'checked' : '' }}>
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input" name="meta_title"
                                        value="{{ old('meta_title', $transportSingle->meta_title) }}">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description">{{ old('meta_description', $transportSingle->meta_desc) }}</textarea>
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
                                        @if (isset($transportSingle->meta_keyward) && count($transportSingle?->meta_keyward) > 0)

                                            @foreach ($transportSingle->meta_keyward as $key => $keyward)
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

                                    @if ($transportSingle->meta_img)
                                        <img class="mt-3"
                                            src="{{ asset('uploads/transports/meta/' . $transportSingle->meta_img) }}"
                                            alt="meta image" width="80">
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
                                        {{ old('author_id', $transportSingle->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->username }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="eg-card product-card">
                        <div class="form-inner mb-35 position-relative">
                            <label>{{ translate('Destination') }}</label>
                            <input id="destination" name="distance_km" placeholder="Destination"
                                value="{{ $transportSingle->distance_km }}">
                            <span class="duration-icon">{{ translate('km') }}</span>
                        </div>
                    </div>
                @endadmin
                @if ($attributes->count() > 0)
                    @foreach ($attributes as $attribute)
                        @php
                            $terms = App\Models\TransportAttributeTerm::where('attribute_id', $attribute->id)
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
                                                {{ in_array($term->id, $data['attribute_terms'] ?? []) ? 'checked' : '' }}>
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
                                    @if ($transportSingle->feature_img)
                                        <img src="{{ asset('uploads/transports/features/' . $transportSingle->feature_img) }}"
                                            alt="{{ $transportSingle->title }}" width="100">
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
                                                <span class="transport_exist_remove exist_remove_btn"
                                                    data-gellery_id="{{ $gallery->id }}">X</span>
                                                <img class="img-thumb"
                                                    src="{{ asset('uploads/transports/gallery/' . $gallery->image) }}"
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
