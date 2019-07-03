@extends('reactor.layout.base')




<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Book Room'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">



                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Book')) !!}</li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                {!! Form::open(['route' => 'reactor.booking.process']) !!}
                                {!! Form::hidden('type',$room->id) !!}
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">{!! $room->getTitle() !!}</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>First Name :</strong></labe>
                                            <input type="text" name="first_name" class="form-control" required>

                                        </div>

                                        <div class="col-md-6">
                                            <labe><strong>Last Name:</strong></labe>
                                            <input type="text" class="form-control" name="last_name" required>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <labe><strong>Phone:</strong></labe>
                                            <input type="text" class="form-control" name="phone" required>

                                        </div>
                                        <div class="col-md-6">
                                            <labe><strong>Email :</strong></labe>
                                            <input type="text" name="email" class="form-control">

                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <labe><strong>Check In :</strong></labe>
                                            <input type="text" readonly name="check_in" value="{!! $check_in !!}" class="form-control">

                                        </div>

                                        <div class="col-md-4">
                                            <labe><strong>Check Out:</strong></labe>
                                            <input type="text" readonly name="check_out" value="{!! $check_out !!}" class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <labe><strong>No of rooms:</strong></labe>
                                            <input type="number" class="form-control" value="{!! $no_of_rooms !!}" name="no_of_rooms" min="1" max="{!! $no_of_rooms !!}">

                                        </div>
                                    </div>


                                </fieldset>
                                <button type="submit" class="btn btn-info">Continue</button>
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

                                <i class="fa fa-list"></i> <a href="{!! route('reactor.booking.index') !!}">Booking List</a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection