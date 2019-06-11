<!DOCTYPE html>
<html lang="{{ get_full_locale_for(App::getLocale(), true) }}" class="no-js">
<head>
    <title>Admin  &mdash; @yield('pageTitle') </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <link rel='shortcut icon' type='image/x-icon' href='/reactor.png'/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::style('assets/plugins/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') !!}
    {!! Html::style('assets/plugins/iCheck/all.css') !!}
    {!! Html::style('assets/plugins/select2/select2.css') !!}
    {!! Html::style('assets/plugins/dropzone/jquery.ezdz.css') !!}

    {!! Html::style('assets/reactor/css/ionicons.min.css') !!}
    {!! Html::style('assets/reactor/css/AdminLTE.min.css') !!}
    {!! Html::style('assets/reactor/css/skins/_all-skins.min.css') !!}
    {!! Html::style('assets/reactor/css/tags.css') !!}
    {!! Html::style('assets/reactor/css/search_parent.css') !!}
    {!! Html::style('assets/reactor/css/backend-custom.css') !!}

    @yield('styles')

</head>
<body data-baseurl='{!! Url('/') !!}' class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">

    <!-- Header -->
@include('partials.header')

<!-- Left side column. contains the logo and sidebar -->
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

    @yield('content')

    <!-- /.content -->
    </div>

    @include('partials.footer')

</div>

@include('partials.modals.delete')

{!! Html::script('assets/plugins/jQuery/jquery-3.1.1.min.js') !!}


{!! Html::script('assets/plugins/bootstrap/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/select2/select2.min.js') !!}
{!! Html::script('assets/plugins/iCheck/icheck.min.js') !!}
{!! Html::script('assets/plugins/fastclick/fastclick.js') !!}
{!! Html::script('assets/reactor/js/adminlte.js') !!}
{!! Html::script('assets/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('assets/plugins/dropzone/jquery.ezdz.js') !!}



{!! Html::script('assets/reactor/js/adminlte.js') !!}
{!! Html::script('assets/reactor/js/parent_search.js') !!}
{!! Html::script('assets/reactor/js/nodesforms.js') !!}
{!! Html::script('assets/reactor/js/forms.js') !!}
{!! Html::script('assets/reactor/js/tags.js') !!}

{!! Html::script('assets/reactor/js/custom.js') !!}

@yield('scripts')

</body>
</html>