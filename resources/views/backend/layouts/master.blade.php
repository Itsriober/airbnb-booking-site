<!DOCTYPE html>
@if (\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()?->rtl == 1)
    <html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $page_title ?? '' }}</title>
    <link rel="icon" href="{{ asset('assets/logo/' . get_setting('front_favicon')) }}" type="image/x-icon" sizes="200x200">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/libraries/cutealert/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery-ui-timepicker-addon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/libraries/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/css/fontawesome-iconpicker.min.css">
    <link rel="stylesheet"href="{{ asset('backend/libraries/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-tagsinput.css') }}">
        @stack('css')
        <link rel="stylesheet" href="{{ asset('backend/css/style.css?v=') }}{{ rand(1000,9999) }}">
        <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">

        @if (Session::has('locale'))
            @if (Session::get('locale') == 'sa')
                <link rel="stylesheet" href="{{ asset('backend/css/rtl.css?v=') }}{{ rand(1000,9999) }}">
            @endif
        @endif
        <script>
            var successAlertImage = "{{ asset('backend/libraries/cutealert/img/success.svg') }}";
            var errorAlertImage = "{{ asset('backend/libraries/cutealert/img/error.svg') }}";
            var questionAlertImage = "{{ asset('backend/libraries/cutealert/img/question.svg') }}";
            var warningALertImage = "{{ asset('backend/libraries/cutealert/img/warning.svg') }}";
        </script>
</head>

<body>

    <div class="layout-wrapper">

        @include('backend.layouts.header')

        <div class="main-container">
            <!-- sidebar-area -->
            @include('backend.layouts.sidebar')
            <!-- main-content -->
            <div class="main-content">
                <!-- page-content -->
                @yield('content')

            </div>
            <div class="footer">
                @stack('footer')
            </div>
        </div>
    </div>

    <script>
        let baseUrl = "{{ url('/') }}"
    </script>

    <script src="{{ asset('backend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/js/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('backend/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/libraries/cutealert/js/cute-alert.js') }}"></script>
    <script src="{{ asset('backend/libraries/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-ui-timepicker-addon.min.js') }}"></script>
    <script src="{{ asset('backend/js/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/libraries/dropzone/dropzone.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('backend/libraries/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('backend/js/egns.js') }}"></script>

    <!-- Font Awesome Icon Picker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fontawesome-iconpicker/3.2.0/js/fontawesome-iconpicker.min.js">
    </script>
    <script>
        $(function() {
            $('.icon-picker').iconpicker({
                hideOnSelect: true
            });
        });
    </script>
    @stack('js')

    <script>
        $('.icp-auto').iconpicker();

        @if (Session::has('success'))
            cuteToast({
                type: "success",
                message: "{{ session('success') }}",
                img: successAlertImage,
                timer: 2000
            });
        @endif

        @if (Session::has('error'))
            cuteToast({
                type: "error",
                message: "{{ session('error') }}",
                img: errorAlertImage,
                timer: 2000
            });
        @endif
        @if ($errors->any())
            var myModal = new bootstrap.Modal(document.getElementById("staticBackdrop"), {});
            document.onreadystatechange = function() {
                myModal.show();
            };
        @endif
    </script>

</body>

</html>
