@extends('backend.layout.base')


        <!-- Main content -->
@section('content')
        <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' => __('Email'),'breadcrumb => []'])


<section class="content">


    <div class="row">
        <div class="col-md-9 border-right">



            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">



                    <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Add')) !!}</li>
                </ul>


                {!! form_start($form) !!}
                <div class="tab-content no-padding">

                    <div class="tab-pane active" id="node">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! form_row($form->email) !!}
                                </div>

                                <div class="col-md-6">
                                    <div class="row" data-gutter="10">
                                        <div class="col-md-6 col-xs-6">
                                            {!! form_row($form->country) !!}
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            {!! form_row($form->city) !!}
                                        </div>
                                    </div>
                                 </div>
                            </div>
                          <div class="row">
                                <div class="col-md-6">
                                    {!! form_row($form->name) !!}
                                </div>


                                <div class="col-md-6">
                                    {!! form_row($form->additional) !!}
                                </div>


                            </div>



                        </div>

                    </div>

                    <!-- Morris chart - Sales -->

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>Save</button>
                </div>
                {!! form_end($form) !!}

            </div>
        </div>

        <div class="col-md-3">

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Browse</h3>

                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <a href="{!! route('reactor.email.import') !!}">
                                <i class="fa fa-angle-right"></i>
                                <b> Import </b>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- /.box-body -->
            </div>

        </div>


    </div>

</section>
<!-- /.content -->

@endsection