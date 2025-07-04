@extends('backend.layouts.master')
@section('content')
    <div class="row mb-35 g-4">
        <div class=" col-md-6">
            <div class="page-title text-md-start text-center">
                <h4>{{ $stateSingle->name }} - {{ $page_title ?? '' }}</h4>
            </div>
        </div>
        <div
            class=" col-md-6 text-md-end text-center d-flex justify-content-md-end justify-content-center flex-row align-items-center flex-wrap gap-4">
            <form action="" method="get">
                <div class="input-with-btn d-flex jusify-content-start align-items-strech">
                    <input type="text" name="search" placeholder="{{translate('Search your city')}}...">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
            <a href="{{ url()->previous() }}" class="eg-btn btn--primary back-btn"><img src="http://127.0.0.1:8000/backend/images/icons/back.svg" alt="Go Back">Go Back</a>
        </div>
    </div>

    <form action="{{ route('city.store', $stateSingle->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="eg-card product-card">
                    <div class="form-inner mb-35">
                        <label>{{ translate('Name') }} <span class="text-danger">*</span></label>
                        <input type="text" class="username-input" value="{{ old('name') }}" name="name"
                            placeholder="{{ translate('Enter Name') }}">
                        @error('name')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-group mt-15 text-center  ">
                        <input type="submit" class="eg-btn btn--green back-btn me-3" value="{{ translate('Save') }}">
                    </div>
                </div>
            </div>


        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="table-wrapper">
                <table class="eg-table table">
                    <thead>
                        <tr>
                            <th>{{ translate('No.') }}</th>
                            <th>{{ translate('Name') }}</th>
                            <th>{{ translate('Option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $key => $city)
                            <tr>
                                <td data-label="S.N">{{ ($cities->currentpage() - 1) * $cities->perpage() + $key + 1 }}</td>
                                <td data-label="Name">{{ $city->name }}</td>
                                <td data-label="Action">
                                    <div
                                        class="d-flex flex-row justify-content-md-center justify-content-end align-items-center gap-2">
                                        <a href="{{ route('city.edit', $city->id) }}" title="{{ translate('Edit') }}"
                                            class="eg-btn add--btn"><i class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="{{ route('city.delete', $city->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="eg-btn delete--btn show_confirm"
                                                data-toggle="tooltip" title="{{ translate('Delete') }}"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('footer')
        <div class="d-flex justify-content-center custom-pagination">
            {!! $cities->links() !!}
        </div>
    @endpush
@endsection
