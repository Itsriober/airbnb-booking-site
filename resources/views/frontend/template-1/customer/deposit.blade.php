@extends('frontend.template-' . selectedTheme() . '.customer.partials.master')
@section('master')
    <div class="main-content">
        <div class="col-lg-12">

            <div class="tab-content" id="pills-tab2Content">
                <div class="tab-pane fade show active" id="tour" role="tabpanel" aria-labelledby="tour-tab">
                    <div class="recent-listing-area">
                        <div class="title-and-tab">
                            <div class="table-title-area">
                                <button type="button" class="btn btn-primary border-0" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal"><i class="bi bi-wallet2"></i>
                                    {{ translate('Add Fund') }}</button>
                            </div>
                            <form action="" method="get">
                                <select id="order-category" class="paginate_filter" name="search">
                                    <option value="5">{{ translate('Show: Last 05 Order') }}</option>
                                    <option value="10">{{ translate('Show: Last 10 Order') }}</option>
                                    <option value="15">{{ translate('Show: Last 15 Order') }}</option>
                                    <option value="20">{{ translate('Show: Last 20 Order') }}</option>
                                </select>
                            </form>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <div class="recent-listing-table">
                                    <table class="eg-table2">
                                        <thead>
                                            <tr>
                                                <th>{{ translate('Date') }}</th>
                                                <th>{{ translate('Method') }}</th>
                                                <th>{{ translate('Transaction ID') }}</th>
                                                <th>{{ translate('Currency') }}</th>
                                                <th>{{ translate('Amount') }}</th>
                                                <th>{{ translate('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($deposits->count() > 0)
                                                @foreach ($deposits as $deposit)
                                                    <tr>
                                                        <td data-label="Date">{{ dateFormat($deposit->created_at) }}</td>
                                                        <td data-label="Method">{{ Ucfirst($deposit->payment_method) }}
                                                        </td>
                                                        <td data-label="Transaction ID">{{ $deposit->transaction_id }}</td>
                                                        <td class="text-uppercase" data-label="Currency">
                                                            {{ $deposit->currency }}</td>
                                                        <td data-label="Amount">{{ currency_symbol() . $deposit->total_amount }}
                                                        </td>
                                                        <td data-label="Status">
                                                            @if ($deposit->status == 1)
                                                                <span
                                                                    class="text-warning">{{ translate('Processing') }}</span>
                                                            @elseif($deposit->status == 2)
                                                                <span
                                                                class="text-green">{{ translate('Completed') }}</span>@else<span
                                                                    class="text-red">{{ translate('Cancel') }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6">
                                                        <h5 class="data-not-found" style="text-align: center">{{ translate('Yoo! Nothings Here Bruhv') }}</h5>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <div class="pagination-area">
                                        {!! $deposits->links('vendor.pagination.custom') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="balance-content order-details">
        @include('frontend.template-' . selectedTheme() . '.partials.payment_modal')
    </div>
@endsection
