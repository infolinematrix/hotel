<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{!! $pageTitle !!}</h3>

        <div class="box-tools pull-right">
            <a href="{!! route('reactor.nodes.create') !!}" class="btn btn-flat btn-danger">Create</a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


        @if($activities->count())

            <ul class="list list-unstyled">
                @foreach($activities as $activity)
                    @include('activities.' . $activity->name)
                @endforeach
            </ul>
    @else
        {{ trans('activities.no_user_activity') }}
    @endif
    <!-- /.row -->
    </div>


</div>

