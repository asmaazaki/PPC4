<?php

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

Route::prefix('dashboard')->group(function() {


    Route::get('/login', 'AdminAuthController@loginForm')->name('loginForm');
    Route::post('/Admin-Login', 'AdminAuthController@login')->name('admin-Login');
    Route::get('/admin/logout', 'AdminAuthController@logout')->name('admin-logout');



});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],


    function(){

        Route::prefix('User')->middleware(['auth'])->group(function() {

            Route::get('/AfterLogin', 'AdminModuleController@index')->name('afterLogin');

        });


    }
);