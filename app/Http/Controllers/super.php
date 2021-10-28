<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\Fortune;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class super extends Controller
{
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
    public function  user_del($id)
    {
      $user=User::find($id)->delete();
      return back()->with('success', 'Supervisor Successfully Delete.');
    }
    public function  user_edit($id)
    {
      $user=User::find($id);
      return view('super/edit_user',compact('user'));
    }

     public function  update_user(Request $request, $id)
    {


          $user =User::find($id);
          $user->name = $request->input('name');
          $user->email =$request->input('email');
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

      return view('super/user',compact('user'));
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
    function showchat(){
        $msg_approve = msg::where('status', '!=', 'null')->get();
        $msg_na      = msg::where('status', null)->where('msg_type', '=', '2')->get();

        return view('super/chat', ['approve_msgs' => $msg_approve, 'Napprove_msgs' => $msg_na]);
    }
    function admin_messages(Request $request){
        $message=msg_dt::where('msg_id',$request->msgid)->get();
        $name=msg::where('id',$request->msgid)->get();
        $get_name=$name[0]->getuser->name;
        $user_id=$name[0]->from;
        $fortune_id=$name[0]->to;
        $Fortune=Fortune::find($fortune_id);
        $img=$Fortune->file;



        return response()->json(['message'=>$message,'name'=>$get_name,'user_id'=>$user_id,'fortune_id'=>$fortune_id,'img'=>$img]);
    }
    function sendMSG(Request $request){
        $message=$request->message;
        $from=$request->from;
        $to=$request->to;
        $msgdt=new msg_dt;
        $msgdt->msg_type="Admin";
        $msgdt->to=$to;
        $msgdt->from=$from;
        $msgdt->msg=$message;
        $msgdt->msg_id=$request->msg_id;
        $msgdt->save();
        return response()->json($msgdt);

    }
    function join(Request $request){
        $id=$request->msg_id;
        $msg=msg::find($id);
       $msg->status='Approved';
       $msg->save();
       // dd($msg);
       return redirect()->back()->with('success', 'Successfully Approved');

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
                  $id=msg::where('to', $request->input('user_idy')[$i])
                  ->where('from',$fromck)
                  ->value('id');
                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $request->input('user_idy')[$i];
                 $msg_det->from=Auth::user()->id;
                 $msg_det->msg_id=$id;
                 $msg_det->save();
              }
              else{

                 $msg=new msg();
                 $msg->msg_type='1';

                 $msg->to= $request->input('user_idy')[$i];
                 $msg->from=Auth::user()->id;
                 $msg->save();

                 $msg_det=new msg_dt();
                 $msg_det->msg_id=$msg->id;
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
                  $id=msg::where('to', $user_idy[$i]->id)
                  ->where('from',$fromck)
                  ->value('id');
                 $msg_det=new msg_dt();
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $user_idy[$i]->id;
                 $msg_det->from=Auth::user()->id;
                 $msg_det->msg_id=$id;

                 $msg_det->save();
              }
              else{

                 $msg=new msg();
                 $msg->to= $user_idy[$i]->id;
                 $msg->msg_type='1';
                 $msg->from=Auth::user()->id;
                 $msg->save();

                 $msg_det=new msg_dt();
                 $msg_det->msg_id=$msg->id;
                 $msg_det->msg=$request->input('msg');
                 $msg_det->to= $user_idy[$i]->id;
                 $msg_det->from=Auth::user()->id;
                 $msg_det->save();

              }
            }

        }



              return back()->with('success', 'Poke Message Successfully Send.');


    }
}
