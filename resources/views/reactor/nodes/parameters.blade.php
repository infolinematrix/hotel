@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Nodes'),'breadcrumb => []'])


    <section class="content">

        <div class="row">

            <div class="col-md-9 border-right">

            {!! form_start($form) !!}

            <!-- SELECT2 EXAMPLE -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! $pageTitle !!}</h3>

                        <div class="box-tools pull-right">
                            <a href="{!! route('reactor.nodes.edit',[$node->getKey(), $source->id]) !!}"
                               class="btn btn-flat btn-danger">{!! __('Node') !!}</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-3">
                                {!! form_row($form->visible)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->locked)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->sterile)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->home)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->hides_children)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->priority)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->status)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->published_at)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->children_order)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->children_order_direction)  !!}
                            </div>
                            <div class="col-md-3">
                                {!! form_row($form->children_display_mode)  !!}
                            </div>

                            <div class="col-md-3">
                                {!! form_row($form->layout)  !!}
                            </div>
                        </div>


                        <!-- /.row -->
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>
                    </div>
                </div>
                <!-- /.box -->

                {!! form_end($form) !!}


            </div>
            <div class="col-md-3">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {!! __('OPTIONS') !!}
                        </h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        @include('nodes.options', ['_edit' => true])
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection