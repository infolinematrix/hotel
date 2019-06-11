<!DOCTYPE html>
<html lang="{{ get_full_locale_for(App::getLocale(), true) }}" class="no-js">
<head>
    <title>@yield('pageTitle') &mdash; Reactor</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::style('assets/plugins/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('assets/plugins/iCheck/all.css') !!}
    {!! Html::style('assets/plugins/select2/select2.min.css') !!}
    {!! Html::style('assets/backend/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/backend/css/skins/_all-skins.min.css') !!}
    {!! Html::style('assets/backend/css/backend-custom.css') !!}

    @yield('styles')

</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

    <!-- /.content -->
    </div>


</div>


{!! Html::script('assets/plugins/jQuery/jquery-3.1.1.min.js') !!}

{!! Html::script('assets/plugins/bootstrap/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/select2/select2.full.min.js') !!}
{!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}
{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}
{!! Html::script('assets/backend/js/app.min.js') !!}
{!! Html::script('assets/backend/js/js') !!}


@yield('scripts')

</body>
</html>