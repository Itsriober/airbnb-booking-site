@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35 g-4">
        <div class=" col-md-3">
            <div class="page-title text-md-start text-left">
                <h4>{{ $page_title }}</h4>
            </div>
        </div>
        <div
            class="col-md-9 d-flex justify-content-md-end justify-content-center flex-row align-items-center flex-wrap gap-4">
            <a href="{{ route('backend.order.info') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="eg-card product-card printArea" id="printArea">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="logo-and-invoice-info">
                            <div class="company-logo">
                                @if (fileExists('assets/logo/', get_setting('invoice_logo')) != false)
                                    <img src="{{ asset('assets/logo/' . get_setting('invoice_logo')) }}" alt="Invoice Logo"
                                        height="100">
                                @else
                                    <img src="{{ asset('assets/logo/invoice-logo.png') }}" alt="Invoice Logo"
                                        height="100">
                                @endif
                            </div>
                            <div class="invoice-info">
                                <b>{{ translate('Invoice Number') }} {{ '#' . $order->order_number }}</b><br>
                                <b>{{ translate('Date') }}:</b> {{ dateFormat($order->created_at) }}<br>
                                <b>{{ translate('Payment Method') }}:</b>
                                {{ ucfirst($order->wallets->payment_method ?? '') }}<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bill-info">
                            <div class="invoice-col">
                                <span>{{ translate('From') }}</span>
                                <address>
                                    <h5><strong class="company-name">{{ get_setting('company_name') }}</strong></h5>
                                    <p>{{ get_setting('company_address') }}</p>
                                    <p><span>{{ translate('Phone') }}:</span>
                                        {{ get_setting('company_phone1') ?? get_setting('company_phone2') }}</p>
                                    <p> <span>{{ translate('Email') }}:</span>
                                        {{ get_setting('company_email1') ?? get_setting('company_email2') }}</p>
                                </address>
                            </div>

                            <div class="invoice-col">
                                <span>{{ translate('Billing To') }}</span>
                                <address>
                                    <p><strong
                                            class="company-name">{{ $order->users?->fname . ' ' . $order->users?->lname }}</strong>
                                    </p>
                                    <p>
                                        {{ $order->users?->address ?? '' }}{{ ', ' . $order->users?->cities?->name ?? '' }}{{ ', ' . $order->users?->zip_code ?? '' }}{{ ', ' . $order->users?->countries?->name ?? '' }}
                                    </p>
                                    <p><span>{{ translate('Phone') }}:</span> {{ $order->users->phone ?? '' }}</p>
                                    <p><span>{{ translate('Email') }}:</span> {{ $order->users->email ?? '' }}</p>
                                </address>
                            </div>
                            @if ($order->shipping_first_name && $order->shipping_last_name && $order->shipping_address)
                                <div class="invoice-col">
                                    <span>{{ translate('Shipping To') }}</span>
                                    <address>
                                        <p><strong
                                                class="company-name">{{ $order->shipping_first_name . ' ' . $order->shipping_last_name }}</strong>
                                        </p>
                                        <p> {{ $order->shipping_address ?? '' }}{{ ', ' . $order->shipping_cities->name ?? '' }}{{ ', ' . $order->shipping_states->name ?? '' }}{{ ', ' . $order->shipping_post_code ?? '' }}{{ ', ' . $order->shipping_countries->name ?? '' }}
                                        </p>
                                        <p><span>{{ translate('Phone') }}:</span> {{ $order->shipping_phone ?? '' }}</p>
                                        <p><span>{{ translate('Email') }}:</span> {{ $order->shipping_email ?? '' }}</p>
                                    </address>
                                </div>
                            @endif
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-12 table-responsive">
                            <table class="eg-table table table-striped invoice-table">
                                <thead>
                                    <tr>
                                        <th width="50%">{{ translate('Product') }}</th>
                                        <th width="10%">{{ $order->product_type == 'hotel' ? translate('Room') : translate('Adult') }}</th>
                                        <th width="20%">
                                            {{ $order->product_type == 'hotel' ? translate('Guest Capacity') : translate('Child') }}</th>
                                        <th width="20%">{{ translate('Subtotal') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td data-label="Product">
                                            @if ($order->product_type == 'tour')
                                                {{ $order->tours?->title }}
                                            @elseif ($order->product_type == 'hotel')
                                                {{ $order->hotels?->title }}
                                            @elseif ($order->product_type == 'activities')
                                                {{ $order->activities?->title }}
                                            @elseif ($order->product_type == 'transports')
                                                {{ $order->transports?->title }}
                                            @endif
                                        </td>
                                        <td data-label="Adult">
                                            {{ currency_symbol() . $order->adult_unit_price . ' x ' . $order->adult_qty }}
                                        </td>
                                        <td data-label="Child">
                                            {{ $order->product_type == 'hotel' ? $order->child_qty : currency_symbol() . $order->child_unit_price . ' x ' . $order->child_qty }}
                                        </td>
                                        <td data-label="Subtotal">
                                            {{ currency_symbol() . ($order->adult_total_price + $order->child_total_price) }}
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    @php
                                        $services = json_decode($order->services);
                                    @endphp
                                    @if ($services)
                                        @foreach ($services as $service)
                                            <tr>
                                                <td data-label="Service Name" colspan="3" class="text-end">
                                                    {{ $service->name }}</td>
                                                <td data-label="Service Price">{{ currency_symbol() . $service->price }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td data-label="Tax" colspan="3" class="text-end">{{ translate('Tax') }}
                                            ({{ get_setting('tax_rate') }}%)</td>
                                        <td data-label="Tax">{{ currency_symbol() . $order->tax_amount }}</td>
                                    </tr>
                                    <tr class="total">
                                        <td data-label="Total" colspan="3" class="text-end">{{ translate('Total') }}
                                        </td>
                                        <td data-label="Total"><strong>
                                                {{ currency_symbol() }}{{ $order->total_with_tax }}</strong></td>
                                    </tr>
                                    <tr class="Note">
                                        <td data-label="Note" colspan="4" class="text-start">
                                            <strong>{{ translate('Note') }}:</strong>
                                            {{ $order->notes }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mb-25">
        <div class="col-12">
            <button class="eg-btn btn--green" onclick="printDiv()"><i class="bi bi-printer"></i>
                {{ translate(' Print Invoice') }}</button>
            <button class="eg-btn btn--primary" onclick="createPDF('{{ $order->order_number }}')">
                {{ translate(' Download Invoice') }}</button>
        </div>
    </div>
@endsection
