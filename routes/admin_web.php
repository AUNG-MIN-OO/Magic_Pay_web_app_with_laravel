<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//admin user auth

Route::prefix('admin')
       ->middleware('auth:admin_user')
       ->namespace('Backend')
       ->group(function (){
            Route::get('/','PageController@home');
});

