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
});



