<div class="destination-card2">
    <a href="{{route('destination.details',$item->slug)}}" class="destination-card-img"><img src="{{asset('uploads/destination/features/'.$item->features_image)}}" alt="{{$item->title}}"></a>
    <div class="batch">
        <span>{{$item->tours?->count()}} {{translate('Tour')}}</span>
    </div>
    <div class="destination-card2-content">
        <span>{{translate('Travel To')}}</span>
        <h4><a href="{{route('destination.details',$item->slug)}}">{{$item->destination}}</a></h4>
    </div>
</div>