<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//admin user auth

Route::prefix('admin')
       ->middleware('auth:admin_user')
       ->namespace('Backend')
       ->name('admin.')
       ->group(function (){
           Route::get('/','PageController@home')->name('home');

           ##admin user management routes
           Route::resource('admin-user','AdminUserController');
           Route::get('admin-user/datatable/ssd','AdminUserController@ssd');

           ##user management routes
           Route::resource('user','UserController');
           Route::get('user/datatable/ssd','UserController@ssd');
});

