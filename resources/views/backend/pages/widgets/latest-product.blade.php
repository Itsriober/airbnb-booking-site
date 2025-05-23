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
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}" name="content[0][latest_product_shoulder]"
                                    value="{{ isset($widgetContents['latest_product_shoulder']) ? $widgetContents['latest_product_shoulder'] : '' }}">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Title') }}" name="content[0][latest_product_title]"
                                    value="{{ isset($widgetContents['latest_product_title']) ? $widgetContents['latest_product_title'] : '' }}">
                            </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Tour Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][tour][enable]" value="1" role="switch" id="tourcheck" {{isset($widgetContents['tour']['enable']) && $widgetContents['tour']['enable'] == 1 ? 'checked' : ''}}>
                            {{isset($widgetContents['tour']['enable']) && $widgetContents['tour']['enable'] == 1 ? translate('Disable') : translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][tour][total_display]"
                                    value="{{ isset($widgetContents['tour']['total_display']) ? $widgetContents['tour']['total_display'] : 6 }}">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][tour][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc"
                                        {{ isset($widgetContents['tour']['order_by']) && $widgetContents['tour']['order_by'] == 'desc' ? 'selected' : '' }}>
                                        {{ translate('Descending') }}</option>
                                    <option value="asc"
                                        {{ isset($widgetContents['tour']['order_by']) && $widgetContents['tour']['order_by'] == 'asc' ? 'selected' : '' }}>
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Hotel Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][hotel][enable]" value="1" role="switch" id="hotelcheck" {{isset($widgetContents['hotel']['enable']) && $widgetContents['hotel']['enable'] == 1 ? 'checked' : ''}}>
                            {{isset($widgetContents['hotel']['enable']) && $widgetContents['hotel']['enable'] == 1 ? translate('Disable') : translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][hotel][total_display]"
                                    value="{{ isset($widgetContents['hotel']['total_display']) ? $widgetContents['hotel']['total_display'] : 6 }}">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][hotel][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc"
                                        {{ isset($widgetContents['hotel']['order_by']) && $widgetContents['hotel']['order_by'] == 'desc' ? 'selected' : '' }}>
                                        {{ translate('Descending') }}</option>
                                    <option value="asc"
                                        {{ isset($widgetContents['hotel']['order_by']) && $widgetContents['hotel']['order_by'] == 'asc' ? 'selected' : '' }}>
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Activities Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][activities][enable]" value="1" role="switch" id="activitiescheck" {{isset($widgetContents['activities']['enable']) && $widgetContents['activities']['enable'] == 1 ? 'checked' : ''}}>
                            {{isset($widgetContents['activities']['enable']) && $widgetContents['activities']['enable'] == 1 ? translate('Disable') : translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][activities][total_display]"
                                    value="{{ isset($widgetContents['activities']['total_display']) ? $widgetContents['activities']['total_display'] : 6 }}">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][activities][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc"
                                        {{ isset($widgetContents['activities']['order_by']) && $widgetContents['activities']['order_by'] == 'desc' ? 'selected' : '' }}>
                                        {{ translate('Descending') }}</option>
                                    <option value="asc"
                                        {{ isset($widgetContents['activities']['order_by']) && $widgetContents['activities']['order_by'] == 'asc' ? 'selected' : '' }}>
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Transport Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][transport][enable]" value="1" role="switch" id="transportcheck" {{isset($widgetContents['transport']['enable']) && $widgetContents['transport']['enable'] == 1 ? 'checked' : ''}}>
                            {{isset($widgetContents['transport']['enable']) && $widgetContents['transport']['enable'] == 1 ? translate('Disable') : translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][transport][total_display]"
                                    value="{{ isset($widgetContents['transport']['total_display']) ? $widgetContents['transport']['total_display'] : 6 }}">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][transport][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc"
                                        {{ isset($widgetContents['transport']['order_by']) && $widgetContents['transport']['order_by'] == 'desc' ? 'selected' : '' }}>
                                        {{ translate('Descending') }}</option>
                                    <option value="asc"
                                        {{ isset($widgetContents['transport']['order_by']) && $widgetContents['transport']['order_by'] == 'asc' ? 'selected' : '' }}>
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
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
                            data-action="{{ route('pages.widget.status.change', $randomId) }}" checked type="checkbox"
                            role="switch" id="{{ $randomId }}">
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
                <form enctype="multipart/form-data" data-action="{{ route('pages.widget.save') }}" class="form"
                    method="POST">
                    @csrf

                    <input type="hidden" name="ui_card_number" value="{{ $randomId }}">
                    <input type="hidden" name="page_id" value="{{ $pageId }}">
                    <input type="hidden" name="widget_slug" class="widget-slug" value="{{ $slug }}">

                    <div class="row">
                    <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Shoulder') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Shoulder') }}" name="content[0][latest_product_shoulder]">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-2">
                            <div class="form-inner">
                                <label>{{ translate('Title') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Enter Title') }}" name="content[0][latest_product_title]">
                            </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Tour Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][tour][enable]" value="1" role="switch" id="tourcheck">
                            {{translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][tour][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][tour][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc">
                                        {{ translate('Descending') }}</option>
                                    <option value="asc">
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Hotel Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][hotel][enable]" value="1" role="switch" id="hotelcheck">
                            {{translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][hotel][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][hotel][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc">
                                        {{ translate('Descending') }}</option>
                                    <option value="asc">
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Activities Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][activities][enable]" value="1" role="switch" id="activitiescheck">
                            {{translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][activities][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][activities][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc">
                                        {{ translate('Descending') }}</option>
                                    <option value="asc">
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                            <label>{{translate('Transport Details')}}</label></div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][transport][enable]" value="1" role="switch" id="transportcheck">
                            {{translate('Enable')}}</label>
                        </div>
                        </div>

                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Total Display') }}</label>
                                <input type="text" class="username-input"
                                    placeholder="{{ translate('Total Display') }}"
                                    name="content[0][transport][total_display]">
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2">
                            <div class="form-inner">
                                <label> {{ translate('Order By') }}</label>
                                <select class="js-example-basic-single" name="content[0][transport][order_by]">
                                    <option value="">{{ translate('Select Option') }}</option>
                                    <option value="desc">
                                        {{ translate('Descending') }}</option>
                                    <option value="asc">
                                        {{ translate('Ascending') }}</option>
                                </select>
                            </div>
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
