<?php

namespace ReactorCMS\Html\Forms\NodeTypes;


use Kris\LaravelFormBuilder\Form;

class EditForm extends Form {

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->add('label', 'text', [
            'rules'      => 'required|max:255',
            'help_block' => ['text' => trans('hints.nodetype_label')]
        ]);

        $this->add('hides_children', 'select', [
            'choices' => trans('general.dropdown.yesno')
        ]);

        $this->add('visible', 'select', [
            'choices' => trans('general.dropdown.yesno')
        ]);

        $this->add('taggable', 'select', [
            'choices' => trans('general.dropdown.yesno'),
            'default_value' => '0',
        ]);

        $this->add('color', 'color', [
            'rules'  => 'required',
            'inline' => true,
            'default_value' => '#F1C40F'
        ]);
        $this->add('allowed_children', 'relation', [
            'search_route' => 'reactor.nodetypes.search.type.nodes',
            'getter_method' => 'get_nodetypes_by_ids',
            'default_value' => '[]',
            'mode' => 'multiple'
        ]);
    }

}