@extends('frontend.template-' . selectedTheme() . '.customer.partials.master')
@section('master')
    <div class="main-content">
        <div class="col-lg-12">
            <div class="tab-content" id="pills-tab2Content">
                <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                    <div class="recent-listing-area">
                        <div class="title-and-tab">
                            <h6>{{ $title }}</h6>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="recent-listing-table">
                                    <table class="eg-table2">
                                        <thead>
                                            <tr>
                                                <th>{{ translate('Date') }}</th>
                                                <th>{{ translate('Details') }}</th>
                                                <th>{{ translate('Gateway Amount') }}</th>
                                                <th>{{ translate('Amount') }}</th>
                                                <th>{{ translate('Tax') }}</th>
                                                <th>{{ translate('Method') }}</th>
                                                <th>{{ translate('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($transactions->count() > 0)
                                                @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td data-label="Date">{{ dateFormat($transaction->created_at) }}</td>
                                                        <td data-label="Details">{{ $transaction->payment_details }}</td>
                                                        <td class="text-uppercase" data-label="Amount">
                                                            {{ $transaction->currency . ' ' . $transaction->gateway_amount }}</td>
                                                        <td data-label="Wallet">{{ currency_symbol() . $transaction->amount }}</td>
                                                        <td data-label="Wallet">{{ currency_symbol() . $transaction->tax_amount }}</td>
                                                        <td data-label="Method">{{ Ucfirst($transaction->payment_method) }}</td>
                                                        <td data-label="Status">
                                                            @if ($transaction->status == 1)
                                                            <span class="pending">{{ translate('Processing') }}</span>
                                                            @elseif($transaction->status == 2)
                                                            <span class="confirmed">{{ translate('Confirmed') }}</span>
                                                            @else
                                                            <span class="rejected">{{ translate('Cancelled') }}</span>
                                                            @endif
                                                          </td>
                        
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">
                                                        <h5 class="data-not-found">{{ translate('No Data Found') }}</h5>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="pagination-area">
                                        {!! $transactions->links('vendor.pagination.custom') !!}
            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
