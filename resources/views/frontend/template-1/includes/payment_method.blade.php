@if(payment_methods())
<div class="booking-form-item-type payment-method-section">
    <h5>{{ translate('Payment Method') }}</h5>
    <div class="checkbox-container">
        @foreach (payment_methods() as $item)
                <label class="check-container"><img class="payment-img" src="{{asset('uploads/payment_methods/'.$item->default_logo)}}" alt="{{$item->method_name}}">
                    <input type="radio" class="services_check_payment extra_services_check"

                    <span class="checkmark"></span>
                </label>
        @endforeach
    </div>
</div>
@endif