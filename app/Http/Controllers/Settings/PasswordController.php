<?php

namespace ReactorCMS\Http\Controllers\Settings;

use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = $request->user();


       // $user =  User::where('email',trim($email))->first();
        if($user) {
            $user->password = Hash::make($request->password);
            $user->save();

        }
    }
}
