<?php


namespace Extension\Site\Http\Backend;

use Extension\Site\Html\Forms\ProfileForm;
use Reactor\Http\Controllers\ReactorController;
use Reactor\Http\Controllers\Traits\UsesNodeHelpers;

use Kris\LaravelFormBuilder\FormBuilder;


class ProfileController extends ReactorController
{




    public function __construct()
    {

    }



    public function create(FormBuilder $formBuilder){


        $form = $formBuilder->create(ProfileForm::class,[
            'method' => 'POST',
            'url' => route('doctor.profile.store')
        ]);




        return view('Site::backend.profile.create',compact('form'));
    }




}