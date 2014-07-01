<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
View::composer('index', function($view) {

	if (Session::get('notification') != '') {
		$view->nest('viewNotification', 'shared.notification', Session::get('notification'));
	}
});

Route::get('/', 'HomeController@index');

// User Routes

Route::get('/user/register', 'UserController@getRegister');
Route::post('/user/register', 'UserController@postRegister');

Route::get('/user/login', 'UserController@getLogin');
Route::post('/user/login', 'UserController@postLogin');
Route::any('/user/logout', 'UserController@logout');

// Company Routes

Route::get('/company/register', 'CompanyController@getRegister');
Route::post('/company/register', 'CompanyController@postRegister');

// Content Routes

Route::get('/content/view', 'ContentController@getContent');
Route::post('/content/create', 'ContentController@postContent');
Route::get('/content/test', 'ContentController@test');