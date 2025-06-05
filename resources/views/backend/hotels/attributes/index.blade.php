@extends('backend.layouts.master')
@section('content')
<style>
.select2-container {
    z-index: 9999;
}
</style>
    <div class="row mb-35">
        <div class="page-title d-flex justify-content-between align-items-center">
            <h4>{{ $page_title ?? '' }}</h4>
            <div class="btn-group">
            <button type="button" class="eg-btn btn--primary back-btn me-1" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop"><img src="{{ asset('backend/images/icons/add-icon.svg') }}" alt="Add New">
                {{ translate('Add New') }}</button>
                <a href="{{route('hotels.list')}}" class="eg-btn btn--primary back-btn"> <img src="{{asset('backend/images/icons/back.svg')}}" alt="{{ translate('Go Back') }}"> {{ translate('Go Back') }}</a>
            </div>
        </div>
    </div>
    @php
        $locale = get_setting('DEFAULT_LANGUAGE', 'en');
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="table-wrapper">
                <table class="eg-table table category-table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Attribute Name') }}</th>
                            <th>{{ translate('Position') }}</th>
                            <th>{{ translate('Terms') }}</th>
                            <th>
                                @foreach (\App\Models\Language::all() as $key => $language)
                                    <img src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-2">
                                @endforeach
                            </th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($attributes->count() > 0)
                        @foreach ($attributes as $key => $attribute)
                            <tr>
                                <td data-label="S.N">
                                    {{ ($attributes->currentpage() - 1) * $attributes->perpage() + $key + 1 }}</td>
                                <td data-label="Attribute Name">{{ $attribute->getTranslation('name') }}</td>
                                <td data-label="Position">{{ $attribute->position }}</td>
                                <td data-label="Terms"><a href="{{ route('hotel.attribute.terms.list', $attribute->id) }}" class="eg-btn primary-light--btn">{{ $attribute->hotel_terms->count() }}</a></td>
                                <td data-label="Language">
                                    @foreach (\App\Models\Language::all() as $key => $language)
                                        @if ($locale == $language->code)
                                            <i class="text-success bi bi-check-lg"></i>
                                        @else
                                            <a
                                                href="{{ route('hotel.attribute.edit', ['id' => $attribute->id, 'lang' => $language->code]) }}"><i
                                                    class="text--primary bi bi-pencil-square"></i></a>
                                        @endif
                                    @endforeach
                                </td>
                                <td data-label="Option">
                                    <div
                                        class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                       
                                        <a class="eg-btn add--btn"
                                            href="{{ route('hotel.attribute.edit', ['id' => $attribute->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="{{ route('hotel.attribute.delete', $attribute->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="eg-btn delete--btn show_confirm"
                                                data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                                        </form>
                                        <a class="eg-btn account--btn"
                                            href="{{ route('hotel.attribute.terms.list', $attribute->id) }}">{{translate('Manage Terms')}}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">{{translate('Yoo! Nothings Here Bruhv')}}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('footer')
        <div class="d-flex justify-content-center custom-pagination">
            {!! $attributes->links() !!}
        </div>
    @endpush

    @include('backend.hotels.attributes.modal')
@endsection
