<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAPIController;

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

//Route::middleware('auth:api', 'scopes:user-view')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:api', 'scopes:user-view')->get('/user', [\App\Http\Controllers\UserController::class,'index']
);

Route::get('/user/active/count', [UserAPIController::class, 'SumActiveUser']);
