@if($fields->count())
    <table class="table table-striped">
        <tbody>
            <tr>
                <th width="10%">#Name</th>
                <th>Label</th>
                <th width="40%">Type</th>
                <th class="text-right">Action</th>
            </tr>

            @foreach ($fields as $field)
                <tr>
                    <td>
                        {!! link_to_route('reactor.nodefields.edit', $field->label, $field->getKey()) !!}
                    </td>
                    <td>
                        {{ $field->name }}
                    </td>
                    <td>
                        {{ $field->type }}
                    </td>

                    <td class="text-right">
                        {!! content_options('nodefields', $field->getKey()) !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    {!! no_results_row('nodetypes.no_fields') !!}
@endif

