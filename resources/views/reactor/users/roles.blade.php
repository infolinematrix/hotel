@extends('layout.base')
<?php $_withForm = false; ?>

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("User List") !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.users.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
                        @include('partials.contents.form')
                    </div>
                </div>

                <hr>

            @include('roles.sublist', ['roles' => $user->roles])


            <!-- /.row -->
            </div>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

@include('partials.modals.delete_specific', ['message' => trans('roles.confirm_dissociate')])

