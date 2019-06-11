@extends('Site::layout.home')

@section('content')

    @include('Site::partials.inner_result', ($nodes ? $nodes : null))

    <div class="filters_listing">
        <div class="container">
            <ul class="clearfix">
                <li>
                    <h4 class="align-middle mt-3">Gastroenterologist</h4>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /filters -->

    <div class="container margin_60_35">
        <div class="row">

            <div class="col-lg-8">

                @foreach($nodes as $node)
                <div class="strip_list wow fadeIn">
                    <figure>
                        <a href="{!! route('profile',$node->getName()) !!}"><img src="{!! asset('uploads/'.getProfileimage($node->getKey())) !!}"
                                                          alt=""/></a>
                    </figure>

                    @foreach(getSpeciality($node->getKey()) as $speciality => $value)
                        <small>{!! $value !!}</small>
                    @endforeach

                    <h3>{!! $node->getTitle() !!}</h3>
                    <p>{!! str_limit($node->profile_about,150) !!}</p>
                    <ul>
                        @foreach(location_array($node->getKey()) as $location => $value)
                            <li>{!! $value !!}</li>
                        @endforeach

                        <li><a href="{!! route('profile',$node->getName()) !!}">View Profile</a></li>
                    </ul>
                </div>
                <!-- /strip_list -->
                @endforeach

            </div>
            <!-- /col -->
            @if($featuredNode != null)
            <aside class="col-lg-4" id="sidebar">
                <div class="box_list wow fadeIn">
                    <figure>
                        <a href="{!! route('profile',$featuredNode->node_name) !!}"><img src="{!! asset('uploads/'.getProfileimage($featuredNode->getKey())) !!}"
                                                          class="img-fluid" alt=""/>
                            <div class="preview"><span>Read more</span></div>
                        </a>
                    </figure>
                    <div class="wrapper">
                        @foreach(getSpeciality($featuredNode->getKey()) as $specialty => $vale)
                            <small>{!! $vale !!}</small>
                        @endforeach
                        <h3>Dr. {!! $featuredNode->getTitle() !!}</h3>

                        <p>{!! str_limit($featuredNode->profile_about,80) !!}</p>

                    </div>
                    <ul>
                        <li>
                        </li>
                        <li>
                            </li>
                        <li><a href="{!! route('profile',$featuredNode->node_name) !!}">Book now</a></li>
                    </ul>
                </div>
            </aside>
            @endif
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection