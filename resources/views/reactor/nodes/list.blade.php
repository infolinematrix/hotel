<table class="table table-striped">
    <tbody>

    @if($nodes->count() > 0)
        <tr>
            <th>{!! __('#ID') !!}</th>
            <th>{!! __('Title') !!}</th>
            <th>{!! __('Parent') !!}</th>
            <th>{!! __('Type') !!}</th>
            <th>{!! __('Updated') !!}</th>
            <th class="text-right">{!! __('Action') !!}</th>
        </tr>

        @foreach ($nodes as $node)
            <tr>
                <td>#{!! $node->getKey() !!}</td>
                <td>
                    {!! link_to($node->getDefaultEditUrl(), str_limit($node->getTitle(),50)) !!}
                </td>
                <td>{!! (is_null($node->parent_id) ? 0 : $node->parent_id) !!}</td>
                <td>{!! $node->getNodeType()->label !!}</td>
                <td>{!! $node->created_at->formatLocalized('%b %e, %Y') !!}</td>

                <td class="text-right">
                    @if($node->isMailing())
                        {!! content_options('mailings', $node->getKey()) !!}
                    @else
                        {!! node_options($node) !!}
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        {!! no_results_row(__('No Nodes found ...')) !!}
    @endif

    </tbody>
</table>

