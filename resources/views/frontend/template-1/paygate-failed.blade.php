@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    @include('frontend.template-' . selectedTheme() . '.breadcrumb.breadcrumb')
    <div class="payment-failed-section pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="payment-failed text-center">
                        <div class="error-mark">
                            <i class="bi bi-x-circle-fill text-danger" style="font-size: 5rem;"></i>
                        </div>
                        <h2 class="mt-4">{{ translate('Payment Failed') }}</h2>
                        <p class="mt-3">{{ translate('We were unable to process your payment. Please try again.') }}</p>
                        
                        @if($order)
                        <div class="failed-details-card mt-5">
                            <div class="card-body">
                                <h5>{{ translate('Booking Details') }}</h5>
                                <p class="mb-1">{{ translate('Order Number') }}: #{{ $order->order_number }}</p>
                                <p class="mb-1">{{ translate('Amount') }}: {{ currency_symbol() }}{{ number_format($order->total_with_tax, 2) }}</p>
                                
                                <div class="alert alert-warning mt-4">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                    {{ translate('Your booking is pending until payment is completed.') }}
                                </div>
                                
                                <div class="retry-options mt-4">
                                    <h6>{{ translate('What would you like to do?') }}</h6>
                                    <div class="action-buttons mt-3">
                                        <a href="{{ route('checkout') }}" class="primary-btn1">
                                            <i class="bi bi-arrow-repeat"></i> {{ translate('Try Payment Again') }}
                                        </a>
                                        <a href="{{ route('customer.booking') }}" class="primary-btn1 outline">
                                            {{ translate('View My Bookings') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div class="help-section mt-5">
                            <h5>{{ translate('Need Help?') }}</h5>
                            <p>{{ translate('If you continue to experience issues, please contact our support team.') }}</p>
                            <a href="{{ route('home.page') }}" class="primary-btn1 mt-3">
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
    .failed-details-card {
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
    .alert {
        border-radius: 8px;
    }
    .help-section {
        color: #666;
    }
</style>
@endpush
