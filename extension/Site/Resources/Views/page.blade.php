@extends('Site::layout.default')

@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li>{!! $node->getTitle() !!}</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60_35">

        <div class="main_title">
            <h1>{!! $node->getTitle() !!} </h1>
        </div>

        <div class="row">
            <div class="col-md-8 col-centered">
                <div class="boxy">
                    <h5>{!! $node->getTitle() !!}</h5>
                    <p>{!! $node->content !!}</p>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
    <!-- /container -->
@endsection