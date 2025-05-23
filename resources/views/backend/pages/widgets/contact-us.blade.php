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
                        <div class="col-sm-6">
                            <div class="form-inner mb-3">
                                <label>{{ translate('Main Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Main Title') }}" name="content[0][main_title]"
                                    value="{{ isset($widgetContents['main_title']) ? $widgetContents['main_title'] : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6  mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Sub Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Sub Title') }}" name="content[0][sub_title]"
                                    value="{{ isset($widgetContents['sub_title']) ? $widgetContents['sub_title'] : '' }}">
                            </div>
                        </div>

                        <div class="col-sm-6  mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Location') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Location') }}" name="content[0][location]"
                                    value="{{ isset($widgetContents['location']) ? $widgetContents['location'] : '' }}">
                            </div>
                        </div>
                
                    </div>




                    <div class="row mt-3">
                        <div class="col-sm-2">
                            <label> <b>{{ translate('Contact Number') }}</b>:</label>
                        </div>
                        <div class="col-sm-8">

                            <div class="phone-area">

                                @if (isset($widgetContents['phone']))
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($widgetContents['phone'] as $key => $phone)
                                        @php
                                            $count++;
                                        @endphp
                                        <div class="row align-items-center content">
                                            <div class="col-sm-11">
                                                <div class="row">
                                                    <div class="col-sm-12 mb-2">
                                                        <div class="form-inner">
                                                            <input type="text" class="username-input"
                                                                placeholder="{{ translate('Enter Email') }}"
                                                                name="content[0][phone][{{ $count }}][phone_number]"
                                                                value="{{ isset($phone['phone_number']) ? $phone['phone_number'] : '' }}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <button class="remove-information remove text-danger border-0">
                                                    <i class="bi  bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>




                            <button type="button" class="add-phone-btn eg-btn btn--primary back-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-sm-2">
                            <label> <b>{{ translate('Email') }}</b>:</label>
                        </div>
                        <div class="col-sm-8">

                            <div class="email-area">


                                @if (isset($widgetContents['email']))
                                    @php
                                        $count = 0;
                                    @endphp
                                    @foreach ($widgetContents['email'] as $key => $email)
                                        @php
                                            $count++;
                                        @endphp
                                        <div class="row align-items-center content">
                                            <div class="col-sm-11">
                                                <div class="row">
                                                    <div class="col-sm-12 mb-2">
                                                        <div class="form-inner">
                                                            <input type="email" class="username-input"
                                                                placeholder="{{ translate('Enter Email') }}"
                                                                name="content[0][email][{{ $count }}][email_name]"
                                                                value="{{ isset($email['email_name']) ? $email['email_name'] : '' }}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-1">
                                                <button class="remove-information remove text-danger border-0">
                                                    <i class="bi  bi-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>

                            <button type="button" class="add-email-btn eg-btn btn--primary back-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
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
                        <div class="col-sm-6">
                            <div class="form-inner  mb-3">
                                <label>{{ translate('Main Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Main Title') }}" name="content[0][main_title]">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-inner  mb-3">
                                <label>{{ translate('Sub Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Sub Title') }}" name="content[0][sub_title]">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-inner  mb-3">
                                <label>{{ translate('Location') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Location') }}" name="content[0][location]">
                            </div>
                        </div>
                        <div class="col-sm-6  mb-3">
                            <div class="form-inner">
                                <label>{{ translate('Map Iframe Code') }}</label>
                                <textarea type="text" class="username-input"
                                    placeholder="{{ translate('Enter Iframe Code') }}" name="content[0][irame_link]">

                                </textarea>

                            </div>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-2">
                            <label> <b>{{ translate('Contact Number') }}</b>:</label>
                        </div>
                        <div class="col-sm-8">

                            <div class="phone-area">

                            </div>

                            <button type="button" class="add-phone-btn eg-btn btn--primary back-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-sm-2">
                            <label> <b>{{ translate('Email') }}</b>:</label>
                        </div>
                        <div class="col-sm-8">

                            <div class="email-area">

                            </div>

                            <button type="button" class="add-email-btn eg-btn btn--primary back-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
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
