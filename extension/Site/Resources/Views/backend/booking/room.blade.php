@extends('layout.base')

@section('styles')
    {!! Html::style('assets/plugin/datepicker/datepicker3.css') !!}

@endsection
@section('scripts')
    @parent
    {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.js') !!}

@endsection
<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Booking','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">

                <form  method="post" action="{!! url('/admin/booking/check') !!}">
                    {!! Form::token() !!}
                   <div class="row">
                       <div class="col-md-3">
                           <select class="form-control" name="room_type" required>
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
                       <div class="col-md-3">
                           <button type="submit" class="btn btn-info">Check</button>
                       </div>

                   </div>
                </form>


            </div>
            <!-- /.box-header -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection