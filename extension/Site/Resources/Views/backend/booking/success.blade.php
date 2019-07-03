@extends('reactor.layout.base')




<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Booking Successfull'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">
                <div class="box box-default">
                    <div class="box-header with-border">
                <div class="alert alert-success pgray  alert-lg" role="alert">
                    <h2 class="no-margin no-padding">&#10004; {!! __('Thank You booking has been success') !!}.</h2>

                    <p>
                        <span><strong>{!! __('Booking ID') !!} : {!! $booking_ID !!}  </strong></span>
                    </p>
                </div>
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