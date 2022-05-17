<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items',[NewController::class, 'index']);
Route::get('/show/{id}',[NewController::class, 'show']);
Route::prefix('/item')->group(function(){
    Route::post('/store',[NewController::class, 'store']);
    Route::put('update/{id}',[NewController::class, 'update']);
    Route::delete('delete/{id}',[NewController::class, 'destroy']);
});