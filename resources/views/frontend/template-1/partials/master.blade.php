@php
    if (Session::has('locale')) {
        $locale = Session::get('locale', Config::get('app.locale'));
    } else {
        $locale = get_setting('DEFAULT_LANGUAGE', 'en');
    }
@endphp

<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $locale == 'sa' ? 'rtl' : '' }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Request::url() != url('/'))
        <title>{{ $title ?? '' }} - {{ get_setting('company_name') }} </title>
    @else
        <title>{{ $title ?? get_setting('company_name') }} </title>
    @endif

    @if (fileExists('assets/logo/', get_setting('front_favicon')) != false && get_setting('front_favicon') != null)
        <link rel="icon" href="{{ asset('assets/logo/' . get_setting('front_favicon')) }}" type="image/gif"
            sizes="20x20">
    @else
        <link rel="icon" href="{{ asset('frontend/img/sm-logo.svg') }}" type="image/gif" sizes="20x20">
    @endif

    <!-- Meta -->
    @if (!Request::is('customer/*'))
        <meta name="robots" content="index, follow">
        <meta name="googlebot-news" content="index, follow">
        <meta name="msnbot" content="index, follow">
    @endif

    <meta name="description" content="{{ isset($meta_description) ? strip_tags($meta_description) : '' }}">
    <meta name="keywords" content="{{ $meta_keyward ?? '' }}">

    <meta name="author" content="{{ get_setting('company_name') }}">
    <meta name="resource-type" content="document">
    <meta name="contact" content="{{ get_setting('company_email1') }}">

    <meta property="og:site_name" content="{{ get_setting('company_name') }}">
    <meta property="og:title" content="{{ $title ?? '' }}">
    <meta property="og:description" content="{{ isset($meta_description) ? strip_tags($meta_description) : '' }}">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_US">
    <meta property="og:url" content="{{ url()->current() }}">

    <meta name="twitter:site" content="{{ '@' . get_setting('company_name') }}">
    <meta name="brand_name" content="{{ get_setting('company_name') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? '' }}">
    <meta name="twitter:description" content="{{ isset($meta_description) ? strip_tags($meta_description) : '' }}">
    <meta name="twitter:domain" content="{{ url('/') }}">
    @if (isset($meta_image) && $meta_image)
        <meta property="og:image" content="{{ $meta_image ?? '' }}">
        <meta name="twitter:image" content="{{ $meta_image ?? '' }}">
    @endif

    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery-ui.css') }}" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link href="{{ asset('frontend/css/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- Fontawesome all CSS -->
    <link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet">
    <!-- FancyBox CSS -->
    <link href="{{ asset('frontend/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    {{-- customer dashboard --}}
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard.css') }}">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('frontend/css/fontawesome.min.css') }}" rel="stylesheet">
    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/daterangepicker.css') }}">
    <!-- Slick slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
    <!-- BoxIcon  CSS -->
    <link href="{{ asset('frontend/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Select2  CSS -->
    <link href="{{ asset('frontend/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/nice-select.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/cutealert/css/style.css') }}">
    <!--  Style CSS  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css?v=') }}{{ rand(1000,9999) }}">

    @if (get_setting('analytics_id'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ get_setting('analytics_id') }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', "{{ get_setting('analytics_id') }}");
        </script>
    @endif
    @php
    $breadcrumb = get_setting('breadcrumb_color');
    $breadcrumb = str_replace(' ', '', $breadcrumb);
    $hex = $breadcrumb;
    [$r, $g, $b] = sscanf($hex, '#%02x%02x%02x');
    $hex = "$r $g $b";
    $hex = str_replace(' ', ',', $hex);
    @endphp
    @stack('style')

</head>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<body>
    <style>
        :root {
            --primary-color1: {{ get_setting('primary_color') ?? '#63ab45' }};
            --primary-color2: {{ get_setting('secondary_color') ?? '#FBB03B' }};
        }
    </style>

    @include('frontend.template-1.partials.login_modal')

    @if (!request()->is('customer/*') && (get_setting('top_header_show') == 1))
        @include('frontend.template-1.partials.topbar2')
    @endif

    @include('frontend.template-1.partials.header1')

    @yield('content')
    @if (!request()->is('customer/*'))
        @if (get_setting('footer_mailchimp_status') == 1)
            <style>
                .footer-section .footer-top {
                    padding-top: 18% !important;
                }
            </style>
            @include('frontend.template-1.partials.newsletter')
        @endif

        @include('frontend.template-1.partials.footer')
    @endif

    <!--  Main jQuery  -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/js/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/js/daterangepicker.min.js') }}"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Swiper slider JS -->
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <!-- Isotope  JS -->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!-- Magnific-popup  JS -->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Marquee  JS -->
    <script src="{{ asset('frontend/js/jquery.marquee.min.js') }}"></script>
    <!-- Select2  JS -->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!-- Select2  JS -->
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>

    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/cutealert/js/cute-alert.js') }}"></script>
    <script src="{{ asset('backend/js/html2pdf.bundle.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/custom.js?v=') }}{{ rand(1000,9999) }}"></script>
    <script src="{{ asset('frontend/js/main.js?v=') }}{{ rand(1000,9999) }}"></script>

    @stack('js')

    <script>
        @if (Session::has('success'))
            var successAlertImage = "{{ asset('backend/libraries/cutealert/img/success.svg') }}";
            cuteToast({
                type: "success",
                message: "{{ session('success') }}",
                img: successAlertImage,
                timer: 4000
            });
        @endif

        @if (Session::has('error'))
        var errorAlertImage = "{{ asset('backend/libraries/cutealert/img/error.svg') }}";
            cuteToast({
                type: "error",
                message: "{{ session('error') }}",
                img: errorAlertImage,
                timer: 4000
            });
        @endif

        @if ($errors->any())
            var errorAlertImage = "{{ asset('backend/libraries/cutealert/img/error.svg') }}";
            cuteToast({
                type: "error",
                message: "{{ implode('|', $errors->all(':message')) }}",
                img: errorAlertImage,
                timer: 4000
            });
            var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            document.onreadystatechange = function() {
                myModal.show();
            };
        @endif
    </script>




    @if (get_setting('tawk_enabled') == 1 && get_setting('tawk_code') !== '')
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "{{ get_setting('tawk_code') }}";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    @endif


    <p class="d-none cookie"></p>
</body>

</html>
