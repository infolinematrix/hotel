@extends('Site::layout.base')

@section('scripts')
    @parent
    @include('sweet::alert')
@endsection
@section('body')
    <!-- TopNav -->
    @include('Site::partials.topbar')

    <main>
        @yield('content')
    </main>
@endsection