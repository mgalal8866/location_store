<?php


use App\Models\User;
use Illuminate\Http\Request;
use League\Flysystem\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashborad\Citits;
use App\Http\Controllers\DashbordController;
use App\Http\Livewire\Dashborad\setting\Setting;
use App\Http\Livewire\Dashborad\Store\Store;
use App\Http\Livewire\Dashborad\Branch\Branch;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


// route::get('/gen',[DashbordController::class,'gennoti']);
Route::get('/gen', function () {

    return view('gen');
});

Route::get('/firebase', function () {

    return view('firebase');
});
Route::post('save-token', function(Request $request)
{
    $user = User::find(2);
    $user->update(['device_token'=> $request->token]);
    return response()->json(['token saved successfully.']);
})->name('save-token');
// route::get('/gen',[DashbordController::class,'gennoti']);

Route::get('mm',function(){
    config()->set('err_message.keys.secret', "value");
    return config('err_message.keys.secret');
});

Auth::routes();
// Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth:admin' ]

    ], function(){

        Route::get('/',[DashbordController::class,'index'])->name('dashborad');
        Route::get('/city',Citits::class)->name('city');
        Route::get('/setting/app',Setting::class)->name('settingapp');
        Route::get('/users',Citits::class)->name('users');
        Route::get('/city/regions',Citits::class)->name('regions');
        Route::get('/stores',Store::class)->name('stores');
        Route::get('/store/branchse',Branch::class)->name('branch');
        Route::get('/user/comments',Citits::class)->name('comments');

        Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');
        Route::get('home', function () {
            return view('admin.layouts.pagenew');
        })->name('home');
    });
