<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17/11/17
 * Time: 12:56 PM
 */

namespace Extension\Site\Html\Forms;


use Kris\LaravelFormBuilder\Form;

class EmailForm extends Form
{

    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {

        $this->add('name', 'text', [
            'attr' => [
                'placeholder' => 'Name'
            ]
        ]);

        $this->add('email', 'email', [
            'rules' => 'required',
            'attr' => [
                'placeholder' => 'Email'
            ]
        ]);

        $this->add('city', 'text', [
            'rules' => 'required',
            'attr' => [
                'placeholder' => 'City'
            ]
        ]);

        $this->add('country', 'text', [
            'rules' => 'required',
            'attr' => [
                'placeholder' => 'country'
            ]
        ]);


        $this->add('additional', 'text', [
            'rules' => 'required',

        ]);
    }
}