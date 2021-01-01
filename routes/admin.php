<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|   Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');



});


Route::group(['middleware' => 'guest:admin'], function () {

     Route::get('login',[LoginController::class, 'getLogin'])->name('admin.getLogin');
     Route::post('login',[LoginController::class, 'login'])->name('admin.login');

});



