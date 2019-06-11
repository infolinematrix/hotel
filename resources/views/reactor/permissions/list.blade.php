<table class="table table-striped">
    <tbody>
    <tr>
        <th>{!! __('PERMISSION') !!}</th>
        <th class="text-right">{!! __('ACTION') !!}</th>
    </tr>

    @if($permissions->count())
        @foreach($permissions as $permission)
            <tr>
                <td>
                    {!! link_to_route('reactor.permissions.edit', $permission->name, $permission->getKey()) !!}
                </td>


                <td class="text-right">
                    {!! content_options('permissions', $permission->getKey()) !!}
                </td>

            </tr>
        @endforeach
    @else
        {!! no_results_row(__('No User found ...')) !!}
    @endif

    </tbody>
</table>

