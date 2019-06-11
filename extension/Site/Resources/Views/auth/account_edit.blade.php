@extends('layout.blank')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>


@section('content')

    <h1 class="page-title">Edit Account</h1>

    <p class="text-small">
        <span class="bold block">Hallo, {!! $user->first_name.' '.$user->last_name !!}</span>
    </p>

    <!-- Contact Information Section -->
    <div class="panel-account margin-bottom">
        <div class="heading">Basic Information</div>
        <div class="body">

            {!! form_start($user_form) !!}
            <fieldset>
                <div class="input-field">
                    {!! form_row($user_form->first_name) !!}
                </div>
                <div class="input-field">
                    {!! form_row($user_form->last_name) !!}
                </div>
                <div class="input-field">
                    {!! form_row($user_form->email) !!}
                </div>
                <div class="input-field">
                    <button class="btn waves-effect orange block" type="submit">Update</button>
                </div>

            </fieldset>
            {!! form_end($user_form,false) !!}
        </div>
    </div>
    <!-- End Contact Information Section -->

    <!-- Profile Section -->
    {!! form_start($profile_form) !!}
        <div class="panel-account margin-bottom">
            <div class="heading">Profile Information</div>
            <div class="body">
                <fieldset>
                    <label>Gender</label>
                    <div class="input-field">
                        {!! form_row($profile_form->gender,['label'=>false]) !!}
                    </div>
                    <div class="input-field">
                        {!! form_row($profile_form->phone) !!}
                    </div>

                </fieldset>

                <fieldset>
                    <div class="input-field">
                        {!! form_row($profile_form->region) !!}
                    </div>
                    <div class="input-field">
                        {!! form_row($profile_form->city) !!}
                    </div>
                    <div class="input-field">
                        {!! form_row($profile_form->pincode) !!}
                    </div>

                </fieldset>
            </div>
        </div>

    <!-- Shipping Address Section -->
    <div class="panel-account">
        <div class="heading">Shipping Address</div>
        <div class="body">
            <div class="input-field">
                {!! form_row($profile_form->address) !!}
            </div>

            <div class="line"></div>
            <div class="input-field">
                <button class="btn waves-effect block" type="submit">Update</button>
            </div>

        </div>
    </div>



    {!! form_end($profile_form,false) !!}






    <!-- End Shipping Address Section -->

@endsection