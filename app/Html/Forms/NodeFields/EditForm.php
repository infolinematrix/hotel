<?php


namespace ReactorCMS\Html\Forms\NodeFields;


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
            'help_block' => ['text' => trans('hints.nodefields_label')]
        ]);



        $this->add('position', 'number', [
            'default_value' => 0.8,
            'attr' => [
                'step' => 'any'
            ],
            'inline'  => true
        ]);

        $this->add('visible', 'select', [
            'choices' => trans('general.dropdown.yesno'),
            'selected' => '1'
        ]);

        $this->add('rules', 'text', [
            'help_block' => ['text' => trans('hints.nodefields_rules')]
        ]);
        $this->add('default_value', 'text', [
            'help_block' => ['text' => trans('hints.nodefields_default_value')]
        ]);
        $this->add('options', 'textarea', [
            'help_block' => ['text' => trans('hints.nodefields_options')]
        ]);
        $this->add('description', 'textarea');

        $this->add('indexed', 'select',[
            'choices' => trans('general.dropdown.yesno'),
            'selected' => 0
        ]);
    }
}