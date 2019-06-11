@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Create Permission") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.permissions.index') !!}"
                       class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>
            <!-- /.box-header -->

            @include('partials.contents.form')

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



