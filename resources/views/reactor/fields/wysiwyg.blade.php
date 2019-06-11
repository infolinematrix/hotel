@section('scripts')
    @parent

    {!! Html::script('assets/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('assets/plugins/ckeditor/ckeditor_init.js') !!}


    <script type="text/javascript">
        initSample();
    </script>


@endsection

@section('styles')

@endsection


{!! field_wrapper_open($options, $name, $errors) !!}

<div class="form-group-column form-group-column--{{ array_get($options, 'fullWidth', false) ? 'full' : 'field' }} ">
    {!! field_label($showLabel, $options, $name, $errors) !!}

    {!! Form::textarea($name, $options['value'], ['id' => 'editor']) !!}

    {!! field_errors($errors, $name) !!}

</div>

{!! field_help_block($name, $options) !!}
{!! field_wrapper_close($options) !!}