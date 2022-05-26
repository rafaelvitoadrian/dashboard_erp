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

Route::get('/dashboard/client', function (Request $request) {
    return view('client',[
        'clients' => $request->user()->clients
    ]);
});

//Mail Routes
Route::get('/testmail',[EmailController::class,'index']);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('welcome');


