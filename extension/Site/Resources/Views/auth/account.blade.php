@extends('layout.blank')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>


@section('content')

    <h1 class="page-title">Account Control Panel</h1>

    <p class="text-small"><span class="bold block">Hallo, {!! $user->first_name.' '.$user->last_name !!}</span>From this account control panel, you can see your detail account, last activity, and update your account information.</p>

    <!-- Contact Information Section -->
    <div class="panel-account margin-bottom">
        <div class="heading">Contact Information</div>
        <div class="body">
            <span class="block">{!! $user->first_name.' '.$user->last_name !!}</span>
            <p>{!! $user->email !!} </p>
            <p>{!! $profile->phone !!} </p>
            <p>{!! $profile->gender !!} </p>
            <div class="action">
                <a href="{!! route('user.profile.edit',$user->id) !!}">change</a>
            </div>
        </div>
    </div>
    <!-- End Contact Information Section -->


    <!-- Newsletter Section -->
    <div class="panel-account margin-bottom">
        <div class="heading">Newsletter</div>
        <div class="body">
            You are following newsletter currently, such : Dorii Newsletter
            <div class="action">
                <a href="panel-account.html#">change</a>
            </div>
        </div>
    </div>
    <!-- End Newsletter Section -->

    <!-- Shipping Address Section -->
    <div class="panel-account">
        <div class="heading">Shipping Address</div>
        <div class="body">
            <span class="block">Natalie Amyllia</span>
            <address>2206 Margasatwa Street, Tower 02
                Kansas, CA 22994<br />
                <abbr title="Phone">P:</abbr> (999) 123-456</address>
            <div class="action">
                <a href="panel-account.html#">change</a>
            </div>
        </div>
    </div>
    <!-- End Shipping Address Section -->

@endsection