@php
    $funFactsDataItem = [];
    if (isset($singelWidgetData->widget_content)) {
        $funFactsDataItem = $singelWidgetData->getTranslation("widget_content");
    }
@endphp
<!-- =============== counter-section start =============== -->
@if($funFactsDataItem['fun_facts'])
<!-- =============== counter-section end =============== -->
<div class="container">
<div class="activities-counter mb-50">
    
    <div class="row justify-content-center g-lg-4 gy-5">
        @foreach($funFactsDataItem['fun_facts'] as $facts)
        <div class="col-lg-3 col-sm-6 divider d-flex justify-content-sm-center fun_facts">
            <div class="single-activity">
                <div class="icon">
                    @if(isset($facts['title']))
                    <img src="{{asset('uploads/fun_facts/'.$facts['img'])}}" alt="{{$facts['title']}}">
                    @endif
                </div>
                <div class="content">
                    <div class="number">
                        <h5 class="">{{$facts['number_count']}}</h5>
                       
                    </div>
                    <p>{{$facts['title'] ?? ''}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endif