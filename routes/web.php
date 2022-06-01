<?php

use App\Http\Controllers\Email\EmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/client', function () {
//    return view('client');
//});

//Route::get('/dashboard/client', function (Request $request) {
//    return view('client',[
//        'clients' => $request->user()->clients
//    ]);
//})->name('oauth');

Route::get('client',[\App\Http\Controllers\Admin\OAuthController::class,'index'])->name('oauth');

//Mail Routes
Route::get('/testmail',[EmailController::class,'index']);

Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
Route::resource('role',\App\Http\Controllers\Admin\RoleController::class);
Route::resource('permission',\App\Http\Controllers\Admin\PermissionController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('welcome');


