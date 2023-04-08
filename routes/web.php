<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->name('user.')->group(function(){

  Route::middleware(['guest:web','PreventBackHistory'])->group(function(){

    Route::view('/register','dashboard.user.register')->name('register');
    Route::view('/login','dashboard.user.login')->name('login');
    Route::post('/store',[UserController::class,'store'])->name('store');
    Route::post('check',[UserController::class,'check'])->name('check');

  });

  Route::middleware(['auth:web','PreventBackHistory'])->group(function(){

    Route::view('/home','dashboard.user.home')->name('home');
    Route::post('/logout',[UserController::class,'logout'])->name('logout');

  });

});

Route::get('/test',function(){
    return view('dashboard.user.home');
});


