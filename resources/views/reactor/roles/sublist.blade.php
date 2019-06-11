<table class="table table-striped">
    <tbody>
    <tr>
        <th>{!! __('#ID') !!}</th>
        <th>{!! __('ROLE') !!}</th>
        <th>{!! __('ROLE NAME') !!}</th>
        <th class="text-right">{!! __('ACTION') !!}</th>
    </tr>

    @if($roles->count())
        @foreach($roles as $role)
            <tr>
                <td>#{!! $role->getKey() !!}</td>
                <td>
                    {!! link_to_route('reactor.roles.edit', $role->label, $role->getKey()) !!}
                </td>

                <td>
                    {{ $role->name }}
                </td>


                <td class="text-right">
                    {!! delete_form(
                     route('reactor.users.roles.dissociate', $user->getKey()),
                     trans('roles.dissociate'),
                     '<input type="hidden" name="role" value="' . $role->name . '">',
                     true
                 ) !!}
                </td>

            </tr>
        @endforeach
    @else
        {!! no_results_row(__('No User found ...')) !!}
    @endif

    </tbody>
</table>



