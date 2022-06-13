<?php

use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Profile\ProfileControllerr;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/setting', function () {
   return view('dashboard.setting');
});

//Route::get('/dashboard/client', function (Request $request) {
//    return view('client',[
//        'clients' => $request->user()->clients
//    ]);
//})->name('oauth');

Route::get('clients',[\App\Http\Controllers\Admin\OAuthController::class,'index'])->name('oauth');
Route::resource('client',\App\Http\Controllers\Admin\OAuthController::class);

//Mail Routes
// Route::get('/testmail',[EmailController::class,'index']);

//Route::get('auth/google',[\App\Http\Controllers\OAuth\GoogleController::class,'redirectToGoogle'])->name('google.login');
//Route::get('auth/google/callback',[\App\Http\Controllers\OAuth\GoogleController::class,'handleGoogleCallback'])->name('google.callback');

Route::get('auth/google',[\App\Http\Controllers\OAuth\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[\App\Http\Controllers\OAuth\GoogleController::class,'handleGoogleCallback'])->name('google.callback');

Route::get('profile',[\App\Http\Controllers\Profile\ProfileControllerr::class,'index'])->name('profile');
Route::post('profile',[\App\Http\Controllers\Profile\ProfileControllerr::class,'update'])->name('profile.update');
Route::post('profile/image',[\App\Http\Controllers\Profile\ProfileControllerr::class,'image'])->name('profile.image');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('welcome');

Route::resource('user',\App\Http\Controllers\Admin\UserController::class);
Route::resource('role',\App\Http\Controllers\Admin\RoleController::class);
Route::resource('permission',\App\Http\Controllers\Admin\PermissionController::class);


