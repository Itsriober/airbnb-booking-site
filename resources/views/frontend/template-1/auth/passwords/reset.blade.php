@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area">
                        <h3>{{ translate('Reset Password') }}</h3>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Enter Your Email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" value="{{ $email ?? old('email') }}"
                                            class="@error('email') is-invalid @enderror" name="email"
                                            placeholder="{{ translate('Email Address') }}" required autocomplete="email"
                                            autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
     
                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" value="{{ old('password') }}"
                                            class="@error('password') is-invalid @enderror" name="password"
                                            placeholder="{{ translate('Password') }}" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-20">
                                    <div class="form-inner">
                                        <label>{{ translate('Confirm Password') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                            placeholder="{{ translate('Confirm Password') }}" required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            {{ translate('Reset Password') }}
                                        </button>
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
