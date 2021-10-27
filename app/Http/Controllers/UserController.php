<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fortune;
use App\Models\msg_dt;
use App\Models\msg;
use App\Models\Contact_message;
use App\Models\Pointshistory;

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
function chat(){
    $id=Auth::user()->id;
    $msg=msg::where('to',$id )->orwhere('from',$id)->get();
    $chat_detail=msg_dt::where('to',$id)->get();
    $for=null;
    $chat_id=0;
     $msg_detail=msg_dt::where('msg_id',$chat_id)->get();
    return view('chat',['chat_detail'=>$chat_detail,'msg'=>$msg,'for'=>$for,'chat_id'=>$chat_id,'msg_details'=>$msg_detail]);
}
function messages(Request $request){
    $user=Auth::user()->id;
     $message=msg_dt::where('from',$request->id)->where('to',$user)->get();


        return response()->json($message);

}
function messages_fortune(Request $request){
    if (Auth::user()->point>0) {
        $user=User::find(Auth::user()->id);
        $point=$user->point;
        $total=$point-1;
        $user->point=$total;
        $user->save();
        $to=$request->id;
        $message=$request->message;
        $from=Auth::user()->id;
        if (msg::where('to', $to)
        ->where('from',$from)
        ->exists())
        {
            $id=msg::where('to', $to)
            ->where('from',$from)
            ->value('id');
           $msg_det=new msg_dt();
           $msg_det->msg=$message;
           $msg_det->msg_type="User";
           $msg_det->to= $to;
           $msg_det->msg_id=$id;
           $msg_det->from=Auth::user()->id;
           $msg_det->save();
        }
        else{

           $msg=new msg();
           $msg->msg_type='2';
           $msg->to= $to;
           $msg->from=Auth::user()->id;
           $msg->save();

           $msg_det=new msg_dt();
           $msg_det->msg_id=$msg->id;
           $msg_det->msg_type="User";
           $msg_det->msg=$message;
           $msg_det->to= $to;
           $msg_det->from=Auth::user()->id;
           $msg_det->save();

        }
        // dd($message);
        // $message->sender = Auth::user()->id;
        // $message->receiver = $request->receiver;
        // $message->sender_read = "1";
        // $message->message = $request->message;
        // $message->save();
        return response()->json($msg_det);
    }
    else{
    return redirect('/user')->with('error', 'Za mało punktów');

    }



}
// function message_fortune(Request $request){

//     $user_id=Auth::user()->id;
//     $fortune_id=$request->to;
//     $msg_dtl=new msg_dt();
//     $check=msg::where('from',$user_id)->where('to',$fortune_id)->get();


//     if (count($check)==0) {
//         $msg=new msg();
//         $msg->from=$user_id;
//         $msg->to=$fortune_id;
//         $msg->save();



//     }
//     $msg_dtl->to=$fortune_id;
//     $msg_dtl->from=$user_id;
//     $msg_dtl->msg=$request->message;
//     $msg_dtl->save();
//     // dd($msg_dtl);
// return redirect()->back()->with('success', 'Message sent Successfully');


// }
function cashbill(Request $request){
    $points=$request->points;
    $amount=$request->amount;
    Session()->put('points',$points);
    return view('cashbill',['points'=>$points ,'amount'=>$amount]);
}
function payment_success(){
    $points=session()->get('points');
    $amount=$_GET['amount'];

    // dd($_GET['status']);
    if ($_GET['status']=="ok") {

        $user=User::find(Auth::user()->id);
        $total=$user->point+$points;
        $user->point=$total;
        $user->save();
        $Pointshistory=new Pointshistory();
        $Pointshistory->user_id=$user->id;
        $Pointshistory->points=$points;
       $Pointshistory->amount= $amount;
       $Pointshistory->save();
       return redirect('/user');
    }


}
function chat_start($id){
    $points=Auth::user()->point;
    if ($points==0) {
    return redirect()->back()->with('error', 'Za mało punktów');

    }
    $user_id=Auth::user()->id;
    $fortune_id=$id;
    $for=Fortune::find($id);

    if (msg::where('to', $fortune_id)->where('from',$user_id)->exists())
    {
        $chat_id=msg::where('to', $fortune_id)->where('from',$user_id)->value('id');
        $msg_detail=msg_dt::where('msg_id',$chat_id)->get();




    }
    else{
        $chat_id=0;
        $msg_detail=msg_dt::where('msg_id',$chat_id)->get();

    }
    $fortune_id=$id;
    $id=Auth::user()->id;
    $msg=msg::where('to',$id)->get();
    $chat_detail=msg_dt::where('to',$id)->get();
    return view('chat',['chat_detail'=>$chat_detail,'msg'=>$msg, 'for'=>$for,'msg_details'=>$msg_detail,'fortune_id'=>$fortune_id,'chat_id'=>$chat_id]);


}
function getmessages(Request $request){
$msg_id=$request->msg_id;
$msg_dt=msg_dt::where('msg_id',$msg_id)->get();
return response()->json($msg_dt);
}
function addmessage(Request $request){
$contact=new Contact_message();
$contact->name=$request->name;
$contact->email=$request->email;
$contact->topic=$request->topic;
$contact->message=$request->message;
// dd($contact);
$contact->save();
return redirect()->back()->with('success', 'Message sent Successfully');

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
    // $user->f_name=$request->f_name;
    // $user->l_name=$request->l_name;
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


// $user->phone=$request->phone;
// $user->vocative=$request->vocative;
// $user->nameoflove=$request->nameoflove;
// $user->city=$request->city;
// $user->bio=$request->bio;
$user->notification=$request->notification;
$user->dob=$request->dob;
$user->save();
// dd($user);
return redirect()->back()->with('success', 'Updated Successfully');


}
}
