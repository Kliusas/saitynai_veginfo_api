<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/home';
    
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
     * Redirect the user to the provider authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }
    
    /**
     * Obtain the user information from provider.
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($driver)
    {
        try {
            $user = Socialite::driver($driver)->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
        
        $existingUser = User::where('email', $user->getEmail())->first();
        
        if ($existingUser) {
            return Redirect::to("http://localhost:8081/logged");
            
        } else {
            $newUser                    = new User;
            $newUser->provider_name     = $driver;
            $newUser->api_token         = $user->token;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar            = $user->getAvatar();
            $newUser->save();
            
            return Redirect::to("http://localhost:8081/logged");
        }
        
        return Redirect::to("http://localhost:8081/logged");
    }
    
    public function logout()
    {
        auth()->logout();
    }
}
