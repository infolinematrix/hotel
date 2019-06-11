<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            {!! __('OPTIONS') !!}
        </h3>

    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <ul class="list-group">


            <li class="list-group-item">
                <a href="{!! route('reactor.reviews.publish',$review->id) !!}">
                    @if($review->approved == 1)
                        Unpublish Review
                    @else
                        Publish Review
                    @endif

                    </a>
            </li>

            <li class="list-group-item">
               <a href="{!! route('reactor.reviews.destroy',[$review->id]) !!}"><i class="fa fa-trash"></i></a>
            </li>

        </ul>

    </div>
</div>