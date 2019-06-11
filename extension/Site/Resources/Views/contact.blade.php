@extends('Site::layout.default')

@section('content')
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3 col-md-4">
                <div id="contact_info">
                    <h3>Contacts info</h3>
                    <p>
                        11 Fifth Ave - New York, US<br/> + 61 (2) 8093 3400<br/>
                        <a href="#"><span class="__cf_email__" data-cfemail="254c4b434a65414a48444c4b0b464a48">[email&#160;protected]</span></a>
                    </p>
                    <h4>Get directions</h4>
                    <form action="http://maps.google.com/maps" method="get" target="_blank"/>
                    <div class="form-group">
                        <input type="text" name="saddr" placeholder="Enter your location" class="form-control styled"/>
                        <input type="hidden" name="daddr" value="New York, NY 11430"/>
                        <!-- Write here your end point -->
                    </div>
                    <input type="submit" value="Get directions" class="btn_1 add_bottom_45"/>
                    </form>
                    <ul>
                        <li><strong>Administration</strong>
                            <a href="tel://003823932342">0038 23932342</a><br/><a href="tel://003823932342"><span
                                        class="__cf_email__" data-cfemail="5130353c383f1137383f353e32253e237f323e3c">[email&#160;protected]</span></a><br/>
                            <small>Monday to Friday 9am - 7pm</small>
                        </li>
                        <li><strong>General questions</strong>
                            <a href="tel://003823932342">0038 23932342</a><br/><a href="tel://003823932342"><span
                                        class="__cf_email__"
                                        data-cfemail="611014041215080e0f122107080f050e02150e134f020e0c">[email&#160;protected]</span></a><br/>
                            <p>
                                <small>Monday to Friday 9am - 7pm</small>
                            </p>
                        </li>
                    </ul>
                </div>
            </aside>
            <!--/aside -->
            <div class=" col-lg-8 col-md-8 ml-auto">
                <div class="box_general">
                    <h3>Contact us</h3>
                    <p>
                        Mussum ipsum cacilds, vidis litro abertis.
                    </p>
                    <div>
                        <div id="message-contact"></div>
                        <div id="contactform">
                        {!! Form::open(['url' => route('site.contact')]) !!}
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control styled" id="name_contact" name="name_contact" required
                                           placeholder="Name" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control styled" id="lastname_contact"
                                           name="lastname_contact" placeholder="Last name" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" id="email_contact" name="email_contact" required
                                           class="form-control styled" placeholder="Email" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" id="phone_contact" name="phone_contact" required
                                           class="form-control styled" placeholder="Phone number" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea rows="5" id="message_contact" name="message_contact"
                                              class="form-control styled" style="height:100px;"
                                              placeholder="Hello world!"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn_1 add_top_20" id="submit-contact"/>
                         <span id="contactMsz"></span>
                        {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /col -->
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- End row -->
    </div>
    <!-- /container -->
@endsection