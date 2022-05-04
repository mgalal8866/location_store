<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CitiesController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\BranchesController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\Setting;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\comments;

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/ms', function () {
        return  config('err_message.config')['lang_for_felid'];
    });

    Route::get('/comment', function () {
        $count = comments::getrating(1)->count();
        $sum = comments::getrating(1)->sum('rating');
        return  $sum/$count;
    });

    Route::get('/not', [CitiesController::class,'notifi']);
/**************************  Settings ********************************** */
    Route::get('/slider', [Setting::class, 'slider']);
    Route::get('/settingapp', [Setting::class, 'app']);
/**************************  Settings ********************************** */

/**************************  AUTH ********************************** */
Route::group(['middleware' => ['only.api','api'],'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('jwt.verify');
});
/**************************  AUTH ********************************** */


/**************************  CitiesController ********************************** */
    Route::get('/getcity', [CitiesController::class,'getcity']);
    Route::post('/getregionsbycity', [CitiesController::class,'getregions']);
/**************************  CitiesController ********************************** */


Route::group(['middleware' => ['only.api','jwt.verify'] ], function ($router) {
    Route::post('/editprofile', [AuthController::class, 'editprofile']);
/**************************  StoresController ********************************** */
    Route::get('/getstores', [StoresController::class,'getstores']);
    Route::post('/newstore', [StoresController::class,'newstore']);
    Route::get('/storevistor/{store_id}', [StoresController::class,'storevistor']);
/**************************  BRANCHES ********************************** */
    Route::get('/ff', function(){return auth('api')->user()->id;});
/**************************  BranchesController ********************************** */
    Route::get('/getbranches', [BranchesController::class,'getbranches']);
    Route::post('/branch/byid', [BranchesController::class,'getbranchbyid']);
    Route::get('/search/{query}', [BranchesController::class,'search']);
/**************************  CategoriesController ********************************** */
    Route::get('/getcategories', [CategoriesController::class,'getcategories']);
    Route::post('/getsubcategories', [CategoriesController::class,'getsubcategories']);
});


