<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index()
	{
            die('you are an admin');
		return $view = View::make('index', array(
					'title' => Lang::get('home.index.title')
					))
			->nest('viewBody', 'home.index', array());
			
		return $view;
	}

}
