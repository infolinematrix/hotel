<?php

namespace ReactorCMS\Http\Controllers\Auth;

use ReactorCMS\Entities\User;
use Reactor\Users\Role;
use Illuminate\Http\Request;
use ReactorCMS\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Event;
use App\Events\RegisterEvent;
class RegisterController extends Controller
{
    use RegistersUsers;

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
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){

        /*Check User EXIST*/
        $check_user = User::where('email', trim($request->email))->first();

        if (!$check_user) {
            $user_role = Role::where('name', 'PUBLICUSER')->first();

            /*SAVE TO DATABASE*/


            $data = [

               
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

            return 'success';
        }else{

            return 'exist';
        }


    }

    public function verify($email){

       $email = base64_decode($email);

       $user =  User::where('email',trim($email))->first();
       if($user) {
           User::where('email', trim($email))->update(['status' => 51]);

           return "verified";
       }else{

           return 'invalid';
       }

    }
}
