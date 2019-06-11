@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Node Type','breadcrumb => []'])

    <section class="content">

        <div class="row">
            <div class="col-md-9">
                {!! form_start($form) !!}

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! $pageTitle !!} </h3>
                        <div class="box-tools pull-right">
                            {!! action_button(route('reactor.nodetypes.index'),'fa-bars','List') !!}
                        </div>
                    </div>

                    <div class="box-body">
                        {!!  form_row($form->label)   !!}
                        <div class="row">

                            <div class="col-md-3">
                                {!!  form_row($form->color)   !!}
                            </div>

                            <div class="col-md-3">
                                {!!  form_row($form->hides_children)   !!}
                            </div>

                            <div class="col-md-3">
                                {!!  form_row($form->visible)   !!}
                            </div>

                            <div class="col-md-3">
                                {!!  form_row($form->taggable)   !!}
                            </div>

                        </div>
                        <!-- /.row -->
                        {!!  form_row($form->allowed_children)   !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>
                    </div>
                    {!! form_end($form, $renderRest = false) !!}
                </div>
                <!-- /.box -->
            </div>

            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Options</h3>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{!! route('reactor.nodetypes.fields', $nodetype->getKey()) !!}"><i class="fa fa-ellipsis-v "></i> Fields</a></li>
                            <li><a href="{!! route('reactor.nodetypes.nodes', $nodetype->getKey()) !!}"><i class="fa fa-ellipsis-v "></i> Nodes</a></li>
                            <li><a href="#"><i class="fa fa-ellipsis-v"></i> Delete</a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>

        </div>
    </section>
    <!-- /.content -->

@endsection