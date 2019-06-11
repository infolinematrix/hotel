<?php


namespace ReactorCMS\Html\Forms\Nodes;


use Kris\LaravelFormBuilder\Form;

class CreateForm extends Form {

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
        $this->add('type', 'select', ['rules' => 'required', 'inline' => true]);
    }

}