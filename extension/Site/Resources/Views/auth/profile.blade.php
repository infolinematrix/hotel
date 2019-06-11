@extends('extension.layout.blank')
@section('pageTitle', $pageTitle)
@include('extension.partials.seo.metadata_node', ['node' => $home])


@section('scripts')
    @parent
    @include('sweet::alert')
    {!! Theme::js('js/app.js') !!}

@endsection

@section('content')

    <header class="section__title">
        <h2>{!! $pageTitle !!}</h2>
        <small>Praesent commodo cursus magnavel sceleris quenisl consecte turet</small>
    </header>



    <div class="text-left">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="row">

                    <div class="col-md-4 rmd-sidebar-mobile" id="agent-question">
                        @include('Site::partials.user_menu')
                    </div>

                    <div class="col-md-8">



                        @include('Site::partials.header_profile')

                        <div class="card">
                            {!! Form::open() !!}
                            <div class="card__header">
                                <h2>Basic Information</h2>
                            </div>

                                <div class="card__body">
                                    <div class="col-md-6">
                                        <div class="form-group   ">
                                            <div class="form-group form-group--float  form-group--active">
                                                <input class="form-control" required name="first_name" id="first_name" type="text" value="{!! $profile->first_name !!}">
                                                <i class="form-group__bar"></i>
                                                <label for="business_zipcode" class="control-label required">First Name</label>
                                            </div>
                                       </div>
                                 </div>

                                    <div class="col-md-6">

                                        <div class="form-group   ">

                                            <div class="form-group form-group--float  form-group--active">
                                                <input class="form-control" name="last_name" id="last_name" type="text" value="{!! $profile->last_name !!}">
                                                <i class="form-group__bar"></i>
                                                <label for="business_zipcode" class="control-label required">Last Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                        <i class="zmdi zmdi-long-arrow-right"></i>
                                    </button>
                                </div>

                            {!! Form::close() !!}
                            </div>

                        <div class="card">
                            {!! Form::open(['url' => route('user.change.password')]) !!}
                            <div class="card__header">
                                <h2>Change Password</h2>
                            </div>

                            <div class="card__body">
                                <div class="col-md-6">
                                    <div class="form-group   ">
                                        <div class="form-group form-group--float  form-group--active">
                                            <input class="form-control" required name="password" id="password" type="password"
                                                   pattern="^\S{6,}$"
                                                   onchange="this.setCustomValidity(this.validity.patternMismatch ? __('Must have at least 6 characters') : ''); if(this.checkValidity()) form.confirm_password.pattern = this.value;"
                                            >
                                            <i class="form-group__bar"></i>
                                            <label for="business_zipcode" class="control-label required">New Password</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group   ">

                                        <div class="form-group form-group--float  form-group--active">
                                            <input class="form-control" required name="confirm_password" id="confirm_password" type="password"
                                                   pattern="^\S{6,}$"
                                                   onchange="this.setCustomValidity(this.validity.patternMismatch ? __('Please enter the same Password as above') : '');"
                                            >
                                            <i class="form-group__bar"></i>
                                            <label for="business_zipcode" class="control-label required">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Submit
                                    <i class="zmdi zmdi-long-arrow-right"></i>
                                </button>
                            </div>

                            {!! Form::close() !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection