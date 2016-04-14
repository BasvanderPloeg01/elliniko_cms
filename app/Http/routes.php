<?php

Route::get('/', function () {
    return view('pages/welcome');
});

Route::get('/welcome', function () {
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

    $this->post('add_page', 'AddPageController@add_page');
    $this->post('edit_page', 'EditPageController@edit_page');

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/pages', 'PagesController@index');
    Route::get('/add_page', 'AddPageController@index');
    Route::get('/edit_page', 'EditPageController@index');
    Route::get('/categories','CategoriesController@index');
    Route::get('/add_categories','AddCategoriesController@index');
    Route::get('/usermanagement', 'UsermanagementController@index');
    Route::get('/add_moderator', 'AddModeratorController@index');
    Route::get('/stylesheets', 'StylesheetsController@index');
    Route::get('/edit_code', 'EditCodeController@index');
    Route::get('/edit_title', 'EditTitleController@index');
    
    Route::post('/categories', 'CategoriesController@delete_category');
    Route::post('/add_categories', 'AddCategoriesController@add_category');
    Route::post('/pages', 'PagesController@delete_page');
    Route::post('/usermanagement', 'UsermanagementController@change_role');
    Route::post('/add_moderator', 'AddModeratorController@add_moderator');
    Route::post('/edit_code', 'EditCodeController@edit');
    Route::post('/edit_title', 'EditTitleController@edit_title');
});




