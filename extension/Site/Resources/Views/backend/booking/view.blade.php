@extends('reactor.layout.base')




<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Transaction'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">



                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Details')) !!}</li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Transaction Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Booking ID :</strong></labe>
                                            {!! $transaction->booking_id !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Transaction ID :</strong></labe>
                                            {!! $transaction->txn_id !!}

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Total Amount :</strong></labe>
                                            {!! $transaction->amount !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Payer Name :</strong></labe>
                                            {!! $transaction->payer_first_name.' '.$transaction->payer_last_name !!}

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Payer Contact :</strong></labe>
                                            {!! $transaction->payer_contact !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Payer Email :</strong></labe>
                                            {!! $transaction->payer_email !!}

                                        </div>
                                    </div>





                                </fieldset>

                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Room Details</legend>

                                    @foreach($booking as $book)
                                    <fieldset class="scheduler-border">
                                        <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Room Type :</strong></labe>
                                            {!! \ReactorCMS\Entities\Node::find($book->type)->getTitle() !!}
                                        </div>
                                        <div class="col-md-6">
                                            <labe><strong>No of Rooms :</strong></labe>
                                            {!! $book->no_of_rooms !!}

                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <labe><strong>Check In :</strong></labe>
                                                {!! $book->check_in !!}
                                            </div>
                                            <div class="col-md-6">
                                                <labe><strong>Check Out :</strong></labe>
                                                {!! $book->check_out !!}

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <labe><strong>Tariff :</strong></labe>
                                                {!! $book->rate !!}
                                            </div>
                                            <div class="col-md-6">
                                                <labe><strong>Total Amount :</strong></labe>
                                                {!! $book->total_amount !!}

                                            </div>
                                        </div>
                                        </fieldset>
                                    @endforeach
                                    <br>




                                </fieldset>
                            </div>

                        </div>


                        <!-- Morris chart - Sales -->

                    </div>



                </div>



            </div>

            <div class="col-md-3">

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {!! __('OPTIONS') !!}
                        </h3>

                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <ul class="list-group">

                            <li class="list-group-item">

                                <i class="fa fa-list"></i> <a href="{!! route('reactor.transaction.index') !!}"> Lists</a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection