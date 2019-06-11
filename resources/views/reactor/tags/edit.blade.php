@extends('layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Tags','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">


        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Modify") !!}</h3>
                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.tags.index'),'fa-bars','List') !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
                    {!! form_start($form) !!}

                    {!! form_row($form->title) !!}
                    {!! form_row($form->tag_name) !!}

                    <div class="row">
                    <div class="col-md-12">
                        {!! form_row($form->meta_title) !!}
                    </div>
                        <div class="col-md-12">
                            {!! form_row($form->meta_keyword) !!}
                        </div>
                        <div class="col-md-12">
                            {!! form_row($form->meta_description) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                        {!! form_row($form->popular) !!}
                        </div>

                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>{!! __('Save') !!}
                    </button>
                </div>

                {!! form_end($form) !!}
            </div>
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->

@endsection



