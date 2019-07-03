{!! field_wrapper_open($options, $name, $errors) !!}

<div class="form-group form-group--float ">
    {!! field_label($showLabel, $options, $name, $errors) !!}
    {!! Form::input($type, $name, $options['value'], $options['attr']) !!}
    <i class="form-group__bar"></i>

    {!! field_errors($errors, $name) !!}
</div>



{!! field_wrapper_close($options) !!}