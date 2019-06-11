{!! field_wrapper_open($options, $name, $errors) !!}

<div class="form-group">
    {!! field_label($showLabel, $options, $name, $errors) !!}
    {!! field_errors($errors, $name) !!}
    {!! Form::input($type, $name, $options['value'], $options['attr']) !!}
    {!! field_help_block($name, $options) !!}
</div>


{!! field_wrapper_close($options) !!}