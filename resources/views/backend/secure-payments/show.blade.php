@extends('backend.partials.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ translate('Secure Payment Transaction Details') }}</h4>
                        <div class="card-tools">
                            <a href="{{ route('secure.payments.list') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> {{ translate('Back to List') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Transaction Information -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ translate('Transaction Information') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td><strong>{{ translate('Transaction ID') }}:</strong></td>
                                                <td>{{ $transaction->transaction_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Booking ID') }}:</strong></td>
                                                <td>{{ $transaction->booking_id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('External Transaction ID') }}:</strong></td>
                                                <td>{{ $transaction->external_transaction_id ?? translate('N/A') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Amount') }}:</strong></td>
                                                <td>{{ currency_symbol() }}{{ number_format($transaction->amount, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Currency') }}:</strong></td>
                                                <td>{{ $transaction->currency }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Payment Method') }}:</strong></td>
                                                <td>
                                                    <span class="badge badge-info">{{ ucfirst($transaction->payment_method) }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Status') }}:</strong></td>
                                                <td>
                                                    @if($transaction->status == 'paid')
                                                        <span class="badge badge-success">{{ translate('Paid') }}</span>
                                                    @elseif($transaction->status == 'pending')
                                                        <span class="badge badge-warning">{{ translate('Pending') }}</span>
                                                    @elseif($transaction->status == 'failed')
                                                        <span class="badge badge-danger">{{ translate('Failed') }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ translate('Cancelled') }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ translate('Created At') }}:</strong></td>
                                                <td>{{ $transaction->created_at->format('M d, Y H:i:s') }}</td>
                                            </tr>
                                            @if($transaction->paid_at)
                                            <tr>
                                                <td><strong>{{ translate('Paid At') }}:</strong></td>
                                                <td>{{ $transaction->paid_at->format('M d, Y H:i:s') }}</td>
                                            </tr>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- User Information -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ translate('User Information') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        @if($transaction->user)
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td><strong>{{ translate('Name') }}:</strong></td>
                                                    <td>{{ $transaction->user->fname }} {{ $transaction->user->lname }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ translate('Email') }}:</strong></td>
                                                    <td>{{ $transaction->user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ translate('Phone') }}:</strong></td>
                                                    <td>{{ $transaction->user->phone ?? translate('N/A') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ translate('Address') }}:</strong></td>
                                                    <td>{{ $transaction->user->address ?? translate('N/A') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>{{ translate('User ID') }}:</strong></td>
                                                    <td>{{ $transaction->user->id }}</td>
                                                </tr>
                                            </table>
                                        @else
                                            <p class="text-muted">{{ translate('User information not available') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Information -->
                        @if($transaction->order)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ translate('Order Information') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>{{ translate('Order Number') }}:</strong></td>
                                                        <td>{{ $transaction->order->order_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Product Type') }}:</strong></td>
                                                        <td>{{ ucfirst($transaction->order->product_type) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Adult Quantity') }}:</strong></td>
                                                        <td>{{ $transaction->order->adult_qty }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Child Quantity') }}:</strong></td>
                                                        <td>{{ $transaction->order->child_qty }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>{{ translate('Total Amount') }}:</strong></td>
                                                        <td>{{ currency_symbol() }}{{ number_format($transaction->order->total_amount, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Tax Amount') }}:</strong></td>
                                                        <td>{{ currency_symbol() }}{{ number_format($transaction->order->tax_amount, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Total with Tax') }}:</strong></td>
                                                        <td>{{ currency_symbol() }}{{ number_format($transaction->order->total_with_tax, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>{{ translate('Order Status') }}:</strong></td>
                                                        <td>
                                                            @if($transaction->order->status == 1)
                                                                <span class="badge badge-warning">{{ translate('Pending') }}</span>
                                                            @elseif($transaction->order->status == 2)
                                                                <span class="badge badge-info">{{ translate('Processing') }}</span>
                                                            @elseif($transaction->order->status == 3)
                                                                <span class="badge badge-success">{{ translate('Approved') }}</span>
                                                            @else
                                                                <span class="badge badge-danger">{{ translate('Cancelled') }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Payment Details -->
                        @if($transaction->payment_details)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ translate('Payment Details') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <pre class="bg-light p-3">{{ json_encode($transaction->payment_details, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Callback Data -->
                        @if($transaction->callback_data)
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>{{ translate('Callback Data') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <pre class="bg-light p-3">{{ json_encode($transaction->callback_data, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
