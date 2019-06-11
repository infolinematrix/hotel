@extends('Site::layout.base')

@section('body')
    <!-- TopNav -->
    @include('Site::partials.topbar')

    <main>
        @yield('content')
    </main>
@endsection