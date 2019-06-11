<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="{{ App::getLocale() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <title>@yield('pageTitle') &mdash; {{ $home->getTranslationAttribute('meta_title') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">




    @yield('metadata')

    {!! Theme::css('vendors/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') !!}
    {!! Theme::css('vendors/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Theme::css('vendors/animate.css/animate.min.css') !!}
    {!! Theme::css('vendors/select2/dist/css/select2.min.css') !!}
    {!! Theme::css('vendors/slick-carousel/slick/slick.css') !!}
    {!! Theme::css('vendors/nouislider/distribute/nouislider.min.css') !!}
    {!! Theme::css('vendors/sweetalert2/dist/sweetalert2.min.css') !!}


    @yield('styles')

    {!! Theme::css('css/app_1.min.css') !!}
    {!! Theme::css('css/app_2.min.css') !!}
    {!! Theme::css('css/style.css') !!}




    <!-- Page Loader JS -->
    {!! Theme::js('js/page-loader.min.js', "async") !!}

    <script>
        (function (b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                    function () {
                        (b[l].q = b[l].q || []).push(arguments)
                    });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', '{{ env('API_ANALYTICS') }}', 'auto');
        ga('send', 'pageview');
    </script>

</head>
<body class="body @yield('bodyStyle', 'body--default')" data-baseurl="{!! Url('/') !!}">

<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

@yield('body')

@yield('modules')


{!! Theme::js('vendors/jquery/dist/jquery.min.js') !!}
{!! Theme::js('vendors/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Theme::js('vendors/Waves/dist/waves.min.js') !!}
{!! Theme::js('vendors/select2/dist/js/select2.full.min.js') !!}
{!! Theme::js('vendors/slick-carousel/slick/slick.min.js') !!}
{!! Theme::js('vendors/nouislider/distribute/nouislider.min.js') !!}
{!! Theme::js('vendors/nouislider/distribute/wNumb.js') !!}
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

@yield('scripts')

<!-- IE9 Placeholder -->
<!--[if IE 9 ]>
{!! Theme::js('vendors/jquery-placeholder/jquery.placeholder.min.js') !!}
<![endif]-->



<!-- Site functions and actions -->
{!! Theme::js('js/app.min.js') !!}
<!-- Demo only -->
{!! Theme::js('js/demo/demo.js') !!}
{!! Theme::js('js/app.js') !!}

</body>
</html>