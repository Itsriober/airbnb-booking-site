@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    @include('frontend.template-' . selectedTheme() . '.breadcrumb.breadcrumb')
    <div class="thank-you-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="payment-success text-center">
                        <div class="check-mark">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h2 class="mt-4">{{ translate('Payment Successful!') }}</h2>
                        <p class="mt-3">{{ translate('Your payment has been processed successfully.') }}</p>
                        
                        <div class="receipt-card mt-5">
                            <div class="receipt-header border-bottom pb-3 mb-3">
                                <h4>{{ translate('Payment Receipt') }}</h4>
                                <p class="text-muted mb-0">{{ translate('Order') }} #{{ $order->order_number }}</p>
                                <p class="text-muted mb-0">{{ translate('Date') }}: {{ dateFormat($secureTransaction->paid_at) }}</p>
                            </div>
                            
                            <div class="receipt-details">
                                <div class="row mb-3">
                                    <div class="col-6 text-start">{{ translate('Amount Paid') }}:</div>
                                    <div class="col-6 text-end"><strong>{{ currency_symbol() }}{{ number_format($secureTransaction->amount, 2) }}</strong></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 text-start">{{ translate('Payment Method') }}:</div>
                                    <div class="col-6 text-end">{{ translate('Secure Payment') }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 text-start">{{ translate('Transaction ID') }}:</div>
                                    <div class="col-6 text-end">{{ $secureTransaction->transaction_id }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6 text-start">{{ translate('Status') }}:</div>
                                    <div class="col-6 text-end">
                                        <span class="badge bg-success">{{ translate('PAID') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="receipt-footer border-top pt-3 mt-3">
                                <h5>{{ translate('Booking Details') }}</h5>
                                <p class="mb-1">{{ $order->product_type == 'hotel' ? translate('Room') : translate('Adult') }}: {{ currency_symbol() }}{{ $order->adult_unit_price }} x {{ $order->adult_qty }}</p>
                                @if($order->child_qty > 0)
                                    <p class="mb-1">{{ translate('Child') }}: {{ currency_symbol() }}{{ $order->child_unit_price }} x {{ $order->child_qty }}</p>
                                @endif
                                @if($order->tax_amount > 0)
                                    <p class="mb-1">{{ translate('Tax') }}: {{ currency_symbol() }}{{ $order->tax_amount }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="action-buttons mt-4">
                            <a href="{{ route('customer.booking') }}" class="primary-btn1">
                                {{ translate('View My Bookings') }}
                            </a>
                            <a href="{{ route('home.page') }}" class="primary-btn1 outline">
                                {{ translate('Return to Home') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .receipt-card {
        background: #fff;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
    }
    .action-buttons a {
        min-width: 200px;
    }
</style>
@endpush
