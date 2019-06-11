<?php


namespace ReactorCMS\Html\Forms\NodeFields;


use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;
use Reactor\Hierarchy\NodeType;
use Reactor\Hierarchy\Node;
use Illuminate\Http\Request;
use Reactor\Hierarchy\NodeSource;

class CustomForm extends Form
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

        $this->add('custom_form', 'choice', [
            'rules' => 'required',
            'choices' => $this->getNodeTypes(),
            'empty_value' => '-Select-',
        ]);


    }

    /**
     * Returns the available types
     *
     * @return array
     */
    protected function getNodeTypes(Node $parent = null)
    {
        $nodeTypes = NodeType::whereVisible(1)
            ->forNodes()
            ->lists('label', 'name')
            ->toArray();

        return $nodeTypes;
    }

}