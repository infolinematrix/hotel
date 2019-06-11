@extends('backend.layout.base')

@section('scripts')
    @parent
    {!! Theme::js('js/marketing.js') !!}
@endsection
        <!-- Main content -->
@section('content')
        <!-- Content Header (Page header) -->
@include('backend.partials.content_header',['title' => __('Email'),'breadcrumb => []'])


<section class="content">

    {!! form_start($form) !!}
    <div class="row">
        <div class="col-md-8 border-right">

            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                    <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Send')) !!}</li>
                </ul>

                <div class="tab-content no-padding">


                    <div class="tab-pane active" id="node">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="emails">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    {!! form_row($form->subject,['value'=> 'Hello, testing']) !!}
                                </div>
                                <div class="col-md-12">
                                    {!! form_row($form->message,['value' => 'Testing Mail']) !!}
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Morris chart - Sales -->

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>Send
                    </button>
                    <div id="msg" class="pull-right text-danger">Process</div>
                </div>


            </div>

        </div>
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {!! __('SMTP_MAILS') !!}
                    </h3>

                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <ul class="list-group">

                        @foreach($smtp_mails as $key => $value)
                            <li class="list-group-item">
                                {{ Form::checkbox('smtp_mails[]',$key) }} {!! $value['username'] !!}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
    {!! form_end($form,false) !!}
</section>
<!-- /.content -->

@endsection