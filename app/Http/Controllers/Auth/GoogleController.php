<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
               return redirect('/user');
     
            }else{

                if (User::where('email',$user->email)->exists())
                {
                    
                }
                else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'point'=>1,
                        'password' => encrypt('123456dummy'),
                        'email_verified_at' =>date('Y-m-d H:i:s'),
                    ]);
        
                    Auth::login($newUser);
         
                    return redirect('/user');
                    }

                }    
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
