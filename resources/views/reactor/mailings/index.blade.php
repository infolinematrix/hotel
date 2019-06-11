@extends('layout.base')

@section('pageSubtitle', uppercase(trans('mailings.title')))



@section('content')

    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Mailings','breadcrumb' => (!empty($node) ? $node : null) ])


    @if($mailings->count())
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">{!! $pageTitle !!}</h3>

                    <div class="box-tools pull-right">
                        <a href="{!! route('reactor.mailings.create') !!}" class="btn btn-flat btn-danger">Create</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                @include('nodes.list', ['nodes' => $mailings])
                <!-- /.row -->
                </div>

                <div class="box-footer">
                    @if(!is_null($mailings) && count($mailings) > 0)
                        @include('partials.contents.pagination', ['paginator' => $mailings])
                    @endif
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

    @else
        {!! no_results_row('mailings.no_mailings') !!}
    @endif
@endsection

