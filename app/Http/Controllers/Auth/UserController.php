<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 22/10/18
 * Time: 2:40 PM
 */

namespace ReactorCMS\Http\Controllers\Auth;



use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Reactor\Hierarchy\NodeType;
use ReactorCMS\Entities\Node;
use ReactorCMS\Http\Controllers\Controller;
use ReactorCMS\Http\Controllers\PublicController;
use ReactorCMS\Http\Controllers\Traits\UsesNodeHelpers;
use Alert;
use ReactorCMS\Entities\User;
use Reactor\Users\Role;
use App\Events\RegisterEvent;
use App\Events\ForgotPasswordEvent;
use UxWeb\SweetAlert\SweetAlert;
use extension\Site\Helpers\UseAppHelper;
class UserController extends PublicController
{

    use AuthenticatesUsers;
    use UsesNodeHelpers;
    use UseAppHelper;

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

        $this->redirectTo = route('user.dashboard');
    }

    public function index(){

        return $this->compileView('Site::auth.login', compact('home'),'HOME PAGE TITLE');
    }


    public function dashboard(){

        $isProfile = $this->check_business_exist();



        $node_count = Auth::user()->nodes()->withType('producttype')->count();

        return $this->compileView('Site::auth.dashboard', compact('node_count','isProfile'), 'USER PANEL');
    }

    public function profile(){

        $profile = Auth::user();


        $isProfile = $profile->nodes()->withType('businesstype')->first();
        if($isProfile){
            $isProfile = $this->check_business_exist();
        }else{

            $isProfile = null;
        }


        

        return $this->compileView('Site::auth.profile', compact('profile','isProfile'), 'USER PROFILE');
    }

    public function updateProfile(Request $request){

        $data = [

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];

        User::where('id',Auth::user()->id)->update($data);

        SweetAlert::message('Profile Updated....');
        return redirect()->back();
    }



    public function changePassword(Request $request){

        $data = [

            'password' => Hash::make($request->password),

        ];

        User::where('id',Auth::user()->id)->update($data);

        SweetAlert::message('Password Changed...');
        return redirect()->back();
    }
    public function logout(Request $request)
    {
        $this->guard('web')->logout();
        return redirect()->route('login');
    }

    public function getRegister(){

        return $this->compileView('Site::auth.register', compact(''), 'Register');
    }

    public function postRegister(Request $request){


        /*Check User EXIST*/
        $check_user = User::where('email', $request->email)->first();
        if (!$check_user) {
            $user_role = Role::where('name', 'PUBLICUSER')->first();

            /*SAVE TO DATABASE*/

            $data = [

                'type' => $request->type,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1
            ];

            $user = User::create($data);

            //--Assign Role
            $user->assignRoleById($user_role->id);

            /*Event Running*/
            Event::fire(new RegisterEvent($user));

            SweetAlert::message('Please check your email, we have send you a activation code');
            return redirect()->back();
        }else{

            SweetAlert::message('Email Already Exist!');
            return redirect()->back();

        }
    }

    public function verify($email=''){

        $email = base64_decode($email);

        User::where('email',trim($email))->update(['status' => 51]);

        SweetAlert::message('Account activated! Please login...');
        return redirect()->route('login');



    }


    public function getForgot(){


        return $this->compileView('Site::auth.forgot', compact('profile'), 'Forgot Password');
    }

    public function postForgot(Request $request){


        $check_user = User::where('email', $request->email)->first();
        if (!$check_user) {

            SweetAlert::message('Invalid Email!');
            return redirect()->back();
        }else{

            $email = $request->email;

            /*Event Running*/
            Event::fire(new ForgotPasswordEvent($email));

            SweetAlert::message('Please check your mail...');
            return redirect()->back();

        }
    }

    public function resetPassword($email=''){

        $email = base64_decode($email);

        return $this->compileView('Site::auth.reset', compact('email'), 'Reset Password');
    }

    public function postRestepassword(Request $request){

        $email = trim($request->email);
        $data = [

            'password' => Hash::make($request->password)
        ];


        User::where('email',$email)->update($data);

        SweetAlert::message('Password Changed! Please login...');
        return redirect()->back();


    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

}