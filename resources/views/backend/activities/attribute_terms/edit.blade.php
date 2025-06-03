@extends('backend.layouts.master')
              @section('content')
              <div class="row mb-35">
                    <div class="page-title d-flex justify-content-between align-items-center">
                        <h4>{{$page_title ?? ''}}</h4>
                        <div class="language-changer">
                            <span>{{translate('Language Translation')}}: </span>
                            @foreach (\App\Models\Language::all() as $key => $language)
                                @if($lang == $language->code)
                                <img src="{{ asset('assets/img/flags/'.$language->code.'.png') }}" class="mr-3" height="16">
                                @else
                                <a href="{{route('activities.attribute.terms.edit',['attribute_id'=> $attribute_id, 'id'=>$termSingle->id, 'lang'=>$language->code] )}}"><img src="{{ asset('assets/img/flags/'.$language->code.'.png') }}" class="mr-3" height="16"></a>
                                @endif
                            @endforeach
                        </div>
                        <a href="{{route('activities.attribute.terms.list',$attribute_id)}}" class="eg-btn btn--primary back-btn"> <img src="{{asset('backend/images/icons/back.svg')}}" alt="{{ translate('Go Back') }}"> {{ translate('Go Back') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                    <div class="eg-card product-card">
                        
                    <form action="{{route('activities.attribute.terms.update', ['attribute_id'=> $attribute_id, 'id'=> $termSingle->id])}}" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="lang" value="{{ $lang }}">
                        @csrf
                                <div class="form-inner mb-35">
                                    <label class="col-form-label">{{ translate('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{old('name',$termSingle->getTranslation('name', $lang))}}" name="name" class="username-input" placeholder="{{ translate('Enter Name') }}">
                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="form-inner mb-25">
                                        <label>{{ translate('Class Icon - get icon in') }}</label>
                                        <input type="text" value="{{old('icon',$termSingle->icon)}}" name="icon" class="icon icon-picker" placeholder="Ex: bi bi-facebook">
                                        @error('icon')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-inner mb-25">
                                        <label>{{ translate('Image') }}</label>
                                        <input type="file" name="image" class="password" accept="image/*">
                                        @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if($termSingle->image)
                                    <img src="{{asset('uploads/activities/attribute/'.$termSingle->image)}}" alt="{{$termSingle->name}}" width="50">
                                    @endif
                                    
                                
                            
                            <div class="button-group mt-15 text-center  ">
                                <input type="submit" class="eg-btn btn--green back-btn me-3" value="{{ translate('Update') }}">
                            </div>
                       
                        
                    </form>
                    </div>
                    </div>
                </div>
           @endsection