@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'User','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Permissions") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.permissions.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <div class="pt10">

                    @include('permissions.list')

                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                @include('partials.contents.pagination', ['paginator' => $permissions])
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



