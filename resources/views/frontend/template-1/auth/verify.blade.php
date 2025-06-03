@extends('frontend.template-'.selectedTheme().'.partials.master')
@section('content')
    @include('frontend.template-'.selectedTheme().'.breadcrumb.breadcrumb')
    <div class="contact-page pt-120 mb-120">
        <div class="container">
            <div class="row g-lg-4 gy-5">

                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-form-area text-center">
                        <h3>{{ translate('Verify Your Email Address') }}</h3>
                        <p>{{ translate('Before proceeding, please check your email for a verification link') }}.</p>
                        <p>{{ translate('If you did not receive the email') }},</p>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ translate('A fresh verification link has been sent to your email address') }}.
                            </div>
                        @endif
                        <form class="w-100 text-center" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="primary-btn1 btn-hover border-0">{{ translate('click here to request another') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
