@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Nodes'),'breadcrumb => []'])


    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! $pageTitle !!} ::
                    <small>
                        {!! ($parent)
                        ? link_to($parent->getDefaultEditUrl(), uppercase($parent->getTitle()))
                        : uppercase(trans('nodes.title')) !!}
                    </small>
                </h3>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->

            {{ Form::open() }}

            <div class="box-body">

                <div class="row">
                    <div class="col-md-8 border-right">
                        <div class="row">

                            <div class="col-md-6">
                                {!! form_row($form->type)  !!}
                            </div>
                        </div>

                        {!! form_row($form->title)  !!}
                        {!! form_row($form->node_name)  !!}

                    </div>

                    <div class="col-md-4"></div>
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-action btn-black">
                    <i class="fa fa-save"></i>Save
                </button>
            </div>

            {{ Form::close() }}

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection