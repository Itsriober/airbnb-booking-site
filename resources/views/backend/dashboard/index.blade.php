@extends('backend.layouts.master')
@section('content')
<div class="row mb-35 g-4">
    <div class="col-md-6">
        <div class="page-title text-md-start">
            <h4>{{ $page_title ?? '' }}</h4>
        </div>
    </div>
</div>
<div class="row d-flex justify-content-center g-4">
    <div class="col">
        <div class="eg-card-two green-teal">
            <h5 class="title">{{ translate('Total Sales') }}</h5>
            <h2 class="number">{{ $data['total_sales'] ? currency_symbol().number_format($data['total_sales'], 2) : '0' }}</h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two primary">
            <h5 class="title">{{ translate('Total Orders') }}</h5>
            <h2 class="number">{{ $data['total_orders'] ?? 0 }}</h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two orange">
            <h5 class="title">{{ translate('Total Tax Collected') }}</h5>
            <h2 class="number">{{ $data['total_tax'] ? currency_symbol().number_format($data['total_tax'], 2) : '0' }}</h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two pink">
            <h5 class="title">{{ translate('Total Customers') }}</h5>
            <h2 class="number">{{ $data['total_customers'] ?? 0 }}</h2>
        </div>
    </div>
    <div class="col">
        <div class="eg-card-two blue">
            <h5 class="title">{{ translate('Total Merchants') }}</h5>
            <h2 class="number">{{ $data['total_merchants'] ?? 0 }}</h2>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="eg-card-two">
            <h5 class="title">{{ translate('Sales by Product Type') }}</h5>
            <ul class="list-group">
                <li class="list-group-item">{{ translate('Tours') }}: <strong>{{ currency_symbol().number_format($data['tour_sales'], 2) }}</strong></li>
                <li class="list-group-item">{{ translate('Hotels') }}: <strong>{{ currency_symbol().number_format($data['hotel_sales'], 2) }}</strong></li>
                <li class="list-group-item">{{ translate('Activities') }}: <strong>{{ currency_symbol().number_format($data['activities_sales'], 2) }}</strong></li>
                <li class="list-group-item">{{ translate('Transport') }}: <strong>{{ currency_symbol().number_format($data['transport_sales'], 2) }}</strong></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="eg-card-two">
            <h5 class="title">{{ translate('Order Status Breakdown') }}</h5>
            <ul class="list-group">
                <li class="list-group-item">{{ translate('Pending') }}: <strong>{{ $data['orders_pending'] }}</strong></li>
                <li class="list-group-item">{{ translate('Processing') }}: <strong>{{ $data['orders_processing'] }}</strong></li>
                <li class="list-group-item">{{ translate('Approved') }}: <strong>{{ $data['orders_approved'] }}</strong></li>
                <li class="list-group-item">{{ translate('Cancelled') }}: <strong>{{ $data['orders_cancelled'] }}</strong></li>
            </ul>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="table-wrapper">
            <h5>{{ translate('Latest Bookings') }}</h5>
            <table class="eg-table table">
                <thead>
                    <tr>
                        <th>{{ translate('Booking Number') }}</th>
                        <th>{{ translate('Product') }}</th>
                        <th>{{ translate('Type') }}</th>
                        <th>{{ translate('Customer Name') }}</th>
                        <th>{{ translate('Email / Phone') }}</th>
                        <th>{{ translate('Quantity') }}</th>
                        <th>{{ translate('Amount') }}</th>
                        <th>{{ translate('Date') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data['recent_orders']->count() > 0)
                        @foreach ($data['recent_orders'] as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>
                                    @if ($order->product_type == 'tour')
                                        {{ $order->tours?->title }}
                                    @elseif ($order->product_type == 'hotel')
                                        {{ $order->hotels?->title }}
                                    @elseif ($order->product_type == 'activities')
                                        {{ $order->activities?->title }}
                                    @elseif ($order->product_type == 'transport')
                                        {{ $order->transports?->title }}
                                    @endif
                                </td>
                                <td>{{ ucfirst($order->product_type) }}</td>
                                <td>
                                    <a href="{{ route('customer.view', $order->user_id) }}" target="_blank">
                                        {{ $order->users?->fname ? $order->users?->fname . ' ' . $order->users?->lname : '' }}
                                    </a>
                                </td>
                                <td>
                                    <a href="mailto:{{ $order->users->email }}">{{ $order->users->email }}</a><br>
                                    <a href="tel:{{ $order->users->phone }}">{{ $order->users->phone }}</a>
                                </td>
                                <td>{{ $order->adult_qty + $order->child_qty }}</td>
                                <td>{{ currency_symbol().number_format($order->total_with_tax, 2) }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="8">{{ translate('No bookings found.') }}</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
