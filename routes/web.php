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

Route::get('/chat', 'ChatController@chat');


Route::get('/login', 'LoginController@login');
Route::get('/register', function(){
    return view('register');
});
Route::any('/avatar_storage','ChatController@upload_avatar');
Route::any('/register_check', 'RegisterController@register');
Route::any('/login_check', 'LoginController@check');
Route::any('/chat_msg', 'ChatController@sendMsg');
Route::any('/exit', 'ChatController@exit');