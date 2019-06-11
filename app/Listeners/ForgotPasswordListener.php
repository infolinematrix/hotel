<?php

namespace App\Listeners;

use App\Events\ForgotPasswordEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;
use Mail;
class ForgotPasswordListener
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
     * @param  ForgotPasswordEvent  $event
     * @return void
     */
    public function handle(ForgotPasswordEvent $event)
    {

        $user = $event->forgot;

        /*Get Email template*/

        $click_here = env('CLIENT_URL').'/auth/password-reset/' .base64_encode($user->email);

        $data = [
            'email' => $user->email,
            'site_name' => getSettings('site_title'),
            'url' => $click_here,
            'click_here' => "<a href='$click_here'>Click Here</a>"
        ];

        /*Get Mail Configuration*/

        Config::set('mail', getMailconfig());

        Mail::send('mail.forgot', $data, function ($message) use ($data) {
            $message->from(getSettings('email_from_email'), getSettings('site_title'));
            $message->subject('Reset Your Account Password');
            $message->to($data['email']);
        });



        return redirect()->back();

    }
}