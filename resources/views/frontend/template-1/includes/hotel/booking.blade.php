<h4>{{ translate('Book Your Room') }}</h4>
<p>{{ translate('Reserve your ideal Room early for a hassle-free trip; secure comfort and convenience!') }}</p>
<div class="nav nav-pills mb-40" role="tablist">
    <button class="nav-link show active" id="v-pills-booking-tab" data-bs-toggle="pill" data-bs-target="#v-pills-booking"
        type="button" role="tab" aria-controls="v-pills-booking"
        aria-selected="true">{{ translate('Online Booking') }}</button>
    <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact"
        type="button" role="tab" aria-controls="v-pills-contact"
        aria-selected="false">{{ translate('Inquiry Form') }}</button>
</div>
<div class="tab-content" id="v-pills-tabContent2">
    <div class="tab-pane fade active show" id="v-pills-booking" role="tabpanel" aria-labelledby="v-pills-booking-tab">
        <div class="sidebar-booking-form">
            <form action="{{ route('checkout') }}" method="POST" class="purchase-form">
                @csrf
                <div class="tour-date-wrap mb-50">
                    <h6>{{ translate('Select Your Booking Date') }}:</h6>
                    @if ($hotels->check_in && $hotels->check_out)
                        <div class="form-check mb-25">
                            <input class="form-check-input" type="radio" checked>
                            <label class="form-check-label" for="checkIn">
                                <span class="tour-date">
                                    <span class="start-date">
                                        <span>{{ translate('Check In') }}</span>
                                        <span>{{ date('h:i:sa', strtotime($hotels->check_in)) }}</span>
                                    </span>
                                    <i class="bi bi-arrow-right"></i>
                                    <span class="end-date text-end">
                                        <span>{{ translate('Check Out') }}</span>
                                        <span>{{ date('h:i:sa', strtotime($hotels->check_out)) }}</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    @endif
                    <div class="form-group customdate">
                        <input type="text" class="hotel_date" readonly name="daterange" placeholder="5 Jan, 2024">
                        <input type="hidden" name="start_date" class="start_date">
                        <input type="hidden" name="end_date" class="end_date">
                        <input type="hidden" name="days" class="total_days">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                            <path
                                d="M10.3125 7.03125C10.3125 6.90693 10.3619 6.7877 10.4498 6.69979C10.5377 6.61189 10.6569 6.5625 10.7812 6.5625H11.7188C11.8431 6.5625 11.9623 6.61189 12.0502 6.69979C12.1381 6.7877 12.1875 6.90693 12.1875 7.03125V7.96875C12.1875 8.09307 12.1381 8.2123 12.0502 8.30021C11.9623 8.38811 11.8431 8.4375 11.7188 8.4375H10.7812C10.6569 8.4375 10.5377 8.38811 10.4498 8.30021C10.3619 8.2123 10.3125 8.09307 10.3125 7.96875V7.03125Z" />
                            <path
                                d="M3.28125 0C3.40557 0 3.5248 0.049386 3.61271 0.137294C3.70061 0.225201 3.75 0.34443 3.75 0.46875V0.9375H11.25V0.46875C11.25 0.34443 11.2994 0.225201 11.3873 0.137294C11.4752 0.049386 11.5944 0 11.7188 0C11.8431 0 11.9623 0.049386 12.0502 0.137294C12.1381 0.225201 12.1875 0.34443 12.1875 0.46875V0.9375H13.125C13.6223 0.9375 14.0992 1.13504 14.4508 1.48667C14.8025 1.83831 15 2.31522 15 2.8125V13.125C15 13.6223 14.8025 14.0992 14.4508 14.4508C14.0992 14.8025 13.6223 15 13.125 15H1.875C1.37772 15 0.900806 14.8025 0.549175 14.4508C0.197544 14.0992 0 13.6223 0 13.125V2.8125C0 2.31522 0.197544 1.83831 0.549175 1.48667C0.900806 1.13504 1.37772 0.9375 1.875 0.9375H2.8125V0.46875C2.8125 0.34443 2.86189 0.225201 2.94979 0.137294C3.0377 0.049386 3.15693 0 3.28125 0V0ZM1.875 1.875C1.62636 1.875 1.3879 1.97377 1.21209 2.14959C1.03627 2.3254 0.9375 2.56386 0.9375 2.8125V13.125C0.9375 13.3736 1.03627 13.6121 1.21209 13.7879C1.3879 13.9637 1.62636 14.0625 1.875 14.0625H13.125C13.3736 14.0625 13.6121 13.9637 13.7879 13.7879C13.9637 13.6121 14.0625 13.3736 14.0625 13.125V2.8125C14.0625 2.56386 13.9637 2.3254 13.7879 2.14959C13.6121 1.97377 13.3736 1.875 13.125 1.875H1.875Z" />
                            <path
                                d="M2.34375 3.75C2.34375 3.62568 2.39314 3.50645 2.48104 3.41854C2.56895 3.33064 2.68818 3.28125 2.8125 3.28125H12.1875C12.3118 3.28125 12.431 3.33064 12.519 3.41854C12.6069 3.50645 12.6562 3.62568 12.6562 3.75V4.6875C12.6562 4.81182 12.6069 4.93105 12.519 5.01896C12.431 5.10686 12.3118 5.15625 12.1875 5.15625H2.8125C2.68818 5.15625 2.56895 5.10686 2.48104 5.01896C2.39314 4.93105 2.34375 4.81182 2.34375 4.6875V3.75Z" />
                        </svg>
                    </div>
                </div>
                <div class="booking-form-item-type mb-45">
                    <div class="number-input-item adults">
                        <label class="number-input-lable">{{ translate('Room Quantity') }}:<span>
                            </span><span class="hotelPrice">{{ currency_symbol() . $hotels->price }}</span></label>
                        <div class="quantity-counter">
                            <a href="#" class="quantity__minus_hotel guest-quantity__minus" data-type="room"><i
                                    class="bi bi-dash"></i></a>
                            <input name="quantity" type="text" class="quantity__input" value="01">
                            <a href="#" class="quantity__plus_hotel guest-quantity__plus" data-type="room"><i
                                    class="bi bi-plus"></i></a>
                        </div>
                    </div>
                    <input type="hidden" class="mainPrice" name="price"
                                value="{{ $hotels->price ?? 0 }}">
                            <input type="hidden" name="product_id" value="{{ $product_id }}">
                            <input type="hidden" name="product_type" value="{{ $product_type }}">
                            <input type="hidden" name="adult_unit_sale_price" value="">
                            <input type="hidden" class="unitPrice" name="adult_unit_price" value="{{ $hotels->price ?? 0 }}">
                            <input type="hidden" name="aqty" class="aqty" value="1">
                </div>
                <!-- Children Section -->
                <div class="number-input-item children">
                    <label class="number-input-lable">{{ translate('Maximum Guests') }}:</label>
                    <div class="quantity-counter">
                        <a href="#" class="quantity__minus_hotel guest-quantity__minus" data-type="guest"><i
                                class="bi bi-dash"></i></a>

                        <input name="quantity" type="text" class="quantity__input"
                            value="{{ $hotels->guest_capability > 9 ? $hotels->guest_capability : '0' . $hotels->guest_capability }}">

                        <a href="#" class="quantity__plus_hotel guest-quantity__plus" data-type="guest"><i
                                class="bi bi-plus"></i></a>
                    </div>

                    <input type="hidden" class="guest_qty" name="guest_capability" value="{{ $hotels->guest_capability ?? 0 }}">
                    <input type="hidden" name="cqty" class="guest_capability"
                        value="{{ $hotels->guest_capability ?? 0 }}">
                    <input type="hidden" name="child_unit_price" value="0">
                    <input type="hidden" name="child_price"
                                value="0">
                </div>
                @if ($services)
                    <div class="booking-form-item-type">
                        <h5>{{ translate('Other Extra Services') }}</h5>
                        <div class="checkbox-container">
                            @foreach ($services as $key => $service)
                            @if(isset($service->price))
                                <label class="check-container">{{ $service->name }}
                                    <input type="checkbox" class="services_check extra_services_check"
                                        name="services_list[]" value="{{ $key }}"
                                        data-type="{{ $service->price_type }}" data-unit="{{ $service->unit }}"
                                        data-price="{{ $service->price }}">
                                    <span class="checkmark"></span>
                                    @php
                                    if ($service->unit == 'fixed') {
                                        $price = $service->price;
                                    } else {
                                        $main_price = $hotels->sale_price
                                            ? $hotels->sale_price
                                            : $hotels->price;
                                        $price = ($main_price / 100) * $service->price;
                                    }
                                @endphp
                                <span
                                    class="price">{{ $service->price_type == 'one_time' ? currency_symbol() . $price : currency_symbol() . $price . ' /Per Person' }}
                                </span>
                                </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="single-total mb-30">
                    <span>{{ translate('Room') }}</span>
                    <ul>
                        <li><strong class="hotel_p">{{ currency_symbol() . $hotels->price }}</strong>
                            {{ translate('PRICE') }}</li>
                        <li><i class="bi bi-x-lg"></i></li>
                        <li><strong class="room_qty">01</strong> {{ translate('QTY') }}</li>
                        <li><i class="bi bi-x-lg"></i></li>
                        <li><strong class="days_show">01</strong> {{ translate('DAYS') }}</li>
                    </ul>
                    <div class="total_p">{{ currency_symbol() }}<span
                            class="atotal">{{ $hotels->price ?? 0 }}</span></div>
                </div>

                <div class="total-price"><span>{{ translate('Total Amount') }}:</span><span> {{ currency_symbol() }}<span
                        class="total_amount_show">{{ $hotels->price ?? 0 }}</span></span></div>
                <input type="hidden" name="total_amount" class="total_amount" value="{{ $hotels->price ?? 0 }}">
                    <button type="submit" class="primary-btn1 two">{{ translate('Book Now') }}</button>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
        <div class="sidebar-booking-form">
            @include('frontend.template-1.includes.booking_form')
        </div>
    </div>
</div>
@push('js')
    <script src="{{asset('frontend/js/hotel.js')}}"></script>
@endpush
