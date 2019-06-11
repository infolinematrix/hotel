@extends('Site::layout.default')

@section('content')
    <div class="bg_color_2">
        <div class="container margin_60_35">
            <div id="login-2">
                <h1>Forgot your Password ?</h1>
                {!! Form::open(['url' => route('forgot.password')]) !!}
                <div class="box_form clearfix">
                    <div class="box_login">
                        Forgot your password ? Don't worry we still love you, please enter your registered email and reset your password..
                    </div>
                    <div class="box_login last">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"  required placeholder="Your email address"/>
                        </div>
                        <div class="form-group">
                            <a href="{!! route('login') !!}" class="forgot">
                                <small>Already have an Account?</small>
                            </a>
                        </div>
                        <div class="form-group">
                            <input class="btn_1" type="submit" value="Submit"/>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <p class="text-center link_bright">Do not have an account yet? <a
                            href="{!! route('register') !!}"><strong>Register now!</strong></a></p>
            </div>
            <!-- /login -->
        </div>
    </div>
@endsection