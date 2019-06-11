<?php
// WARNING! THIS IS A GENERATED FILE, PLEASE DO NOT EDIT!

namespace gen\Forms;


use Kris\LaravelFormBuilder\Form;

class EditRoomtypeForm extends Form {

    /**
     * Form options
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->compose('Reactor\Hierarchy\Http\Forms\NodeSourceForm');
                        $this->add('description', 'wysiwyg', [
            'label' => 'Description',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                                $this->add('price', 'text', [
            'label' => 'Price',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('discount', 'double', [
            'label' => 'Discount',
            'help_block' => ['text' => ''],

            
                        'default_value' => 0.00,
            
            

        ]);
                                $this->add('facilities', 'text', [
            'label' => 'Facilities',
            'help_block' => ['text' => ''],

                        'rules' => 'required',
            
            
            

        ]);
                                $this->add('no_of_rooms', 'text', [
            'label' => 'No of Rooms',
            'help_block' => ['text' => ''],

            
            
            

        ]);
                    }

}