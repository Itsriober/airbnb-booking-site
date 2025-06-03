@if (@isset($widgetContent))
    <div class="sortable-item accordion-item allowPrimary" data-code="{{ $widgetContent->ui_card_number }}">
        <div class="accordion-header">
            <div class="section-name"> {{ $widgetContent->widget?->widget_name }}
                <div class="collapsed d-flex">
                    <div class="form-check form-switch me-2">
                        <input class="form-check-input status-change"
                            data-action="{{ route('pages.widget.status.change', $widgetContent->id) }}"
                            {{ $widgetContent->status == 1 ? 'checked' : '' }} type="checkbox" role="switch"
                            id="{{ $widgetContent->id }}">
                        <label class="form-check-label d-none" for="{{ $widgetContent->id }}"> </label>
                    </div>

                    <div class="collapsed-action-btn edit-action action-icon me-2">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="action-icon delete-action" data-id="{{ $widgetContent->id }}">
                        <i class="bi bi-trash"></i>
                    </div>

                </div>
            </div>
        </div>


        <div class="accordion-collapse collapse ">
            <div class="accordion-body">
                @php

                $widgetContents= $widgetContent->getTranslation("widget_content",$lang);
                 @endphp
                <form enctype="multipart/form-data" data-action="{{ route('pages.widget.save') }}" class="form"
                    method="POST">
                    @csrf

                    <input type="hidden" name="ui_card_number" value="{{ $widgetContent->ui_card_number }}">
                    <input type="hidden" name="page_id" value="{{ $widgetContent->page_id }}">
                    <input type="hidden" name="widget_slug" class="widget-slug"
                        value="{{ $widgetContent->widget_slug }}">


                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}"
                                    name="content[0][testimonial_shoulder]"
                                    value="{{ isset($widgetContents['testimonial_shoulder']) ? $widgetContents['testimonial_shoulder'] : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input" placeholder="{{ translate('Enter Title') }}" value="{{ isset($widgetContents['testimonial_title']) ? $widgetContents['testimonial_title'] : '' }}" name="content[0][testimonial_title]">
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Tripadvisor') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-tripadvisor">

                        @if (isset($widgetContents['testimonials']['tripadvisor']))
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($widgetContents['testimonials']['tripadvisor'] as $key => $tripadvisor)
                                @php

                                    $count++;
                                @endphp

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Name') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Name') }}"
                                                        name="content[0][testimonials][tripadvisor][{{ $count }}][name]"
                                                        value="{{ isset($tripadvisor['name']) ? $tripadvisor['name'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Country') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Country') }}"
                                                        value="{{isset($tripadvisor['country']) ?   $tripadvisor['country']  : ''}}"
                                                        name="content[0][testimonials][tripadvisor][{{ $count }}][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Rating') }}</label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="{{ translate('Enter Rating') }}"
                                                        name="content[0][testimonials][tripadvisor][{{ $count }}][rating]"
                                                        value="{{ isset($tripadvisor['rating']) ? $tripadvisor['rating'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Time') }}</label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="{{ translate('Enter Time') }}"
                                                        name="content[0][testimonials][tripadvisor][{{ $count }}][time]" value="{{ isset($tripadvisor['time']) ? $tripadvisor['time'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Image') }}</label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][tripadvisor][{{ $count }}][img]"
                                                            id="old_file"
                                                            value="{{ isset($tripadvisor['img']) ? $tripadvisor['img'] : '' }}">

                                                        @if (isset($tripadvisor['img']))
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="{{ asset('uploads/testimonials/' . $tripadvisor['img']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                @php
                                                $tripadvisor_review= isset($tripadvisor['review']) ?   $tripadvisor['review']  : '';
                                                $tripadvisor_review=  html_entity_decode($tripadvisor_review);
                                                $tripadvisor_review=  prelaceScript($tripadvisor_review);
                                              @endphp
                                                <div class="form-inner">
                                                    <label>{{ translate('Review') }}</label>
                                                    <textarea name="content[0][testimonials][tripadvisor][{{ $count }}][review]">{{$tripadvisor_review}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi  bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="add-row">
                        <button type="button" class="add-tripadvisor-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Facebook') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-facebook">

                        @if (isset($widgetContents['testimonials']['facebook']))
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($widgetContents['testimonials']['facebook'] as $key => $facebook)
                                @php

                                    $count++;
                                @endphp

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Name') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Name') }}"
                                                        name="content[0][testimonials][facebook][{{ $count }}][name]"
                                                        value="{{ isset($facebook['name']) ? $facebook['name'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Country') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Country') }}"
                                                        value="{{isset($facebook['country']) ?   $facebook['country']  : ''}}"
                                                        name="content[0][testimonials][facebook][{{ $count }}][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Rating') }}</label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="{{ translate('Enter Rating') }}"
                                                        name="content[0][testimonials][facebook][{{ $count }}][rating]"
                                                        value="{{ isset($facebook['rating']) ? $facebook['rating'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Time') }}</label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="{{ translate('Enter Time') }}"
                                                        name="content[0][testimonials][facebook][{{ $count }}][time]" value="{{ isset($facebook['time']) ? $facebook['time'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Image') }}</label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][facebook][{{ $count }}][img]"
                                                            id="old_file"
                                                            value="{{ isset($facebook['img']) ? $facebook['img'] : '' }}">

                                                        @if (isset($facebook['img']))
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="{{ asset('uploads/testimonials/' . $facebook['img']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                @php
                                                $facebook_review= isset($facebook['review']) ?   $facebook['review']  : '';
                                                $facebook_review=  html_entity_decode($facebook_review);
                                                $facebook_review=  prelaceScript($facebook_review);
                                              @endphp
                                                <div class="form-inner">
                                                    <label>{{ translate('Review') }}</label>
                                                    <textarea name="content[0][testimonials][facebook][{{ $count }}][review]">{{$facebook_review}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi  bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="add-row">
                        <button type="button" class="add-facebook-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Google') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-google">

                        @if (isset($widgetContents['testimonials']['google']))
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($widgetContents['testimonials']['google'] as $key => $google)
                                @php

                                    $count++;
                                @endphp

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Name') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Name') }}"
                                                        name="content[0][testimonials][google][{{ $count }}][name]"
                                                        value="{{ isset($google['name']) ? $google['name'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Country') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Country') }}"
                                                        value="{{isset($google['country']) ?   $google['country']  : ''}}"
                                                        name="content[0][testimonials][google][{{ $count }}][country]">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Rating') }}</label>
                                                    <input type="number" step="0.1" min="0" max="5" class="username-input"
                                                        placeholder="{{ translate('Enter Rating') }}"
                                                        name="content[0][testimonials][google][{{ $count }}][rating]"
                                                        value="{{ isset($google['rating']) ? $google['rating'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-2">
                                                <div class="form-inner">
                                                    <label> {{ translate('Time') }}</label>
                                                    <input type="text" class="username-input datetimepicker"
                                                        placeholder="{{ translate('Enter Time') }}"
                                                        name="content[0][testimonials][google][{{ $count }}][time]" value="{{ isset($google['time']) ? $google['time'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-5 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Image') }}</label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/testimonials/">

                                                        <input type="hidden"
                                                            name="content[0][testimonials][google][{{ $count }}][img]"
                                                            id="old_file"
                                                            value="{{ isset($google['img']) ? $google['img'] : '' }}">

                                                        @if (isset($google['img']))
                                                            <div class="ms-2">
                                                                <img height="40" width="auto"
                                                                    src="{{ asset('uploads/testimonials/' . $google['img']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                @php
                                                $google_review= isset($google['review']) ?   $google['review']  : '';
                                                $google_review=  html_entity_decode($google_review);
                                                $google_review=  prelaceScript($google_review);
                                              @endphp
                                                <div class="form-inner">
                                                    <label>{{ translate('Review') }}</label>
                                                    <textarea name="content[0][testimonials][google][{{ $count }}][review]">{{$google_review}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi  bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="add-row">
                        <button type="button" class="add-google-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>




                    <div class="button-area text-end">
                        <button type="submit"
                            class="eg-btn btn--green medium-btn shadow">{{ translate('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@else
    <div class="sortable-item accordion-item allowPrimary" data-code="{{ $randomId }}">
        <div class="accordion-header" id="herosection">
            <div class="section-name"> {{ $widgetName }}
                <div class="collapsed d-flex">
                    <div class="form-check form-switch me-2">
                        <input class="form-check-input status-change"
                            data-action="{{ route('pages.widget.status.change', $randomId) }}" checked
                            type="checkbox" role="switch" id="{{ $randomId }}">
                        <label class="form-check-label d-none" for="{{ $randomId }}"> </label>
                    </div>
                    <div class="collapsed-action-btn edit-action action-icon me-2">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="action-icon delete-action" data-id="{{ $randomId }}">
                        <i class="bi bi-trash"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-collapse collapse show">
            <div class="accordion-body">
                <form eenctype="multipart/form-data" data-action="{{ route('pages.widget.save') }}" class="form"
                    method="POST">
                    @csrf

                    <input type="hidden" name="ui_card_number" value="{{ $randomId }}">
                    <input type="hidden" name="page_id" value="{{ $pageId }}">
                    <input type="hidden" name="widget_slug" class="widget-slug" value="{{ $slug }}">



                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}"
                                    name="content[0][testimonial_shoulder]">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input" placeholder="{{ translate('Enter Title') }}" name="content[0][testimonial_title]">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Tripadvisor') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-tripadvisor">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-tripadvisor-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Facebook') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-facebook">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-facebook-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Google') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="testimonials-google">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-google-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>

                    <div class="button-area text-end">
                        <button type="submit"
                            class="eg-btn btn--green medium-btn shadow">{{ translate('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endif
