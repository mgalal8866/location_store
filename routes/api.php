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
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Setting;
use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Models\comments;

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
/**************************  BranchesController ********************************** */

/**************************  CategoriesController ********************************** */
    Route::get('/getcategories', [CategoriesController::class,'getcategories']);
    Route::post('/getsubcategories', [CategoriesController::class,'getsubcategories']);
/**************************  CategoriesController ********************************** */

/**************************  ProductController ********************************** */

// Route::post('/insert/product',  function(Request $request){

//      $files= $request->file('image');

    // foreach ($files as $file) {

        // $extension = $file->getClientOriginalExtension();

        // $check = in_array($extension,$allowedfileExtension);

        // if($check) {
            // foreach($request->image as $mediaFiles) {

            //     $path = $mediaFiles->store('public/images');
            //     $name = $mediaFiles->getClientOriginalName();
            //     return $path;
                //store image file into directory and db
                // $save = new Image();
                // $save->title = $name;
                // $save->path = $path;
                // $save->save();
            // }
        // } else {
        //     return response()->json(['invalid_file_format'], 422);
        // }

        // return response()->json(['file_uploaded'], 200);

    // }
// });

    Route::post('/insert/product', [ProductController::class,'insert_product']);
    Route::post('/get/product/by/branch', [ProductController::class,'get_product']);
/**************************  ProductController ********************************** */

});


