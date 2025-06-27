@extends('backend.partials.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ translate('Secure Payment Transactions') }}</h4>
                        <div class="card-tools">
                            <a href="{{ route('secure.payments.export', request()->query()) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-download"></i> {{ translate('Export CSV') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Filters -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <form method="GET" action="{{ route('secure.payments.list') }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="status" class="form-control">
                                                <option value="">{{ translate('All Status') }}</option>
                                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ translate('Pending') }}</option>
                                                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>{{ translate('Paid') }}</option>
                                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>{{ translate('Failed') }}</option>
                                                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>{{ translate('Cancelled') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="payment_method" class="form-control">
                                                <option value="">{{ translate('All Payment Methods') }}</option>
                                                <option value="paygate" {{ request('payment_method') == 'paygate' ? 'selected' : '' }}>{{ translate('PayGate') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="search" class="form-control" placeholder="{{ translate('Search by Booking ID or Transaction ID') }}" value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">{{ translate('Filter') }}</button>
                                            <a href="{{ route('secure.payments.list') }}" class="btn btn-secondary">{{ translate('Reset') }}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5>{{ $transactions->where('status', 'paid')->count() }}</h5>
                                        <p class="mb-0">{{ translate('Successful Payments') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-warning text-white">
                                    <div class="card-body">
                                        <h5>{{ $transactions->where('status', 'pending')->count() }}</h5>
                                        <p class="mb-0">{{ translate('Pending Payments') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                        <h5>{{ $transactions->where('status', 'failed')->count() }}</h5>
                                        <p class="mb-0">{{ translate('Failed Payments') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>{{ currency_symbol() }}{{ number_format($transactions->where('status', 'paid')->sum('amount'), 2) }}</h5>
                                        <p class="mb-0">{{ translate('Total Revenue') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transactions Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ translate('Transaction ID') }}</th>
                                        <th>{{ translate('Booking ID') }}</th>
                                        <th>{{ translate('User') }}</th>
                                        <th>{{ translate('Amount') }}</th>
                                        <th>{{ translate('Status') }}</th>
                                        <th>{{ translate('Payment Method') }}</th>
                                        <th>{{ translate('Date') }}</th>
                                        <th>{{ translate('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->transaction_id }}</td>
                                            <td>
                                                <a href="{{ route('secure.payments.details', $transaction->id) }}" class="text-primary">
                                                    {{ $transaction->booking_id }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($transaction->user)
                                                    {{ $transaction->user->fname }} {{ $transaction->user->lname }}<br>
                                                    <small class="text-muted">{{ $transaction->user->email }}</small>
                                                @else
                                                    <span class="text-muted">{{ translate('User not found') }}</span>
                                                @endif
                                            </td>
                                            <td>{{ currency_symbol() }}{{ number_format($transaction->amount, 2) }}</td>
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
                                            <td>
                                                <span class="badge badge-info">{{ ucfirst($transaction->payment_method) }}</span>
                                            </td>
                                            <td>
                                                {{ $transaction->created_at->format('M d, Y H:i') }}<br>
                                                @if($transaction->paid_at)
                                                    <small class="text-success">{{ translate('Paid') }}: {{ $transaction->paid_at->format('M d, Y H:i') }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('secure.payments.details', $transaction->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i> {{ translate('View') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">{{ translate('No transactions found') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $transactions->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
