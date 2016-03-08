<?php


Route::get('/', function () {
    return view('pages/welcome');
});

Route::group(['middleware' => ['web']], function () {
    // Authentication Routes...
    Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/home', 'HomeController@index');
    Route::get('/pages', 'PagesController@index');
    Route::get('/add_page', 'AddPageController@index');
});
