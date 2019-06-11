@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Node Type','breadcrumb => []'])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! $pageTitle !!}</h3>

                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.nodefields.create',$nodetype->getKey()),'fa-plus','Create','btn-red') !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @include('nodefields.sublist', ['fields' => $nodetype->getFields()])
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection