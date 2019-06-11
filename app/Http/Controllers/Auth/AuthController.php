<?php

namespace ReactorCMS\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use ReactorCMS\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    protected $maxLoginAttempts = 2; // Amount of bad attempts user can make
    protected $lockoutTime = 1;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->redirectTo = route('reactor.dashboard');
    }


    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function refresh()
      {
        return response([
          'status' => 'success'
        ]);
      }

   public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        //return $this->loggedOut($request) ?: redirect('/');
        return redirect(\URL::previous());
    }
    
}
