<?php

namespace ReactorCMS\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use App\Exceptions\EmailTakenException;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use ReactorCMS\Entities\OAuthProvider;
use ReactorCMS\Entities\User;
use ReactorCMS\Http\Controllers\Controller;

class OAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        config([
            'services.github.redirect' => route('oauth.callback', 'github'),
            'services.facebook.redirect' => route('oauth.callback', 'github'),
            'services.google.redirect' => route('oauth.callback', 'google'),
        ]);

        $this->middleware('guest')->except('logout');

        //$this->redirectTo = 'http://localhost:3000/auth/profile';
    }

    /**
     * Redirect the user to the provider authentication page.
     *
     * @param  string $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider($provider)
    {
        //return Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();

        return [
            'url' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
        ];
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param  string $driver
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider, Request $request)
    {

        $serviceUser = Socialite::driver($provider)->stateless()->user();
        $user = $this->findOrCreateUser($provider, $serviceUser);


        $user1 = User::find($user->user_id);

        $this->guard()->setToken(
            $token = $this->guard()->login($user1)
        );


        $expiration = $this->guard()->getPayload()->get('exp');

        $data = [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
        ];

        $data = encrypt($data, true);

        return redirect()->to('http://localhost:3000/auth/provider/' . $data);

        /*return [
        'token' => $token,
        'token_type' => 'bearer',
        'expires_in' => $expiration - time(),
        ];*/

        /*

        return view('auth/callback', [
        'token' => $token,
        'token_type' => 'bearer',
        'expires_in' => $this->guard()->getPayload()->get('exp') - time(),
        ]);*/

    }

    public function ProviderAuthorisation($params = '')
    {

        $data = decrypt($params);

        return $data;

    }

    /**
     * @param  string $provider
     * @param  \Laravel\Socialite\Contracts\User $sUser
     * @return \App\User|false
     */
    protected function findOrCreateUser($provider, $user)
    {

        $oauthProvider = OAuthProvider::where('provider', $provider)
            ->where('provider_user_id', $user->getId())
            ->first();


        if ($oauthProvider) {
            $oauthProvider->access_token = $user->token;
            $oauthProvider->refresh_token = $user->refreshToken;
            $oauthProvider->save();

            return $oauthProvider; //->user;
        }


        /*if (User::where('email', $user->getEmail())->exists()) {

        dd("OAuthController FindOrCreateUser");
        throw new EmailTakenException;
        }*/

        return $this->createUser($provider, $user);
    }

    /**
     * @param  string $provider
     * @param  \Laravel\Socialite\Contracts\User $sUser
     * @return \App\User
     */
    protected function createUser($provider, $sUser)
    {

        $user = User::create([
            'first_name' => $sUser['given_name'],
            'last_name' => $sUser['family_name'],
            'email' => $sUser['email'],
            'avatar' => $sUser['picture'],
            'password' => Hash::make('secret'),
        ]);


        $user = $user->user_social()->create([
            'provider' => $provider,
            'provider_user_id' => $sUser->id,
        ]);

        return $user;
    }
}
