<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Session;

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
     *
     * @var string
     */
    protected function redirectTo(){
        Session::put('poke', 1);
        

        if(Auth::user()->role=='1')
        {
            return 'admins/';
        }
        else if(Auth::user()->role=='2')
        {
            return 'super/';
        }
        elseif (Auth::user()->role=='3') {
            return 'woker/';
        }
        else{

            Auth::user()->login_time =  date('Y-m-d H:i:s');
            Auth::user()->save();
            // dd(Auth::user());

            return 'user/';

        }

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
