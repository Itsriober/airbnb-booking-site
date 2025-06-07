@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4>{{ $page_title ?? '' }}</h4>
            <a href="{{ route('destination.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <form action="{{ route('destination.update', $destinationSingle->id) }}" method="post" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
        <input type="hidden" name="lang" value="{{ $lang }}">
        @csrf
        <div class="row">

            <div class="col-lg-8">
                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Destination Content') }}</h4>
                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Title') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input"
                            value="{{ old('title', $destinationSingle->getTranslation('title', $lang)) }}" name="title"
                            placeholder="{{ translate('Name of the tour') }}">
                        @error('title')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Content') }} <span class="text-danger">*</span></label>
                        <textarea id="summernote" name="content">{{ old('content', $destinationSingle->getTranslation('content', $lang)) }}</textarea>
                        @error('content')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Destination') }}</h4>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Population') }} <span class="text-danger">*</span></label>
                                <input type="text" class="username-input"
                                    value="{{ old('population', $destinationSingle->population) }}" name="population"
                                    placeholder="{{ translate('Population') }}">
                                @error('country_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Capital City') }} <span class="text-danger">*</span></label>
                                <input type="text" class="username-input"
                                    value="{{ old('city', $destinationSingle->city) }}" name="city"
                                    placeholder="{{ translate('city') }}">
                                @error('city')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Language') }} <span class="text-danger">*</span></label>
                                <input type="text" class="username-input"
                                    value="{{ old('language', $destinationSingle->language) }}" name="language"
                                    placeholder="{{ translate('Language') }}">
                                @error('language')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="form-inner mb-35">
                                <label>{{ translate('Currency') }} <span class="text-danger">*</span></label>
                                <input type="text" class="username-input"
                                    value="{{ old('currency', $destinationSingle->currency) }}" name="currency"
                                    placeholder="{{ translate('Currency') }}">
                                @error('currency')
                                    <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="form-inner mb-35">
                        <label>{{ translate('Short Description') }}</label>
                        <textarea name="short_desc" id="" cols="30" rows="10">{{ old('short_desc', $destinationSingle->short_desc) }}</textarea>
                        @error('short_desc')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="eg-card product-card">
                    <div class="eg-card-title-sm">
                        <h4>{{ translate('Availability') }}</h4>
                    </div>


                    <div class="row mt-3">
                        <div class="col-xl-12">
                            <div class="form-check">
                                <label class="form-check-label" for="seoProduct">
                                    <input class="form-check-input seo-page-checkbox" name="enable_seo" type="checkbox"
                                        id="seoProduct"
                                        {{ old('enable_seo', $destinationSingle->enable_seo) == 1 ? 'checked' : '' }}>
                                    <b>{{ translate('Allow SEO') }}</b>
                                </label>
                            </div>
                        </div>

                        <div class="row mt-3 seo-content">
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="username-input"
                                        value="{{ old('meta_title', $destinationSingle->meta_title) }}" name="meta_title">
                                    @error('meta_title')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Description') }}</label>
                                    <textarea name="meta_description"> {{ old('meta_description', $destinationSingle->meta_desc) }}</textarea>
                                    @error('meta_description')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-inner mb-35">
                                    <label> {{ translate('Meta Image') }}</label>
                                    <input type="file" class="username-input" name="meta_img">
                                    @error('meta_img')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    @if ($destinationSingle->meta_img)
                                        <img src="{{ asset('uploads/destination/meta/' . $destinationSingle->meta_img) }}"
                                            alt="{{ $destinationSingle->meta_title }}" width="80">
                                    @endif
                                </div>
                            </div>


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
                        <h4>{{ translate('Destination') }}</h4>
                    </div>

                    <div class="form-inner">
                        <input type="text" class="username-input"
                            value="{{ old('destination', $destinationSingle->destination) }}" name="destination"
                            placeholder="{{ translate('Destination') }}">
                        @error('destination')
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
                                        {{ old('author_id', $destinationSingle->author_id) == $author->id ? 'selected' : '' }}>
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
                                    @if ($destinationSingle->features_image)
                                        <img src="{{ asset('uploads/destination/features/' . $destinationSingle->features_image) }}"
                                            alt="{{ $destinationSingle->title }}" width="100">
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
                                                <span class="destination_exist_remove exist_remove_btn"
                                                    data-gellery_id="{{ $gallery->id }}">X</span>
                                                <img class="img-thumb"
                                                    src="{{ asset('uploads/destination/gallery/' . $gallery->image) }}"
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
