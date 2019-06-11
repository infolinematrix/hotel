@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Page'),'breadcrumb => []'])


    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">
                    {!! __('Page Create') !!}

                </h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.pages.index') !!}" class="btn btn-flat btn-danger">List</a>
                </div>
            </div>
        <div class="row">
            <div class="col-md-9 border-right">
                {!! form_start($form)!!}
                {!! form_row($form->type)  !!}

                <div class="box-body">
    
                    <div class="row">
                        <div class="col-md-8 border-right">
    
                            {!! form_row($form->title)  !!}
                            <div class="hidden">
                                {!! form_row($form->node_name)  !!}
                            </div>
    
                        </div>
    
                        <div class="col-md-4"></div>
                    </div>
    
                </div>
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>Save
                    </button>
                </div>
    
                {!! form_end($form,false)!!}

            </div>

            <div class="col-md-3">

               

            </div>

        </div>
        </div>
    </section>
    <!-- /.content -->

@endsection