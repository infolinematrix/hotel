<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 13/4/18
 * Time: 2:31 PM
 */

namespace extension\Site\Http\Auth;


use Illuminate\Http\Request;
use Reactor\Entities\Profile;
use Reactor\Entities\User;
use Reactor\Http\Controllers\PublicController;
use Reactor\Http\Controllers\Traits\UsesUserForms;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Reactor\Http\Controllers\Traits\BasicResource;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs;
use Kenarkose\Files\Media\Media;
class AccountController extends PublicController
{

    //s
    use BasicResource, UsesUserForms;


    public function __construct()
    {

    }

    public function getProfile(){

        $user = \Auth::user();
        $profile = $user->profile()->first();

        return $this->compileView('Site::auth.account', compact('user','profile'), 'Profile');
    }
    public function getProfileEdit($id){

        $user = User::find($id);
        $profile = $user->profile()->first();
        $user_form = $this->getEditForm($id,$user);

        /**
         * Profile Form
         */
        $profile_form = $this->form('Extension\Site\Html\Forms\EditProfileForm', [
            'url' => route('user.profile.edit', $user->id),
            'model' => $profile
        ]);

        //dd($profile_form);

        return $this->compileView('Site::auth.account_edit', compact('user_form','user','profile_form'), 'Edit Profile');
    }

    

    public function UpdateProfile(Request $request, $id){

        $profile = Profile::where('user_id',$id)->first();

        $this->validateForm('Extension\Site\Html\Forms\EditProfileForm', $request);

        $profile->phone = $request->phone ;
        $profile->gender = $request->gender ;
        $profile->region = $request->region;
        $profile->city = $request->city;
        $profile->pincode = $request->pincode;
        $profile->address = $request->address;
        $profile->save();
        $this->notify('users.changed_password', 'changed_user_password', 'success');

        return redirect()->back();
    }



}