<header id="header">
    <div class="header__top fixed-top">
        <div class="container">
            <ul class="top-nav ">

                @if(!Auth::guard('web')->user())
                    <li class="top-nav__guest pull-right ">
                        <a href="{!! route('auth.register') !!}">Register</a>
                    </li>
                    <li class="top-nav__guest pull-right ">
                        <a href="{!! route('login') !!}">Login</a>
                    </li>
                @else
                    <li class="top-nav__guest pull-right">
                        <a href="{!! route('logout') !!}"><i class="zmdi zmdi-plus-circle-o-duplicate"></i>Logout</a>
                    </li>
                    <li class="top-nav__guest pull-right">
                        <a href="{!! route('user.dashboard') !!}">Welcome, {!! Auth::guard('web')->user()->first_name !!}</a>
                    </li>
                @endif

                <li class="top-nav__guest pull-right">
                    <a href="{!! route('product.create') !!}"><i class="zmdi zmdi-plus-circle-o-duplicate"></i>Sell Now</a>
                </li>

                <li class="top-nav__icon">
                    <a href="{!! getSettings('social_facebook') !!}"><i class="zmdi zmdi-facebook"></i></a>
                </li>
                <li class="top-nav__icon">
                    <a href="{!! getSettings('social_twitter') !!}"><i class="zmdi zmdi-twitter"></i></a>
                </li>
                <li class="top-nav__icon">
                    <a href="{!! getSettings('social_google') !!}"><i class="zmdi zmdi-google"></i></a>
                </li>

                <li class="hidden-xs"><span><i
                                class="zmdi zmdi-email"></i>{!! getSettings('email_from_email') !!}</span></li>
                <li class="hidden-xs"><span><i class="zmdi zmdi-phone"></i>{!! getSettings('phone') !!}</span></li>
            </ul>
        </div>
    </div>

    <div class="header__main">
        <div class="container">
            <a class="logo" href="{!! route('site.home') !!}">
                <img src="{{theme_url('img/logo.png') }}" alt="">
                <div class="logo__text">
                    <span>{!! getSettings('site_title') !!}</span>
                    <span>A Buy &amp; Sell Community</span>
                </div>
            </a>

            <div class="navigation-trigger visible-xs visible-sm" data-rmd-action="block-open"
                 data-rmd-target=".navigation">
                <i class="zmdi zmdi-menu"></i>
            </div>

            <ul class="navigation">
                <li class="visible-xs visible-sm"><a class="navigation__close" data-rmd-action="navigation-close"
                                                     href="index.html"><i class="zmdi zmdi-long-arrozmdight"></i></a>
                </li>

                <li class="active navigation__dropdown">
                    <a href="{!! route('site.home') !!}">Company</a>

                    <ul class="navigation__drop-menu">
                        <li><a href="{!! route('site.page','about-us') !!}">About us</a></li>
                        <li><a href="{!! route('site.page','Privacy-Policy') !!}">Privacy Policy</a></li>
                        <li><a href="{!! route('site.page','Terms-Conditions') !!}">Terms &amp; Conditions</a></li>
                        <li><a href="{!! route('site.page','refund-policy') !!}">Refund Policy</a></li>
                    </ul>
                </li>

                <li class="navigation__dropdown">
                    <a href="{!! route('site.products') !!}" class="">Products</a>
                </li>

                <li class="navigation__dropdown">
                    <a href="{!! route('site.company') !!}">Traders</a>
                </li>

                <li class="navigation__dropdown">
                    <a href="{!! route('article.index') !!}">Articles</a>
                </li>

                <li><a href="{!! route('site.contact') !!}">Contact</a></li>
                <li><a href="{!! route('article.index') !!}">Contact</a></li>

            </ul>
        </div>
    </div>

    @if($search_block == true)
        <div class="header__search container">
            <form>
                <div class="search">
                    <div class="search__type dropdown">
                        <a href="#" data-toggle="dropdown">Product</a>

                        <div class="dropdown-menu">
                            <div>
                                <input type="radio" name="search-type" value="Product">
                                <span>Product</span>
                            </div>
                            <div>
                                <input type="radio" name="search-type" value="Trader">
                                <span>Trader</span>
                            </div>
                        </div>
                    </div>

                    <div class="search__body">
                        <input type="text" class="search__input" placeholder="Enter any Neighorhood, Feature, Zip Code"
                               data-rmd-action="advanced-search-open">

                        <div class="search__advanced">
                            <div class="col-sm-6">
                                <div class="form-group form-group--float">
                                    <input type="text" class="form-control" value="New York, NY">
                                    <label>Location</label>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Traders Type</label>
                                    <select class="select2">
                                        <option selected value="">Any</option>
                                        @foreach(\Config('site.business_type') as $key => $value)
                                            <option value="{!! $key !!}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Traders entity</label>
                                    <select class="select2">
                                        <option selected value="">Any</option>
                                        @foreach(\Config('site.entity') as $key => $value)
                                            <option value="{!! $key !!}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Today</label>
                                    <select class="select2">
                                        <option selected value="">Any</option>
                                        @foreach(\Config('site.working-hours') as $key => $value)
                                            <option value="{!! $key !!}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 m-t-10">
                                <button class="btn btn-primary">Search</button>
                                <button class="btn btn-link" data-rmd-action="advanced-search-close">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if($premium_products_block == true)
        <div class="header__recommended">
            <div class="my-location">
                <div class="my-location__title">Traders nearby your location</div>
                <div class="dropdown my-location__location hidden-xs">
                    <a href="index.html" data-toggle="dropdown"><i class="zmdi zmdi-pin"></i> San Francisco County,
                        CA</a>

                    <div class="dropdown-menu pull-right stop-propagate">
                        <strong>Change Location</strong>
                        <small>Set your location to get list of properties nearby you</small>

                        <form>

                            <div class="form-group form-group--float mb-5">
                                <input type="email" class="form-control" placeholder="Enter City, State, Zip">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <button class="btn">Set Location</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="listings-grid">
                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/1.jpg') !!}" alt="">
                            <div class="listings-grid__price">$1,175,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>21 Shop St, San Francisco</small>
                            <h5>Integer tempor luctus maximus</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 02</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 02</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/2.jpg')  !!}" alt="">
                            <div class="listings-grid__price">$1,200,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>Beverly Hills, CA 90210</small>
                            <h5>Duis sollicitudin ante bibendum</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 01</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/3.jpg') !!}" alt="">
                            <div class="listings-grid__price">$910,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>132 04th St, San Francisco</small>
                            <h5>Fusce quis libero nonorcious</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 02</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 01</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 01</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/4.jpg') !!}" alt="">
                            <div class="listings-grid__price">$2,542,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>132 Lockslee, San Francisco</small>
                            <h5>Pellentesque habitant</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 05</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 03</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/5.jpg') !!}" alt="">
                            <div class="listings-grid__price">$823,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>San Francisco, CA 900212</small>
                            <h5>Maecenas sed purus lorem aliquet cursus</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 01</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 01</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 0</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/6.jpg') !!}" alt="">
                            <div class="listings-grid__price">$1,120,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>21120 Broadway St, San Fransisco</small>
                            <h5>Maecenas sed purus at lorem</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 02</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 02</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/7.jpg') !!}" alt="">
                            <div class="listings-grid__price">$3,000,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>San Francisco, CA 937202</small>
                            <h5>Nullam finibus libero at hendrerit</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 06</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 05</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 02</li>
                        </ul>
                    </a>

                    <div class="actions listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>

                <div class="listings-grid__item">
                    <a href="listing-detail.html">
                        <div class="listings-grid__main">
                            <img src="{!! asset('uploads/demo/listing/thumbs/8.jpg') !!}" alt="">
                            <div class="listings-grid__price">$1,175,000</div>
                        </div>

                        <div class="listings-grid__body">
                            <small>4313 Beverly Hills, CA 90210</small>
                            <h5>1358 Ligula Street, Unit 12</h5>
                        </div>

                        <ul class="listings-grid__attrs">
                            <li><i class="listings-grid__icon listings-grid__icon--bed"></i> 03</li>
                            <li><i class="listings-grid__icon listings-grid__icon--bath"></i> 02</li>
                            <li><i class="listings-grid__icon listings-grid__icon--parking"></i> 02</li>
                        </ul>
                    </a>

                    <div class="listings-grid__favorite">
                        <div class="actions__toggle">
                            <input type="checkbox">
                            <i class="zmdi zmdi-favorite-outline"></i>
                            <i class="zmdi zmdi-favorite"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</header>


@if($action_header == true)
    <div class="action-header">
        <div class="container">
            <div class="header__search">
                <div class="action-header__item action-header__item--search">
                    <form>
                        <div class="search">
                            <div class="search__type dropdown">
                                <a href="#" data-toggle="dropdown">Rent</a>

                                <div class="dropdown-menu">
                                    <div>
                                        <input type="radio" name="property-type" value="rent">
                                        <span>Buy</span>
                                    </div>
                                    <div>
                                        <input type="radio" name="property-type" value="buy">
                                        <span>Sell</span>
                                    </div>
                                </div>
                            </div>

                            <div class="search__body ">
                                <input type="text" class="search__input"
                                       placeholder="Enter any Neighorhood, Feature, Zip Code"
                                       data-rmd-action="advanced-search-open">

                                <div class="search__advanced">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group--float">
                                            <input type="text" class="form-control" value="New York, NY">
                                            <label>Location</label>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ownership Type</label>

                                            <select class="select2">
                                                <option value="">Single Family Home</option>
                                                <option value="">Condo</option>
                                                <option value="">Townhome</option>
                                                <option value="">Apartment Community</option>
                                                <option value="">Room</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group--range">
                                            <label>Price Range</label>
                                            <div class="input-slider-values clearfix">
                                                <div class="pull-left"><span>$</span><span
                                                            id="property-price-upper"></span></div>
                                                <div class="pull-right"><span>$</span><span
                                                            id="property-price-lower"></span></div>
                                            </div>
                                            <div id="property-price-range"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group--range">
                                            <label>Area Size (sqft)</label>
                                            <div class="input-slider-values clearfix">
                                                <div class="pull-left" id="property-area-upper"></div>
                                                <div class="pull-right" id="property-area-lower"></div>
                                            </div>
                                            <div id="property-area-range"></div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Bedrooms</label>
                                            <div class="btn-group btn-group-justified" data-toggle="buttons">
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-beds" id="bed1">1
                                                </label>
                                                <label class="btn active">
                                                    <input type="checkbox" name="advanced-search-beds" id="bed2"
                                                           checked>2
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-beds" id="bed3">3
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-beds" id="bed4">4
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-beds" id="bed5">4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Bathrooms</label>
                                            <div class="btn-group btn-group-justified" data-toggle="buttons">
                                                <label class="btn active">
                                                    <input type="checkbox" name="advanced-search-baths" id="bath1"
                                                           checked>1
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-baths" id="bath2">2
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-baths" id="bath3">3
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-baths" id="bath4">4
                                                </label>
                                                <label class="btn">
                                                    <input type="checkbox" name="advanced-search-baths" id="bath5">4+
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 m-t-10">
                                        <button class="btn btn-primary">Search</button>
                                        <button class="btn btn-link" data-rmd-action="advanced-search-close">Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="action-header__item action-header__views hidden-xs">
                    <a href="listings-grid.html" class="zmdi zmdi-apps"></a>
                    <a href="listings-list.html" class="zmdi zmdi-view-list active"></a>
                </div>

                <div class="action-header__item action-header__item--sort hidden-xs">
                    <span class="action-header__small">Sort by :</span>

                    <select class="select2">
                        <option>Featured listings</option>
                        <option>Newest to oldest</option>
                        <option>Oldest to Newest</option>
                        <option>With photos</option>
                        <option>Without photos</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endif
