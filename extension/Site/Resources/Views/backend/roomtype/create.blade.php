@extends('reactor.layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Room Type'),'breadcrumb => []'])


    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! __('Room Type Add') !!}

                </h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.roomtype.index') !!}" class="btn btn-flat btn-danger">List</a>
                </div>
            </div>
            <!-- /.box-header -->

            {!! form_start($form)!!}

            {!! form_row($form->type)  !!}

            <div class="box-body">

                <div class="row">
                    <div class="col-md-12 border-right">

                        {!! form_row($form->title)  !!}
                        {!! form_row($form->node_name)  !!}

                    </div>
                </div>

            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-action btn-black">
                    <i class="fa fa-save"></i>Save
                </button>
            </div>
            <!--FORM END-->
            {!! form_end($form,false)!!}

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
