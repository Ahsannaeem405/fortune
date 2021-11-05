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
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail2;
use App\Mail\sendmail3;
use DB;



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
        DB::table('msg_dts')->where('msg_id', $request->msgid)->where('msg_type','User')
           ->update([
               'read_to' => 1
            ]);
        $name=msg::where('id',$request->msgid)->get();
        $get_name=$name[0]->getuser->name;
        $user_id=$name[0]->from;
        $fortune_id=$name[0]->to;
        $Fortune=Fortune::find($fortune_id);
        $img=$Fortune->file;

        $last=msg_dt::where('msg_id',$request->msgid)->where('msg_type','User')->orderBy('id','desc')->take(1)->get();
            $last_time=$last[0]->created_at;
            $to_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_time);
            $from = \Carbon\Carbon::now();
            $diff_in_minutes = $to_time->diffInMinutes($from);



        return response()->json(['message'=>$message,'name'=>$get_name,'user_id'=>$user_id,'fortune_id'=>$fortune_id,'img'=>$img,'diff_in_minutes'=>$diff_in_minutes]);
     }
   function showchat2(){
        
        $arr=array();
        $msg_na=msg::where('status', null)->where('msg_type', '=', '2')->get();
        $msg=msg::where('status', 'Approved')->where('msg_type', '=', '2')->get();
        foreach($msg as $row)
        {
                $last=msg_dt::where('msg_id',$row->id)->where('msg_type','Admin')->orderBy('id','desc')->take(1)->get();
                 $lasty2=msg_dt::where('msg_id',$row->id)->where('msg_type','User')->orderBy('id','desc')->take(1)->get();
            if(count($last) != 0){
                $last_time=$last[0]->created_at;
                $to_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_time);
                $from = \Carbon\Carbon::now();
                $diff_in_minutes = $to_time->diffInMinutes($from);
            
            }
            else{
                $last_time=$lasty2[0]->created_at;
                $to_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_time);
                $from = \Carbon\Carbon::now();
                $diff_in_minutes = $to_time->diffInMinutes($from);

            }

            if($diff_in_minutes >= 5)
            {
                $arr[]=[
                    'id'=>$row->id
                ];

            }
        }
            
        return view('waiting_list' ,compact('msg_na','arr'));

     
    }
    function join(Request $request){
        $id=$request->msg_id;
        $msg=msg::find($id);
        $msg->status='Approved';
        $msg->user_id=Auth::user()->id;
        $msg->save();
        // dd($msg);
        return redirect('woker/chat?id='.$id);


    }
     function sendMSG(Request $request){
        //  dd($request->msg_id);
         $user=User::find($request->to);

         $message=str_replace("@name", "$user->name" , $request->message);
         $message=str_replace("@email", "$user->email" , $message);
         $message=str_replace("@age", "$user->dob" , $message);
         $message=str_replace("@vocative", "$user->vocative" , $message);
         $message=str_replace("@nameoflove", "$user->nameoflove" , $message);
         $message=str_replace("@city", "$user->city" , $message);


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
    function sendtri_MSG(Request $request){
        //  dd($request->msg_id);
         $user=User::find($request->to);

         $message=str_replace("@name", "$user->name" , $request->message);
         $message=str_replace("@email", "$user->email" , $message);
         $message=str_replace("@age", "$user->dob" , $message);
         $message=str_replace("@vocative", "$user->vocative" , $message);
         $message=str_replace("@nameoflove", "$user->nameoflove" , $message);
         $message=str_replace("@city", "$user->city" , $message);

         $from=$request->from;
         $to=$request->to;
         $msgdt=new msg_dt;
         $msgdt->msg_type="Admin";
         $msgdt->to=$to;
         $msgdt->from=$from;
         $msgdt->msg=$message;
         $msgdt->msg_id=$request->msg_id;
         $msgdt->trigger=1;
         $msgdt->save();
         $msg=$message;
         $Fortune=Fortune::find($from);
              $img=$Fortune->file;
              $email_id=msg::where('id',$request->msg_id)->value('from');
              $mail=User::where('id',$email_id)->value('email');
              $data =$message;
              Mail::to($mail)->send(new sendmail3($data));



         return response()->json(['msg'=>$msg,'img'=>$img]);
    }
    public function update_user_by_wsa(Request $request)
    {


        $user=User::find($request->id);
        $user->vocative=$request->vocative;
        $user->bio=$request->note;
        $user->nameoflove=$request->name_of_love;
        $user->city=$request->city;
        $user->update();
         

        return response()->json('success');
    }
    function count_man_unread(Request $request){
        $county=msg_dt::where('msg_id',$request->msg_id)->where('msg_type','User')->whereNull('read_to')->count();
        return response()->json(['county'=>$county]);
    }
    
}
