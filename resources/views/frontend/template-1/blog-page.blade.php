@extends('frontend.template-'.$templateId.'.partials.master')
    @section('content')
    @include('frontend.template-'.$templateId.'.breadcrumb.breadcrumb')

    <div class="blod-grid-section pt-120 mb-120">
        <div class="container">
            <div class="row g-md-4 gy-5 mb-70">
                @if($blogs->count()>0)
                @foreach($blogs as $key=>$blog)
                <div class="col-lg-4 col-md-6">
                    @include('frontend.template-'.$templateId.'.partials.blog-card')
                </div>
                @endforeach
                @else
                <div class="col-lg-12 col-md-12">
                    <h2 class="text-center">{{translate('No Data Found')}}</h2>
                </div>
                @endif
            </div>
            <div class="row">
                {!! $blogs->links('vendor.pagination.custom') !!}
            </div>
        </div>
    </div>
    @endsection
