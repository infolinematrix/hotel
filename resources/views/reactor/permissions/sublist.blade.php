<div class="box-body">


    <div class="pt10">

        @if($permissions->count())

            <table class="table table-striped">
                <tbody>
                <tr>
                    <th>{!! __('#PERMISSION') !!}</th>
                    <th class="text-right">{!! __('ACTION') !!}</th>
                </tr>


                @foreach ($permissions as $permission)
                    <tr>
                        <td>{!! link_to_route('reactor.permissions.edit', $permission->name, $permission->getKey()) !!}</td>

                        <td class="text-right">
                            {!! delete_form(
                $route,
                trans('permissions.revoke'),
                '<input type="hidden" name="permission" value="' . $permission->name . '">',
                true
            ) !!}
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        @else
            {!! no_results_row('permissions.no_permissions') !!}
        @endif


    </div>

    <!-- /.row -->
</div>

<div class="box-footer">

</div>