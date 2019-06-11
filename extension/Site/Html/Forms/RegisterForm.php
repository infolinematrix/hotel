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

class RegisterForm extends Form
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

        $this->compose('Reactor\Html\Forms\Users\EditForm');
        $this->compose('Reactor\Html\Forms\Users\PasswordForm');

    }


}