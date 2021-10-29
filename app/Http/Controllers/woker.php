<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\Fortune;


use App\Models\User;
use Auth;


class woker extends Controller
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
    function showchat(){
          $msg_approve = msg::where('status', '!=', 'null')->where('user_id',Auth::user()->id)->get();
        $msg_na      = msg::where('status', null)->where('msg_type', '=', '2')->get();



        return view('woker/chat', ['approve_msgs' => $msg_approve, 'Napprove_msgs' => $msg_na]);
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
    public function admin_messages(Request $request)
    {
        
        $message=msg_dt::where('msg_id',$request->msgid)->get();
        $name=msg::where('id',$request->msgid)->get();
        $get_name=$name[0]->getuser->name;
        $user_id=$name[0]->from;
        $fortune_id=$name[0]->to;
        $Fortune=Fortune::find($fortune_id);
        $img=$Fortune->file;



        return response()->json(['message'=>$message,'name'=>$get_name,'user_id'=>$user_id,'fortune_id'=>$fortune_id,'img'=>$img]);
     }
    function showchat2(){
    
        $msg_na=msg::where('status', null)->where('msg_type', '=', '2')->get();
        dd($msg_na);
        return view('waiting_list' ,compact('msg_na'));

     
    }
    function join(Request $request){
        $id=$request->msg_id;
        $msg=msg::find($id);
        $msg->status='Approved';
        $msg->user_id=Auth::user()->id;
        $msg->save();
        // dd($msg);
        return redirect()->back()->with('success', 'Successfully Approved');

    }
     function sendMSG(Request $request){
        //  dd($request->msg_id);
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
         $msg=$message;
         $Fortune=Fortune::find($from);
         $img=$Fortune->file;



         return response()->json(['msg'=>$msg,'img'=>$img]);
    }
    
}
