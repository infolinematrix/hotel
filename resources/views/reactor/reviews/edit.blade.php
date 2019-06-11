@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Review'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">



                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Review')) !!}</li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Name :</label>
                                        {!! $review->name !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Email :</label>
                                        {!! $review->email !!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label>Rating :</label>
                                        {!! $review->rating !!} / 5
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="col-md-12">
                                       <div class="form-group">
                                      <label>Profile :</label>
                                      Dr. {!! \Reactor\Hierarchy\Node::find($review->reviewable_id)->getTitle() !!}
                                       </div>
                                </div>
                                    </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Review :</label>
                                        {!! $review->body !!}
                                        </div>
                                    </div>



                                </div>


                            </div>

                        </div>

                    </div>

                    <div class="box-footer">
                        <a href="{!! route('reactor.reviews') !!}" class="btn btn-black">Back</a>

                    </div>

                </div>



            </div>

            <div class="col-md-3">

                @include('reviews.partials.options_list',['_edit' => true])

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection