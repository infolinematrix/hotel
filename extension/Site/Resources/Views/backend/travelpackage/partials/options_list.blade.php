<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            {!! __('OPTIONS') !!}
        </h3>

    </div>
    <!-- /.box-header -->

    <div class="box-body">
        <ul class="list-group">



            <li class="list-group-item">{!! node_option_form(
                $node->isPublished() ? route('reactor.nodes.unpublish', $node->getKey()) : route('reactor.nodes.publish', $node->getKey()),
                $node->isPublished() ? 'fa fa-check' : 'fa fa-remove text-danger',
                $node->isPublished() ? 'Unpublish' : 'Publish') !!}
            </li>

            <li class="list-group-item">
                {!! delete_form(
                    route('reactor.nodes.destroy', $node->getKey()),
                    __('Delete')) !!}
            </li>

            <li class="list-group-item">

                <i class="fa fa-list"></i> <a href="{!! route('reactor.travelpackage.index') !!}"> Lists</a>
            </li>

        </ul>

    </div>
</div>