@extends('layout.blank')
@section('pageTitle', $pageTitle)

<?php $isNode = false; ?>


@section('content')

    <h1 class="page-title">Dashboard</h1>

    <div class="page-block margin-bottom">

        <div class="panel-account margin-bottom">
            <div class="body">
                <p><span class="bold">Name : </span> Admin User</span>
                <p><span class="bold">Email : </span>admin@admin.com </p>
                <p><span class="bold">Phone : </span>+91 9832893116 </p>

                <div class="action">
                    <a href="{!! route('user.logout') !!}">Logout</a>
                </div>
            </div>
        </div>

        <div class="panel-account margin-bottom">
            <div class="body">
                <div class="block "><span class="">Total Order : </span><span class="right badge">5</span> </div>
                <div class="block"><span class="">Delivered : </span> </span><span class="right badge">4</span> </div>
                <div class="block"><span class="">Canceled : </span> </span><span class="right badge">1</span> </div>
                <div class="block"><span class="">Total Points : </span> </span><span class="right badge">0</span></div>
                <div class="block"><span class="">Redeemed Points : </span> </span><span class="right badge">0</span></div>

            </div>
        </div>


    </div>


@endsection