@extends('frontend.template-' . selectedTheme() . '.partials.master')
@section('content')
    <div class="dashboard-wrapper">
        @include('frontend.template-1.customer.partials.sidenav')
        @yield('master')
    </div>
@endsection
