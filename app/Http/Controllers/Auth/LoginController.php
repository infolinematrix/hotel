<?php

namespace ReactorCMS\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        die("Restricted Area");
    }

    public function getUser(Request $request)
    {
        $data = null;

        $user = $request->user();
        
        if ($user) {
            $data['user'] = $user;
            $data['role'] = $user->roles()->first();
        }

        return $data;
    }

    
   
    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        $token = $this->guard()->attempt($this->credentials($request));
        

        if ($token) {
            $this->guard()->setToken($token);

            return true;
        }

        return false;
    }

 

    protected function sendLoginResponse(Request $request)
    {

        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        
        return ['error' => trans('auth.failed')];
    }


}
