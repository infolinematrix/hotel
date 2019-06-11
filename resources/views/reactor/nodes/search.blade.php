@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Nodes','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! $pageTitle !!}</h3>

                <div class="box-tools pull-right">
                    <a href="{!! route('reactor.nodes.create') !!}" class="btn btn-flat btn-danger">Create</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>{!! __('#ID') !!}</th>
                        <th>{!! __('Title') !!}</th>
                        <th width="30%">{!! __('Node Name') !!}</th>
                        <th>{!! __('Parent') !!}</th>
                        <th>{!! __('Type') !!}</th>
                        <th>{!! __('Updated') !!}</th>
                        <th class="text-right">{!! __('Action') !!}</th>
                    </tr>

                    @if(!is_null($nodes) && count($nodes) > 0)
                        @foreach ($nodes as $node)
                            <tr>
                                <td>#{!! $node->getKey() !!}</td>
                                <td>
                                    {!! link_to($node->getDefaultEditUrl(), str_limit($node->getTitle(),50)) !!}
                               </td>
                                <td>{!! str_limit($node->node_name,25) !!}</td>
                                <td>{!! (is_null($node->parent_id) ? 0 : $node->parent_id) !!}</td>
                                <td>{!! $node->getNodeType()->label !!}</td>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>

                                <td class="text-right">
                                    @if($node->isMailing())
                                        {!! content_options('mailings', $node->getKey()) !!}
                                    @else
                                        {!! node_options($node) !!}
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    @else
                        {!! no_results_row(__('No Nodes found ...')) !!}
                    @endif

                    </tbody>
                </table>
                <!-- /.row -->
            </div>

            <div class="box-footer">
                @if(!is_null($nodes) && count($nodes) > 0)
                    @include('partials.contents.pagination', ['paginator' => $nodes])
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection