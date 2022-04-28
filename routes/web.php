<?php


use League\Flysystem\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashborad\Citits;
use App\Http\Controllers\DashbordController;
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


Route::get('mm',function(){
    config()->set('err_message.keys.secret', "value");
    return config('err_message.keys.secret');
});
Auth::routes();
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth:admin' ]
    ], function(){
        Route::get('/dashborad',[DashbordController::class,'index'])->name('dashborad');
        Route::get('/city',Citits::class)->name('city');
        Route::get('/users',Citits::class)->name('users');
        Route::get('/city/regions',Citits::class)->name('regions');
        Route::get('/stores',Citits::class)->name('stores');
        Route::get('/store/branchse',Citits::class)->name('branches');
        Route::get('/user/comments',Citits::class)->name('comments');


        //...
        Route::get('home', function () {
            return view('admin.layouts.pagenew');
        })->name('home');
    });
