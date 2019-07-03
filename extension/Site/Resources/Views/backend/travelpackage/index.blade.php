@extends('layout.base')


<!-- Main content -->
@section('content')


    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Travel Package','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __('Travel Package') !!}</h3>

                <div class="box-tools pull-right">

                    <a href="{!! route('reactor.travelpackage.create') !!}" class="btn btn-flat btn-danger">Create</a>

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @if(count($nodes) > 0 )
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>{!! __('#Image') !!}</th>
                            <th>{!! __('Title') !!}</th>
                            <th>{!! __('Price') !!}</th>
                            <th>{!! __('Updated') !!}</th>
                            <th class="text-right">{!! __('Action') !!}</th>
                        </tr>

                        @foreach($nodes as $node)
                            <?php
                            $image = $node->getImages()->first();
                            ?>

                            <tr>
                                <td>
                                    <img src="{!! asset('uploads/'.$image->path )!!}" style="width:100px;height:100px">
                                </td>
                                <td>
                                    {!! $node->getTitle() !!}
                                </td>
                                <td>{!! $node->price !!}/-</td>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>
                                <td class="text-right">
                                    @include('Site::backend.travelpackage.partials.options',['node' => $node])

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @else
                {!! no_results_row(__('No Nodes found ...')) !!}
            @endif
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