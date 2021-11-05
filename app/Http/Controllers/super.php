<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\Fortune;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail2;
use App\Mail\sendmail3;
use DB;
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
      
     
        $msg_approve = msg::where('status', '!=', 'null')->where('user_id',Auth::user()->id)->get();
        $msg_na      = msg::where('status', null)->where('msg_type', '=', '2')->get();


        return view('super/chat', ['approve_msgs' => $msg_approve, 'Napprove_msgs' => $msg_na]);
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
    function admin_messages(Request $request){
        DB::table('msg_dts')->where('msg_id', $request->msgid)->where('msg_type','User')
           ->update([
               'read_to' => 1
            ]);
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
        return response()->json($msgdt);

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
    function join(Request $request){
        $id=$request->msg_id;
        $msg=msg::find($id);
       $msg->status='Approved';
       $msg->user_id=Auth::user()->id;
       $msg->save();
       // dd($msg);
        return redirect('super/chat?id='.$id);


   }
   public function send_poke(Request $request)
    {
      $arr=array();
      if($request->days !=null)
      {
        if($request->days==7)
        {
          $day_cal=date('Y-m-d', strtotime('-7 days'));
        }
        elseif($request->days==21)
        {
          $day_cal=date('Y-m-d', strtotime('-21 days'));

        }
        elseif($request->days==30)
        {
          $day_cal=date('Y-m-d', strtotime('-30 days'));

        }
        $days=User::whereDate('login_time','>=',$day_cal)->get();
        for($i=0 ; $i<count($days);$i++)
        {
          $arr[]=[
              'id'=>$days[$i]->id
          ];
        }

      }
       if($request->fortune_id !=null)
       {
          for($j=0 ; $j<count($request->fortune_id);$j++)
          {

            $msg=msg::where('to',$request->fortune_id[$j])->get();




            for($k=0 ; $k<count($msg);$k++)
            {
              $arr[]=[
                  'id'=>intval($msg[$k]->from)
              ];
            }

          }
       }   

      $final=array();
      $ky=0;

      for($m=0 ; $m<count($arr);$m++)
      {

        $check=0;
        if($m >=1)
        {
          for($l=0 ; $l<count($final);$l++)
          {
            if( $arr[$m]['id'] == $final[$l]['final_id'] )
            {
              $check=1;
            }

          }
          if($check==0)
          {
            $final[]=[
              'final_id'=>$arr[$m]['id']
            ];
          }

        }
        else
        {

          $final[]=[
            'final_id'=>$arr[$m]['id']
          ];
        }
      }





        $fromck = Auth::user()->id;
        if ($request->days !=null and   $request->fortune_id !=null) {
            for ($f = 0; $f < count($final); $f++) {
                if (msg::where('to', $final[$f]['final_id'])
                    ->where('from', $fromck)
                    ->exists()) {
                    $id = msg::where('to', $final[$f]['final_id'])
                        ->where('from', $fromck)
                        ->value('id');
                    $msg_det         = new msg_dt();
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $final[$f]['final_id'];
                    $msg_det->from   = Auth::user()->id;
                    $msg_det->msg_id = $id;
                    $msg_det->save();
                } else {

                    $msg           = new msg();
                    $msg->msg_type = '1';
                    $msg->to       = $final[$f]['final_id'];
                    $msg->from     = Auth::user()->id;
                    $msg->save();

                    $msg_det         = new msg_dt();
                    $msg_det->msg_id = $msg->id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $final[$f]['final_id'];
                    $msg_det->from   = Auth::user()->id;
                    $msg_det->save();

                }
                $mail=User::where('id',$final[$f]['final_id'])->value('email');
                $data =$request->input('msg');
                Mail::to($mail)->send(new sendmail2($data));
           
     
                



            }
            // dd($msg_det);
        } else {
            $user_idy = User::whereNull('role')->get();
            for ($ij = 0; $ij < count($user_idy); $ij++) {
                if (msg::where('to', $user_idy[$ij]->id)
                    ->where('from', $fromck)
                    ->exists()) {
                    $id = msg::where('to', $user_idy[$ij]->id)
                        ->where('from', $fromck)
                        ->value('id');

                    $msg_det         = new msg_dt();
                    $msg_det->msg_id = $id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $user_idy[$ij]->id;
                    $msg_det->from   = Auth::user()->id;
                    $msg_det->save();
                } else {

                    $msg           = new msg();
                    $msg->msg_type = '1';
                    $msg->to       = $user_idy[$ij]->id;
                    $msg->from     = Auth::user()->id;
                    $msg->save();

                    $msg_det         = new msg_dt();
                    $msg_det->msg_id = $msg->id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $user_idy[$ij]->id;
                    $msg_det->from   = Auth::user()->id;
                    $msg_det->save();

                }

               
                       
            }
            $data =$request->input('msg');
            $subscriber_emails =User::whereNull('role')->pluck('email')->toArray();
            Mail::send('dynamic_email_template2',['data' => $data], function($message) use ($subscriber_emails)
            {    
                $message->bcc($subscriber_emails)->subject('New Message');   
 
            });
            mail::to('demo1.browntech@gmail.com')->send(new sendmail3($data));

        }

        return back();

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
