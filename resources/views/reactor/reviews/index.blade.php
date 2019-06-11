@extends('layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Reviews','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __('Reviews') !!}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @if(count($reviews) > 0 )
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>{!! __('#ID') !!}</th>
                            <th>{!! __('Content') !!}</th>
                            <th>{!! __('Status') !!}</th>
                            <th>{!! __('Posted On') !!}</th>
                            <th class="text-right">{!! __('Action') !!}</th>
                        </tr>

                        @foreach($reviews as $node)
                            <tr>
                                <td>#{!! $node->id !!}</td>
                                <td>{!! str_limit($node->body,100) !!}</td>
                                <td>@if($node->approved == 1) Approved @else Pending @endif</td>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>

                                <td class="text-right">
                                    @include('reviews.partials.options',['node' => $node])
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
                @if(!is_null($reviews) && count($reviews) > 0)
                    @include('partials.contents.pagination', ['paginator' => $reviews])
                @endif
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection