@extends('layout.base')

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
                    <a href="{!! route('reactor.users.index') !!}"
                       class="btn btn-flat btn-danger">{!! __('List') !!}</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="row">
                    <div class="col-md-6 border-right">
                        @include('partials.contents.form')
                    </div>

                    <div class="col-md-6">
                        <div class="box no-border no-shadow">
                            <h4>Options</h4>

                            <ul class="list-unstyled">
                                <li>
                                    <a href="{!! route('reactor.users.roles',$user->getKey()) !!}">Assign Role</a>
                                </li>
                                <li>
                                    <a href="{!! route('reactor.users.permissions',$user->getKey()) !!}">Assign
                                        Permission</a>
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>
                <!-- /.row -->
            </div>


        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

@section('scripts')
    @parent
    <script>window.locale = '{{ app()->getLocale() }}';</script>
    {!! Theme::js('js/forms.js') !!}
@endsection