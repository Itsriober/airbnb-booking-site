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
                <a href="{{route('visa.list')}}" class="eg-btn btn--primary back-btn"> <img src="{{asset('backend/images/icons/back.svg')}}" alt="{{ translate('Go Back') }}"> {{ translate('Go Back') }}</a>
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
                            <th>{{ translate('Category Name') }}</th>
                            <th>{{ translate('Status') }}</th>
                            <th>{{ translate('Date') }}</th>
                            <th>
                                @foreach (\App\Models\Language::all() as $key => $language)
                                    <img src="{{ asset('assets/img/flags/' . $language->code . '.png') }}" class="mr-2">
                                @endforeach
                            </th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($categories->count() > 0)
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td data-label="S.N">
                                    {{ ($categories->currentpage() - 1) * $categories->perpage() + $key + 1 }}</td>
                                <td data-label="Name">{{ $category->getTranslation('name') }}</td>
                                <td data-label="Status">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input flexSwitchCheckStatus" type="checkbox"
                                                data-activations-status="{{ $category->status }}"
                                                data-id="{{ $category->id }}" data-type="visacategory"
                                                id="flexSwitchCheckStatus{{ $category->id }}"
                                                {{ $category->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td data-label="Date">{{ dateFormat($category->created_at) }}</td>
                                <td data-label="Language">
                                    @foreach (\App\Models\Language::all() as $key => $language)
                                        @if ($locale == $language->code)
                                            <i class="text-success bi bi-check-lg"></i>
                                        @else
                                            <a
                                                href="{{ route('visa.category.edit', ['id' => $category->id, 'lang' => $language->code]) }}"><i
                                                    class="text--primary bi bi-pencil-square"></i></a>
                                        @endif
                                    @endforeach
                                </td>
                                <td data-label="Option">
                                    <div
                                        class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                        <a class="eg-btn add--btn"
                                            href="{{ route('visa.category.edit', ['id' => $category->id, 'lang' => get_setting('DEFAULT_LANGUAGE', 'en')]) }}"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="{{ route('visa.category.delete', $category->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="eg-btn delete--btn show_confirm"
                                                data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                                        </form>
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
            {!! $categories->links() !!}
        </div>
    @endpush

    @include('backend.visa.category.modal')
@endsection
