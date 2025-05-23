<form action="{{ route('inquiry.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product_id }}">
    <input type="hidden" name="product_type" value="{{ $product_type }}">
    <input type="hidden" name="author_id" value="{{ $author_id }}">
    <div class="form-inner mb-20">
        <label>{{ translate('Full Name') }} <span>*</span></label>
        <input type="text" name="name" required class="@error('name') is-invalid @enderror" placeholder="{{ translate('Enter your full name') }}">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-inner mb-20">
        <label>{{ translate('Email Address') }} <span>*</span></label>
        <input type="email" name="email" required class="@error('email') is-invalid @enderror"  placeholder="{{ translate('Enter your email address') }}">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-inner mb-20">
        <label>{{ translate('Phone Number') }}</label>
        <input type="text" name="phone" class="@error('phone') is-invalid @enderror"  placeholder="{{ translate('Enter your phone number') }}">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if ($product_type == 'visa')
        <div class="form-inner mb-70">
            <label>{{ translate('Visa Type') }} <span>*</span></label>
            <select name="visa_type" class="@error('visa_type') is-invalid @enderror" >
                @foreach (visa_categories() as $visa)
                    <option value="{{ $visa->id }}">{{ $visa->getTranslation('name') }}</option>
                @endforeach
            </select>
            @error('visa_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-inner mb-70">
            <label>{{ translate('Country') }} <span>*</span></label>
            <select name="country_id" class="@error('country_id') is-invalid @enderror" >
                @foreach (countries() as $country)
                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}</option>
                @endforeach
            </select>
            @error('country_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-inner mb-20">
            <label>{{ translate('Select Files') }} <span>*</span></label>
            <input type="file" class="form-control" name="images[]" multiple accept="image/*">
        </div>


    @endif

    <div class="form-inner mb-30">
        <label>{{ translate('Write Your Massage') }} <span>*</span></label>
        <textarea name="message" required class="@error('message') is-invalid @enderror" placeholder="{{ translate('Write your quiry') }}"></textarea>
        @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-inner">
        <button type="submit" class="primary-btn1 two">{{ translate('Submit Now') }}</button>
    </div>
</form>
