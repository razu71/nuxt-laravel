<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('test', function (){
   return response()->json(['success' => true]);
});
//Route::post('login', [\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout'])->middleware('auth:api');
Route::get('user', [\App\Http\Controllers\AuthController::class,'user'])->middleware('auth:api');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
