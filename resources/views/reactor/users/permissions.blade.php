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
                <h3 class="box-title">{!! __("User Permission List") !!}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

            @include('permissions.sublist', [
                    'route' => route('reactor.users.permissions.revoke', $user->getKey())
                ])
            <!-- /.row -->

                @if($count > 0)
                    @include('permissions.add')
                @endif
            </div>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

@include('partials.modals.delete_specific', ['message' => trans('roles.confirm_dissociate')])


