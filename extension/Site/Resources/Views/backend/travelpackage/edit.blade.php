@extends('reactor.layout.base')


@section('scripts')

    @parent
    <script>

        @if($image)
        $('.img').ezdz({
            text: '<img src="{!! asset('/uploads/'.$image->path) !!}">'
        });
        @else
          $('.img').ezdz({
            text: 'Select Image'
        });
        @endif

    </script>
@endsection


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Travel Package'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">

                {!! form_start($form) !!}

                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li>
                            <a href="#seo" data-toggle="tab" aria-expanded="false"><i
                                        class="fa fa-magnet"></i> {!! uppercase(__('SEO')) !!}</a>
                        </li>

                        <li class="active">
                            <a href="#node" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-code-fork"></i> {!! uppercase(__('Node')) !!}</a>
                        </li>

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Edit')) !!}</li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Basic Information</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! form_row($form->title)  !!}
                                    </div>
                                </div>

                                <div class="hidden">
                                    <div class="col-md-12">
                                        {!! form_row($form->node_name)  !!}
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            {!! form_row($form->no_of_days) !!}
                                        </div>

                                        <div class="col-md-3">
                                            {!! form_row($form->price) !!}
                                        </div>

                                        <div class="col-md-3">
                                            {!! form_row($form->discount) !!}
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            {!! form_row($form->place_cover) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! form_row($form->description) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4" style="margin-top: 10px">
                                        <div class="form-group">
                                            <label>Select Image</label>
                                            <input class="img" id="photo"
                                                   name="image" type="file">
                                        </div>
                                    </div>
                                        </div>

                                </fieldset>








                            </div>

                        </div>

                        <div class="tab-pane" id="seo">
                            @include('reactor.nodes.includes.seo')
                        </div>
                        <!-- Morris chart - Sales -->

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>


                    </div>

                </div>

                {!! form_end($form,false)!!}

            </div>

            <div class="col-md-3">

                @include('Site::backend.travelpackage.partials.options_list',['_edit' => true])

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection