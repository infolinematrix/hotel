<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Mail;
class RegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterEvent  $event
     * @return void
     */
    public function handle(RegisterEvent $event)
    {

        $user = $event->register;


        /*Get Email template*/

        $click_here = env('CLIENT_URL').'/auth/verify/' .base64_encode($user->email);

        $data = [
            'name' => $user->first_name,
            'email' => $user->email,
            'site_name' => getSettings('site_title'),
            'url' => $click_here,
            'click_here' => "<a href='$click_here'>Click Here</a>"
        ];

        /*Get Mail Configuration*/

        Config::set('mail', getMailconfig());

        Mail::send('mail.register', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Verify Your Account');
            $message->to($data['email']);
        });



        return redirect()->back();

    }
}
