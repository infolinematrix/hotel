<?php


namespace Extension\Site\Http\Backend;

use Reactor\Http\Controllers\ReactorController;

use Illuminate\Http\Request;


use Kris\LaravelFormBuilder\FormBuilder;
use Extension\Site\Html\Forms\MailForm;
use Reactor\Http\Controllers\Traits\UsesNodeForms;
use Reactor\Http\Controllers\Traits\UsesNodeHelpers;
use Reactor\Http\Controllers\Traits\UsesTranslations;
use Mail;


class MailController extends ReactorController
{

    use UsesTranslations, UsesNodeHelpers, UsesNodeForms;


    public function __construct()
    {

    }



    public function create(FormBuilder $formBuilder){


        $form = $formBuilder->create(MailForm::class, [
            'method' => 'POST',
            'url' => route('reactor.mail.store')

        ]);

        $form = $form;
        return view('Site::backend.mail.create',compact('form'));
    }


    public function send(Request $request){


        /* $data = [
 
             'email' => $request->email,
             'title' => $request->title,
             'content' => $request->content,
 
         ];
 
         /*Send Mail To Clients */
        /*Mail::send('Site::email.sendmail', $data, function ($message) use ($data) {
            $message->from(\Config::get('application.company.email'), \Config::get('application.company.title'));
            $message->subject($data['title']);
            $message->to($data['email']);
        });*/
    }


}