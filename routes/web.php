<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//user auth

Route::get("/","Frontend\PageController@home");

Route::get("/admin/login","Auth\AdminLoginController@showLoginForm");
Route::post("/admin/login","Auth\AdminLoginController@login")->name("admin.login");
