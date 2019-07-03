@extends('layout.base')

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Booking History','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">

                <!--<form  method="post" action="{!! url('/admin/booking/search') !!}">


                    {!! Form::token() !!}
                   <div class="row">
                       <div class="col-md-3">
                           <select class="form-control" name="room_type">
                           <option value="" selected>---Select Room---</option>
                           @foreach($roomtype as $type)
                               <option value="{!! $type->getKey() !!}">{!! $type->getTitle() !!}</option>
                            @endforeach
                           </select>
                       </div>


                       <div class="col-md-3">
                           <div class="input-group date" data-provide="datepicker">
                               <input type="text" class="form-control" placeholder="Check In" name="check_in" autocomplete="off" required>
                               <div class="input-group-addon">
                                   <span class="glyphicon glyphicon-th"></span>
                               </div>
                           </div>
                       </div>

                       <div class="col-md-3">

                           <div class="input-group date" data-provide="datepicker">
                               <input type="text" class="form-control" placeholder="Check Out" name="check_out" autocomplete="off" required>
                               <div class="input-group-addon">
                                   <span class="glyphicon glyphicon-th"></span>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-2">
                           <button type="submit" class="btn btn-info">Go</button>
                       </div>

                   </div>
                </form>
-->

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
                            <th>{!! __('Room Type') !!}</th>
                            <th>{!! __('Check In') !!}</th>
                            <th>{!! __('Check Out') !!}</th>
                            <th>{!! __('Name') !!}</th>

                            <th class="text-right">{!! __('Action') !!}</th>
                        </tr>

                        @foreach($nodes as $node)
                            <tr>
                                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>
                                <td>{!! $node->booking_id !!}

                                </td>
                                <td>
                                    <?php
                                    $txn = \Extension\Site\Entities\Transactions::where('booking_id',$node->booking_id)->first();

                                    ?>
                                    @if($txn)
                                       {!! $txn->txn_id !!}
                                    @else
                                    Walking Guest
                                    @endif



                                </td>
                                <td>{!! \ReactorCMS\Entities\Node::find($node->type)->getTitle() !!}


                                </td>
                                <td>{!! $node->check_in !!}</td>
                                <td>{!! $node->check_out !!}</td>
                                <td>{!! $node->first_name.' '.$node->last_name !!}</td>

                               <td class="text-right">
                                    <a href="{!! route('reactor.booking.view',$node->id) !!}"><i class="fa fa-eye"></i> View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            @else
                {!! no_results_row(__('No Booking found ...')) !!}
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