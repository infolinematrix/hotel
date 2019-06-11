<?php

namespace Extension\Site\Http\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Reactor\Entities\User;
//use Nuclear\Users\User;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use Nuclear\Users\HasRoles;
use Nuclear\Users\Role;

use Illuminate\Support\Facades\Event;
use App\Events\SendMail;
use Reactor\Events\SendRegisterEvent;

use Reactor\Http\Controllers\PublicController;
use Reactor\Http\Controllers\Traits\BasicResource;
use Carbon\Carbon;
use DaveJamesMiller\Breadcrumbs\Facade as Breadcrumbs;

class AuthController extends PublicController
{

    use AuthenticatesUsers, ThrottlesLogins, BasicResource;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);

        $this->redirectTo = route('user.dashboard');
    }

    public function getLoginForm()
    {
        return $this->compileView('Site::auth.login', compact(null), 'Member Login');
    }

    public function postLoginForm(Request $request)
    {


        $credentials = $this->getCredentials($request);


        if (!Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {

            $msg = "These credentials do not match our records.";
            return redirect()->back()->with('error', trans($msg));
        }

        $this->postLogin($request);

        return redirect()->intended($this->redirectTo);
    }

    public function showLoginForm()
    {
        return $this->compileView('Site::auth.login', compact(null), 'Member Login');
    }

    public function getRegisterForm()
    {
        //Breadcrumbs----//

        $form = $this->form('Extension\Site\Html\Forms\RegisterForm', [
            'method' => 'POST',
            'route' => 'site.register'
        ]);


        return $this->compileView('Site::auth.register', compact('form'), 'New Registration');
    }

    public function postRegisterForm(Request $request)
    {

        $user = "sad";
        Event::fire(new SendRegisterEvent($user));

        $check_user = User::where('email', trim($request->email))->first();
        if (!$check_user) {
            $user_role = Role::where('name', 'PUBLICUSER')->first();
            $user = [

                'email' => $request->email,
                'password' => $request->password,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'confirmation_code' => str_random(30)
            ];

            $user = User::create($user);

            //--Assign Role
            $user->assignRoleById($user_role->id);

            Event::fire(new SendRegisterEvent($user));


            $msg = "Please check your email (), we have send you a activation code";
            return redirect()->back()->with('status', trans($msg));
        } else {

            $msg = "User Already Exist!";
            return redirect()->back()->with('error', trans($msg));
        }


    }

    public function verify($id, $code = '')
    {


        $user = User::where('id', $id)->first();

        if ($user->confirmation_code == $code) {


            $data = [

                'status' => '51',

                'updated_at' => Carbon::now(),

            ];

            User::where('id', $id)->update($data);

            $msg = "Account activated! Please login...";
            return redirect()->route('site.login')->with('status', trans($msg));
        } else {

            $msg = "Invalid!";
            return redirect()->route('site.register')->with('status', trans($msg));

        }


    }

    public function getForgotPasswordForm()
    {


        $form = $this->form('Extension\Site\Html\Forms\ForgotPasswordForm', [
            'method' => 'POST',
            'route' => 'site.password.forgot'
        ]);




        return $this->compileView('Site::auth.forgot_password', compact('form'), 'Forgot Password');
    }

    public function postForgotPasswordForm(Request $request)
    {
        //Breadcrumbs----//
        Breadcrumbs::register('site.password.forgot', function ($breadcrumbs) {
            $breadcrumbs->push('Register', route('site.password.forgot'));
        });

        /*Mail Configuration*/
        Config::set('mail', getMailconfig());
        /*Mail Configuration*/

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject('Your Password Reset Link');
        });

        dd($response);

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->getEmail();
        }

        $email = $request->input('email');


        //Breadcrumbs----//
        Breadcrumbs::register('site.password.reset', function ($breadcrumbs) {
            $breadcrumbs->push('Register', route('site.password.forgot'));
        });

        if (property_exists($this, 'resetView')) {

            return view($this->resetView)->with(compact('token', 'email'));
        }


        return $this->compileView('Site::auth.reset', compact('token', 'email'), 'Reset Password');
    }

    public function reset(Request $request)
    {

        $this->validate(
            $request,
            $this->getResetValidationRules()

        );

        $credentials = $this->getResetCredentials($request);

        $broker = $this->getBroker();

        /*Mail Configuration*/
        Config::set('mail', getMailconfig());
        /*Mail Configuration*/
        $response = Password::broker($broker)->reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });


        switch ($response) {
            case Password::PASSWORD_RESET:

                return redirect()->back()->with('status', trans($response));
            default:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }

    protected function getResetValidationRules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function getResetCredentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => str_random(60),
        ])->save();

        return redirect()->back()->with('status', 'Successfully..');
    }

    public function getBroker()
    {
        return property_exists($this, 'broker') ? $this->broker : null;
    }


}