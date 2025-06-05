<!-- ========== inner-page-banner start ============= -->
<div class="breadcrumb-section"
    style="background-image: linear-gradient(270deg, rgba(0, 0, 0, .3), rgba(0, 0, 0, 0.3) 101.02%), url(/assets/logo/{{ get_setting('breadcamp_img') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="banner-content">
                    <h1>{{ $title }}</h1>
                    <ul class="breadcrumb-list">
                        <li><a href="{{ url('/') }}">{{ translate('Home') }}</a></li>
                        <li>{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== inner-page-banner end ============= -->
