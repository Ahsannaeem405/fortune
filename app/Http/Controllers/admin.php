<?php

namespace App\Http\Controllers;

use App\Models\Contact_message;
use App\Models\Fortune;
use App\Models\msg;
use App\Models\msg_dt;
use App\Models\Pointshistory;
use App\Models\site_setting;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $msg_approve = msg::where('status', '!=', 'null')->get();
        $msg_na      = msg::where('status', null)->where('msg_type', '=', '2')->get();

        return view('admin/chat', ['approve_msgs' => $msg_approve, 'Napprove_msgs' => $msg_na]);
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
     function join(Request $request){
         $id=$request->msg_id;
         $msg=msg::find($id);
        $msg->status='Approved';
        $msg->save();
        // dd($msg);
        return redirect()->back()->with('success', 'Successfully Approved');

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

        $user        = User::find($id);
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        if (!is_null($user)) {
            return back()->with('success', 'User Successfully Add.');
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
        if ($request->days !=null and   count($request->fortune_id) !=null) {
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
                $data = $request->input('msg');

        $subscriber_emails =subscribe::pluck('email')->toArray();
        Mail::send('dynamic_email_template',['data' => $data], function($message) use ($subscriber_emails)
        {
        $message->bcc($subscriber_emails)->subject('Alert');
        });
     // mail::to('shiahelprefrences12@gmail.com')->send(new SendMail($data));
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

}
