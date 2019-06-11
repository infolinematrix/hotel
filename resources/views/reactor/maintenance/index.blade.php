@extends('layout.base')

@section('pageSubtitle', uppercase(trans('maintenance.title')))

@section('content')

    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Maintanence','breadcrumb' => (!empty($node) ? $node : null) ])

    <section class="content">

        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">{!! __('Reactor Maintenance') !!}</h4>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div class="content-inner">
                    <div class="form-column form-column--full">
                        <div class="content-inner__section">
                            <h4 class="content-inner__heading">{{ __('Optimization') }}</h4>
                            <p class="text-muted">{{ __('Actions necessary to optimize Reactor performance. Please wait as some actions may take a while.') }}</p>


                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.cache.routes') }}" type="button">
                                {{ uppercase(__('Cache Routes')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.nodes.tree') }}" type="button">
                                {{ uppercase(__('Fix Nodes Tree')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.key') }}" type="button">
                                {{ uppercase(__('Regenerate Key')) }}
                            </button>
                        </div>


                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading">{{ __('Backup') }}</h4>
                            <p class="text-muted">{{ __('Backup your website. Please wait as this may take a while.') }}</p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.backup.create') }}" type="button">
                                {{ uppercase(__('Create Backup')) }}
                            </button>
                        </div>

                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading">{{ __('Cleanup') }}</h4>
                            <p class="text-muted">{{ __('Clean accumulating information in Reactor.') }}</p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.views') }}" type="button">
                                {{ uppercase(__('Clear Generated Views')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.cache') }}" type="button">
                                {{ uppercase(__('Clear Cache')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.password') }}" type="button">
                                {{ uppercase(__('Clear Password Reset Token')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.compiled') }}" type="button">
                                {{ uppercase(__('Clear Compiled Classes')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.routes') }}" type="button">
                                {{ uppercase(__('Clear Routes Cache')) }}
                            </button>

                        </div>


                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading">{{ __('View Cache') }}</h4>
                            <p class="text-muted">{{ __('Flush cached partial views.') }}</p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.viewcache.flush') }}" type="button">
                                {{ uppercase(__('flush all cached View  ')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.viewcache.flush.reactor') }}"
                                    type="button">
                                {{ uppercase(__('flush cached reactor views  ')) }}
                            </button>

                        </div>

                        <hr>

                        <div class="content-inner__section">
                            <h4 class="content-inner__heading">{{ __('Statistics') }}</h4>
                            <p class="text-muted">{{ __('Clean site view statistics.') }}</p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.statistics') }}" type="button">
                                {{ uppercase(__('clear all statistics')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.statistics.year') }}"
                                    type="button">
                                {{ uppercase(__('clear statistics older than year')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.statistics.month') }}"
                                    type="button">
                                {{ uppercase(__('clear statistics older than month')) }}
                            </button>
                        </div>
                        <hr>
                        <div>
                            <h4 class="content-inner__heading">{{ __('Activity Feed') }}</h4>
                            <p class="text-muted">{{ __('Clean activity feed information.') }}</p>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.activities') }}" type="button">
                                {{ uppercase(__('clear all activities')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.activities.year') }}"
                                    type="button">
                                {{ uppercase(__('clear activities older than year')) }}
                            </button>

                            <button class="btn btn-default button--maintenance"
                                    data-action="{{ route('reactor.maintenance.clear.activities.month') }}"
                                    type="button">
                                {{ uppercase(__('clear activities older than month')) }}
                            </button>
                        </div>

                    </div>
                </div>
                <!-- /.row -->
            </div>


        </div>

    </section>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            var advancedButtons = $('button.button--maintenance');

            advancedButtons.click(function (e) {
                var action = $(this).data('action'),
                        form = $('<form/>')
                                .attr('action', action)
                                .attr('method', 'POST');

                $('{{ csrf_field() }}').appendTo(form);

                form.appendTo('body').submit().remove();

                e.preventDefault();
                e.stopPropagation();
            });
        });
    </script>
@endsection