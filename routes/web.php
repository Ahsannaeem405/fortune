<?php

use Illuminate\Support\Facades\Route;
use App\Models\msg;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/cls', function() {
        $run = Artisan::call('config:clear');
        $run = Artisan::call('cache:clear');
        $run = Artisan::call('config:cache');
        Session::flush();
        return 'FINISHED';
    });
    Route::get('/migrate', function() {

        $run = Artisan::call('migrate:fresh --seed');

        return 'Completedd';
    });




Route::get('/get_user',[App\Http\Controllers\admin::class,'get_user']);
    Route::get('/get_user_for',[App\Http\Controllers\admin::class,'get_user_for']);


Route::get('/', function () {
    return view('welcome');
});
Route::get('payment', [App\Http\Controllers\PaymentController::class,'index']);
Route::post('charge', [App\Http\Controllers\PaymentController::class,'charge']);
Route::get('paymentsuccess', [App\Http\Controllers\PaymentController::class,'payment_success']);
Route::get('paymenterror', [App\Http\Controllers\PaymentController::class,'payment_error']);
Route::view('/paypal', 'paypal');
Route::get('stripe', [App\Http\Controllers\StripePaymentController::class,'stripe']);
Route::any('stripe_post', [App\Http\Controllers\StripePaymentController::class,'stripePost']);
Route::post('/stripedata',[App\Http\Controllers\StripePaymentController::class,'stripe']);
Route::view('/terms', 'terms&condition');
Route::view('/policy', 'Policy');
Route::view('/pricing', 'pricing');
Route::view('/contact','contact');
Route::post('/addmessage',[App\Http\Controllers\UserController::class,'addmessage']);
Route::post('/cashbill',[App\Http\Controllers\UserController::class,'cashbill']);







Route::prefix('/admins')->middleware(['auth','admin'])->group(function (){


	Route::get('/', function () {
	    return view('admin/index');
	});

	Route::get('/add_ws', function () {
	    return view('admin/add_ws');
	});
    Route::get('/setting', function () {
        return view('admin/setting');
    });
    Route::any('/chat',[App\Http\Controllers\admin::class,'showchat']);

    Route::get('/site_setting', function () {
        return view('admin/site_setting');
    });
    Route::view('add_fortune', 'admin.addfortune');
    Route::post('/addfortune',[App\Http\Controllers\admin::class,'add_fortune']);
    Route::get('/view_fortune',[App\Http\Controllers\admin::class,'view_fortune']);
    Route::get('fortune_edit/{id}',[App\Http\Controllers\admin::class,'edit_fortune']);
    Route::post('/update_fortune',[App\Http\Controllers\admin::class,'update_fortune']);
    Route::get('/fortune_del/{id}',[App\Http\Controllers\admin::class,'del_fortune']);
    Route::post('/join',[App\Http\Controllers\admin::class,'join']);
    Route::get('/admin_messages',[App\Http\Controllers\admin::class,'admin_messages']);
    Route::post('/sendMSG',[\App\Http\Controllers\admin::class,'sendMSG']);
    Route::get('/pointshistory',[App\Http\Controllers\admin::class,'points']);
	Route::post('/save_ws', [App\Http\Controllers\admin::class, 'save_ws']);
    Route::get('/view_ws', [App\Http\Controllers\admin::class, 'view_ws']);
    Route::get('/sup_del/{id}', [App\Http\Controllers\admin::class, 'sup_del']);
    Route::get('/sup_edit/{id}', [App\Http\Controllers\admin::class, 'sup_edit']);
    Route::post('/update_ws/{id}', [App\Http\Controllers\admin::class, 'update_ws']);
    Route::get('/user', [App\Http\Controllers\admin::class, 'user']);
    Route::get('/user_del/{id}', [App\Http\Controllers\admin::class, 'user_del']);
    Route::get('/user_edit/{id}', [App\Http\Controllers\admin::class, 'user_edit']);
    Route::post('/update_user/{id}', [App\Http\Controllers\admin::class, 'update_user']);
    Route::post('/setting_update', [App\Http\Controllers\admin::class, 'setting_update']);
    Route::post('/password', [App\Http\Controllers\admin::class, 'password']);
    Route::post('/add_points', [App\Http\Controllers\admin::class, 'add_points']);
    Route::post('/send_poke', [App\Http\Controllers\admin::class, 'send_poke']);
    Route::post('/mana_password/{id}', [App\Http\Controllers\admin::class, 'mana_password']);
    Route::post('/update_site', [App\Http\Controllers\admin::class, 'update_site']);
    Route::get('/view_comments',[App\Http\Controllers\admin::class,'view_comments']);
    Route::any('/chat2',[App\Http\Controllers\admin::class,'showchat2']);
    Route::any('/sendtri_MSG',[App\Http\Controllers\admin::class,'sendtri_MSG']);
    Route::post('/update_user_by_wsa', [App\Http\Controllers\admin::class, 'update_user_by_wsa']);
    Route::get('/count_man_unread',[App\Http\Controllers\admin::class,'count_man_unread']);
    Route::get('/chat_history',[App\Http\Controllers\admin::class,'chat_history']);
    Route::get('/show_chat_his',[App\Http\Controllers\admin::class,'show_chat_his']);
    Route::get('/get_msg_his',[App\Http\Controllers\admin::class,'get_msg_his']);
    Route::get('/point_date',[App\Http\Controllers\admin::class,'point_date']);
    Route::get('/stat',[App\Http\Controllers\admin::class,'stat']);
    Route::get('/get_list_stat/{id}',[App\Http\Controllers\admin::class,'get_list_stat']);
    Route::get('/stat_msg/{id}/{mn_id}',[App\Http\Controllers\admin::class,'stat_msg']);
    Route::get('/waiting',[App\Http\Controllers\admin::class,'waiting']);
    Route::get('/waiting_msg',[App\Http\Controllers\admin::class,'waiting_msg']);









    



















});


Route::prefix('/super')->middleware(['auth','supervisor'])->group(function (){


    Route::get('/', function () {
    return view('super/index');
    });
    Route::any('/chat',[App\Http\Controllers\super::class,'showchat']);
    Route::any('/chat2',[App\Http\Controllers\super::class,'showchat2']);

    Route::get('/setting', function () {
        return view('super/setting');
    });
    Route::post('/setting_update', [App\Http\Controllers\super::class, 'setting_update']);
    Route::post('/password', [App\Http\Controllers\super::class, 'password']);
    Route::get('/user_del/{id}', [App\Http\Controllers\super::class, 'user_del']);
    Route::get('/user_edit/{id}', [App\Http\Controllers\super::class, 'user_edit']);
    Route::post('/update_user/{id}', [App\Http\Controllers\super::class, 'update_user']);
    Route::get('/user', [App\Http\Controllers\super::class, 'user']);
    Route::post('/add_points', [App\Http\Controllers\admin::class, 'add_points']);
    Route::post('/send_poke', [App\Http\Controllers\admin::class, 'send_poke']);
    Route::get('/pointshistory',[App\Http\Controllers\admin::class,'superpoints']);
    Route::get('/admin_messages',[App\Http\Controllers\super::class,'admin_messages']);
    Route::post('/sendMSG',[\App\Http\Controllers\super::class,'sendMSG']);
    Route::post('/join',[App\Http\Controllers\super::class,'join']);
    Route::any('/sendtri_MSG',[App\Http\Controllers\super::class,'sendtri_MSG']);
    Route::post('/update_user_by_wsa', [App\Http\Controllers\super::class, 'update_user_by_wsa']);
    Route::get('/count_man_unread',[App\Http\Controllers\super::class,'count_man_unread']);
    Route::get('/stat',[App\Http\Controllers\super::class,'stat']);
    Route::get('/get_list_stat/{id}',[App\Http\Controllers\super::class,'get_list_stat']);
    Route::get('/stat_msg/{id}/{mn_id}',[App\Http\Controllers\super::class,'stat_msg']);









});


Route::prefix('/woker')->middleware(['auth','worker'])->group(function (){
	Route::any('/',[App\Http\Controllers\woker::class,'showchat']);
    
    Route::any('/chat',[App\Http\Controllers\woker::class,'showchat']);
    


    Route::get('/setting', function () {
        return view('woker/setting');
    });
    Route::post('/setting_update', [App\Http\Controllers\woker::class, 'setting_update']);
    Route::post('/password', [App\Http\Controllers\woker::class, 'password']);
    Route::get('/admin_messages',[App\Http\Controllers\woker::class,'admin_messages']);
    Route::any('/chat2',[App\Http\Controllers\woker::class,'showchat2']);
    Route::post('/join',[App\Http\Controllers\woker::class,'join']);
    Route::post('/sendMSG',[\App\Http\Controllers\woker::class,'sendMSG']);
    Route::any('/sendtri_MSG',[App\Http\Controllers\woker::class,'sendtri_MSG']);
    Route::post('/update_user_by_wsa', [App\Http\Controllers\woker::class, 'update_user_by_wsa']);
    Route::get('/count_man_unread',[App\Http\Controllers\woker::class,'count_man_unread']);
    Route::get('/stat',[App\Http\Controllers\woker::class,'stat']);
    Route::get('/stat_msg/{id}',[App\Http\Controllers\woker::class,'stat_msg']);











});


Route::prefix('/user')->middleware(['auth','user'])->group(function (){


    Route::get('/',[App\Http\Controllers\UserController::class, 'loggedinHome']);
    Route::view('/points','points');
    Route::any('/chat',[App\Http\Controllers\UserController::class,'chat']);
    Route::get('/profile',[App\Http\Controllers\UserController::class,'profile']);
    Route::post('/updateprofile',[App\Http\Controllers\UserController::class,'updateprofile']);
    Route::get('delete/{id}',[App\Http\Controllers\UserController::class,'deleteuser'] );
    Route::post('/message_fortune',[App\Http\Controllers\UserController::class,'message_fortune']);
    Route::any('/chat_start/{id}',[App\Http\Controllers\UserController::class,'chat_start']);
    Route::get('/payment_success',[App\Http\Controllers\UserController::class,'payment_success']);

    Route::get('/user_messages',[App\Http\Controllers\UserController::class,'getmessages']);
    Route::get('/count_unread',[App\Http\Controllers\UserController::class,'count_unread']);
    Route::get('/get_poke',[App\Http\Controllers\UserController::class,'get_poke']);


    




});

Route::get('/messages',[App\Http\Controllers\UserController::class,'messages']);
Route::post('/messages_fortune',[App\Http\Controllers\UserController::class,'messages_fortune']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);




Route::get('auth/facebook', [App\Http\Controllers\Auth\facebook::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\facebook::class, 'handleFacebookCallback']);



