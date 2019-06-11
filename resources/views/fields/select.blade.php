{!! field_wrapper_open($options, $name, $errors) !!}

<div>
    {!! field_label($showLabel, $options, $name, $errors) !!}

    <?php $emptyVal = $options['empty_value'] ? ['' => $options['empty_value']] : null; ?>
    <div class="form-group">
        {!! Form::select($name, (array)$emptyVal + $options['choices'], $options['selected'], $options['attr']) !!}
        <i class="icon-arrow-down"></i>
    </div>

    {!! field_errors($errors, $name) !!}

</div>{!! field_help_block($name, $options) !!}

{!! field_wrapper_close($options) !!}