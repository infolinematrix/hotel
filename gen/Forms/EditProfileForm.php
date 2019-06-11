<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditProfileForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('profile_address', 'text', [
            'label' => 'Address',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_zipcode', 'text', [
            'label' => 'Zip Code',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_phone', 'text', [
            'label' => 'Phone',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_email', 'text', [
            'label' => 'Email',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_landline', 'text', [
            'label' => 'Landline',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_latitude', 'text', [
            'label' => 'Latitude',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('profile_longitude', 'text', [
            'label' => 'Longitude',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('profile_firstname', 'text', [
            'label' => 'First Name',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_lastname', 'text', [
            'label' => 'Last Name',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('profile_about', 'textarea', [
            'label' => 'About',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('featured', 'number', [
            'label' => 'Featured',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}