<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//admin user auth
Route::get("/admin/login","Auth\AdminLoginController@showLoginForm");
Route::post("/admin/login","Auth\AdminLoginController@login")->name("admin.login");
Route::post("/admin/logout","Auth\AdminLoginController@logout")->name("admin.logout");

//user auth
Route::middleware('auth')->namespace('Frontend')->group(function (){
    Route::get("/","PageController@home")->name('home');
    Route::get('/profile','PageController@profile')->name('profile');
    Route::get('/update/password','PageController@updatePassword')->name('update.password');
    Route::post('/update/password','PageController@updatePasswordStore')->name('update.password.store');
    Route::get('/wallet','PageController@wallet')->name('wallet');

    Route::get('/transfer','PageController@transfer')->name('transfer');
    Route::get('/transfer/confirm','PageController@transferConfirm')->name('transfer.confirm');
    Route::post('/transfer/complete','PageController@transferComplete')->name('transfer.complete');
    Route::get('/transfer/confirm/password','PageController@confirmPassword')->name('transfer.confirm.password');
    Route::get('/receiver/phone/verify','PageController@receiverPhoneVerify')->name('receiver.phone.verify');

    ##transaction
    Route::get('/transaction','PageController@transaction')->name('transaction');
    Route::get('/transaction/detail/{id}','PageController@transactionDetail')->name('transaction.detail');
});



