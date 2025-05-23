@if($total_reviews > 0 || ($have_booking && $have_review == null))
<div class="review-wrapper mt-70">

    <h4>{{ translate('Customer Review') }}</h4>
    <div class="review-box">
        @if($total_reviews > 0)
        <div class="total-review">
            <h2>{{ $average_rating ?? 0 }}</h2>
            <div class="review-wrap">
                @php $ave_rating = $average_rating; @endphp
                <ul class="star-list">
                    @foreach (range(1, 5) as $i)
                        @if ($ave_rating > 0)
                            @if ($ave_rating > 0.5)
                                <li><i class="bi bi-star-fill"></i></li>
                            @else
                                <li><i class="bi bi-star-half"></i></li>
                            @endif
                        @else
                            <li><i class="bi bi-star"></i></li>
                        @endif
                        @php $ave_rating--; @endphp
                    @endforeach
                </ul>
                <span>{{ $total_reviews ?? 0 }} {{ translate('Reviews') }}</span>
            </div>
        </div>
        @endif
        @if ($have_booking && $have_review == null)
            <a class="primary-btn1" data-bs-toggle="modal" href="#staticBackdrop2"
                role="button">{{ translate('GIVE A RATING') }}</a>
        @endif
    </div>
    <div class="review-area">
        <ul class="comment">
            @if ($reviews)
                @foreach ($reviews as $review)
                    <li>
                        <div class="single-comment-area">
                            <div class="author-img">
                                @if ($review->users?->image)
                                    <img src="{{ asset('uploads/users/' . $review->users?->image) }}"
                                        alt="{{ $review->users?->username }}">
                                @else
                                    <img src="{{ asset('uploads/users/user.png') }}"
                                        alt="{{ $review->users?->username }}">
                                @endif
                            </div>
                            <div class="comment-content">
                                <div class="author-name-deg">
                                    <h6>{{ $review->users?->fname ? $review->users?->fname . ' ' . $review->users?->lname : $review->users?->username }},
                                    </h6>
                                    <span>{{ $review->created_at->diffForHumans() }}</span>
                                </div>
                                <ul class="review-item-list">
                                    <li>
                                        @php $rating = $review->rating; @endphp
                                        <ul class="star-list">
                                            @foreach (range(1, 5) as $i)
                                                @if ($rating > 0)
                                                    <li><i class="bi bi-star-fill"></i></li>
                                                @else
                                                    <li><i class="bi bi-star"></i></li>
                                                @endif
                                                @php $rating--; @endphp
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ $review->review }}</p>
                            </div>
                        </div>
                        @if ($review->replies?->count() > 0)
                            <ul class="comment-replay">
                                @foreach ($review->replies as $reply)
                                    <li>
                                        <div class="single-comment-area">
                                            <div class="author-img">
                                                @if ($reply->users?->image)
                                                    <img src="{{ asset('uploads/users/' . $reply->users?->image) }}"
                                                        alt="{{ $reply->users?->username }}">
                                                @else
                                                    <img src="{{ asset('uploads/users/user.png') }}"
                                                        alt="{{ $reply->users?->username }}">
                                                @endif
                                            </div>
                                            <div class="comment-content">
                                                <div class="author-name-deg">
                                                    <h6>{{ $reply->users?->fname ? $reply->users?->fname . ' ' . $reply->users?->lname : $reply->users?->username }},
                                                    </h6>
                                                    <span>{{ $reply->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p>{{ $reply->review }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @else
                <li class="text-center">{{ translate('No Comment Found') }}</li>
            @endif
        </ul>
    </div>
</div>
@endif
