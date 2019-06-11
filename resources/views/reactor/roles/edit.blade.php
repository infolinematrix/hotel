@extends('layout.base')
<?php $_withForm = true; ?>

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Edit Role") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.roles.index') !!}"
                       class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="row">
                <div class="col-md-8 border-right">
                    @include('partials.contents.form')
                </div>
                <div class="col-md-4">
                    <h4>OPTIONS</h4>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{!! route('reactor.roles.permissions',$role->getKey()) !!}">Permissions</a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



