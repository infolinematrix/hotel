@extends('extension.layout.base')


@section('body')

    <!-- Start page loader -->
    <div id="page-loader">
        <div class="page-loader__spinner"></div>
    </div>
    <!-- End page loader -->

    <div class="container-main">


        <section class="section">
            <div class="container">

                @yield('content')
            </div>
        </section>



    </div>
@endsection