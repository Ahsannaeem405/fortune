<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fortune;
use App\Models\msg_dt;
use App\Models\msg;
use App\Models\Contact_message;

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
    $msg=msg::where('to',$id)->get();
    $chat_detail=msg_dt::where('to',$id)->get();
    $for=null;
    return view('chat',['chat_detail'=>$chat_detail,'msg'=>$msg,'for'=>$for]);
}
function messages(Request $request){
    $user=Auth::user()->id;
     $message=msg_dt::where('from',$request->id)->where('to',$user)->get();


        return response()->json($message);

}
function messages_fortune(Request $request){

    $to=$request->id;
    $message=$request->message;
    $from=Auth::user()->id;
    if (msg::where('to', $to)
    ->where('from',$from)
    ->exists())
    {
       $msg_det=new msg_dt();
       $msg_det->msg=$message;
       $msg_det->to= $to;
       $msg_det->from=Auth::user()->id;
       $msg_det->save();
    }
    else{

       $msg=new msg();
       $msg->to= $to;
       $msg->from=Auth::user()->id;
       $msg->save();

       $msg_det=new msg_dt();
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
function message_fortune(Request $request){

    $user_id=Auth::user()->id;
    $fortune_id=$request->to;
    $msg_dtl=new msg_dt();
    $check=msg::where('from',$user_id)->where('to',$fortune_id)->get();


    if (count($check)==0) {
        $msg=new msg();
        $msg->from=$user_id;
        $msg->to=$fortune_id;
        $msg->save();



    }
    $msg_dtl->to=$fortune_id;
    $msg_dtl->from=$user_id;
    $msg_dtl->msg=$request->message;
    $msg_dtl->save();
    // dd($msg_dtl);
return redirect()->back()->with('success', 'Message sent Successfully');


}
function cashbill(Request $request){
    $points=$request->points;
    $amount=$request->amount;
    Session()->put('points',$points);
    return view('cashbill',['points'=>$points ,'amount'=>$amount]);
}
function payment_success(){
    dd($_GET['status']);
    $points=session()->get('points');
    $user_id=Auth::user()->id;

}
function chat_start($id){

    $user_id=Auth::user()->id;
    $fortune_id=$id;
    $for=Fortune::find($id);

    if (msg::where('to', $fortune_id)->where('from',$user_id)->exists())
    {
        $chat_id=msg::where('to', $fortune_id)->where('from',$user_id)->value('id');




    }
    else{
        $chat_id=0;
    }
    $id=Auth::user()->id;
    $msg=msg::where('to',$id)->get();
    $chat_detail=msg_dt::where('to',$id)->get();
    return view('chat',['chat_detail'=>$chat_detail,'msg'=>$msg, 'for'=>$for]);


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
