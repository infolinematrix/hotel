@extends('Site::layout.default')
@section('scripts')
    @parent
    {!! Theme::js('dropzone/jquery.ezdz.min.js') !!}
    <script type="text/javascript">
        @if($profileImage)
        $('.image-up').ezdz({
            text: '<img src="{!! asset('uploads/'.$profileImage->path) !!}" class="img-fluid" alt=""/>',
        });
        @else
        $('.image-up').ezdz({
            text: 'Click to upload picture',
        });
        @endif
    </script>
@endsection
@section('styles')
    {!! Theme::css('dropzone/jquery.ezdz.css') !!}
    {!! Theme::css('dropzone/focus.css') !!}

    <style>
        .ezdz-dropzone {
            position: relative;
            border-radius: 3px;
            font: bold 14px arial;
            text-align: center;
            width: 100%;
            height: 100%;
            padding: 5px;
            border: 1px dashed lightgray;
            color: lightgray;
            overflow: hidden;
            max-height: 155px;
            min-height: 255px;
            line-height: 140px;
        }
    </style>
@endsection
@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{!! route('site.home') !!}">Home</a></li>
                <li><a href="{!! route('member') !!}">User</a></li>
                <li>Change Password</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->


    <div class="container margin_60">
        <div class="row">

            <aside class="col-xl-3 col-lg-4" id="sidebar">
                @include('Site::member.navigation')
            </aside>
            <!-- /asdide -->

            <div class="col-xl-9 col-lg-8">

                <div class="tabs_styled_2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="book-tab" data-toggle="tab" href="#book" role="tab"
                               aria-controls="book">Change Password</a>
                        </li>
                    </ul>
                    <!--/nav-tabs -->

                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">

                            {!! Form::open(['url' => route('member.change.password')]) !!}
                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Your password"
                                               required onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_two" id="password_two"
                                               placeholder="Confirm password"
                                               onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-footer-action">
                                <div class="form-group">
                                    <input class="btn_1" type="submit" value="Save"/>
                                </div>
                            </div>
                            {!! Form::close() !!}

                            <!-- /wrapper indent -->

                        </div>
                        <!-- /tab_1 -->

                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_styled -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection