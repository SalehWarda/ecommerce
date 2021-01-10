<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\ProfileSettingsController;
use App\Http\Controllers\Dashboard\SettingsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

                     Route::group(['prefix' => 'admin','middleware' => 'auth:admin'], function () {

                            Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');
                            Route::get('logout',[LoginController::class, 'logout'])->name('admin.logout');

                            Route::group(['prefix' => 'settings'], function () {

                                    Route::get('/',[SettingsController::class, 'settings'])->name('admin.settings');
                                    Route::get('/shipping-methods/{type}',[SettingsController::class, 'editShippingMethods'])->name('edit.shippings.methods');
                                    Route::put('/shipping-methods/{id}',[SettingsController::class, 'updateShippingMethods'])->name('update.shippings.methods');

                                       });
                            Route::group(['prefix' => 'profileSettings'], function () {

                                    Route::get('/',[ProfileSettingsController::class, 'profileSettings'])->name('admin.profileSettings');
                                    Route::get('/account',[ProfileSettingsController::class, 'editAccount'])->name('edit.account');
                                    Route::put('/account/{id}',[ProfileSettingsController::class, 'updateAccount'])->name('update.account');
                                    Route::get('/password',[ProfileSettingsController::class, 'changePassword'])->name('change.password');
                                    Route::put('/password/{id}',[ProfileSettingsController::class, 'updatePassword'])->name('update.password');

                                       });

                               });



                           Route::group(['prefix' => 'admin','middleware' => 'guest:admin'], function () {

                                 Route::get('login',[LoginController::class, 'getLogin'])->name('admin.getLogin');
                                 Route::post('login',[LoginController::class, 'login'])->name('admin.login');

                              });

        });

