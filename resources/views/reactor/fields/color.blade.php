{!! field_wrapper_open($options, $name, $errors) !!}


<div class="form-group">
    {!! Form::label($name) !!}
    {!! Form::text($name, $options['value'], array_set($options['attr'], 'class', 'form-control')) !!}
</div>

{!! field_errors($errors, $name) !!}

{!! field_help_block($name, $options) !!}

{!! field_wrapper_close($options) !!}