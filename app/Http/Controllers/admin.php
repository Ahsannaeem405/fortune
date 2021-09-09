<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Auth;

class admin extends Controller
{
    public function  save_ws(Request $request)
    {

            $request->validate([
                'f_name'        =>      'required',
                'l_name'         =>      'required',
                'email'         =>      'required | unique:users',
                'password'         =>      'required',
                'role'              =>      'required',
               
            ]);

          
          $user =new User;
          $user->f_name = $request->input('f_name');
          $user->l_name = $request->input('l_name');
          $user->name = $request->input('f_name').' '.$request->input('l_name');
          $user->email =$request->input('email');
          $user->password =Hash::make($request->input('password'));
          $user->phone=$request->input('phone');
          $user->role =$request->input('role');;
          $user->save();
          if(!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
          }
          else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




     }
    public function  view_ws()
    {
      $user=User::where('role','2')->oRwhere('role','3')->get();
      return view('admin/view_ws',compact('user'));
    }
    public function  sup_del($id)
    {
      $user=User::find($id)->delete();
      return back()->with('success', 'Supervisor Successfully Delete.');
    }
    public function  sup_edit($id)
    {
      $user=User::find($id);
      return view('admin/edit_ws',compact('user'));
    }
        
    public function  update_ws(Request $request, $id)
    {


          $user =User::find($id);
          $user->f_name = $request->input('f_name');
          $user->l_name = $request->input('l_name');
          $user->name = $request->input('f_name').' '.$request->input('l_name');
          $user->email =$request->input('email');
          $user->phone=$request->input('phone');
          $user->role =$request->input('role');;
          $user->save();
          if(!is_null($user)) {
            return back()->with('success', 'User Successfully Update.');
          }
          else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




     }
    public function  user()
    {
      $user=User::whereNull('role')->get();
      return view('admin/user',compact('user'));
    }
    public function  user_del($id)
    {
      $user=User::find($id)->delete();
      return back()->with('success', 'Supervisor Successfully Delete.');
    }
    public function  user_edit($id)
    {
      $user=User::find($id);
      return view('admin/edit_user',compact('user'));
    }
     public function  update_user(Request $request, $id)
    {


          $user =User::find($id);
          $user->name = $request->input('name');
          $user->email =$request->input('email');
          $user->save();
          if(!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
          }
          else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




    }
    public function  setting_update(Request $request)
    {


          $user =User::find(Auth::user()->id);
          $user->f_name = $request->input('f_name');
          $user->l_name = $request->input('l_name');
          $user->name = $request->input('f_name').' '.$request->input('l_name');
          $user->email =$request->input('email');
          $user->phone=$request->input('phone');
          if($request->hasFile('file'))
          {
          $file=$request->file('file');
          $extension=$request->file->extension();
          $fileName=time()."_.".$extension;
          $request->file->move('upload/images/',$fileName);
          $user->file =$fileName;
          }

          $user->save();
        
            return back()->with('success', 'Your Profile Update Successfully .');


    }
    public function  password(Request $request)
    {
    	if (!Hash::check($request->input('old_password'), Auth::user()->password)) 
    	{
            return back()->with('success', 'Your Old Password Is wronge ');
        }
        else
        {
        	$request->validate([
               
                'password'         =>      'required | confirmed',
                
               
            ]);

          
          $user =User::find(Auth::user()->id);
          $user->password =Hash::make($request->input('password'));
          $user->update();
          return back()->with('success', 'Your Password Update ');

        }


    }
    
     

}
