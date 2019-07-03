<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditTravelpackageForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('no_of_days', 'number', [
            'label' => 'No of Days',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('place_cover', 'text', [
            'label' => 'Place Cover',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('pkgtype', 'number', [
            'label' => 'Package Type',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('price', 'text', [
            'label' => 'Price',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('description', 'wysiwyg', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('discount', 'double', [
            'label' => 'Discount',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}