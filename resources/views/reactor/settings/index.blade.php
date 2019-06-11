@extends('layout.base')


@section('scripts')
    @parent
<script>

    <?php
     if($site_logo){?>
    $('.img').ezdz({

        text: '<img src="{!! asset('/'.$site_logo) !!}">',
    });
    <?php }else{?>

    $('.img').ezdz({

        text: '163 X 36',
    });
    <?php }?>
</script>
@endsection



<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Settings','breadcrumb' => [] ])


    <section class="content">

    {!! form_start($form) !!}
    <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->


            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                <li class="active">
                    <a href="#daily" data-toggle="tab" aria-expanded="true" data-mode="daily">
                        {!! __('General') !!}
                    </a>
                </li>

                <li class="pull-left header"><i class="fa fa-cogs"></i> {!! __($pageTitle) !!}</li>
            </ul>


            <div class="tab-content">





                <div class="tab-pane active" id="daily">

                    <div class="row">
                        <div class="col-md-8 col-xs-12">

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">General Settings</legend>

                                <div class="row">
                                    <div class="col-md-6">
                                        {!! form_row($form->site_title) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! form_row($form->site_url) !!}
                                    </div>

                                    <div class="col-md-6">
                                        {!! form_row($form->phone) !!}
                                    </div>

                                    <div class="col-md-6">
                                        {!! form_row($form->skype) !!}
                                    </div>

                                    <div class="col-md-12">
                                        {!! form_row($form->address) !!}
                                    </div>

                                    <div class="col-md-12">
                                        {!! form_row($form->office_timing) !!}
                                    </div>


                                </div>

                            </fieldset>

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Email Settings</legend>

                                <div class="row">
                                    <div class="col-md-3">
                                        {!! form_row($form->email_driver) !!}
                                    </div>
                                    <div class="col-md-5">
                                        {!! form_row($form->email_host) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! form_row($form->email_port) !!}
                                    </div>
                                    <div class="col-md-2">
                                        {!! form_row($form->email_encryption) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! form_row($form->email_user) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! form_row($form->email_password) !!}
                                    </div>

                                    <div class="col-md-6">
                                        {!! form_row($form->email_from_email) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! form_row($form->email_form_name) !!}
                                    </div>
                                </div>

                            </fieldset>

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Social Link</legend>

                                {!! form_row($form->social_facebook) !!}
                                {!! form_row($form->social_twitter) !!}
                                {!! form_row($form->social_google) !!}
                                {!! form_row($form->social_linkedin) !!}
                                {!! form_row($form->social_pinterest) !!}
                                {!! form_row($form->social_instagram) !!}
                                {!! form_row($form->social_youtube) !!}

                            </fieldset>


                        </div>
                        <div class="col-md-4 col-xs-12">
                            {!! form_row($form->site_mode) !!}
                            {!! form_row($form->default_language) !!}

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Google Settings</legend>

                                {!! form_row($form->google_map_api) !!}
                                {!! form_row($form->google_analytics_api) !!}
                                {!! form_row($form->google_ad_pubid) !!}
                            </fieldset>

                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Site Logo</legend>
                                {!! form_row($form->site_logo) !!}

                            </fieldset>

                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="weekly">
                    WEEKLY
                </div>
                <div class="tab-pane" id="monthly">
                    MONTHLY
                </div>

                <button class="btn btn-primary">Save</button>
            </div>


        </div>
        <!-- /.nav-tabs-custom -->

        {!! form_end($form,false) !!}

    </section>











@endsection