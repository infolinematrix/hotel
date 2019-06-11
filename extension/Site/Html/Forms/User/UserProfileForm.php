<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 3/8/17
 * Time: 1:41 PM
 */

namespace extension\Site\Html\Forms\User;


use Illuminate\Support\Facades\Auth;
use Kris\LaravelFormBuilder\Form;

class UserProfileForm extends Form
{

    protected $formOptions = [
        'method' => 'POST'
    ];


    public function buildForm()
    {


        $this->add('user_id', 'hidden', [
            'rules' => ['required'],
            'value' => Auth::user()->id
        ]);




        $this->add('business_type', 'choice', [
            'label' => '_Business type',
            'choices' => config('site.business_type'),
            'choice_options' => [
                'wrapper' => ['class' => 'form-group radio'],
                'attr' => ['class' => 'form-control radio-input'],
            ],

            'expanded' => true,
            'multiple' => false,
        ]);


        $this->add('business_email', 'text', [
            'label' => '_Business email',
            'rules' => ['required'],
        ]);
        $this->add('country_code', 'choice', [
            'label' => '_Code',
            'rules' => ['required'],
            'choices' => config('site.country_code'),
            'attr' => [
                'class' => 'select2'
            ]
        ]);
        $this->add('phone', 'text', [
            'label' => '_Phone',
            'rules' => ['required'],
        ]);

        $this->add('business_description', 'textarea', [
            'label' => '_Business description',
            'rules' => ['required'],
            'attr' => ['rows' => 10]
        ]);

        $this->add('address', 'textarea', [
            'label' => '_Address',
            'rules' => ['required'],
            'attr' => ['rows' => 3]
        ]);


    }

}