<?php

use App\Models\User;
use App\Models\stores;

use App\Models\branchs;
use App\Models\comments;
// use League\Flysystem\Config;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\setting as ModelsSetting;
use App\Http\Controllers\FrontController;
use App\Http\Livewire\Dashborad\Dashborad;
use App\Http\Controllers\PrivacyController;
use App\Http\Livewire\Dashborad\City\Citits;
use App\Http\Livewire\Dashborad\Store\Store;
use App\Http\Livewire\Dashborad\Users\Users;
use App\Http\Livewire\Dashborad\City\Regions;
use App\Http\Livewire\Dashborad\Branch\Branch;
use App\Http\Livewire\Dashborad\Slider\Slider;
use App\Http\Livewire\Dashborad\Users\Message;
use App\Http\Livewire\Dashborad\Users\NewUser;
use App\Http\Livewire\Dashborad\Store\Newstore;
use App\Http\Livewire\Dashborad\setting\Setting;
use App\Http\Livewire\Dashborad\Products\Product;
use App\Http\Livewire\Dashborad\Branch\Viewbranch;
use App\Http\Livewire\Dashborad\category\Category2;
use App\Http\Livewire\Dashborad\Slider\Sliderfront;
use App\Http\Livewire\Dashborad\Promotion\Promotion;
use App\Http\Livewire\Dashborad\category\Subcategory;
use App\Http\Livewire\Dashborad\category\Maincategory;
use App\Http\Livewire\Dashborad\category\viewcategory;
use App\Http\Livewire\Dashborad\Notification\Notification;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




// route::get('/pull',function () {
//     $output ='<style> body{background-color:black;} h4{color: #4de04d;} </style>';
//     Artisan::call('git pull');
//         $output = $output .  '<h4>'. Artisan::output().'</h4>';
//     return $output;
//  });

// route::get('/down',function () {
//    Artisan::call('down --render="maintenance"');
//    return  redirect('/');
// });

// route::get('/up',function () {
//     Artisan::call('up');
//     return  redirect('/');
//  })->middleware('CheckForMaintenanceMode');

//  route::get('/run',function () {
//     Artisan::call('schedule:run');
//  });


//  Route::get('/artisan', function (Request $request) {
//   $output ='<style> body{background-color:black;} h4{color: #4de04d;} </style>';

//     foreach( $request->get('command') as $command){
//         Artisan::call($command);
//         $output = $output .  '<h4>'. Artisan::output().'</h4>';
//     }
//     return $output;
// });
//  //artisan?commend[]=view:clear&commend[]=config:clear

// Route::get('/gen', function () {

//     return view('gen');
// });

// Route::get('/firebase', function () {

//     return view('firebase');
// });
// Route::post('save-token', function(Request $request)
// {
//     $user = User::find(2);
//     $user->update(['device_token'=> $request->token]);
//     return response()->json(['token saved successfully.']);
// })->name('save-token');


 Route::get('/privacy', function () {
   $privacy = ModelsSetting::where('key','privacy')->first();

    return view('privacy',compact('privacy'));})->name('privacy');
    Route::get('/',[FrontController::class,'index'])->name('front');

Auth::routes();
 Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');
Route::get('/promotion',Promotion::class)->name('promotion');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth','IsAdmin' ]
    ], function(){
Route::group(
    [
        'prefix' => 'admin',
    ], function(){
        // dd('');
        Route::get('/',Dashborad::class)->name('dashborad');
        Route::get('/city',Citits::class)->name('city');
        Route::get('/city/regions/{id?}',Regions::class)->name('regions');
        Route::get('/setting/app',Setting::class)->name('settingapp');
        Route::get('/notification/',Notification::class)->name('setting/notification');
        // Route::get('/category',viewcategory::class)->name('category');
        // Route::get('/category2',Category2::class)->name('category2');
        Route::get('/slider',Slider::class)->name('slider');
        Route::get('/maincategory',Maincategory::class)->name('maincategory');
        Route::get('/subcategory/{slug?}',Subcategory::class)->name('subcategory');
        Route::get('/slider/front',Sliderfront::class)->name('sliderfront');
        Route::get('/store/branch/product/{slug?}',Product::class)->name('product');
        Route::get('/stores',Store::class)->name('stores');
        Route::get('/store/branchse/{slug?}',Branch::class)->name('branch');
        Route::get('/store/branchs/{slug?}',Viewbranch::class)->name('viewbranch');
        Route::get('/store/new',Newstore::class)->name('newstore');
        Route::get('/users',Users::class)->name('users');
        Route::get('/user/new/{id?}/{editmode?}',NewUser::class)->name('newuser');
        Route::get('/user/message/{id?}',Message::class)->name('messageuser');

        // Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');
        Route::get('home', function () {
            return view('admin.layouts.pagenew');
        })->name('home');
    });

    });
