@extends('layout.blank')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>


@section('content')



    <div class="row">
        <div class="col-xs-6">
            <span class="page-title" >Login</span>
        </div>
        <div class="col-xs-6 text-right">
					<span class="page-title ">

					</span>
        </div>
    </div>


    <!-- Login Section -->
    <div class="page-block signing-form margin-bottom">

        {!! Form::open(['id' => 'form-login', 'role'=> 'form']) !!}


        <div class="input-field">
            <input type="text" name="email" id="email"  placeholder="Email">
        </div>
        <div class="input-field">
            <input type="password" name="password" id="password" placeholder="Password">
        </div>

        <div class="gap"></div>
        <button class="btn waves-effect orange block login-button" type="submit">Login</button>


        {!! Form::close() !!}

        <div class="line"></div>
        <div class="or-separator">
            <span>or</span>
        </div>

        <div class="line"></div>
        <div class="row">
            <p class="center-align">Login using Social platform..</p>
            <div class="col m6 l6">
                <a href="{!! Url('social/login/redirect', ['facebook']) !!}" class="btn block fb-button" ><i class="fa fa-facebook"></i> Facebook</a>
            </div>
            <div class="col m6 l6">
                <a href="{!! Url('social/login/redirect', ['google']) !!}" class="btn block google-button" ><i class="fa fa-google"></i> Google</a>
            </div>
        </div>
    </div>
    <!-- End Login Section -->


@endsection