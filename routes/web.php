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
// checking
Route::view('/header','checkingheader');





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









});


Route::prefix('/super')->middleware(['auth','supervisor'])->group(function (){
	Route::get('/', function () {
    return view('super/index');
});


});

Route::prefix('/woker')->middleware(['auth','worker'])->group(function (){
	Route::get('/', function () {
    return view('woker/index');
});


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
