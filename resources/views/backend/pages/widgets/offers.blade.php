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
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Main Title') }}"
                                    name="content[0][title]" value="{{ isset($widgetContents['title']) ? $widgetContents['title'] : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}"
                                    name="content[0][shoulder]" value="{{ isset($widgetContents['shoulder']) ? $widgetContents['shoulder'] : '' }}">
                            </div>
                        </div>
                    </div><hr>
                    <div class="offers-area">
                        
                        @if (isset($widgetContents['offers']))
                            @php
                               $count = 0;
                            @endphp
                            @foreach ($widgetContents['offers'] as $key => $offer)
                                @php
                                    $count++;
                                @endphp

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">

                                                    <label>{{ translate('Title') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Offer Title') }}"
                                                        name="content[0][offers][{{ $count }}][offer_title]"
                                                        value="{{ isset($offer['offer_title']) ? $offer['offer_title'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Offer Discount') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Offer Discount') }}"
                                                        name="content[0][offers][{{ $count }}][offer_discount]"
                                                        value="{{ isset($offer['offer_discount']) ? $offer['offer_discount'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Offer Button Text') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Offer Button Text') }}"
                                                        name="content[0][offers][{{ $count }}][offer_button]" value="{{ isset($offer['offer_button']) ? $offer['offer_button'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Offer Link') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Offer Link') }}"
                                                        name="content[0][offers][{{ $count }}][offer_link]"
                                                        value="{{ isset($offer['offer_link']) ? $offer['offer_link'] : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-2">
                                                <div class="form-inner mb-3">
                                                    <label>{{ translate('Image') }}</label>
                                                    <div class="d-flex">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/offers/">

                                                        <input type="hidden"
                                                            name="content[0][offers][{{ $count }}][img]"
                                                            id="old_file"
                                                            value="{{ isset($offer['img']) ? $offer['img'] : '' }}">

                                                        @if (isset($offer['img']))
                                                            <div class="ms-4">
                                                                <img width="100"
                                                                    src="{{ asset('uploads/offers/' . $offer['img']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
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
                        <button type="button" class="add-offers-btn eg-btn btn--primary back-btn">
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
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Main Title') }}"
                                    name="content[0][title]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}"
                                    name="content[0][shoulder]">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="offers-area">
                       
                    </div>
                    <div class="add-row">
                        <button type="button" class="add-offers-btn eg-btn btn--primary back-btn border-0">
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
