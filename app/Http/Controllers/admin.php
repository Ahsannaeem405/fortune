<?php

namespace App\Http\Controllers;

use App\Models\Contact_message;
use App\Models\Fortune;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\poke_dt;
use App\Models\msghistory;
use App\Models\Pointshistory;
use App\Models\site_setting;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail2;
use App\Mail\sendmail3;
use App\Mail\sendmail4;


use DB;


class admin extends Controller
{
    public function save_ws(Request $request)
    {

        $request->validate([
            'f_name'   => 'required',
            'l_name'   => 'required',
            'email'    => 'required | unique:users',
            'password' => 'required',
            'role'     => 'required',

        ]);

        $user           = new User;
        $user->f_name   = $request->input('f_name');
        $user->l_name   = $request->input('l_name');
        $user->name     = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone    = $request->input('phone');
        $user->role     = $request->input('role');
        $user->save();
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
        } else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }

    }
    public function points()
    {
        $Pointshistory = Pointshistory::all();
        return view('admin.pointshistory', ['Pointshistory' => $Pointshistory]);
    }
    public function superpoints()
    {
        $Pointshistory = Pointshistory::all();
        return view('super.pointshistory', ['Pointshistory' => $Pointshistory]);
    }
    public function add_fortune(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|max:10000',// max 10000kb
           

        ]);

        $fortune = new Fortune();
        if ($request->hasFile('file')) {
            $file      = $request->file('file');
            $extension = $request->file->extension();
            $fileName  = time() . "_." . $extension;
            $request->file->move('upload/images/', $fileName);
            $fortune->file = $fileName;
        }
        $fortune->name = $request->name;
        $fortune->bio  = $request->bio;
        $fortune->save();
        return back()->with('message', 'Successfully Added');

    }
    public function update_fortune(Request $request)
    {
        $id      = $request->id;
        $fortune = Fortune::find($id);
        if ($request->hasFile('file')) {
            $file      = $request->file('file');
            $extension = $request->file->extension();
            $fileName  = time() . "_." . $extension;
            $request->file->move('upload/images/', $fileName);
            $fortune->file = $fileName;
        }
        $fortune->name = $request->name;
        $fortune->bio  = $request->bio;
        $fortune->save();
        return back()->with('message', 'Successfully Updated');

    }
    public function view_fortune()
    {
        $fortune = Fortune::all();
        return view('admin.view_fortune', ['fortunes' => $fortune]);
    }
    public function edit_fortune($id)
    {
        $fortune = Fortune::find($id);
        return view('admin.edit_fortune', ['fortune' => $fortune]);
    }
    public function del_fortune($id)
    {
        $fortune = Fortune::find($id);
        $fortune->delete();
        return back()->with('success', 'Successfully Deleted');

    }
    public function view_ws()
    {
        $user = User::where('role', '2')->oRwhere('role', '3')->get();
        return view('admin/view_ws', compact('user'));
    }
    public function sup_del($id)
    {
        $user = User::find($id)->delete();
        return back()->with('success', 'Supervisor Successfully Delete.');
    }
    public function sup_edit($id)
    {
        $user = User::find($id);
        return view('admin/edit_ws', compact('user'));
    }

    public function update_ws(Request $request, $id)
    {
        $request->validate([
            'f_name'   => 'required',
            'l_name'   => 'required',
            'email' => 'unique:users,email,'.$id
            
           

        ]);

        $user           = User::find($id);
        $password       = Hash::make($request->password);
        $user->password = $password;
        $user->f_name   = $request->input('f_name');
        $user->l_name   = $request->input('l_name');
        $user->name     = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email    = $request->input('email');
        $user->phone    = $request->input('phone');
        $user->role     = $request->input('role');
        $user->save();
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Update.');
        } else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
              }




     }
     function sendMSG(Request $request){
         
         $user=User::find($request->to);
         $last_msg=msg_dt::where('msg_id',$request->msg_id)->orderBy('id', 'DESC')->first();

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
         $msgdt->sendby=Auth::user()->id;
         $msgdt->save();
         $last=msg_dt::where('msg_id',$request->msg_id)->where('msg_type','User')->orderBy('id', 'DESC')->first();

         if($last->sendby !='null')
         {
            DB::table('msg_dts')->where('id',$last->id)
            ->update([
               'sendby' =>Auth::user()->id 
            ]);
         }
         if($last_msg->msg_type == 'User')
         {
            $to_time =\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_msg->created_at);
            $fromy = \Carbon\Carbon::now();
            $diff_in_minutes = $to_time->diffInSeconds($fromy);
            DB::table('msg_dts')->where('id',$last_msg->id)
            ->update([
               'waiting_time' =>$diff_in_minutes
            ]);


         }

         $msg=$message;
         $Fortune=Fortune::find($from);
         $img=$Fortune->file;



         return response()->json(['msg'=>$msg,'img'=>$img]);
    }
    function sendtri_MSG(Request $request){
        //  dd($request->msg_id);
          $user=User::find($request->to);
          $last_msg=msg_dt::where('msg_id',$request->msg_id)->orderBy('id', 'DESC')->first();

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
         $msgdt->sendby=Auth::user()->id;
         $msgdt->msg_id=$request->msg_id;
         $msgdt->trigger=1;
         $msgdt->save();
         $last=msg_dt::where('msg_id',$request->msg_id)->where('msg_type','User')->orderBy('id', 'DESC')->first();
         if($last->sendby !='null')
         {
            DB::table('msg_dts')->where('id',$last->id)
            ->update([
               'sendby' =>Auth::user()->id 
            ]);
         }
         if($last_msg->msg_type == 'User')
         {
            $to_time =\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_msg->created_at);
            $fromy = \Carbon\Carbon::now();


            $diff_in_minutes = $to_time->diffInSeconds($fromy);

            DB::table('msg_dts')->where('id',$last_msg->id)
            ->update([
               'waiting_time' =>$diff_in_minutes
            ]);


         }
         $msg=$message;
         $Fortune=Fortune::find($from);
              $img=$Fortune->file;
              $email_id=msg::where('id',$request->msg_id)->value('from');
              $mail=User::where('id',$email_id)->whereNotNull('notification')->value('email');
              $data =$message;
              Mail::to($mail)->send(new sendmail3($data));



         return response()->json(['msg'=>$msg,'img'=>$img]);
    }
    function chat_history()
    {
        $mana=User::whereNotNull('role')->where('id','!=',1)->get();
        return view('admin/chat_history' ,compact('mana'));
        
    }
    
    function show_chat_his(Request $request)
    {
        $mana=User::whereNotNull('role')->where('id','!=',1)->get();
        $msg=msghistory::where('manager_id',$request->id)->get();
        return view('admin/chat_history_list' ,compact('msg'));
        
    }
    function get_msg_his(Request $request)
    {
       
        $msg=msg_dt::where('msg_id',$request->id)->get();
        $manager_id=$request->manager_id;
        return view('admin/chat_history_msg' ,compact('msg','manager_id'));
        
    }
    
    
    
    //  function showchat(){
    //     $msg_approve=msg::where('status','!=','null')->get();
    //     $msg_na=msg::where('status',null)->where('msg_type','=','2')->get();
    //     $msg=msg::all();
    //     $ms=msg_dt::all();




    //     return view('admin/chat',['approve_msgs'=>$msg_approve,'Napprove_msgs'=>$msg_na]);
    //  }

    // public function sendMSG(Request $request)
    // {
    //     $message       = $request->message;
    //     $from          = $request->from;
    //     $to            = $request->to;
    //     $msgdt         = new msg_dt;
    //     $msgdt->to     = $to;
    //     $msgdt->from   = $from;
    //     $msgdt->msg    = $message;
    //     $msgdt->msg_id = $request->msg_id;
    //     $msgdt->save();
    //     return response()->json($msgdt);

    // }
    public function showchat()
    {

        $msg_approve = msg::where('status', '!=', 'null')->where('user_id',Auth::user()->id)->get();
        $msg_na= msg::where('status', null)->where('msg_type', '=', '2')->get();

        return view('admin/chat', ['approve_msgs' => $msg_approve, 'Napprove_msgs' => $msg_na]);
    }
    function showchat2(){
        
        $arr=array();
        $msg_na=msg::where('status', null)->where('msg_type', '=', '2')->get();
        $msg=msg::where('status', 'Approved')->where('msg_type', '=', '2')->get();
        foreach($msg as $row)
        {
            
            $last=msg_dt::where('msg_id',$row->id)->orderBy('id','desc')->take(1)->get();
            $last_time=$last[0]->created_at;
            $to_time = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_time);
            $from = \Carbon\Carbon::now();
            $diff_in_minutes = $to_time->diffInMinutes($from);

            

            if($diff_in_minutes >= 5 and $last[0]->msg_type=="User")
            {
                $arr[]=[
                    'id'=>$row->id
                ];

            }
        }
            
        return view('waiting_list' ,compact('msg_na','arr'));

     
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
     
     function join(Request $request){
        $id=$request->msg_id;
        $msg=msg::find($id);
        $msg->status='Approved';
        $msg->user_id=Auth::user()->id;
        $msg->save();

        if(msghistory::where('user_id',$msg->from)
            ->where('manager_id',Auth::user()->id)
            ->where('msg_id',$msg->id)
            ->exists()
        )
        {

        }
        else{
            $his=new msghistory();
            $his->msg_id=$msg->id;
            $his->user_id=$msg->from;
            $his->manager_id=Auth::user()->id;
            $his->save();
        }
        return redirect('admins/chat?id='.$id);

    }
    public function user()
    {
        $user = User::whereNull('role')->get();
        $un   = msg_dt::all()->unique('msg');
        return view('admin/user', compact('user'));
    }
    public function user_del($id)
    {
        $user = User::find($id)->delete();
        return back()->with('success', 'Supervisor Successfully Delete.');
    }
    public function user_edit($id)
    {
        $user = User::find($id);
        return view('admin/edit_user', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'f_name'   => 'required',
            'email' => 'required | unique:users,email,'.$id
            
           

        ]);


        $user        = User::find($id);
        $old_email=$user->email;
        $user->name  = $request->input('f_name');

        $user->email = $request->input('email');

        if($request->password != null)
        {
            $user->password = Hash::make($request->input('password'));

        }
        $user->save();
        if($old_email != $request->input('email'))
        {
            $data=$request->input('email');
            Mail::to($old_email)->send(new sendmail4($data));
        }
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Update.');
        } else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }

    }
    public function setting_update(Request $request)
    {

        $user         = User::find(Auth::user()->id);
        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->name   = $request->input('f_name') . ' ' . $request->input('l_name');
        $user->email  = $request->input('email');
        $user->phone  = $request->input('phone');
        if ($request->hasFile('file')) {
            $file      = $request->file('file');
            $extension = $request->file->extension();
            $fileName  = time() . "_." . $extension;
            $request->file->move('upload/images/', $fileName);
            $user->file = $fileName;
        }

        $user->save();

        return back()->with('success', 'Your Profile Update Successfully .');

    }
    public function password(Request $request)
    {
        if (!Hash::check($request->input('old_password'), Auth::user()->password)) {
            return back()->with('success', 'Your Old Password Is wronge ');
        } else {
            $request->validate([

                'password' => 'required | confirmed',

            ]);

            $user           = User::find(Auth::user()->id);
            $user->password = Hash::make($request->input('password'));
            $user->update();
            return back()->with('success', 'Your Password Update ');

        }

    }
    public function add_points(Request $request)
    {

        $user        = User::find($request->user_id);
        $user->point = $request->input('point');
        $user->update();
        //   dd($user);
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
        } else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }

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

                    $msg_det         = new poke_dt();
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $final[$f]['final_id'];
                    if($request->time !=null)
                    {
                        $msg_det->time=$request->time;
                    }
                    if($request->date !=null)
                    {
                        $msg_det->date=$request->date;
                    }
                    if($request->time ==null and $request->date ==null)
                    {
                        $msg_det->status = 'send';

                    }
                    $msg_det->msg_id = $id;
                    
                    
                    $msg_det->save();
                } else {

                    $msg           = new msg();
                    $msg->msg_type = '1';
                    $msg->to       = $final[$f]['final_id'];
                    $msg->from     = Auth::user()->id;
                    $msg->save();

                    $msg_det         = new poke_dt();
                    $msg_det->msg_id = $msg->id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $final[$f]['final_id'];
                    if($request->time !=null)
                    {
                        $msg_det->time=$request->time;
                    }
                    if($request->date !=null)
                    {
                        $msg_det->date=$request->date;
                    }
                    if($request->time ==null and $request->date ==null)
                    {
                        $msg_det->status = 'send';

                    }

                    $msg_det->save();

                }
                if($request->time ==null and $request->date ==null)
                {

                $mail=User::where('id',$final[$f]['final_id'])->whereNotNull('notification')->value('email');
                $data =$request->input('msg');
               
                    Mail::to($mail)->send(new sendmail2($data));
                

                
                
                }
           
     
                



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

                    $msg_det         = new poke_dt();
                    $msg_det->msg_id = $id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $user_idy[$ij]->id;
                    if($request->time !=null)
                    {
                        $msg_det->time=$request->time;
                    }
                    if($request->date !=null)
                    {
                        $msg_det->date=$request->date;
                    }
                    if($request->time ==null and $request->date ==null)
                    {
                        $msg_det->status = 'send';

                    }

                    $msg_det->save();
                } else {

                    $msg           = new msg();
                    $msg->msg_type = '1';
                    $msg->to       = $user_idy[$ij]->id;
                    $msg->from     = Auth::user()->id;
                    $msg->save();

                    $msg_det         = new poke_dt();
                    $msg_det->msg_id = $msg->id;
                    $msg_det->msg    = $request->input('msg');
                    $msg_det->to     = $user_idy[$ij]->id;
                    if($request->time !=null)
                    {
                        $msg_det->time=$request->time;
                    }
                    if($request->date !=null)
                    {
                        $msg_det->date=$request->date;
                    }
                    if($request->time ==null and $request->date ==null)
                    {
                        $msg_det->status = 'send';

                    }
                    $msg_det->save();

                }

               
                       
            }
            $data =$request->input('msg');
            $subscriber_emails =User::whereNull('role')->whereNotNull('notification')->pluck('email')->toArray();
            
            
                
            if($request->time ==null and $request->date ==null)
            {
                Mail::send('dynamic_email_template2',['data' => $data], function($message) use ($subscriber_emails)
                {    
                    $message->bcc($subscriber_emails)->subject('New Message');   
     
                });
                mail::to('demo2.browntech@gmail.com')->send(new sendmail3($data));
            }    

        }

        return back();

    }
    public function view_comments()
    {
        $message = Contact_message::all();
        return view('admin.view_comments', ['messages' => $message]);
    }

    public function mana_password(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([

            'password' => 'required | confirmed',

        ]);

        $user           = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return back()->with('success', 'Your Password Update ');

    }

    public function update_site(Request $request)
    {

        $user         = site_setting::find(1);
        $user->noti   = $request->input('noti');
        $user->footer = $request->input('footer');
        if ($request->hasFile('file')) {
            $user->file = $request->file;

            $file      = $request->file('file');
            $extension = $request->file->extension();
            $fileName  = time() . "_." . $extension;
            $request->file->move('upload/images/', $fileName);
            $user->file = $fileName;
        }
        $user->save();
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
        } else {
            return back()->with('error', 'Whoops! some error encountered. Please try again.');
        }

    }
    public function update_user_by_wsa(Request $request)
    {
        // $request->validate([
        //     'f_name'   => 'required',
        //     'email' => 'required | unique:users,email,'.$id
            
           

        // ]);



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
    
    public function point_date(Request $request)
    {
        $Pointshistory = Pointshistory::whereDate('created_at', '>=' ,$request->start )->whereDate('created_at', '<=' ,$request->end )->get();
        return view('pointshistory_table', ['Pointshistory' => $Pointshistory]);
    }
    public function get_user(Request $request)
    {
        $arr=array();
        if($request->days !=null)
        {
            if($request->days==7)
            {
              $day_cal=date('Y-m-d', strtotime('-7 days'));
            }
            elseif($request->days==14)
            {
              $day_cal=date('Y-m-d', strtotime('-14 days'));

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
        
        return view('user_table', ['arr' => $arr]);
    }
    public function get_user_for(Request $request)
    {
        $arr=array();
         if($request->fort !=null)
        {

            $msg=msg::where('to',$request->fort)->get();




            for($k=0 ; $k<count($msg);$k++)
            {
              $arr[]=[
                  'id'=>intval($msg[$k]->from)
              ];
            }
        } 
        
        return view('user_table', ['arr' => $arr]);
    }
    function stat()
    {
        $msg_con_list=0;
        $mana=User::where('role',3)->get();
        $msg_list_chek=0;
        return view('admin/chat_stat' ,compact('msg_list_chek','mana','msg_con_list'));
        
    }
    function get_list_stat($id)
    {
        $msg_con_list=1;
        $msg=msghistory::where('manager_id',$id)->get();
        $mana=User::where('role',3)->get();
        $msg_list_chek=0;
        return view('admin/chat_stat' ,compact('msg','msg_list_chek','mana','msg_con_list'));
        
    }
    
    function stat_msg($id,$mn_id)
    {
        $msg=msghistory::where('manager_id',$mn_id)->get();
        $msg_list=msg_dt::where('msg_id',$id)->where('msg_type','User')->where('sendby',$mn_id)->get();
        $mana=User::where('role',3)->get();

        $msg_list_chek=1;
        $msg_con_list=1;
        

        return view('admin/chat_stat' ,compact('msg','msg_list','msg_list_chek','msg_con_list','mana'));
        
    }
    function waiting()
    {
       
        
        $msg=msg::where('msg_type','2')->get();
        return view('admin/waiting' , compact('msg'));
        
    }
    function waiting_msg(Request $request)
    {
       
        
        $msg=msg::where('from',$request->start)->get();
        return view('admin/waiting_list' , compact('msg'));
        
    }
    
    
    

}
