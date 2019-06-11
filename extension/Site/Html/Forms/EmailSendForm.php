<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17/11/17
 * Time: 12:56 PM
 */

namespace Extension\Site\Html\Forms;


use Kris\LaravelFormBuilder\Form;

class EmailSendForm extends Form
{

    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {

        $this->add('subject', 'text', [
            'rules' => 'required',
            'attr' => [
                'id' => 'subject',
                'placeholder' => 'Subject'
            ]
        ]);

        $this->add('message', 'wysiwyg', [
            'id' => 'message',
            'rules' => 'required',

        ]);
    }
}