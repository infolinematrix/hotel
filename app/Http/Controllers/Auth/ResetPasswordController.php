<?php

namespace ReactorCMS\Http\Controllers\Auth;

use App\Events\ForgotPasswordEvent;
use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use ReactorCMS\Entities\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetResponse($response)
    {
        return ['status' => trans($response)];
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $response
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['email' => trans($response)], 400);
    }

    public function forgot(Request $request){

        $user = User::where('email', trim($request->email))->first();
        /*Check User*/
        if($user){

            /*Event Running*/
            Event::fire(new ForgotPasswordEvent($user));

            return 'Sent';

        }else{
           return 'not_exist';
        }

    }

    public function reset(Request $request, $email){

        $email = base64_decode($email);

        
        $user =  User::where('email',trim($email))->first();
        if($user) {

            $data = [

                'password' => Hash::make($request->password)
            ];

            User::where('id',$user->id)->update($data);

            return 'updated';
        }else{

            return 'invalid';
        }

    }
}
