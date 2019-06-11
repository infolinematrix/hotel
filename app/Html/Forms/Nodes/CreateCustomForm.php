<?php


namespace ReactorCMS\Html\Forms\Nodes;


use Kris\LaravelFormBuilder\Form;

class CreateCustomForm extends Form
{

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

        $this->remove('title');
        $this->remove('node_name');


    }

}