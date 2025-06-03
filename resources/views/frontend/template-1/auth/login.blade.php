@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area">
                        <h3>{{ translate('User Login') }}</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Enter Your Email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ old('login') }}"
                                            class="@if($errors->any()) is-invalid @endif"
                                            name="login" id="login"
                                            placeholder="{{ translate('Enter Username or Email') }}">
                                            @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $error }}</strong>
                                            </span>
                                            @endforeach
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Password') }} <span class="text-danger">*</span></label>
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
                                    <div class="form-agreement d-flex justify-content-between flex-wrap">
                                        <div class="form-group">
                                            <label class="form-check-label" for="remember">
                                                <input class="form-check-input me-1" type="checkbox" name="remember"
                                                    value="1" id="remember"
                                                    {{ old('remember') == 1 ? 'checked' : '' }}>
                                                {{ __('Remember Me') }}

                                            </label>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a id="forgotpass" href="{{ route('password.request') }}"
                                                class="forgot-pass">{{ translate('Forgotten Password') }}</a>
                                        @endif
                                    </div>
                                </div>
                                @if (get_setting('google_recapcha_check') == 1)
                                    <div class="g-recaptcha mb-3" data-sitekey="{{ get_setting('recaptcha_key') }}"></div>
                                    @if (Session::has('g-recaptcha-response'))
                                        <p class="text-danger"> {{ Session::get('g-recaptcha-response') }}</p>
                                    @endif
                                @endif

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            {{ translate('Login') }}
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <!-- Registration link -->
                                        <p class="mt-3">{{ translate("Don't have an account") }}?
                                            <a class="text-info"
                                                href="{{ route('register') }}">{{ translate('Register Here') }}</a>
                                        </p>
                                    </div>
                                </div>
                                @if(get_setting('GOOGLE_CLIENT_ID') && get_setting('GOOGLE_CLIENT_SECRET') && get_setting('GOOGLE_REDIRECT_URL'))
                                <div class="divider text-center">
                                    <span>{{ translate('or') }}</span>
                                </div>
                                <div class="py-2">
                                    <a href="{{ route('social.login', ['provider' => 'google']) }}"
                                        class="google-login-btn eg-btn google-btn d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/home1/icon/google-icon.svg') }}"
                                                alt="Google Login">
                                        </div>
                                        {{ translate('Sign in with Google') }}
                                    </a>
                                </div>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
