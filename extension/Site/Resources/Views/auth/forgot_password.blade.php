@extends('layout.inner')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>

@section('content')


    <main>
        <div class="bg_color_2">
            <div class="container margin_60_35">
                <div id="login-2">
                    <h1>Lost Password!</h1>
                    {!! form_start($form,['class' => "register-form outer-top-xs", 'role'=> 'form']) !!}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="box_form clearfix">
                        <div class="box_login">
                            <p class="text-center link_bright">Do not have an account yet? <a href="{!! route('site.register') !!}"><strong>Register now!</strong></a></p>
                        </div>
                        <div class="box_login last">
                            <div class="form-group">
                                <input type="email" name="email" id="email" required class="form-control" placeholder="Your email address" />
                            </div>
                            <div class="form-group">
                                <input class="btn_1" type="submit" value="Submit" />
                            </div>
                        </div>
                    </div>
                    {!! form_end($form, false) !!}
                    <p class="text-center link_bright">Back to <a href="{!! route('site.login') !!}"><strong>Sign In</strong></a></p>
                </div>
                <!-- /login -->
            </div>
        </div>
    </main>



@endsection