<header class="main-header">
    <!-- Logo -->
    <a href="{!! route('reactor.dashboard') !!}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>DM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <b>Admin Panel</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <!--
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language"></i>&nbsp;
                        <span class="hidden-xs">{!! trans('general.'.locale()) !!}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <ul class="menu">

                                @if(count(locales()) > 1 )
                                    @foreach(locales() as $value => $key)
                                        <li>
                                            <a href="{!! route('locale.set',$key) !!}">
                                                <i class="fa fa-language text-aqua"></i>
                                                {!! trans('general.'.$key) !!}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </li>
                    </ul>
                </li>
            <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-language"></i>&nbsp;
                        <span class="hidden-xs">{!! trans('general.'.locale()) !!}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <ul class="menu">

                                @if(count(locales()) > 1 )
                                    @foreach(locales() as $value => $key)
                                        <li>
                                            <a href="{!! route('locale.set',$key) !!}">
                                                <i class="fa fa-language text-aqua"></i>
                                                {!! trans('general.'.$key) !!}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif


                            </ul>
                        </li>
                    </ul>
                </li>
            -->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/avatar.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{!! Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/avatar.png') }}" class="img-circle" alt="User Image">

                            <p>
                                {!! Auth::guard('admin')->user()->first_name.' '.Auth::guard('admin')->user()->last_name !!}
                                <small>Member since {!! date('d,M,Y',strtotime(Auth::guard('admin')->user()->created_at)) !!}</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <div class="text-center">
                                <a href="{{ route('reactor.auth.logout') }}" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
