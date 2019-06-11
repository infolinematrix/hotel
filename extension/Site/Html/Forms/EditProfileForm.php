<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 3/5/18
 * Time: 2:01 PM
 */

namespace extension\Site\Html\Forms;


use Kris\LaravelFormBuilder\Form;

class EditProfileForm extends Form
{

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->add('phone', 'text', [
            'rules' => 'required|max:15'
        ]);
        $this->add('gender', 'select', [
            'choices' => ['Female' => 'Female', 'Male' => 'Male'],
            'rules' => 'required|max:6'
        ]);

        $this->add('address', 'textarea', [
            'rules' => 'required|max:250',
            'attr' => ['rows'=>3]
        ]);
        $this->add('pincode', 'text', [
            'rules' => 'required|max:6'
        ]);
        $this->add('region', 'text', [
            'rules' => 'required|max:50'
        ]);
        $this->add('city', 'text', [
            'rules' => 'required|max:50'
        ]);
    }
}