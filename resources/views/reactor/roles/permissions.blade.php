@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Users','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __("Role Permissions") !!}</h3>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->

            @if($count > 0)
                @include('permissions.add')
            @endif

            @include('permissions.sublist', [
                        'route' => route('reactor.roles.permissions.revoke', $role->getKey())
                    ])


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection



