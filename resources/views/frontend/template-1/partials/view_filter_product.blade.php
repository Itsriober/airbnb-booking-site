@if ($productType == 'tour')
    <div class="recent-post-widget mb-20">
        <div class="recent-post-img">
            <a href="{{ route('tour.details', ['slug' => $item->slug]) }}"><img
                    src="{{ asset('uploads/tour/features/' . $item->features_image) }}" alt=""></a>
        </div>
        <div class="recent-post-content">
            <a href="{{ route('tour.details', ['slug' => $item->slug]) }}">{{ $item->created_at->format('d M, Y') }}</a>
            <h6><a href="{{ route('tour.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h6>
        </div>
    </div>
@endif

@if ($productType == 'hotel')
    <div class="recent-post-widget mb-20">
        <div class="recent-post-img">
            <a href="{{ route('hotel.details', ['slug' => $item->slug]) }}"><img
                    src="{{ asset('uploads/hotel/features/' . $item->feature_img) }}" alt=""></a>
        </div>
        <div class="recent-post-content">
            <a
                href="{{ route('hotel.details', ['slug' => $item->slug]) }}">{{ $item->created_at->format('d M, Y') }}</a>
            <h6><a href="{{ route('hotel.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h6>
        </div>
    </div>
@endif

@if ($productType == 'activities')
    <div class="recent-post-widget mb-20">
        <div class="recent-post-img">
            <a href="{{ route('activities.details', ['slug' => $item->slug]) }}"><img
                    src="{{ asset('uploads/activities/features/' . $item->feature_img) }}" alt=""></a>
        </div>
        <div class="recent-post-content">
            <a
                href="{{ route('activities.details', ['slug' => $item->slug]) }}">{{ $item->created_at->format('d M, Y') }}</a>
            <h6><a href="{{ route('activities.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h6>
        </div>
    </div>
@endif

@if ($productType == 'transport')
    <div class="recent-post-widget mb-20">
        <div class="recent-post-img">
            <a href="{{ route('transport.details', ['slug' => $item->slug]) }}"><img
                    src="{{ asset('uploads/transports/features/' . $item->feature_img) }}" alt=""></a>
        </div>
        <div class="recent-post-content">
            <a
                href="{{ route('transport.details', ['slug' => $item->slug]) }}">{{ $item->created_at->format('d M, Y') }}</a>
            <h6><a href="{{ route('transport.details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h6>
        </div>
    </div>
@endif
