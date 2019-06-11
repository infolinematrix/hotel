@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Tags List") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.tags.create') !!}" class="btn btn-action btn-black">
                        <i class="fa fa-plus"></i>{!! __('Create') !!}
                    </a>

                </div>
            </div>

        @include('partials.contents.search', ['key' => 'tags'])
        <!-- /.box-header -->
            <div class="box-body">
                <div class="pt10">

                    @include('tags.list')
                </div>

                <!-- /.row -->
            </div>

            <div class="box-footer">
                @include('partials.contents.pagination', ['paginator' => $tags, 'paginationModifier' => 'pagination--inpage'])
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

