@section('scripts')
    @parent

    {!! Html::script('assets/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/plugins/ckeditor/ckeditor_init.js') !!}


    <script type="text/javascript">

    </script>


@endsection



{!! field_wrapper_open($options, $name, $errors) !!}

<div class="{{ array_get($options, 'fullWidth', false) ? 'full' : 'field' }} ">
    {!! field_label($showLabel, $options, $name, $errors) !!}

    {!! Form::textarea($name, $options['value'], ['id' => 'ckeditor']) !!}

    {!! field_errors($errors, $name) !!}

</div>

{!! field_help_block($name, $options) !!}
{!! field_wrapper_close($options) !!}