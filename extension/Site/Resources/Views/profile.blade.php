@extends('Site::layout.default')

@section('scripts')

    @parent
    {!! Theme::js('js/appointment.js') !!}
@endsection
@section('styles')
    {!! Theme::css('css/review.css') !!}
@endsection
@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{!! route('site.home') !!}">Home</a></li>
                <li>
                    @foreach(getSpeciality($node->getKey()) as $speciality => $value)
                    <a href="{!! route('browse',str_slug($value)) !!}">

                            <span>{!! $value !!}</span>

                    </a>
                    @endforeach
                </li>
                <li>{!! $node->getTitle() !!}</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#section_1" class="active">General info</a></li>
                            <li><a href="#section_2">Reviews</a></li>
                            <li><a href="#sidebar">Booking</a></li>
                        </ul>
                    </div>
                </nav>
                <div id="section_1">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4">
                                    <figure>
                                        <img src="{!! $image ? asset('uploads/'.$image->path) : '' !!}"
                                             alt="{!! $node->getTitle() !!}"
                                             class="img-fluid"/>
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    @foreach(getSpeciality($node->getKey()) as $speciality => $value)
                                        <small>{!! $value !!}</small>
                                    @endforeach
                                    <h1>{!! $node->getTitle() !!}</h1>

                                    <ul class="statistic">
                                        <li>{!! $viewed !!} Views</li>
                                    </ul>
                                    <ul class="contacts">
                                        <li>
                                            <h6>Address</h6>
                                            {!! $node->profile_address !!}, {!! $location !!}
                                            - {!! $node->profile_zipcode !!}
                                        </li>
                                        <li>
                                            <h6>Phone</h6> <a
                                                    href="tel://{!! $node->profile_phone !!}">{!! $node->profile_phone !!}</a>
                                            - <a
                                                    href="tel://{!! $node->profile_landline !!}">{!! $node->profile_landline !!}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <!-- /profile -->
                        <div class="indent_title_in">
                            <i class="pe-7s-user"></i>
                            <h3>Professional statement</h3>
                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                        </div>
                        <div class="wrapper_indent">
                            <p>{!! $node->profile_about !!}</p>
                            <h6>Specializations</h6>

                            <div class="row">
                                @foreach($keywords as $tag)
                                    <div class="col-lg-6">
                                        <span class=" bullets">
                                        {!! $tag->title !!}
                                    </span>
                                    </div>
                                @endforeach
                            </div>

                            <!-- /row-->
                        </div>
                        <!-- /wrapper indent -->

                        <hr/>

                        @if(count($educations) > 0)
                            <div class="indent_title_in">
                                <i class="pe-7s-news-paper"></i>
                                <h3>Education</h3>
                                <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                            </div>
                            <div class="wrapper_indent">
                                <h6>Curriculum</h6>
                                <ul class="list_edu">
                                    @foreach($educations as $education)
                                        <li><strong>{!! $education->getTitle() !!}</strong>
                                            - {!! $education->description !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif

                    <!--  End wrapper indent -->
                    </div>
                    <!-- /section_1 -->
                </div>
                <!-- /box_general -->

                <div id="section_2">
                    <div class="box_general_3">
                        <div class="reviews-container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>{!! $rattings !!}</strong>
                                        <div class="rating">
                                            @for($i=1; $i <= 5; $i++)
                                                @if($i <= $rattings)
                                                    <i class="icon_star voted"></i>
                                                @else
                                                    <i class="icon_star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <small>Based on {!! count($reviews) !!} reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {!! getReviewratingCount($node,5)*5 !!}%"
                                                     aria-valuenow="{!! getReviewratingCount($node,5) !!}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>5 stars</strong></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {!! getReviewratingCount($node,4)*5 !!}%"
                                                     aria-valuenow="{!! getReviewratingCount($node,4) !!}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>4 stars</strong></small>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {!! getReviewratingCount($node,3)*5 !!}%"
                                                     aria-valuenow="{!! getReviewratingCount($node,3) !!}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>3 stars</strong></small>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {!! getReviewratingCount($node,2)*5 !!}%"
                                                     aria-valuenow="{!! getReviewratingCount($node,2) !!}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>2 stars</strong></small>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: {!! getReviewratingCount($node,1)*5 !!}%"
                                                     aria-valuenow="{!! getReviewratingCount($node,1) !!}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <small><strong>1 stars</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->

                            <hr/>

                            @if(count($reviews) > 0)
                            @foreach($reviews as $review)
                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="{!! asset('assets/user.png') !!}" alt=""/>
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        @for($i=1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                <i class="icon_star voted"></i>
                                                @else
                                                <i class="icon_star"></i>
                                                @endif
                                            @endfor

                                    </div>
                                    <div class="rev-info">
                                        {!! $review->name !!} – {!! date('M',strtotime($review->created_at)) !!} {!! date('d',strtotime($review->created_at)) !!}, {!! date('Y',strtotime($review->created_at)) !!}:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            {!! $review->body !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                            <!-- End review-box -->
                        </div>
                        <!-- End review-container -->

                        <!-- Review-Form -->
                        <div id="writereview" class="review_form">
                            <div class="widget_title">
                                <h4>Write a Review </h4>
                            </div>
                            {!! Form::open(['url' => route('profile.review'),'id' => 'PostReview']) !!}
                            <input type="hidden" id="node_name" name="node_name" value="{!! $node->getName() !!}">
                            <div class="form-group">
                                <label class="form-label">Your Rating for this listing</label>
                                <div class="listing_rating">
                                    <ul class="list booking-item-raiting-summary-list stats-list-select">
                                        <li>
                                            <div class="list booking-item-raiting-summary-list stats-list-select">
                            <span class="star-rating text-danger">
                              <input type="radio" name="ratting" id="ratting" value="1" checked><i></i>
                              <input type="radio" name="ratting" id="ratting" value="2"><i></i>
                              <input type="radio" name="ratting" id="ratting" value="3"><i></i>
                              <input type="radio" name="ratting" id="ratting" value="4"><i></i>
                              <input type="radio" name="ratting" id="ratting" value="5"><i></i>
						    </span>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input class="form-control" type="text" name="rev_name" id="rev_name" required placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input class="form-control" type="email" name="rev_email" id="rev_email" required placeholder="Your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" name="rev_content" id="rev_content" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <input id="btnRev" type="submit" class="btn" value="Submit Review">
                                <span id="rmsz"></span>
                            </div>
                            {!! Form::close() !!}


                        </div>
                        <!-- Review-Form -->
                    </div>
                </div>
                <!-- /section_2 -->
            </div>
            <!-- /col -->
            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    {!! Form::open(['url' => route('book.appointment'),'id' => 'bookAppointment']) !!}
                    {!! Form::hidden('node_id',$node->getKey(),['id' => 'node_id']) !!}
                    <div class="title">
                        <h3>Book a Visit</h3>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="booking_date" id="booking_date"
                                       data-lang="en"
                                       data-min-year="2017" data-max-year="2020"
                                       data-disabled-days="10/17/2017,11/18/2017"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" type="text" name="booking_time" id="booking_time"
                                       value="9:00 am"/>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <hr/>

                    <div class="form-group">
                        <input type="text" class="form-control" name="patient_name" id="patient_name" required
                               placeholder="Patient name" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="patient_email" id="patient_email" required
                               placeholder="Your email address" autocomplete="off"/>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="patient_contact" id="patient_contact"
                                       required
                                       placeholder="Contact No" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="patient_zipcode" id="patient_zipcode"
                                       required
                                       placeholder="ZipCode" autocomplete="off"/>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <button type="submit" id="btnbook" class="btn_1 full-width">Book Now</button>
                    <br>
                    <span id="bookmsz"></span>
                    {!! Form::close() !!}
                </div>
                <!-- /box_general -->
            </aside>
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection