@extends('reactor.layout.base')




<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Booking Details'),'breadcrumb => []'])


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
                                {!! Form::open(['route' => 'reactor.booking.confirmed']) !!}
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Booking Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Room Type :</strong></labe>
                                            {!! \ReactorCMS\Entities\Node::find($booking_details['type'])->getTitle() !!}

                                        </div>


                                        <div class="col-md-4">
                                            <labe><strong>No of rooms :</strong></labe>
                                            {!! $booking_details['no_of_rooms'] !!}

                                        </div>

                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <labe><strong>Check In :</strong></labe>
                                            {!! $booking_details['check_in'] !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Check Out :</strong></labe>
                                            {!! $booking_details['check_out'] !!}

                                        </div>
                                    </div>
                                    <br>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Total Amount :</strong></labe>
                                            {!! $booking_details['total_amount'] !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Name :</strong></labe>
                                            {!! $booking_details['first_name'].' '.$booking_details['last_name'] !!}

                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Contact No :</strong></labe>
                                            {!! $booking_details['phone'] !!}

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Email :</strong></labe>
                                            {!! $booking_details['email'] !!}

                                        </div>
                                    </div>





                                </fieldset>

                                <button type="submit" class="btn btn-info">Confirm</button>
                                {!! Form::close() !!}

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

                                <i class="fa fa-list"></i> <a href="{!! route('reactor.booking.index') !!}"> Booking List</a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection