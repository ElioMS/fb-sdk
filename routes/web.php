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

Route::get('/login/facebook', 'ServiceController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'ServiceController@handleProviderFacebookCallback');
Route::get('profile', 'ServiceController@profile');
Route::get('groups', 'ServiceController@groups');
Route::post('postfb', 'ServiceController@postGroup');