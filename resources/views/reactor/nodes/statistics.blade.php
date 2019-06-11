@extends('reactor.layout.base')


<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Nodes'),'breadcrumb => []'])


    <section class="content">

        <div class="row">

            <div class="col-md-9 border-right">

                <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li class="active">
                            <a href="#daily2" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-code-fork"></i> {!! uppercase(__('Daily')) !!}</a>
                        </li>

                        <li>
                            <a href="#weekly2" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-code-fork"></i> {!! uppercase(__('Weekly')) !!}</a>
                        </li>
                        <li>
                            <a href="#monthly2" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-code-fork"></i> {!! uppercase(__('Monthly')) !!}</a>
                        </li>

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Edit')) !!}</li>
                    </ul>
                    <div class="tab-content">

                        <div class="clearfix">
                            {{ __('Total visits') . ': ' . $statistics['total_visits'] . ' . ' .
                                __('Visits today') . ': ' . $statistics['visits_today'] . ' . ' .
                                __('Last visited') . ': ' . $statistics['last_visited']
                             }}
                        </div>

                        <hr>

                        <div class="tab-pane active" id="daily2">
                            <canvas height="88" id="weekStatisticsGraph"></canvas>
                        </div>

                        <div class="tab-pane" id="weekly2">
                            <canvas height="88" id="monthStatisticsGraph"></canvas>
                        </div>

                        <div class="tab-pane" id="monthly2">
                            <canvas height="88" id="yearStatisticsGraph"></canvas>
                        </div>


                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">{!! __('Options') !!}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('nodes.includes.options', ['_edit' => true])
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            {!! __('OPTIONS') !!}
                        </h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        @include('nodes.includes.options', ['_edit' => true])
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->

@endsection


@section('scripts')
    @parent


    {!! Html::script('assets/plugins/chartjs/charts.js') !!}

    <script>
                @foreach(['year', 'month', 'week'] as $span)
        var {{ $span }}Options = {
                type: 'line',
                data: {
                    labels: {!! json_encode($statistics['chart']['labels']['last_' . $span . '_labels']) !!},
                    datasets: [
                        @foreach($statistics['chart']['statistics'] as $locale => $data)
                        $.extend({
                            label: '{{ uppercase($locale) }}',
                            data: {!! json_encode($data['last_' . $span . '_stats']) !!}}, window.chartDisplayDefaults),
                        @endforeach
                    ]
                },
                options: {scales: {yAxes: [{gridLines: {color: 'transparent'}}]}}
            };
        @endforeach

            window.onload = function () {
                    @foreach(['year', 'month', 'week'] as $span)
            var {{ $span }}Ctx = document.getElementById("{{ $span }}StatisticsGraph").getContext("2d");
            new Chart({{ $span }}Ctx, {{ $span }}Options);
            @endforeach
        }
    </script>
@endsection