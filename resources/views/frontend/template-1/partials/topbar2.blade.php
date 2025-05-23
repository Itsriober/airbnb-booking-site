<div class="top-bar style-2">
    @if (get_setting('email_address'))
        <div class="topbar-left two">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27">
                    <g>
                        <path
                            d="M9.84497 19.8136V25.0313C9.84583 25.2087 9.90247 25.3812 10.0069 25.5246C10.1112 25.6679 10.2581 25.7748 10.4266 25.8301C10.5951 25.8853 10.7767 25.8861 10.9457 25.8324C11.1147 25.7787 11.2625 25.6732 11.3682 25.5308L14.4203 21.3773L9.84497 19.8136ZM26.6468 0.156459C26.5201 0.0661815 26.3708 0.0127263 26.2155 0.00200482C26.0603 -0.00871662 25.9051 0.0237135 25.7671 0.0957086L0.454599 13.3145C0.308959 13.3914 0.188959 13.5092 0.109326 13.6535C0.0296936 13.7977 -0.00610776 13.962 0.00631628 14.1262C0.0187403 14.2905 0.0788492 14.4475 0.179266 14.5781C0.279683 14.7087 0.416039 14.8071 0.571599 14.8613L7.60847 17.2666L22.5946 4.45283L10.9981 18.4242L22.7915 22.4551C22.9085 22.4944 23.0327 22.5077 23.1554 22.4939C23.2781 22.4802 23.3963 22.4399 23.5017 22.3757C23.6072 22.3115 23.6973 22.225 23.7659 22.1223C23.8344 22.0196 23.8797 21.9032 23.8985 21.7812L26.9922 0.968709C27.0151 0.81464 26.995 0.657239 26.934 0.513898C26.8731 0.370556 26.7737 0.246854 26.6468 0.156459Z" />
                    </g>
                </svg>
            </div>
            <div class="content">
                <span>{{ translate('Email') }}:</span>
                <a href="mailto:{{ get_setting('email_address') }}">{{ get_setting('email_address') }}</a>
            </div>
        </div>
    @endif

    <div>{!! get_setting('topbar_marketing_text') !!}</div>
    <div class="admin-area dropdown">
        @php
            if (Session::has('locale')) {
                $locale = Session::get('locale', Config::get('app.locale'));
            } else {
                $locale = get_setting('DEFAULT_LANGUAGE', 'en');
            }
        @endphp
        <div id="lang-change">
            <a class="no-arrow dropdown-toggle d-flex jusify-content-start align-items-center gap-2 border-none"
                href="javascript:void(0);" id="dropdownlanguage" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="">
                    <img src="{{ asset('assets/img/flags/' . $locale . '.png') }}" alt="{{ translate('Language') }}"
                        height="11">
                </span><span class="text-uppercase">{{ $locale }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownlanguage">
                @foreach (\App\Models\Language::all() as $key => $language)
                    <li><a class="dropdown-item" href="javascript:void(0)" data-flag="{{ $language->code }}"
                            class="dropdown-item @if ($locale == $language->code) active @endif"><img
                                src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-2">
                            <span class="language">{{ $language->name }}</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    </p>
    <div class="topbar-right">
        <div class="social-icon-area">
            <ul>
                @if (get_setting('facebook_link'))
                    <li><a href="{{ get_setting('facebook_link') }}"><i class='bx bxl-facebook'></i></a></li>
                @endif
                @if (get_setting('twitter_link'))
                    <li><a href="{{ get_setting('twitter_link') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="10" height="10" fill="currentColor" class="bi bi-twitter-x"
                                viewBox="0 0 16 16">
                                <path
                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                            </svg></a></li>
                @endif
                @if (get_setting('linkedin_link'))
                    <li><a href="{{ get_setting('linkedin_link') }}"><i class='bx bxl-linkedin'></i></a></li>
                @endif
                @if (get_setting('youtube_link'))
                    <li><a href="{{ get_setting('youtube_link') }}"><i class='bx bxl-youtube'></i></a></li>
                @endif
                @if (get_setting('instagram_link'))
                    <li><a href="{{ get_setting('instagram_link') }}"><i class='bx bxl-instagram'></i></a></li>
                @endif
                @if (get_setting('pinterest_link'))
                    <li><a href="{{ get_setting('pinterest_link') }}"><i class='bx bxl-pinterest-alt'></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
