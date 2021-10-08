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
            $create['name'] = $user->getName();
            if ($user->getEmail() !=null){
            $create['email'] = $user->getEmail();	
            }
            else{
            	$str_mail = Str::random(10);
            	$create['email'] ='edcdvdfvfdbbv@gmail.com';
            }
            
            $create['facebook_id'] = $user->getId();
            $create['email_verified_at'] =date('Y-m-d H:i:s');
            
            $userModel = new User;
            $createdUser = $userModel->addNew($create);

            Auth::loginUsingId($createdUser->id);

            return redirect('/user');


        } catch (Exception $e) {
          dd($e->getMessage());
        }
    }
}
