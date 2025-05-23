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
                        <a
                            href="{{ route('transports.attribute.edit', ['id' => $attributeSingle->id, 'lang' => $language->code]) }}"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-3"
                                height="16"></a>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('transports.attribute.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="eg-card product-card">

                <form action="{{ route('transports.attribute.update', $attributeSingle->id) }}" method="POST">
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="lang" value="{{ $lang }}">
                    @csrf
                    <div class="form-inner mb-35">
                        <label class="col-form-label">{{ translate('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('name', $attributeSingle->getTranslation('name', $lang)) }}"
                            name="name" class="username-input" placeholder="{{ translate('Enter Name') }}">
                        @error('name')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-inner mb-25">
                        <label>{{ translate('Position Order') }}</label>
                        <input type="number" name="position" value="{{ old('position', $attributeSingle->position) }}"
                            class="position" placeholder="Ex: 1">
                        <small>{{ translate('The position will be used to order in the Filter page search. The greater number is
                            priority')}}</small>
                        @error('position')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="button-group mt-15 text-center  ">
                        <input type="submit" class="eg-btn btn--green back-btn me-3" value="{{ translate('Update') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
