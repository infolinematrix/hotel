<table class="table table-striped">
    <tbody>
    <tr>
        <th>{!! __('#ID') !!}</th>
        <th>{!! __('User') !!}</th>
        <th>{!! __('Email') !!}</th>
        <th>{!! __('Created on') !!}</th>
        <th class="text-right">{!! __('Action') !!}</th>
    </tr>

    @if($users->count())
        @foreach($users as $user)
            <tr>
                <td>#{!! $user->getKey() !!}</td>
                <td>{!! link_to_route('reactor.users.edit', $user->present()->fullName, $user->getKey()) !!}</td>
                <td>
                    <a href="mailto:{{ $user->email }}">
                        {{ $user->email }}
                    </a>
                </td>
                <td>
                    {{ $user->present()->joinedAt }}
                </td>

                <td class="text-right">
                    {!! content_options('users', $user->getKey()) !!}
                </td>

            </tr>
        @endforeach
    @else
        {!! no_results_row(__('No User found ...')) !!}
    @endif

    </tbody>
</table>


