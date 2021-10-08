<?php

use Illuminate\Support\Facades\Route;

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

        return 'Complete';
    });
  





Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/chat', function () {
        return view('admin/chat');
    });
    Route::get('/site_setting', function () {
        return view('admin/site_setting');
    });





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


    Route::view('/', 'loggedinHome');
    Route::view('/contact','contact');
    Route::view('/points','points');

});



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
