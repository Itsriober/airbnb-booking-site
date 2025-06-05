<<<<<<< HEAD
<div class="destination-card2">
    <a href="destination-details.html" class="destination-card-img"><img src="{{asset('uploads/destination/features/'.$item->features_image)}}" alt="{{$item->title}}"></a>
    <div class="batch">
        <span>{{$item->tours?->count()}} {{translate('Tour')}}</span>
    </div>
    <div class="destination-card2-content">
        <span>{{translate('Travel To')}}</span>
        <h4><a href="destination-details.html">{{$item->destination}}</a></h4>
    </div>
</div>
=======
<div class="destination-card3">
    <a href="{{ url('destination/' . $destination->slug) }}" class="destination-card-img">
        <img src="{{ asset('uploads/destination/features/' . $destination->features_image) }}" alt="">
    </a>
    <div class="destination-card-content">
        <h4><a href="{{ url('destination/' . $destination->slug) }}">{{ $destination->city }}</a></h4>
    </div>
    <div class="batch">
        <span>5 Tour</span>
    </div>
</div>
>>>>>>> 3c3708e8794549e948bb615ada3736f1235c4dbe
