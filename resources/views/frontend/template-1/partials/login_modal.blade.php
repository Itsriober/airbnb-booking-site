<!-- Login Modal -->
<div class="modal login-modal" id="staticBackdrop1" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-clode-btn" data-bs-dismiss="modal"></div>
            <div class="modal-header">
                <img src="{{ asset('frontend/img/home1/login-modal-header-img.jpg') }}" alt="">
            </div>
            <div class="modal-body">
                <div class="login-registration-form">
                    <div class="form-title">
                        <h2>{{ translate('Sign in to continue') }}</h2>
                        <p>{{ translate('Enter your email address for Login.') }}</p>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-inner mb-20">
                            <input type="text" value="{{ old('login') }}" class="@error('login') is-invalid @enderror mb-1" name="login" placeholder="User name or Email *">
                            
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-inner mb-20">
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password *">            
                        </div>
                        

                        <button type="submit" class="login-btn mb-25">{{ translate('Sign In') }}</button>
                        <div class="col-lg-12">
                            <div class="form-inner">
                                <!-- Registration link -->
                                <p>{{ translate("Don't have an account") }}?
                                    <a class="text-info" href="{{ route('register') }}">{{ translate('Register Here') }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="divider">
                            <span>{{ translate('or') }}</span>
                        </div>
                        <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google-login-btn eg-btn google-btn d-flex align-items-center">
                            <div class="icon">
                                <img src="{{ asset('frontend/img/home1/icon/google-icon.svg') }}" alt="">
                            </div>
                            {{ translate('Sign in with Google') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>