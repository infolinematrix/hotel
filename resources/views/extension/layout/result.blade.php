@extends('extension.layout.base')




@section('body')

    <!-- Start page loader -->
    <div id="page-loader">
        <div class="page-loader__spinner"></div>
    </div>
    <!-- End page loader -->

    <div class="container-main">

        @include('extension.partials.header_default',[
             'search_block' => false,
             'premium_products_block' =>false,
             'action_header' => true
        ])


        <section class="section">
            <div class="container">
                @yield('content')
            </div>
        </section>

        @include('extension.partials.footer')

    </div>
@endsection