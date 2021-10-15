<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\Pointshistory;
use App\Models\Fortune;
use App\Models\Contact_message;



use App\Models\site_setting;
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
     public function points(){
        $Pointshistory=Pointshistory::all();
        return view('admin.pointshistory',['Pointshistory'=>$Pointshistory]);
     }
     public function superpoints(){
        $Pointshistory=Pointshistory::all();
        return view('super.pointshistory',['Pointshistory'=>$Pointshistory]);
     }
     public function add_fortune(Request $request){
        $fortune=new Fortune();
        if($request->hasFile('file'))
          {
          $file=$request->file('file');
          $extension=$request->file->extension();
          $fileName=time()."_.".$extension;
          $request->file->move('upload/images/',$fileName);
          $fortune->file =$fileName;
          }
          $fortune->name=$request->name;
          $fortune->bio=$request->bio;
          $fortune->save();
          return back()->with('message', 'Successfully Added');


     }
     public function update_fortune(Request $request){
         $id=$request->id;
         $fortune=Fortune::find($id);
         if($request->hasFile('file'))
         {
         $file=$request->file('file');
         $extension=$request->file->extension();
         $fileName=time()."_.".$extension;
         $request->file->move('upload/images/',$fileName);
         $fortune->file =$fileName;
         }
         $fortune->name=$request->name;
         $fortune->bio=$request->bio;
         $fortune->save();
         return back()->with('message', 'Successfully Updated');

     }
     function view_fortune(){
        $fortune=Fortune::all();
        return view('admin.view_fortune',['fortunes'=>$fortune]);
     }
     function edit_fortune($id){
         $fortune=Fortune::find($id);
         return view('admin.edit_fortune',['fortune'=>$fortune]);
     }
     function del_fortune($id){
         $fortune=Fortune::find($id);
         $fortune->delete();
         return back()->with('success', 'Successfully Deleted');

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
      $un=msg_dt::all()->unique('msg');
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
    public function  add_points(Request $request)
    {


          $user =User::find($request->user_id);
          $user->point = $request->input('point');
          $user->update();
          if(!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
          }
          else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




    }
    public function  send_poke(Request $request)
    {


        $fromck= Auth::user()->id;
        if(isset($request->user_idy))
        {
          for ($i =0; $i < count($request->user_idy); $i++)
            {
              if (msg::where('to', $request->input('user_idy')[$i])
              ->where('from',$fromck)
              ->exists())
              {
                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $request->input('user_idy')[$i];
                 $msg_det->from=Auth::user()->id;
                 $msg_det->save();
              }
              else{

                 $msg=new msg();
                 $msg->to= $request->input('user_idy')[$i];
                 $msg->from=Auth::user()->id;
                 $msg->save();

                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $request->input('user_idy')[$i];
                 $msg_det->from=Auth::user()->id;
                 $msg_det->save();

              }
            }

        }
        else{
          $user_idy=User::whereNull('role')->get();
          for ($i =0; $i < count($user_idy); $i++)
            {
              if (msg::where('to', $user_idy[$i]->id)
              ->where('from',$fromck)
              ->exists())
              {
                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $user_idy[$i]->id;
                 $msg_det->from=Auth::user()->id;
                 $msg_det->save();
              }
              else{

                 $msg=new msg();
                 $msg->to= $user_idy[$i]->id;
                 $msg->from=Auth::user()->id;
                 $msg->save();

                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $user_idy[$i]->id;
                 $msg_det->from=Auth::user()->id;
                 $msg_det->save();

              }
            }

        }



              return back();


    }
    function view_comments(){
        $message=Contact_message::all();
        return view('admin.view_comments',['messages'=>$message]);
    }

    public function  mana_password(Request $request,$id)
    {
          $user=User::find($id);

          $request->validate([

                'password'         =>      'required | confirmed',


            ]);


          $user =User::find($id);
          $user->password =Hash::make($request->input('password'));
          $user->update();
          return back()->with('success', 'Your Password Update ');




    }

    public function  update_site(Request $request)
    {


          $user =site_setting::find(1);
          $user->noti = $request->input('noti');
          $user->footer =$request->input('footer');
          if($request->hasFile('file'))
          {
          $user->file = $request->file;

          $file=$request->file('file');
          $extension=$request->file->extension();
          $fileName=time()."_.".$extension;
          $request->file->move('upload/images/',$fileName);
          $user->file =$fileName;
          }
          $user->save();
          if(!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
          }
          else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




    }


}
