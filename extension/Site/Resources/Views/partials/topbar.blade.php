<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo">
                    <a href="{!! route('site.home') !!}" title="Findoctor"><img src="{!! asset('/'.getSettings('site_logo')) !!}"
                                                                                data-retina="true" alt="" width="163"
                                                                                height="36"></a>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                @if(!Auth::guard('web')->user())
                    <ul id="top_access" class="main-menu">
                        <li><a href="{!! route('login') !!}"><i class="pe-7s-add-user"></i></a></li>
                    </ul>
                @else
                    <ul id="top_access" class="main-menu">
                        <li><a href="{!! route('member') !!}"><i class="pe-7s-add-user"></i></a></li>
                    </ul>
                @endif
                <div class="main-menu">
                    <ul>
                        <li class="submenu">
                            <a href="#0" class="show-submenu">{!! trans('general.'.locale()) !!}<i class="icon-down-open-mini"></i></a>
                            <ul>
                              @if(count(locales()) > 1 )
                                  @foreach(locales() as $value => $key)

                                     <li>
                                       <a href="{!! route('locale.set',$key) !!}">
                                       {!! trans('general.'.$key) !!}
                                       </a>
                                      </li>
                                  @endforeach
                                @endif
                            </ul>
                        </li>

                        @if(Auth::user())
                            <li class="submenu">
                                <a href="#0"
                                   class="show-submenu">{!! Auth::user()->first_name.' '.Auth::user()->last_name !!}<i
                                            class="icon-down-open-mini"></i></a>
                                <ul>

                                    <li><a href="#">Add Profile</a></li>
                                    <li><a href="{!! route('logout') !!}">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /main-menu -->
            </nav>
        </div>
    </div>
    <!-- /container -->
</header>
<!-- /header -->