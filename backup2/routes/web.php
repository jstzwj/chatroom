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
Route::any('upload_image', 'FileController@upload_image');


Route::group(['middleware' => 'IsNotLogin'], function() {

    Route::get('/', 'LoginController@login');

    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@login2');

    Route::get('/register', 'LoginController@register');
    Route::post('/register', 'LoginController@register2');

});

Route::group(['middleware' => 'IsLogin'], function() {

    Route::get('logout', 'LoginController@logout');
    
    Route::group(['prefix' => 'user'], function() {
        
        Route::get('/', 'UserController@user');

        Route::get('/follow', 'UserController@follow');
        Route::get('/unfollow', 'UserController@unfollow');

    });

    Route::group(['prefix' => 'blog'], function() {
        
        Route::group(['prefix' => 'manage'], function() {
        
            Route::get('/write', 'BlogManageController@write');
            Route::post('/write', 'BlogManageController@write2');
        
            Route::get('/draft', 'BlogManageController@draft');

            Route::get('/publish', 'BlogManageController@publish');

            Route::get('/undo', 'BlogManageController@undo');

            Route::get('/delete', 'BlogManageController@delete');
            
            Route::group(['prefix' => 'category'], function() {

                Route::get('/', 'BlogManageController@category');
                Route::post('/add', 'BlogManageController@category_add');
                Route::post('/edit', 'BlogManageController@category_edit');
                Route::get('/delete', 'BlogManageController@category_delete');

            });
            
            Route::get('/comment', 'BlogManageController@comment');
        
        });

        Route::get('/', 'BlogController@blog');

        Route::get('/publish', 'BlogController@publish');

        Route::get('/undo', 'BlogController@undo');

        Route::get('/delete', 'BlogController@delete');

        Route::group(['prefix' => 'comment'], function() {

            Route::post('/', 'BlogController@comment');
            Route::get('/delete', 'CommentController@delete');
            Route::get('/report', 'CommentController@report');
            Route::get('/unreport', 'CommentController@unreport');

        });

        Route::get('/like', 'BlogController@like');
        Route::get('/unlike', 'BlogController@unlike');

    
    });

});


