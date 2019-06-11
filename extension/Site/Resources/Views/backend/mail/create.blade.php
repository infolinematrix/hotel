@extends('backend.layout.base')


        <!-- Main content -->
@section('content')
        <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' => __('Mail'),'breadcrumb => []'])


<section class="content">


    <div class="row">
        <div class="col-md-9 border-right">
            {!! form_start($form) !!}

            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">



                    <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Send mail')) !!}</li>
                </ul>


                <div class="tab-content no-padding">

                    <div class="tab-pane active" id="node">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! form_row($form->email) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    {!! form_row($form->title) !!}

                                    {!! form_row($form->content) !!}

                                </div>
                            </div>


                        </div>

                    </div>

                    <!-- Morris chart - Sales -->

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>Send</button>
                </div>

            </div>

            {!! form_end($form) !!}

        </div>


    </div>

</section>
<!-- /.content -->

@endsection