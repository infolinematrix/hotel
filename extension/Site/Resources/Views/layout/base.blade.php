<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('pageTitle') &mdash; {{ $home->getTranslationAttribute('meta_title') }}</title>

@yield('metadata')
<!-- Fav and touch icons -->
    <link rel="shortcut icon" href="{!! Theme::url('images/favicon.ico') !!}" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon"
          href="{!! Theme::url('images/apple-touch-icon-57x57-precomposed.png') !!}"/>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{!! Theme::url('images/apple-touch-icon-72x72-precomposed.png') !!}"/>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{!! Theme::url('images/apple-touch-icon-114x114-precomposed.png') !!}"/>
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{!! Theme::url('images/apple-touch-icon-144x144-precomposed.png') !!}"/>

    <!-- BASE CSS -->
{!! Theme::css('css/bootstrap.min.css') !!}
{!! Theme::css('css/style.css') !!}
{!! Theme::css('css/menu.css') !!}
{!! Theme::css('css/vendors.css') !!}
{!! Theme::css('css/icon_fonts/css/all_icons_min.css') !!}
{!! Theme::css('css/blog.css') !!}
{!! Theme::css('vendors/sweetalert2/dist/sweetalert2.min.css') !!}
{!! Html::style('assets/plugins/select2/select2.css') !!}

<!-- YOUR CUSTOM CSS -->
    {!! Theme::css('css/custom.css') !!}

    @yield('styles')
</head>

<body data-baseurl="{!! Url('/') !!}">

<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<div id="preloader">
    <div data-loader="circle-side"></div>
</div>
<!-- End Preload -->

<main>

    @yield('body')

</main>


<!-- Footer -->
@include('Site::partials.footer')
<!-- /Footer -->
<div id="toTop"></div>
<!-- Back to top button -->


<!-- COMMON SCRIPTS -->
{!! Theme::js('js/jquery-2.2.4.min.js') !!}
{!! Theme::js('js/common_scripts.min.js') !!}
{!! Theme::js('js/functions.js') !!}
{!! Html::script('assets/plugins/select2/select2.js') !!}
{!! Theme::js('js/search.js') !!}
{!! Theme::js('js/app.js') !!}
<!-- SPECIFIC SCRIPTS -->
{!! Theme::js('js/jquery.cookiebar.js') !!}
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script>
    $(document).ready(function () {
        'use strict';
        $.cookieBar({
            fixed: true
        });
    });
    $("#select2_search").select2({
        placeholder: "Select a State",
        allowClear: true
    });
</script>

@yield('scripts')
<!--Carousel-JS-->

</body>
</html>