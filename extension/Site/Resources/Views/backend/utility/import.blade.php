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



                    <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Import')) !!}</li>
                </ul>



                {!! Form::open(['route' => 'reactor.email.import.post','files' => true]) !!}
                <div class="tab-content no-padding">

                    <div class="tab-pane active" id="node">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                       <input type="file" name="file">
                                   </div>
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
                {!! Form::close() !!}


            </div>
        </div>



    </div>

</section>
<!-- /.content -->

@endsection