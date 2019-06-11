<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17/10/17
 * Time: 11:54 AM
 */

namespace extension\Site\Html\Forms;


use Kris\LaravelFormBuilder\Form;

class ForgotPasswordForm extends Form
{

    protected $formOptions = [
        'method' => 'POST',
    ];

    public function buildForm()
    {

        $this->add('email', 'email', [
            'label' => 'Registered Email',
            'rules' => ['required']
        ]);

    }
}