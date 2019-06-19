@extends('layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Transactions','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">{!! __('Transactions') !!}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">

                @if(count($nodes) > 0 )
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>{!! __('Date') !!}</th>
                            <th>{!! __('Booking ID') !!}</th>
                            <th>{!! __('Transaction ID') !!}</th>
                            <th>{!! __('Amount') !!}</th>
                            <th>{!! __('Name') !!}</th>


                            <th class="text-right">{!! __('Action') !!}</th>
                        </tr>

                        @foreach($nodes as $node)
                            <tr>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>
                                <td>{!! $node->booking_id !!}
                                <?php
                                $booking = \Extension\Site\Entities\Booking::where('booking_id',$node->booking_id)->first();


                                ?>


                                </td>
                                <td>
                                    {!! $node->txn_id !!}
                                </td>
                                <td>{!! $node->amount !!}</td>
                                <td>{!! $node->payer_first_name.' '.$node->payer_last_name !!}</td>


                                <td class="text-right">
                                    <a href="{!! route('reactor.transaction.view',$node->id) !!}"><i class="fa fa-eye"></i> View</a>




                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @else
                {!! no_results_row(__('No Transaction found ...')) !!}
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