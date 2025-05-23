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
                    $widgetContents = $widgetContent->getTranslation('widget_content', $lang);
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
                                    placeholder="{{ translate('Enter Main Title') }}" name="content[0][title]"
                                    value="{{ isset($widgetContents['title']) ? $widgetContents['title'] : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}" name="content[0][shoulder]"
                                    value="{{ isset($widgetContents['shoulder']) ? $widgetContents['shoulder'] : '' }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-area">

                        @if (isset($widgetContents['tabs']))
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($widgetContents['tabs'] as $key => $tab)
                                @php
                                    $count++;
                                @endphp

                                <div class="row align-items-center content">
                                    <div class="col-sm-11">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">

                                                    <label>{{ translate('Tab Title') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Tab Title') }}"
                                                        name="content[0][tabs][{{ $count }}][tab_title]"
                                                        value="{{ isset($tab['tab_title']) ? $tab['tab_title'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Tab Icon') }}</label>
                                                    <div class="d-flex align-items-center">
                                                        <input type="file" class="username-input widget-image-upload"
                                                            name="image" data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][{{ $count }}][tab_img]"
                                                            id="old_file"
                                                            value="{{ isset($tab['tab_img']) ? $tab['tab_img'] : '' }}">

                                                        @if (isset($tab['tab_img']))
                                                            <div class="ms-2">
                                                                <img height="50" width="auto"
                                                                    src="{{ asset('uploads/tabs/' . $tab['tab_img']) }}"
                                                                    alt="image">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Tab Label') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Tab Label') }}"
                                                        name="content[0][tabs][{{ $count }}][label]"
                                                        value="{{ isset($tab['label']) ? $tab['label'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Main Title') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Main Title') }}"
                                                        name="content[0][tabs][{{ $count }}][main_title]"
                                                        value="{{ isset($tab['main_title']) ? $tab['main_title'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Description') }}</label>
                                                    <textarea type="text" class="username-input" name="content[0][tabs][{{ $count }}][description]" placeholder="{{ translate('Enter Description') }}">{{ isset($tab['description']) ? $tab['description'] : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Button Text') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Button Text') }}"
                                                        name="content[0][tabs][{{ $count }}][button_text]"
                                                        value="{{ isset($tab['button_text']) ? $tab['button_text'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Button Link') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Button Link') }}"
                                                        name="content[0][tabs][{{ $count }}][button_link]"
                                                        value="{{ isset($tab['button_link']) ? $tab['button_link'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner">
                                                    <label>{{ translate('Video Text') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Video Text') }}"
                                                        name="content[0][tabs][{{ $count }}][video_text]"
                                                        value="{{ isset($tab['video_text']) ? $tab['video_text'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-3">
                                                <div class="form-inner">
                                                    <label>{{ translate('Video Link') }}</label>
                                                    <input type="text" class="username-input"
                                                        placeholder="{{ translate('Enter Video Link') }}"
                                                        name="content[0][tabs][{{ $count }}][video_link]"
                                                        value="{{ isset($tab['video_link']) ? $tab['video_link'] : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner mb-3">
                                                    <label>{{ translate('Image 1') }}</label>
                                                    <div class="d-flex">
                                                        <input type="file"
                                                            class="username-input widget-image-upload" name="image1"
                                                            data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][{{ $count }}][img]"
                                                            id="old_file"
                                                            value="{{ isset($tab['img']) ? $tab['img'] : '' }}">

                                                        @if (isset($tab['img']))
                                                            <div class="ms-4">
                                                                <img width="100"
                                                                    src="{{ asset('uploads/tabs/' . $tab['img']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 mb-2">
                                                <div class="form-inner mb-3">
                                                    <label>{{ translate('Image 2') }}</label>
                                                    <div class="d-flex">
                                                        <input type="file"
                                                            class="username-input widget-image-upload" name="image2"
                                                            data-folder="/uploads/tabs/">

                                                        <input type="hidden"
                                                            name="content[0][tabs][{{ $count }}][img2]"
                                                            id="old_file"
                                                            value="{{ isset($tab['img2']) ? $tab['img2'] : '' }}">

                                                        @if (isset($tab['img2']))
                                                            <div class="ms-4">
                                                                <img width="100"
                                                                    src="{{ asset('uploads/tabs/' . $tab['img2']) }}"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 tabs-freatues">
                                                <div class="form-inner mb-3">
                                                    <label class="form-label fw-bold"
                                                        for="">{{ translate('Tab Package Include') }}</label>
                                                    <div class="tabs-features-area">
                                                        <ul>
                                                            @foreach ($tab['include'] as $index => $item)
                                                                <div class="form-inner mb-1">
                                                                    <input type="text" class="form-control"
                                                                        name="content[0][tabs][{{ $count }}][include][{{ $index }}][item]"
                                                                        value="{{ $item['item'] }}"
                                                                        placeholder="{{ translate('Enter Feature Item') }}" />
                                                                </div>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-sm-8 tabs-exclude">
                                                <div class="form-inner mb-3">
                                                    <label class="form-label fw-bold"
                                                        for="">{{ translate('Plan Package Exclude') }}</label>
                                                    <div class="tabs-exclude-area">
                                                        <ul>
                                                            @if(isset($tabs['exclude']) && !empty($tabs['exclude']))
                                                            @foreach ($tabs['exclude'] as $index => $item)
                                                                <div class="form-inner mb-1">
                                                                    <input type="text" class="form-control"
                                                                        name="content[0][tabs][{{ $count }}][exclude][{{ $index }}][item]"
                                                                        value="{{ $item['item'] }}"
                                                                        placeholder="{{ translate('Enter Feature Item') }}" />
                                                                </div>
                                                            @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                        </svg>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 text-center">
                                        <button class="remove-information remove text-danger border-0">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    

                    <div class="add-row">
                        <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
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
                                    placeholder="{{ translate('Enter Main Title') }}" name="content[0][title]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}" name="content[0][shoulder]">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tab-area">

                    </div>
                    <div class="add-row">
                        <button type="button" class="add-tabs-btn eg-btn btn--primary back-btn border-0">
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
