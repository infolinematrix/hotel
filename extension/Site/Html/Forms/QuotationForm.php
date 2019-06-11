<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 11/11/17
 * Time: 2:14 PM
 */

namespace Extension\Site\Html\Forms;


use Kris\LaravelFormBuilder\Form;

class QuotationForm extends Form
{

    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {

        $this->add('name', 'text', [
            'rules' => 'required',
            'label' => false,
            'value' => (\Auth::user() ? \Auth::user()->first_name . ' ' . \Auth::user()->last_name : ''),
            'attr' => [
                'id' => 'name',
                'placeholder' => 'Name'
            ]
        ]);

        $this->add('email', 'email', [
            'rules' => 'required',
            'label' => false,
            'value' => (\Auth::user() ? \Auth::user()->email : ''),
            'attr' => [
                'id' => 'email',
                'placeholder' => 'Your email'
            ]
        ]);
        $this->add('contact_no', 'text', [
            'rules' => 'required',
            'label' => false,
            'attr' => [
                'id' => 'contact_no',
                'placeholder' => 'Contact No'
            ]

        ]);


        $this->add('message', 'textarea', [
            'rules' => 'required',
            'label' => false,
            'attr' => ['id' => 'message', 'rows' => '5', 'placeholder' => 'Message to supplier']
        ]);


    }

}