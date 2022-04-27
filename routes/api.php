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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/settingapp', [Setting::class, 'app']);
Route::group(['middleware' => ['only.api','api'],'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);

});

Route::group(['middleware' => ['only.api','jwt.verify'] ], function ($router) {

Route::get('/getcity', [CitiesController::class,'getcity']);
Route::post('/getregionsbycity', [CitiesController::class,'getregions']);

Route::get('/getstores', [StoresController::class,'getstores']);
Route::get('/ff', function(){return auth('api')->user()->id;});

Route::get('/getbranches', [BranchesController::class,'getbranches']);
Route::get('/vistor/{id}', function($id){DB::table('branchs')->whereId($id)->increment('view');});
// Route::get('/comments/{id}/{rate}', function($id,$rate){DB::table('comments')->whereId($id)->increment('review',$rate);});


Route::get('/getcategories', [CategoriesController::class,'getcategories']);

});


