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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test',function (){
    return view('layouts.basiclayout');
});
Route::middleware(['auth'])->group(function (){
    Route::resource('vpn','VPNUserController');
    Route::put('/vpn/{vpn}/changePlatform','VPNUserController@changePlatform')->name('vpn.changePlatform');
    Route::put('/vpn/{vpn}/active','VPNUserController@activeUser')->name('vpn.active');
    Route::put('/vpn/{vpn}/deactive','VPNUserController@deactiveUser')->name('vpn.deactive');
    Route::get('/vpn/{vpn}/extend','VPNUserController@extendUser')->name('vpn.extend');
    Route::put('/vpn/{vpn}/extendByDate','VPNUserController@extendUserByDate')->name('vpn.extendbyDate');
    Route::put('/vpn/{vpn}/extendByDay','VPNUserController@extendUserByDay')->name('vpn.extendbyDay');
    Route::get('/vpn/{vpn}/slips','VPNUserController@getUserSlips')->name('vpn.slips');
    Route::resource('slip','SlipsController');
    Route::put('/slip/{slip}/approve','SlipsController@approve')->name('slips.approve');
    Route::put('/slip/{slip}/deny','SlipsController@deny')->name('slips.deny');
    //Reseller Routes
    Route::resource('user','UserController');
});
