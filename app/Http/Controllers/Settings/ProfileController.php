<?php

namespace ReactorCMS\Http\Controllers\Settings;

use Illuminate\Http\Request;
use ReactorCMS\Entities\User;
use ReactorCMS\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            //'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        //$user->phone = $request->phone;

        return tap($user)->push();
    }


}
