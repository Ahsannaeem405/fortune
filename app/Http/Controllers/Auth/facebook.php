<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

use Illuminate\Http\Request;

class facebook extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function handleFacebookCallback()
    {

        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser){


                return redirect('/')->with('success','Successfully Logged in.');


            }else{

                $newUser = User::create([
                    'name' => $user->name,
                    if($user->email !=null)
                    {
                    	'email' => $user->email,

                    }
                    else
                    {
                    	'email' =>'demoemail@gmail.com',

                    }
                    
                    'facebook_id'=> $user->id,
                    'password' => encrypt('Superman_test')
                ]);


                return redirect('/')->with('success','Successfully Logged in.');
            }

        } catch (Exception $e) {
          dd($e->getMessage());
        }
    }
}
