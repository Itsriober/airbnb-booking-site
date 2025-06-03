<div class="package-card4 four"> 
    <a href="{{route('visa.details',$item->slug)}}" class="package-card-img">
        <img src="{{asset('uploads/visa/features/'.$item->features_image)}}" alt="{{$item->title}}">
    </a>
    <div class="package-card-content">
        <div class="card-content-top">
            <a href="{{route('visa.details',$item->slug)}}"><h5>{{$item->getTranslation('title')}}</h5></a>
            <ul>
                <li><span>{{translate('Country')}} :</span> {{$item->countries?->name}}</li>
                <li><span>{{translate('Visa Type')}} :</span> {{$item->categories?->getTranslation('name')}}</li>
                <li><span>{{translate('Visa Mode')}} :</span> {{$item->visa_mode}}</li>
                <li><span>{{translate('Validity')}} :</span> {{$item->validity}}</li>
                <li><span>{{translate('Processing Time')}} :</span> {{$item->processing}}</li>
            </ul>
        </div>
        <div class="card-content-bottom">
            <div class="price-area">
                <span>{{translate('Starting Form')}}:</span>
                <h6><strong>{{currency_symbol()}}</strong>{{$item->cost}} <span>{{translate('Per Person')}}</span></h6>
            </div>
            <a href="{{route('visa.details',$item->slug)}}" class="apply-btn">
                {{translate('Apply Now')}}
                <div class="arrow">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
</div>