<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\User as ResourcesUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function __construct() {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
use GeneralTrait;
    public function login(Request $request){

    	$validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required|string|min:6',
            'ip_address' => $request->ip()
        ],
        [
            'mobile' => config('err_message.alert.mobile'),
            'password.required' => config('err_message.alert.password_required')
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['status' => 'false','msg' =>  config('err_message.err.login')], 200);
        }
        $user = new ResourcesUser(  auth('api')->user());

        if(!$request->ip() == null){
            $user->update([
                'ip_address' => $request->ip(),
                'device_token' =>$request->device_token
            ]);
         }

        return $this->createNewToken($token,$request->device_token);
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'mobile' => 'required|string|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'region_id'=>'string',
            'city_id'=>'string',
            'gender' =>'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if($request->has('image')) {
            $filepath = $this->uploadimages('user', $request->image);
            $request->request->add(['filepath' => $filepath]);
        }else{
            $request->request->add(['filepath'=>null]);}

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)
                    ,'image' => $request->filepath,
                    'ip_address' => $request->ip(),
                    'device_token' =>$request->device_token]
                ));
        return response()->json([
            'user' => new ResourcesUser($user),
            'status' => 'true',
            'msg' => config('err_message.success.register')
        ], 200);
    }


    public function editprofile(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'string|between:2,100',
            // 'mobile' => 'required|string|max:100|unique:users',
            'password' => '',
            'region_id'=>'',
            'city_id'=>'',
            'gender' =>'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = auth('api')->user();

        if($request->has('image')) {
            $filepath = $this->uploadimages('user', $request->image);
            $request->request->add(['filepath' => $filepath]);
        }else{
            $request->request->add(['filepath'=>  $user->getAttributes()['image']]);}


        $user->update(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)
            ,'image' => $request->filepath,
            'ip_address' => $request->ip(),
            'device_token'=>$request->device_token]
        ));
        return response()->json([
            'user' => new ResourcesUser($user),
            'status' => 'true',
            'msg' => config('err_message.success.editprofile')
        ], 200);
    }

    public function logout() {
        auth('api')->logout();

        return  $this->returnSuccessMessage(config('err_message.success.logout') );
    }

    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }

    public function userProfile() {
        return response()->json(auth('api')->user());
    }

    protected function createNewToken($token,$device_token){
        $user = new ResourcesUser( auth('api')->user());
        if(!$device_token == null){
        $user->update([
            'device_token' => $device_token
          ]);
            }
        return response()->json([

        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 6000,
        'user' =>  $user,
        'status' => 'true',
        'msg' => config('err_message.success.login')
        ]);
    }


    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }


    // public function login()
    // {
    //     $credentials = request(['email', 'password']);

    //     if (! $token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->respondWithToken($token);
    // }

    // /**
    //  * Get the authenticated User.
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    // /**
    //  * Log the user out (Invalidate the token).
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function logout()
    // {
    //     auth()->logout();

    //     return response()->json(['message' => 'Successfully logged out']);
    // }

    // /**
    //  * Refresh a token.
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    // /**
    //  * Get the token array structure.
    //  *
    //  * @param  string $token
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth()->factory()->getTTL() * 60
    //     ]);
    // }
}
