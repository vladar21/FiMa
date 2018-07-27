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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::get('/', 'HomeController@index');
Route::get('/verify/{token}', 'AuthController@verify');

Route::group(['middleware'=>'guest'], function(){
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@store');
    Route::get('login', 'AuthController@loginForm');
    Route::post('login', 'AuthController@login'); 
    
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('logout', 'AuthController@logout');
});

// Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function()
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function()
{
    Route::get('/', 'DashboardController@index');
    Route::resource('/users', 'UsersController');
    Route::resource('/files', 'FilesController');    
    #route to download file
    Route::get('uploads/{filename}', ['as' => 'download', 'uses' => 'FilesController@download']);    
});
