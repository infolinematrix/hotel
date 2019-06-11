@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Node Type','breadcrumb => []'])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! $pageTitle !!}</h3>
                <div class="box-tools pull-right">
                    {!! action_button(route('reactor.nodetypes.create'),'fa-plus','Create') !!}
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>

                        @if ($nodetypes->count() > 0)

                            <tr>
                                <th width="10%">#ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th class="text-right">{!! __('Action') !!}</th>
                            </tr>

                            @foreach($nodetypes as $nodetype)
                                <tr>
                                    <td>{{ '# '.$nodetype->getKey() }}</td>
                                    <td>{!! link_to_route('reactor.nodetypes.edit', $nodetype->name, $nodetype->getKey()) !!}</td>
                                    <td>{{ $nodetype->label }}</td>

                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs" data-toggle="dropdown">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="{{ route('reactor.nodetypes.edit', $nodetype->getKey()) }}"><i class="fa fa-ellipsis-v "></i> {!! __('Edit') !!}</a>
                                                </li>

                                                <li class="divider"></li>
                                                <li>
                                                    <form action="{{ route('reactor.nodetypes.destroy', $nodetype->getKey()) }}" method="POST" class="delete-form">
                                                        {!! method_field('DELETE') . csrf_field() !!}
                                                        <button class="btn-link" type="submit"><i class="fa fa-trash"></i>{!! __('Delete') !!}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                        @else
                        {!! no_results_row(__('No Node Type found ...')) !!}
                        @endif
                    </tbody>
                </table>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                @include('partials.contents.pagination', ['paginator' => $nodetypes])
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection