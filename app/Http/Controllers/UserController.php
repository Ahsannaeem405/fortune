<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fortune;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
function profile(){
    $user_id=Auth::user()->id;

$user=User::find($user_id);
$age = Carbon::parse($user->dob)->diff(Carbon::now())->y;
// dd($user);
// dd($age. " Years");
// dd($user);
return view('profile',['user'=>$user,'age'=>$age]);
}
function loggedinHome(){
$fortune=Fortune::all();
return view('loggedinHome',compact('fortune'));
}
function deleteuser($id){
    $user=User::find($id);
    // dd($user);
    $user->delete();
    return redirect('/');
}

function updateprofile(Request $request){
    $user_id=Auth::user()->id;
    $user=User::find($user_id);
    if($request->hasFile('file')){
        $file=$request->file('file');
        $extension=$request->file->extension();
        $fileName=time()."_.".$extension;
        $request->file->move('upload/images/',$fileName);
        $user->file =$fileName;

    }
    $user->email=$request->email;
    $user->f_name=$request->f_name;
    $user->l_name=$request->l_name;
    if ($request->password!=null) {
        if (Hash::check($request->password, $user->password)) {
            if ($request->new_password!=null && $request->confirm_password!=null) {
                if($request->new_password==$request->confirm_password){
                    if (Hash::check($request->password, $user->password)) {
                    $password=Hash::make($request->new_password);
                    $user->password=$password;
                    }
                    else{
                        return redirect()->back()->with('error', 'Wrong Current Password');
                    }
                }
                else{
                    return redirect()->back()->with('error', 'Confirm_Password Does Not Match');
                }
            }
        }
        else{
            return redirect()->back()->with('error', 'Wrong Current Password');

        }
    }


$user->phone=$request->phone;
$user->vocative=$request->vocative;
$user->nameoflove=$request->nameoflove;
$user->city=$request->city;
$user->bio=$request->bio;
$user->notification=$request->notification;
$user->dob=$request->dob;
$user->save();
// dd($user);
return redirect()->back()->with('success', 'Updated Successfully');


}
}
