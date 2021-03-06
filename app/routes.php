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

Route::group(array('before' => 'maintenanceOff'), function() {
	Route::any('/maintenance', 'HomeController@maintenance');
});

Route::group(array('before' => 'maintenanceOn'), function() {
	Route::get('/', 'HomeController@index');
	
	// Testing section for dev
	Route::get('/test', 'TestController@index');
	Route::get('/shaun-test', 'ShaunsController@index');
	
	// User Routes
	Route::get('/user/register', 'UserController@getRegister');
	Route::post('/user/register', 'UserController@postRegister');
	
	Route::get('/user/login', 'UserController@getLogin');
	Route::post('/user/login', 'UserController@postLogin');
	
	Route::any('/user/logout', 'UserController@logout');
	
	Route::get('/user/reset_password/{token}', 'UserController@getResetPassword');
	Route::post('/user/reset_password/{token}', 'UserController@postResetPassword');
	
	Route::get('/user/forgot_password', 'UserController@getForgotPassword');
	Route::post('/user/forgot_password', 'UserController@postForgotPassword');
	
	// Company Routes
	Route::get('/company/register', 'CompanyController@getRegister');
	Route::post('/company/register', 'CompanyController@postRegister');
	
	// Content Routes
	Route::get('/content/view', 'ContentController@getContent');
	Route::post('/content/create', 'ContentController@postContent');
	Route::get('/content/test', 'ContentController@test');
	
	// Admin restricted Pages come in here
	Route::group(array('before' => 'auth|admin'), function() {
		Route::any('/admin', 'AdminController@index');
		Route::any('admin/languages', 'AdminController@languages');
		Route::any('admin/languages/{language}', 'AdminController@languages');
		Route::any('admin/languages/{language}/{file}', 'AdminController@languages');
		Route::any('admin/languages/{language}/{file}/{action}', 'AdminController@languages');
	});
	
	// company restricted Pages come in here
	Route::group(array('before' => 'auth|company'), function() {
		Route::any('/company/admin', 'CompanyController@admin');
	});

});


