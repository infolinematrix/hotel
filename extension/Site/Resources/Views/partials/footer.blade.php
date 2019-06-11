
<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <p>
                    <a href="index.html" title="Findoctor">
                        <img src="{!! asset('/'.getSettings('site_logo')) !!}" data-retina="true" alt="" width="163" height="36"
                             class="img-fluid"/>
                    </a>
                </p>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Company</h5>
                <ul class="links">
                    <li><a href="{!! route('page','about-us') !!}">About us</a></li>
                    <li><a href="{!! route('page','privacy-policy') !!}">Privacy Policy</a></li>
                    <li><a href="{!! route('page','terms-conditions') !!}">Terms &amp; Conditions</a></li>
                    <li><a href="{!! route('login') !!}">Login</a></li>
                    <li><a href="{!! route('register') !!}">Register</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Useful links</h5>
                <ul class="links">
                    <li><a href="{!! route('register') !!}">Join as a Doctor</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href="{!! route('site.contact') !!}">Contact Us</a></li>
                </ul>
                <div class="follow_us">
                    <h5>Follow us</h5>
                    <ul>
                        <li><a href="{!! getSettings('social_facebook') !!}"><i class="social_facebook"></i></a></li>
                        <li><a href="{!! getSettings('social_twitter') !!}"><i class="social_twitter"></i></a></li>
                        <li><a href="{!! getSettings('social_youtube') !!}"><i class="social_youtube_square"></i></a>
                        </li>
                        <li><a href="{!! getSettings('social_instagram') !!}"><i class="social_instagram"></i></a></li>
                        <li><a href="{!! getSettings('social_google') !!}"><i class="social_googleplus_square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr/>
        <div class="row">
            <div class="col-md-8">
                <ul id="additional_links">
                    <li><a href="{!! route('page','about-us') !!}">Terms and conditions</a></li>
                    <li><a href="{!! route('page','about-us') !!}">Privacy</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div id="copy">© {!! date("Y") !!} {!! getSettings('site_title') !!}</div>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->