@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Node Type','breadcrumb => []'])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! $pageTitle !!}
                </h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.nodetypes.index') !!}" class="btn btn-flat btn-danger">List</a>
                </div>
            </div>

            {!! form_start($form) !!}

            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-8 border-right">
                        <div class="row">
                            <div class="col-md-6">
                                {!! form_row($form->name) !!}
                            </div>
                            <div class="col-md-6">
                                {!! form_row($form->label) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                {!! form_row($form->hides_children) !!}
                            </div>
                            <div class="col-md-3">
                                    {!! form_row($form->visible) !!}
                            </div>
                            <div class="col-md-3">
                                    {!! form_row($form->taggable) !!}
                            </div>
                            <div class="col-md-3">
                                    {!! form_row($form->mailing) !!}
                            </div>
                            <div class="col-md-3">
                                    {!! form_row($form->color) !!}
                            </div>



                        </div>


                    </div>

                </div>
                <!-- /.row -->
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

    </section>
    <!-- /.content -->

@endsection