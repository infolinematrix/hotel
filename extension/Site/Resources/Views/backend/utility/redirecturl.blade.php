@extends('layout.base')


        <!-- Main content -->
@section('content')
        <!-- Content Header (Page header) -->
@include('partials.content_header',['title' => 'Url','breadcrumb' => ('') ])

<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{!! __('All') !!}</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">

            <div class="nav-tabs-custom" style="cursor: move;">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right ui-sortable-handle">
                </ul>


                {!! Form::open(['route' => 'reactor.redirecturl.create']) !!}
                <div class="tab-content no-padding">

                    <div class="tab-pane active" id="node">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        From Url
                                    </label>
                                    <input required type="text" class="form-control" name="from_url">
                                </div>

                                <div class="col-md-6">
                                    <label>
                                        To Url
                                    </label>
                                    <input type="text" class="form-control" name="to_url">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Morris chart - Sales -->

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-action btn-black">
                        <i class="fa fa-save"></i>Save</button>
                </div>

                {!! Form::close() !!}
            </div>

            @if(count($urls) > 0 )
                <table class="table table-striped">
                    <tbody>


                    <tr>
                        <th>{!! __('From Url') !!}</th>
                        <th>{!! __('To Url') !!}</th>


                    </tr>

                    @foreach($urls as $url)
                        <tr>

                            <td>
                                {!! $url->from !!}
                            </td>
                            <td>
                                {!! $url->to  !!}
                            </td>

                            <td>
                                   <a href="{!! route('reactor.redirecturl.delete',$url->id) !!}" class="btn btn-danger btn-xs">Delete</a>

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
            @if(!is_null($urls) && count($urls) > 0)
                @include('backend.partials.contents.pagination', ['paginator' => $urls])
            @endif
        </div>


    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

@endsection