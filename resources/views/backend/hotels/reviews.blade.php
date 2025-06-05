@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35 g-4">
        <div class="col-md-9">
            <div class="page-title text-md-start">
                <h4>{{ $page_title ?? '' }}</h4>
            </div>
        </div>
        <div
            class="col-md-3 text-md-end text-center d-flex justify-content-md-end justify-content-center flex-row align-items-center flex-wrap gap-4">
            <a href="{{ route('hotels.list') }}" class="eg-btn btn--primary back-btn"> <img
                    src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                {{ translate('Go Back') }}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-wrapper">
                <table class="eg-table table customer-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Customer') }}</th>
                            <th>{{ translate('Email / Phone') }}</th>
                            <th>{{ translate('Rate') }}</th>
                            <th>{{ translate('Review') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Date') }}</th>
                            <th>{{ translate('Reply') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($hotelReviews->count() > 0)
                            @foreach ($hotelReviews as $key => $hotelReview)
                                <tr>
                                    <td data-label="S.N">
                                        {{ ($hotelReviews->currentpage() - 1) * $hotelReviews->perpage() + $key + 1 }}</td>
                                    <td data-label="Customer" class="text-start"><a
                                            href="{{ route('customer.view', $hotelReview->users->id) }}">{{ $hotelReview->users->fname . ' ' . $hotelReview->users->lname }}<br><span
                                                class="text-purple">{{ '@' . $hotelReview->users->username }}</span></a></td>
                                    <td data-label="Email / Phone"> <a
                                            href="mailto:{{ $hotelReview->users->email }}">{{ $hotelReview->users->email }}</a>
                                        <br><a href="tel:{{ $hotelReview->users->phone }}"
                                            class="phone">{{ $hotelReview->users->phone }}</a></td>
                                    <td data-label="Rate" class="text-center">
                                        <ul class="rating-star text-center">
                                            @switch($hotelReview->rate)
                                                @case(1)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(1.5)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(2)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(2.5)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(3)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(3.5)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(4)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star"></i></li>
                                                @break

                                                @case(4.5)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-half"></i></li>
                                                @break

                                                @default
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                    <li><i class="bi bi-star-fill"></i></li>
                                            @endswitch
                                        </ul>
                                    </td>
                                    <td data-label="Review" class="text-center">{{ $hotelReview->review }}</td>
                                    <td data-label="Status">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $hotelReview->status }}"
                                                data-id="{{ $hotelReview->id }}" data-type="hotelsReview"
                                                id="flexSwitchCheckStatus{{ $hotelReview->id }}"
                                                {{ $hotelReview->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </td>

                                    <td data-label="Date">
                                        <p class="mb-0">{{ date('d.m.Y', strtotime($hotelReview->created_at)) }}</p>
                                        <span
                                            class="time">{{ date('h.i A', strtotime($hotelReview->created_at)) }}</span>
                                    </td>
                                    <td data-label="Reply">
                                        @if ($hotelReview->replies->count() > 0)
                                            <button type="button" class="eg-btn account--btn"><i
                                                    class="bi bi-hand-thumbs-up"></i></button>
                                        @else
                                            <button type="button" data-review_id="{{ $hotelReview->id }}"
                                                data-product_id="{{ $hotelReview->product_id }}"
                                                class="staticBackdropReview eg-btn add--btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdropReview"><i
                                                    class="bi bi-reply-all"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" data-label="Not Found">
                                    <h4>{{ translate('Yoo! Nothings Here Bruhv') }}</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('backend.hotels.modal')
    @push('footer')
        <div class="d-flex justify-content-center custom-pagination">
            {!! $hotelReviews->links() !!}
        </div>
    @endpush
@endsection
