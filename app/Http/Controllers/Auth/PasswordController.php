<?php

namespace ReactorCMS\Http\Controllers\Auth;

use ReactorCMS\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware());
        $this->middleware('guest');


        $this->redirectTo = route('reactor.dashboard');
    }
}
