@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">

                <div class="col-lg-7 offset-lg-3">
                    <div class="contact-form-area">
                        <h3>{{ translate('Agent Register') }}</h3>
                        <form action="{{ route('agent.register') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('First Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('first_name') }}"
                                            class="@error('first_name') is-invalid @enderror" name="first_name"
                                            placeholder="{{ translate('First Name') }}" required>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Last Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('last_name') }}"
                                            class="@error('last_name') is-invalid @enderror" name="last_name"
                                            placeholder="{{ translate('Last Name') }}" required>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Username') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('username') }}"
                                            class="@error('username') is-invalid @enderror" name="username"
                                            placeholder="{{ translate('Username') }}" required>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Shop Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('shop_name') }}" id="shop_name"
                                            class="@error('shop_name') is-invalid @enderror" name="shop_name"
                                            placeholder="{{ translate('Shop Name') }}" required>
                                        @error('shop_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Enter Your Email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="@error('email') is-invalid @enderror" name="email"
                                            placeholder="{{ translate('Enter Your Email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                              
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Password...') }} <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="password" id="password" name="password"
                                                placeholder="{{ translate('Enter your password...') }}">
                                            <i class="bi bi-eye-slash togglePassword" style="cursor: pointer;"></i>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                           
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Confirm Password...') }} <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="password" class="password" id="password" name="password_confirmation"
                                                placeholder="{{ translate('Enter your password...') }}">
                                            <i class="bi bi-eye-slash togglePassword" style="cursor: pointer;"></i>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="col-lg-12 mb-20">
                                    <div class="form-agreement d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input me-1" type="checkbox" name="terms_policy"
                                                    value="1" id="remember terms_policy"
                                                    {{ old('terms_policy') == 1 ? 'checked' : '' }} required>
                                                <label for="terms_policy">
                                                    {{ translate('I agree to the Terms & Policy') }}</label>
                                                <br>
                                                <span class="terms_policy" style="display:none;">
                                                    <strong
                                                        class="text-danger">{{ translate('The Terms & Policy field is required') }}.</strong>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner d-flex justify-content-between align-items-center">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            {{ translate('Register Now') }}
                                        </button>
                                        <a href="{{ route('login') }}" class="primary-btn1 btn-hover" style="margin-left: 15px;">
                                            {{translate('Login Here')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
