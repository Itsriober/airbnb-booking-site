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
                        <a href="{{ route('visa.edit', ['id' => $visaSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('visa.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('visa.update', $visaSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf


        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Visa Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input"
                            value="{{ old('title', $visaSingle->getTranslation('title', $lang)) }}" name="title"
                            placeholder="{{ translate('Name of the Visa') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Minimum/Maximum People') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Visa Type') }}<span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id">
                                    <option value="">{{translate('Select Category')}}</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$visaSingle->category_id == $category->id ? 'selected' : ''}}>{{$category->getTranslation('name')}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Maximum Sta ys') }}<span class="text-danger">*</span></label>
                                <input type="text" id="maximum_stay" class="username-input"
                                    value="{{ old('title', $visaSingle->getTranslation('maximum_stay', $lang)) }}"
                                    name="maximum_stay" placeholder="{{ translate('Maximum Sta ys') }}">
                                @error('maximum_stay')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Visa Mode') }}<span class="text-danger">*</span></label>
                                <input type="text" id="visa_mode" class="username-input"
                                    value="{{ old('title', $visaSingle->getTranslation('visa_mode', $lang)) }}"
                                    name="visa_mode" placeholder="{{ translate('Visa Mode') }}">
                                @error('visa_mode')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Processing Time') }}<span class="text-danger">*</span></label>
                                <input type="text" id="processing" class="username-input"
                                    value="{{ old('title', $visaSingle->getTranslation('processing', $lang)) }}"
                                    name="processing" placeholder="{{ translate('Processing Time') }}">
                                @error('processing')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Validity') }} <span class="text-danger">*</span></label>
                                <input type="text" id="validity" class="username-input"
                                    value="{{ old('title', $visaSingle->getTranslation('validity', $lang)) }}"
                                    name="validity" placeholder="{{ translate('Validity ') }}">
                                @error('validity')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-inner mb-35">
                                <label>{{ translate('Cost Summary') }} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" class="username-input"
                                    value="{{ old('title', $visaSingle->getTranslation('cost', $lang)) }}" name="cost"
                                    placeholder="{{ translate('Cost Summary') }}">
                                @error('cost')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="form-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('FAQs') }}</b></label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-35">
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
                    <div class="form-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <label> <b>{{ translate('Required Documents') }}</b></label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-35">
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

                </div>
            </div>
            <div class="col-lg-4">
                <div class="eg-card product-card pb-70">
                    <div class="button-group mt-15">

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
                        <h4>{{ translate('Country') }}</h4>
                    </div>

                    <div class="form-inner">
                        <select class="js-example-basic-single country_id" name="country_id">
                            <option value="">{{ translate('Select Option') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ old('country_id', $visaSingle->country_id) == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
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
                                        {{ old('author_id', $visaSingle->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->username }}</option>
                                @endforeach
                            </select>
                            @error('author_id')
                                <div class="error text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                @endadmin


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
                                    @if ($visaSingle->features_image)
                                        <img src="{{ asset('uploads/visa/features/' . $visaSingle->features_image) }}"
                                            alt="{{ $visaSingle->title }}" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('features_image')
                        <div class="error text-danger">{{ $message }}</div>
                    @enderror
                </div>
 
            </div>
        </div>

        </div>
    </form>

@endsection
