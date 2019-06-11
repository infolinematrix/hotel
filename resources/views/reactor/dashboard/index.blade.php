@extends('layout.base')



<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => 'Dashboard','breadcrumb' => [] ])


    <section class="content">


        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{!! $nodes !!}</h3>
                        <p>Nodes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tree"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! $media !!}</h3>
                        <p>Media</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-images"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! $users !!}</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{!! $db_size !!}<sup style="font-size: 20px">MB</sup></h3>
                        <p>Database</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->

            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                <li class="active">
                    <a href="#daily" data-toggle="tab" aria-expanded="true" data-mode="daily">
                        {!! __('Daily') !!}
                    </a>
                </li>

                <li class="">
                    <a href="#weekly" data-toggle="tab" aria-expanded="false" data-mode="weekly">
                        {!! __('Weekly') !!}
                    </a>
                </li>

                <li class="">
                    <a href="#monthly" data-toggle="tab" aria-expanded="false" data-mode="monthly">
                        {!! __('Monthly') !!}
                    </a>
                </li>

                <li class="pull-left header"><i class="fa fa-line-chart"></i> {!! __('Statistics') !!}</li>
            </ul>


            <div class="tab-content mb20">
                {{ uppercase(trans('general.total_visits') . ': ' . $statistics['total_visits'] . ' . ' .
                    trans('general.visits_today') . ': ' . $statistics['visits_today'] . ' . ' .
                    trans('general.last_visited') . ': ' . $statistics['last_visited']
                ) }}
            </div>

            <div class="tab-content">


                <div class="chart tab-pane active" id="daily">
                    <canvas height="100" id="weekStatisticsGraph"></canvas>
                </div>
                <div class="chart tab-pane" id="weekly">
                    <canvas height="88" id="monthStatisticsGraph"></canvas>
                </div>
                <div class="chart tab-pane" id="monthly">
                    <canvas height="88" id="yearStatisticsGraph"></canvas>
                </div>
            </div>
        </div>
        <!-- /.nav-tabs-custom -->


        <!-- Activity -->
        <div class="row">
            <div class="col-lg-6">
                <!-- PRODUCT LIST -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Visited Nodes</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">

                            @foreach($mostVisited as $item)
                            <li class="item">
                                <div class="">
                                    <div class="product-title">
                                        {!! plainText($item->getTitle(),70) !!}

                                    </div>
                                    <span class="product-description">
<small class="text-muted">before 3 hours</small>
                                    </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            @endforeach

                        </ul>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-6">
                <!-- PRODUCT LIST -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Nodes</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($recentlyVisited as $item)
                                <li class="item">
                                    <div class="">
                                        <div class="product-title">
                                            {!! plainText($item->getTitle(),70) !!}

                                        </div>
                                    <span class="product-description">
<small class="text-muted">before 3 hours</small>
                                    </span>
                                    </div>
                                </li>
                                <!-- /.item -->
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>


@section('scripts')
    @parent

    {!! Theme::js('js/charts.js') !!}

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








@endsection