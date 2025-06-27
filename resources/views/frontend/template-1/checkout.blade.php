@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    @include('frontend.template-' . selectedTheme() . '.breadcrumb.breadcrumb')
    <div class="checkout-page pt-120 mb-120">
        <div class="container">
            <form action="{{ route('customer.payment.method') }}" method="POST" class="require-validation"
                data-cc-on-file-modal="false" data-stripe-publishable-key="{{ get_payment_method('stripe_key') }}"
                id="payment-form">
                @csrf
                <input type="hidden" name="current_url" value="{{ URL::full() }}">
                <input type="hidden" name="type" value="2">
                <div id="razorScript">

                </div>
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-6">
                        <div class="inquiry-form">
                            <div class="title">
                                <h4>{{ translate('Billing Information') }}</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('First Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name"
                                            value="{{ old('first_name', $loginUser->fname) }}" placeholder="Jackson">
                                        @error('first_name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Last Name') }}</label>
                                        <input type="text" name="last_name"
                                            value="{{ old('last_name', $loginUser->lname) }}" placeholder="Mile">
                                        @error('last_name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Phone') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone', $loginUser->phone) }}"
                                            placeholder="Ex- +880-13* ** ***">
                                        @error('phone')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email', $loginUser->email) }}"
                                            placeholder="Ex- info@gmail.com">
                                        @error('email')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Address') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="address"
                                            value="{{ old('address', $loginUser->address) }}"
                                            placeholder="{{ translate('Dhaka, Bangladesh') }}">
                                        @error('address')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Street Address') }}</label>
                                        <input type="text" name="street_address" value="{{ old('street_address') }}"
                                            placeholder="{{ translate('Your Street') }}">
                                        @error('street_address')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Postal Code') }}</label>
                                        <input type="text" name="postal_code"
                                            value="{{ old('postal_code', $loginUser->zip_code) }}"
                                            placeholder="{{ translate('City Postal') }}">
                                        @error('postal_code')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-30">
                                        <label>{{ translate('Short Notes') }}</label>
                                        <textarea name="notes" placeholder="{{ translate('Write Something') }}...">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inquiry-form">
                            <div class="title">
                                <h4>{{ translate('Order Summary') }}</h4>
                            </div>
                            <form>
                                <div class="cart-menu">
                                    <div class="cart-body">
                                        @if ($singleProduct)
                                            <ul>
                                                <li class="single-item">
                                                    <div class="item-area">
                                                        <div class="main-item">
                                                            @if ($singleProduct->features_image)
                                                                <div class="item-img">
                                                                    <img src="{{ 'uploads/tour/features/' . $singleProduct->features_image }}"
                                                                        alt="{{ $singleProduct->title }}">
                                                                </div>
                                                            @endif
                                                            <div class="content-and-quantity">
                                                                <div class="content">
                                                                    <h6>
                                                                        <a
                                                                            href="{{ '' . $customer_cart['product_type'] . '/' . $singleProduct->slug . '' }}">
                                                                            {{ $singleProduct->title }}
                                                                        </a>
                                                                    </h6>
                                                                    <div
                                                                        class="mt-3 price-and-btn d-flex align-items-center justify-content-between">
                                                                        <span>{{ $customer_cart['product_type'] == 'hotel' ? translate('Room') : translate('Adult') }}:
                                                                            {{ currency_symbol() }}{{ $customer_cart['adult_unit_sale_price'] ? $customer_cart['adult_unit_sale_price'] : $customer_cart['adult_unit_price'] }}
                                                                            x {{ $quantity }} @if ($customer_cart['product_type'] == 'hotel')
                                                                                x {{ $customer_cart['days'] . ' days' }}
                                                                            @endif
                                                                        </span>
                                                                        @php
                                                                            if (
                                                                                $customer_cart['product_type'] ==
                                                                                'hotel'
                                                                            ) {
                                                                                $price =
                                                                                    $price * $customer_cart['days'];
                                                                            } else {
                                                                                $price = $price;
                                                                            }
                                                                        @endphp
                                                                        <span>{{ currency_symbol() . $price }}</span>
                                                                    </div>
                                                                    @if (isset($customer_cart['child_qty']) &&
                                                                            $customer_cart['child_qty'] > 0 &&
                                                                            isset($customer_cart['child_unit_price']) &&
                                                                            $customer_cart['child_unit_price'] > 0)
                                                                        <div
                                                                            class="mt-3 price-and-btn d-flex align-items-center justify-content-between">
                                                                            <span>{{ translate('Child') }}:
                                                                                {{ currency_symbol() . $customer_cart['child_unit_price'] }}
                                                                                x {{ $customer_cart['child_qty'] }}</span>
                                                                            <span>{{ currency_symbol() . $customer_cart['child_price'] }}</span>
                                                                        </div>
                                                                    @endif


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="cart-footer">
                                        <div class="pricing-area">
                                            <ul>
                                                <li><span>{{ translate('Sub Total') }}</span><span>{{ currency_symbol() }}{{ $price + $customer_cart['child_price'] }}</span>
                                                </li>
                                                @if (isset($customer_cart['services_list']) && $customer_cart['services_list'])
                                                    @php
                                                        $services = json_decode($singleProduct->service_fees);
                                                    @endphp
                                                    @foreach ($services as $key => $val)
                                                        @if (in_array($key, $customer_cart['services_list']))
                                                            @php
                                                                if ($val->unit == 'fixed') {
                                                                    if ($val->price_type == 'per_person') {
                                                                        $value =
                                                                            $val->price *
                                                                            ($customer_cart['quantity'] +
                                                                                $customer_cart['child_qty']);
                                                                    } else {
                                                                        $value = $val->price;
                                                                    }
                                                                } else {
                                                                    if ($val->price_type == 'per_person') {
                                                                        if ($customer_cart['adult_unit_sale_price']) {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart[
                                                                                    'adult_unit_sale_price'
                                                                                ] *
                                                                                $customer_cart['quantity'];
                                                                        } else {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_price'] *
                                                                                $customer_cart['quantity'];
                                                                        }
                                                                        $cvalue =
                                                                            ($val->price / 100) *
                                                                            $customer_cart['child_unit_price'] *
                                                                            $customer_cart['child_qty'];

                                                                        $value = $avalue + $cvalue;
                                                                    } else {
                                                                        if ($customer_cart['adult_unit_sale_price']) {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_sale_price'];
                                                                        } else {
                                                                            $avalue =
                                                                                ($val->price / 100) *
                                                                                $customer_cart['adult_unit_price'];
                                                                        }
                                                                        $cvalue =
                                                                            ($val->price / 100) *
                                                                            $customer_cart['child_unit_price'];

                                                                        $value = $avalue + $cvalue;
                                                                    }
                                                                }
                                                            @endphp
                                                            <li><span>{{ $val->name }}</span><span>{{ currency_symbol() . $value }}</span>
                                                            </li>
                                                            <input type="hidden"
                                                                name="services[{{ $key }}][name]"
                                                                value="{{ $val->name }}">
                                                            <input type="hidden"
                                                                name="services[{{ $key }}][price]"
                                                                value="{{ $value }}">
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @php
                                                    if (get_setting('tax_rate') > 0) {
                                                        $tax_rate = get_setting('tax_rate');
                                                        $tax_amount =
                                                            ($customer_cart['total_amount'] / 100) *
                                                            get_setting('tax_rate');
                                                        $total_with_tax = $customer_cart['total_amount'] + $tax_amount;
                                                    } else {
                                                        $tax_rate = 0;
                                                        $tax_amount = 0;
                                                        $total_with_tax = $customer_cart['total_amount'];
                                                    }
                                                @endphp
                                                <li><span>{{ translate('Tax') . ' (' . $tax_rate . '%)' }}
                                                    </span><span>{{ $tax_amount }}</span></li>
                                                <input type="hidden" name="tax_amount" value="{{ $tax_amount }}">
                                                <input type="hidden" name="tax_rate" value="{{ $tax_rate }}">
                                            </ul>
                                            <ul class="total">
                                                <input type="hidden" name="total_with_tax"
                                                    value="{{ number_format($total_with_tax, 2) }}">
                                                <li><span>{{ translate('Total') }}</span><span>{{ currency_symbol() . $total_with_tax }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="choose-payment-method">
                                            <h6>{{ translate('Select Payment Method') }}</h6>
                                            @if ($payment_methods)
                                                <input type="hidden" name="payment_method" class="payment_method"
                                                    value="{{ $payment_methods[0]->method_name }}">
                                                <div class="payment-option">
                                                    <ul>
                                                        @foreach ($payment_methods as $key => $payment_method)
                                                            <li class="{{ $payment_method->method_name }} {{ $key == 0 ? 'active' : '' }} payment-method-item" data-method="{{ $payment_method->method_name }}">
                                                            @if($payment_method->method_name === 'crypto')
                                                                <img src="{{ asset('uploads/payment_methods/crypto.png') }}" alt="Crypto Payment" style="height:32px;">
                                                                <span class="ms-2">Pay with Crypto</span>
                                                            @else
                                                                <img src="{{ asset('uploads/payment_methods/' . $payment_method->default_logo) }}" alt="{{ $payment_method->method_name }}">
                                                            @endif
                                                                <div class="checked">
                                                                    <i class="bi bi-check"></i>
                                                                </div>
                                                                @if($payment_method->method_name === 'crypto')
                                                                    <span class="badge bg-info ms-2">Secure Payment</span>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            
                                            {{-- Crypto Proceed Button --}}
                                            <div class="pt-25" id="CryptoPayment" style="display: none;">
                                                <div class="alert alert-info">
                                                    <i class="bi bi-shield-check"></i> You will be redirected to our secure payment gateway to complete your transaction.
                                                </div>
                                                <button type="submit" class="primary-btn1 w-100" id="crypto-submit">
                                                    <i class="bi bi-shield-lock"></i> Proceed to Secure Checkout
                                                </button>
                                                <div class="text-danger mt-2" id="crypto-error" style="display:none;"></div>
                                            </div>
                                            
                                            {{-- Stripe Payment Section --}}
                                            <div class="pt-25 payment-option-hide mt-30" id="StripePayment" style="display: none;">
                                                <div class="row g-4">
                                                    <div class="col-lg-12">
                                                        <div class="form-inner">
                                                            <label>{{ translate('Card Number') }}</label>
                                                            <input type="text" name="card_number" class="card-number"
                                                                placeholder="1234 1234 1234 1234" maxlength="16">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-inner">
                                                            <label>{{ translate('Expiry Month') }}</label>
                                                            <input type="text" name="expiry_month" class="card-expiry-month"
                                                                placeholder="MM" maxlength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-inner">
                                                            <label>{{ translate('Expiry Year') }}</label>
                                                            <input type="text" name="expiry_year" class="card-expiry-year"
                                                                placeholder="YY" maxlength="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-inner">
                                                            <label>{{ translate('CVC') }}</label>
                                                            <input type="text" name="cvc" class="card-cvc"
                                                                placeholder="123" maxlength="4">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-inner" id="DefaultPlaceOrder">
                                                <button class="primary-btn1" type="submit">{{ translate('Place Order') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="balance-content">
        @include('frontend.template-1.partials.payment_modal')
    </div>
    @push('js')
        <script src="{{ asset('frontend/js/payment.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Initialize first payment method
                var firstMethod = $('.payment-method-item:first').data('method');
                if (firstMethod === 'crypto') {
                    $('#CryptoPayment').show();
                    $('#DefaultPlaceOrder').hide();
                    $('#StripePayment').hide();
                } else if (firstMethod === 'stripe') {
                    $('#StripePayment').show();
                    $('#CryptoPayment').hide();
                    $('#DefaultPlaceOrder').show();
                } else {
                    $('#CryptoPayment').hide();
                    $('#StripePayment').hide();
                    $('#DefaultPlaceOrder').show();
                }

                $('.payment-method-item').on('click', function() {
                    var method = $(this).data('method');
                    $('.payment-method-item').removeClass('active');
                    $(this).addClass('active');
                    $('.payment_method').val(method);
                    
                    if (method === 'crypto') {
                        $('#CryptoPayment').show();
                        $('#DefaultPlaceOrder').hide();
                        $('#StripePayment').hide();
                    } else if (method === 'stripe') {
                        $('#StripePayment').show();
                        $('#CryptoPayment').hide();
                        $('#DefaultPlaceOrder').show();
                    } else {
                        $('#CryptoPayment').hide();
                        $('#StripePayment').hide();
                        $('#DefaultPlaceOrder').show();
                    }
                });

                // Crypto form validation
                $('#crypto-submit').on('click', function(e) {
                    var missing = [];
                    if (!$('input[name="first_name"]').val().trim()) missing.push('First Name');
                    if (!$('input[name="last_name"]').val().trim()) missing.push('Last Name');
                    if (!$('input[name="address"]').val().trim()) missing.push('Address');
                    if (!$('input[name="phone"]').val().trim()) missing.push('Phone');
                    if (!$('input[name="email"]').val().trim()) missing.push('Email');
                    
                    if (missing.length > 0) {
                        e.preventDefault();
                        $('#crypto-error').text('Please fill in the following required fields: ' + missing.join(', ')).show();
                        return false;
                    } else {
                        $('#crypto-error').hide();
                        // Show loading state
                        $(this).html('<i class="bi bi-hourglass-split"></i> Redirecting to Secure Payment...').prop('disabled', true);
                    }
                });
            });
        </script>
    @endpush
@endsection
