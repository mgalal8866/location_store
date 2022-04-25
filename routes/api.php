<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CitiesController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\BranchesController;
use App\Http\Controllers\Api\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api'], function ($router) {

Route::get('/getcity', [CitiesController::class,'getcity']);
Route::post('/getregionsbycity', [CitiesController::class,'getregions']);

Route::get('/getstores', [StoresController::class,'getstores']);


Route::get('/getbranches', [BranchesController::class,'getbranches']);
Route::get('/vistor/{id}', function($id){DB::table('branchs')->whereId($id)->increment('view');});
// Route::get('/comments/{id}/{rate}', function($id,$rate){DB::table('comments')->whereId($id)->increment('review',$rate);});


Route::get('/getcategories', [CategoriesController::class,'getcategories']);

});


