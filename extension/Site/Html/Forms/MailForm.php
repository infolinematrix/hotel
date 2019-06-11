<?php
namespace Extension\Site\Html\Forms;
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/5/17
 * Time: 5:24 PM
 */



use Kris\LaravelFormBuilder\Form;
use Nuclear\Hierarchy\NodeType;
use Reactor\Http\Controllers\Traits\UsesNodeForms;

class MailForm extends Form {


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


        $this->add('title', 'text', [

            'rules' => 'required',
        ]);


        $this->add('email', 'text', [
            'rules' => 'required',
        ]);

        $this->add('content', 'wysiwyg', [

            'rules' => 'required',
            'attr' => ['rows' => '10']
        ]);

    }


}