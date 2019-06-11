<?php

namespace ReactorCMS\Html\Forms\Users;


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
        $this->compose('ReactorCMS\Html\Forms\Users\EditForm');
        $this->compose('ReactorCMS\Html\Forms\Users\PasswordForm');
    }

}