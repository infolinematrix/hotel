@extends('layout.base')


@section('content')

    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ])


    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Create Tag") !!}</h3>

                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.tags.index'),'fa-bars','List') !!}
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">

            @include('partials.contents.tagform')
            <!-- /.row -->
            </div>

        </div>
        <!-- /.box -->

    </section>



@endsection