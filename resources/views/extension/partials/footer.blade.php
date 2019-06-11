@section('scripts')
    <script>
        var base_url = $('body').data('baseurl');

        $("#postRequirement").on('submit', function () {


            var img = base_url + "/spinner.gif";

            $('#msz').html('<img class="im" src="' + img + '"  />');

            $.post($(this).prop('action'), {

                        "_token": $(this).find('input[name=_token]').val(),
                        "post_name": $('#post_name').val(),
                        "post_email": $('#post_email').val(),
                        "post_phone": $('#post_phone').val(),
                        "post_type": $('#post_type').val(),
                        "post_message": $('#post_message').val(),
                    },

                    function (data) {

                        //response after the process.
                        var status = data.status;


                        if (status == 'Fail') {

                            $('#msz').html('');
                            $("#msz").html(data.message).fadeIn('slow');

                        } else {


                            $('#msz').html('');
                            $("#msz").html(data.message).fadeIn('slow');
                            $('#postRequirement')[0].reset();
                        }
                    }, 'json');
            return false
        });
    </script>
@endsection

<footer id="footer" class="clearfix">
    <div class="container hidden-xs">
        <div class="row">
            <div class="col-sm-4">
                <div class="footer__block">
                    <a class="logo clearfix" href="index.html">
                        <div class="logo__text">
                            <span>{!! getSettings('site_title') !!}</span>
                            <span>A Buy &amp; Sell Community</span>
                        </div>
                    </a>

                    <address class="m-t-20 m-b-20 f-14">
                        {!! getSettings('address') !!}
                    </address>

                    <div class="f-20">{!! getSettings('phone') !!}</div>
                    <div class="f-14 m-t-5">{!! getSettings('email_from_email') !!}</div>

                    <div class="f-20 m-t-20">
                        <a href="{!! getSettings('social_google') !!}" class="m-r-10"><i
                                    class="zmdi zmdi-google"></i></a>
                        <a href="{!! getSettings('social_facebook') !!}" class="m-r-10"><i
                                    class="zmdi zmdi-facebook"></i></a>
                        <a href="{!! getSettings('social_twitter') !!}"><i class="zmdi zmdi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer__block footer__block--blog">
                    <div class="footer__title">Latest from our blog</div>


                    @foreach(getArticles(3) as $article)
                    <a href="{!! route('article.single',$article->getName()) !!}">
                        {!! plainText($article->getTitle(),60) !!}
                        <small>{!! plainText($article->content,60) !!}</small>
                    </a>
                    @endforeach

                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer__block">
                    <div class="footer__title">Disclaimer</div>

                    <div>Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi
                        erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui. Maecenas sed diam
                        eget risus varius blandit sit amet non magna. Sed posuere consectetur est at lobortis. Lorem
                        ipsum dolor sit amet, consectetur adipiscing elit. Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <span class="footer__copyright">© {!! getSettings('site_title') !!}</span>

            <a href="{!! route('site.page','about-us') !!}">About Us</a>
            <a href="{!! route('site.page','Terms-Conditions') !!}">Terms & Conditions</a>
            <a href="{!! route('site.page','Privacy-Policy') !!}">Privacy Policy</a>
            <a href="{!! route('site.page','refund-policy') !!}">Refund Policy</a>
        </div>

        <div class="footer__to-top" data-rmd-action="scroll-to" data-rmd-target="html">
            <i class="zmdi zmdi-chevron-up"></i>
        </div>
    </div>
</footer>

<!-- Post Requirement modal Window -->
<div class="modal fade" tabindex="-1" role="dialog" id="PostRequirementModal" data-backdrop="static" data-keyboard="false">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Post your requirement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="new-event__form">
                {!! Form::open(['url' => route('site.post.requirement'),'id' => 'postRequirement']) !!}
                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Name:</label>
                        <input type="text" class="form-control new-event__title" name="post_name" id="post_name" placeholder="Name" autocomplete="off" required>
                        <i class="form-group__bar"></i>
                    </div>
                    </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Email:</label>
                                <input type="email" class="form-control new-event__title" name="post_email" id="post_email" placeholder="Email" autocomplete="off" required>
                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Phone:</label>
                                <input type="text" class="form-control new-event__title" name="post_phone" id="post_phone" placeholder="Phone" autocomplete="off">
                                <i class="form-group__bar"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Are You:</label>
                                <select class="form-control new-event__title" name="post_type" id="post_type">
                                 @foreach(\Config('site.user_type') as $key => $value)
                                     <option value="{!! $key !!}">{!! $value !!}</option>
                                 @endforeach

                                </select>

                                <i class="form-group__bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="post_message" id="post_message" required></textarea>
                        <i class="form-group__bar"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <span id="msz"></span>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- End of Post Requirement Modal -->