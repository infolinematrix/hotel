@extends('extension.layout.blank')

@section('pageTitle', $pageTitle)
@section('scripts')
    @parent
    @include('sweet::alert')
@endsection
@section('content')

    <header class="section__title">
        <h2>{!! $pageTitle !!}</h2>
        <small>Already have an account ? <a href="{!! route('login') !!}">Login</a></small>
    </header>

    <div class="submit-property">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                        <form class="card__body" method="POST" action="{{ route('auth.forgot.password') }}">
                            {!! csrf_field() !!}
                        <div class="form-group form-group--float">
                            <input required name="email" id="email" type="text" class="form-control">
                            <i class="form-group__bar"></i>
                            <label>Email</label>
                        </div>

                        <div class="form-group form-group--float">
                            <button type="submit" class="form-control btn-info">Submit</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>


@endsection