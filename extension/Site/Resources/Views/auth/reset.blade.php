@extends('layout.inner')

@section('pageTitle', trans('passwords.reset_password'))

@section('content')




    <main>
        <div class="bg_color_2">
            <div class="container margin_60_35">
                <div id="login-2">
                    <h1>Reset Password!</h1>
                    <form method="POST" action="{{ route('site.password.reset.post') }}">
                        {!! csrf_field() !!}
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="box_form clearfix">
                        <div class="box_login">
                            <a href="{!! Url('social/login/redirect', ['facebook']) !!}" class="social_bt facebook">Login with Facebook</a>
                            <a href="{!! Url('social/login/redirect', ['google']) !!}" class="social_bt google">Login with Google</a>
                        </div>
                        <div class="box_login last">
                            <div class="form-group">
                                <input class="form-control" required="required" name="email"
                                       type="email" id="email"
                                       value="{!! urldecode($email) !!}" readonly>
                            </div>
                            <div class="form-group">

                                <input class="form-control" required="required"
                                       name="password" type="password" id="password"
                                       placeholder="{!! __('Password')!!}" pattern="^\S{6,}$"
                                       onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"
                                       placeholder="Password" required>


                            </div>

                            <div class="form-group">

                                <input class="form-control" id="password_confirmation"
                                       name="password_confirmation" type="password" pattern="^\S{6,}$"
                                       onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"
                                       placeholder="Password Confirmation" required>



                            </div>

                            <div class="form-group">
                                <input class="btn_1" type="submit" value="Submit" />
                            </div>
                        </div>
                    </div>
                    </form>
                    <p class="text-center link_bright">Back to <a href="{!! route('site.login') !!}"><strong>Sign In!</strong></a></p>
                </div>
                <!-- /login -->
            </div>
        </div>
    </main>


@endsection