<?php

use App\Models\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Setting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CitiesController;
use App\Http\Controllers\Api\StoresController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\BranchesController;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Api\CategoriesController;

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/ms', function () {
        config(['err_message.alert.limit_product' => 'تم الوصول للحد الاقصى ...']);
        Artisan::call('config:clear');
        return config('err_message.alert.limit_product');
    });

    Route::get('/mss', function () {
        return config('err_message.alert.limit_product');
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
    Route::get('/getcitywithregions', [CitiesController::class,'getcitywithregions']);
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
    Route::Post('/get/branches/by/category', [BranchesController::class,'getbranchesbyid']);
    Route::post('/branch/byid', [BranchesController::class,'getbranchbyid']);
    Route::get('/search/{query}', [BranchesController::class,'search']);
    Route::get('/get/branches/by/user', [BranchesController::class,'getbranchesbyuser']);
    Route::get('/get/lastbranch', [BranchesController::class,'lastbranch']);
    Route::Post('/branch/edit', [BranchesController::class,'branchedit']);
    Route::Post('/branch/delete', [BranchesController::class,'branchdelete']);
/**************************  BranchesController ********************************** */


/**************************  CategoriesController ********************************** */
    Route::post('/getcategories', [CategoriesController::class,'getcategories']);
    Route::post('/getsubcategories', [CategoriesController::class,'getsubcategories']);
/**************************  CategoriesController ********************************** */


/**************************  ProductController ********************************** */
    Route::post('/insert/product', [ProductController::class,'insert_product']);
    Route::post('/get/product/by/branch', [ProductController::class,'get_product']);
    Route::Post('/product/edit', [ProductController::class,'productedit']);
    Route::Post('/product/delete', [ProductController::class,'productdelete']);
/**************************  ProductController ********************************** */

});


