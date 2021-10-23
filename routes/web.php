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
    Route::get('/chat',[App\Http\Controllers\admin::class,'showchat']);

    Route::get('/site_setting', function () {
        return view('admin/site_setting');
    });
    Route::view('add_fortune', 'admin.addfortune');
    Route::post('/addfortune',[App\Http\Controllers\admin::class,'add_fortune']);
    Route::get('/view_fortune',[App\Http\Controllers\admin::class,'view_fortune']);
    Route::get('fortune_edit/{id}',[App\Http\Controllers\admin::class,'edit_fortune']);
    Route::post('/update_fortune',[App\Http\Controllers\admin::class,'update_fortune']);
    Route::get('/fortune_del/{id}',[App\Http\Controllers\admin::class,'del_fortune']);



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

















});


Route::prefix('/super')->middleware(['auth','supervisor'])->group(function (){


    Route::get('/', function () {
    return view('super/index');
    });
    Route::get('/chat', function () {
        return view('super/chat');
    });
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





});


Route::prefix('/woker')->middleware(['auth','worker'])->group(function (){
	Route::get('/', function () {
    return view('woker/chat');
    });
    Route::get('/chat', function () {
        return view('woker/chat');
    });
    Route::get('/setting', function () {
        return view('woker/setting');
    });
    Route::post('/setting_update', [App\Http\Controllers\woker::class, 'setting_update']);
    Route::post('/password', [App\Http\Controllers\woker::class, 'password']);


});


Route::prefix('/user')->middleware(['auth','user'])->group(function (){


    Route::get('/',[App\Http\Controllers\UserController::class, 'loggedinHome']);
    Route::view('/points','points');
    Route::get('/chat',[App\Http\Controllers\UserController::class,'chat']);
    Route::get('/profile',[App\Http\Controllers\UserController::class,'profile']);
    Route::post('/updateprofile',[App\Http\Controllers\UserController::class,'updateprofile']);
    Route::get('delete/{id}',[App\Http\Controllers\UserController::class,'deleteuser'] );
    Route::post('/message_fortune',[App\Http\Controllers\UserController::class,'message_fortune']);
    Route::any('/chat_start/{id}',[App\Http\Controllers\UserController::class,'chat_start']);
    Route::get('/payment_success',[App\Http\Controllers\UserController::class,'payment_success']);




});

Route::get('/messages',[App\Http\Controllers\UserController::class,'messages']);
Route::post('/messages_fortune',[App\Http\Controllers\UserController::class,'messages_fortune']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);




Route::get('auth/facebook', [App\Http\Controllers\Auth\facebook::class, 'redirectToFacebook']);

Route::get('auth/facebook/callback', [App\Http\Controllers\Auth\facebook::class, 'handleFacebookCallback']);



