@extends('layout.login')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>

@section('content')

    <div class="register-container full-height sm-p-t-30">
        <div class="d-flex justify-content-center flex-column full-height ">
            <img src="{!! asset('assets/img/logo.png')!!}" alt="logo" data-src="{!! asset('assets/img/logo.png')!!} " data-src-retina="{!! asset('assets/img/logo_2x.png')!!}" width="78" height="22">
            <h3>Pages makes it easy to enjoy what matters the most in your life</h3>
            <p>
                Create a pages account. If you have a facebook account, log into it for this process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
            </p>
            {!! Form::open(['route' => 'site.register','class' => 'p-t-15','id' => 'form-register']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Last Names</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Minimum of 6 Charactors" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row m-t-10">
                    <div class="col-lg-6">
                        <p><small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small></p>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="#" class="text-info small">Help? Contact Support</a>
                    </div>
                </div>
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class=" full-width">
        <div class="register-container m-b-10 clearfix">
            <div class="m-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix d-flex-md-up">
                <div class="col-md-2 no-padding d-flex align-items-center">
                    <img src="{!! asset('assets/img/demo/pages_icon.png')!!}" alt="" class="" data-src="{!! asset('assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png')!!}" width="60" height="60">
                </div>
                <div class="col-md-9 no-padding d-flex align-items-center">
                    <p class="hinted-text small inline sm-p-t-10">No part of this website or any of its contents may be reproduced, copied, modified or adapted, without the prior written consent of the author, unless otherwise indicated for stand-alone materials.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay hide" data-pages="search">

        <div class="overlay-content has-results m-t-20">

            <div class="container-fluid">

                <img class="overlay-brand" src="{!! asset('assets/img/logo.png')!!}" alt="logo" data-src="{!! asset('assets/img/logo.png')!!}" data-src-retina="{!! asset('assets/img/logo_2x.png')!!}" width="100" height="35">


                <a href="#" class="close-icon-light overlay-close text-black fs-16">
                    <i class="pg-close"></i>
                </a>

            </div>

            <div class="container-fluid">

                <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
                <br>
                <div class="inline-block">
                    <div class="checkbox right">
                        <input id="checkboxn" type="checkbox" value="1" checked="checked">
                        <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                    </div>
                </div>
                <div class="inline-block m-l-10">
                    <p class="fs-13">Press enter to search</p>
                </div>

            </div>

            <div class="container-fluid">
<span>
<strong>suggestions :</strong>
</span>
                <span id="overlay-suggestions"></span>
                <br>
                <div class="search-results m-t-40">
                    <p class="bold">Pages Search Results</p>
                    <div class="row">
                        <div class="col-md-6">

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div>
                                        <img width="50" height="50" src="{!! asset('assets/img/profiles/avatar.jpg')!!}" data-src="{!! asset('assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg')!!}" alt="">
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                    <p class="hint-text">via john smith</p>
                                </div>
                            </div>


                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div>T</div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> related topics</h5>
                                    <p class="hint-text">via pages</p>
                                </div>
                            </div>


                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                    <div><i class="fa fa-headphones large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> music</h5>
                                    <p class="hint-text">via pagesmix</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
                                    <div><i class="fa fa-facebook large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on facebook</h5>
                                    <p class="hint-text">via facebook</p>
                                </div>
                            </div>


                            <div class="">

                                <div class="thumbnail-wrapper d48 circular bg-complete text-white inline m-t-10">
                                    <div><i class="fa fa-twitter large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5">Tweats on<span class="semi-bold result-name"> ice cream</span></h5>
                                    <p class="hint-text">via twitter</p>
                                </div>
                            </div>


                            <div class="">

                                <div class="thumbnail-wrapper d48 circular text-white bg-danger inline m-t-10">
                                    <div><i class="fa fa-google-plus large-text "></i>
                                    </div>
                                </div>

                                <div class="p-l-10 inline p-t-5">
                                    <h5 class="m-b-5">Circles on<span class="semi-bold result-name"> ice cream</span></h5>
                                    <p class="hint-text">via google plus</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection