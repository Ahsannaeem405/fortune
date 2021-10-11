<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pointshistory;


use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        $amount=$request->amount;
        $points=$request->points;


        return view('stripe',['amount'=>$amount,'points'=>$points]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $points=$request->points;
        $amount=$request->amount;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET','sk_test_51HtW7hE37jQihVCRXpGGrJbKj2QLpy9td51kjfDg7qUC8mGBqBsajyC6AGFFBoE0S8R23EzeNhiriEAjMDri6nVN00ncnKjuHA'));
        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "PLN",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);
        $user=User::find(Auth::user()->id);
        $total=$user->point+$points;
        $user->point=$total;
        $user->save();
        $Pointshistory=new Pointshistory();
        $Pointshistory->user_id=$user->id;
        $Pointshistory->points=$points;
        $Pointshistory->amount=$amount;
        $Pointshistory->save();
        // dd($Pointshistory);


        Session::flash('success', 'Payment successful!');
// dd('dddd');
        return redirect('/user/points');
    }
}
