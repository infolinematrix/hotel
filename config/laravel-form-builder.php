<?php

return [

    // Templates
    'form' => 'laravel-form-builder::form',
    'text' => 'fields.text',
    'textarea' => 'fields.textarea',
    'checkbox' => 'fields.checkbox',
    'select' => 'fields.select',

    'custom_fields' => [
        'double' => 'ReactorCMS\Html\Fields\DoubleField',
        'password' => 'ReactorCMS\Html\Fields\PasswordField',
        'slug' => 'ReactorCMS\Html\Fields\SlugField',
        'hidden' => 'ReactorCMS\Html\Fields\HiddenField',
        'wysiwyg' => 'ReactorCMS\Html\Fields\WysiwygField',
        'relation' => 'ReactorCMS\Html\Fields\RelationField',
        'markdown' => 'ReactorCMS\Html\Fields\MarkdownField',
        'document' => 'ReactorCMS\Html\Fields\DocumentField',
        'node_collection' => 'ReactorCMS\Html\Fields\NodeCollectionField',
        'node' => 'ReactorCMS\Html\Fields\NodeField',
        'date' => 'ReactorCMS\Html\Fields\DatetimeField',
    ]
];
