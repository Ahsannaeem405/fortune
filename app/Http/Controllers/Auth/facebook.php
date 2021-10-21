<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Support\Str;

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
                 
                Auth::login($finduser);
                return redirect('/user');



            }
            dd($user->email);
            else{
                if ($user->getEmail() !=null){
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'facebook_id'=> $user->id,
                            'password' => encrypt('Superman_test'),
                            'email_verified_at'=>date('Y-m-d H:i:s'),

                        ]);
                       
                }
                else{

                        $str_mail = Str::random(10);
                        $newUser = User::create([
                        'name' => $user->name,
                        'email' => 'edcdvdfvfdbbv@gmail.com',
                        'facebook_id'=> $user->id,
                        'password' => encrypt('Superman_test'),
                        'email_verified_at'=>date('Y-m-d H:i:s'),

                        ]);
                    
                }
                Auth::login($newUser);


                return redirect('/user');
            }

        } catch (Exception $e) {
          dd($e->getMessage());
        }


    }
}
