@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Nodes'),'breadcrumb => []'])

    <section class="content">
        <div class="row">
            <div class="col-md-9 border-right">

                   


                {!! form_start($form) !!}

                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">
                        <li>
                            <a href="{!! route('reactor.nodes.parameters.edit', $node->getKey()) !!}"
                               class="text-danger"><i class="fa fa-gear"></i> {!! uppercase(__('Parameters')) !!}</a>
                        </li>

                        <li>
                            <a href="{!! route('reactor.nodes.statistics', $node->getKey()) !!}" class="text-danger"><i
                                        class="fa fa-line-chart"></i> {!! uppercase(__('Statistics')) !!}</a>
                        </li>

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
                            @include('nodes.includes.node')
                        </div>

                        <div class="tab-pane" id="seo">
                            @include('nodes.includes.seo')
                        </div>

                        <!-- Morris chart - Sales -->

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>
                    </div>

                </div>

                {!! form_end($form) !!}

            </div>
            <div class="col-md-3" id="aside">
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