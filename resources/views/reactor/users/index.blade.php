@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("User List") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.users.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @include('partials.contents.search', ['key' => 'users'])

                <div class="pt10">

                    @include('users.list')

                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                @include('partials.contents.pagination', ['paginator' => $users])
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



