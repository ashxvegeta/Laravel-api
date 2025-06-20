<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

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


// for repository show users
Route::get('/users', [UserController::class, 'index']);
// for repository to store users
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// http://127.0.0.1:8000/api/profile  put with bearer token Content-Type application json  Accept application json
Route::middleware(['auth:sanctum','throttle:10,1'])->get('/profile',function(Request $request){
    return response()->json([
    'status'=>true,
    'user'=>$request->user()
    ]);
});
Route::middleware('auth:sanctum')->post('/logout',function (Request $request) {
   $request->user()->currentAccessToken()->delete();
   return response()->json([
        'status'=>true,
         'message'=>'Logout Successfull'
   ]);
});
Route::middleware('throttle:5,1')->get('/test-throttle',function(){
    return response()->json(['message'=>'Success']);
});
Route::middleware('throttle:5,1')->get('/test-throttle',function(){
    return response()->json(['message'=>'Success']);
});

