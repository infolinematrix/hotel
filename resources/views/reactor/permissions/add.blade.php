<div class="box-body">
    <h3 class="">{{ trans('permissions.add') }}</h3>
    {!! form_start($form) !!}
    {!! form_rest($form) !!}
    {!! submit_button('icon-plus', trans('permissions.add')) !!}
    {!! form_end($form) !!}
</div>