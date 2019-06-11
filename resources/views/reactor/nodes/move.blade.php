@extends('reactor.layout.base')
<?php $_withForm = true; ?>



<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Nodes','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! $pageTitle !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.nodes.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->


        @include('partials.contents.form')
        <!-- /.row -->


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection




