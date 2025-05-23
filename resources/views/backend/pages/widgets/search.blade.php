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
                        <div class="col-md-12 text-start">
                            <label>{{translate('Enable Search')}}</label><br>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][tour]" value="1" role="switch" id="tourcheck" {{isset($widgetContents['search'][0]['tour']) && $widgetContents['search'][0]['tour'] == 1 ? 'checked' : ''}}>
                            {{translate('Enable Tour Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][hotel]" value="1" role="switch" id="hotelcheck" {{isset($widgetContents['search'][0]['hotel']) && $widgetContents['search'][0]['hotel'] == 1 ? 'checked' : ''}}>
                            {{translate('Enable Hotel Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][activities]" value="1" role="switch" id="activitiescheck" {{isset($widgetContents['search'][0]['activities']) && $widgetContents['search'][0]['activities'] == 1 ? 'checked' : ''}}>
                            {{translate('Enable Activities Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="visacheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][visa]" value="1" role="switch" id="visacheck" {{isset($widgetContents['search'][0]['visa']) && $widgetContents['search'][0]['visa'] == 1 ? 'checked' : ''}}>
                            {{translate('Enable Visa Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][transport]" value="1" role="switch" id="transportcheck" {{isset($widgetContents['search'][0]['transport']) && $widgetContents['search'][0]['transport'] == 1 ? 'checked' : ''}}>
                            {{translate('Enable Transport Search')}}</label>
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
                        <div class="col-md-12 text-start">
                            <label>{{translate('Enable Search')}}</label><br>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="tourcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][tour]" value="1" role="switch" id="tourcheck">
                            {{translate('Enable Tour Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="hotelcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][hotel]" value="1" role="switch" id="hotelcheck">
                            {{translate('Enable Hotel Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="activitiescheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][activities]" value="1" role="switch" id="activitiescheck">
                            {{translate('Enable Activities Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="visacheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][visa]" value="1" role="switch" id="visacheck">
                            {{translate('Enable Visa Search')}}</label>
                        </div>
                        <div class="form-check form-switch justify-content-start">
                            <label class="form-check-label" for="transportcheck">
                            <input class="form-check-input" type="checkbox" name="content[0][search][0][transport]" value="1" role="switch" id="transportcheck">
                            {{translate('Enable Transport Search')}}</label>
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
