<!-- Start Banner3 section section -->
<div class="banner3-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner3-content">
                       <h2>{{translate('Join The Newsletter')}}</h2>
                       <p>{{translate('To receive our best monthly deals')}}</p>
                        <form action="{{ route('newsletter.subscribe') }}" method="POST">
                            @csrf
                            <div class="from-inner">
                                <input type="email" required name="email" placeholder="{{translate('Enter Your Email')}}...">
                                <button type="submit" class="from-arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17">
                                        <path d="M7 1L16 8.5M16 8.5L7 16M16 8.5H0.5" stroke-width="1.5"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <img src="{{asset('frontend/img/home1/banner3-vector1.png')}}" alt="" class="vector1">
                        <img src="{{asset('frontend/img/home1/banner3-vector2.png')}}" alt="" class="vector2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner3 section section -->
