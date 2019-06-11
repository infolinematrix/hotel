@extends('layout.base')

@section('pageSubtitle', uppercase(trans('maintenance.title')))

@section('content')

    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Maintanence','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">{!! __('Reactor Update') !!}</h4>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="content-inner">

                    @if($updater->isNuclearCurrent())
                        <div>
                            <h3 class="content-inner__heading content-inner__heading--success"><i
                                        class="fa fa-cloud-download"></i> {{ __('Reactor is up to date!') }}</h3>
                            <p class="content-inner__message">{!! __('Current Version is : ').nuclear_version() !!}</p>
                        </div>
                    @else
                        @include('update.description')
                    @endif

                </div>
                <!-- /.row -->
            </div>


        </div>

    </section>



@endsection

