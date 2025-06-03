@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">

                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area">
                        <h3>{{ translate('Confirm Password') }}</h3>
                        <p>{{ translate('Please confirm your password before continuing') }}.</p>
                        <form action="{{ route('password.confirm') }}" method="POST">
                            @csrf

                            <div class="row">
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

                                <div class="col-lg-12">
                                    <div class="form-inner">
                                        <button class="primary-btn1 btn-hover" type="submit">
                                            {{ translate('Confirm Password') }}
                                        </button>
                                    </div>
                                </div>

                                @if (Route::has('password.request'))
                                    <div class="col-lg-12">
                                        <div class="form-inner">
                                            <!-- Registration link -->
                                            <p>Don't have an account?
                                                <a href="{{ route('password.request') }}" class="forgot-pass">{{ translate('Forgotten
                                                    Password')}}</a>
                                            </p>
                                        </div>
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
