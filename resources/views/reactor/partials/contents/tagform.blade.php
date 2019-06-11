<div class="box-body">
    {!! form_start($form) !!}
        {!! form_row($form->tag_name) !!}
    {!! form_rest($form) !!}
</div>

<div class="box-footer">
    <button type="submit" class="btn btn-action btn-black">
        <i class="fa fa-save"></i>{!! __('Save') !!}
    </button>
</div>

{!! form_end($form) !!}