<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\Api\FrontController;
use App\http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1')->group(function(){
    ///PUBLIC
    //:public
    Route::get('/public/{slug}',[FrontController::class,'Usuario']);



    //auth
    Route::post('/Auth/login',[AuthController::class,'login']);
    Route::post('/Auth/register',[AuthController::class,'register']);



    ///PRIVATE
    Route::group(['middleware'=>'auth:sanctum'],function(){

        Route::post('/Auth/logout',[AuthController::class,'logout']);

        Route::apiResource('/admin/user',UserController::class);

        //::Rol Admin

        


    });
}); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
