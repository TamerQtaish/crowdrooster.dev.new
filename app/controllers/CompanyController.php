<?php

class CompanyController extends BaseController{


	public function admin(){
		echo 'You are a company user';
	}
	
	
	public function getRegister(){

		$input = Input::old();

		return View::make('company.register', array(
					'title' => Lang::get('company.register.title')
					))
			->nest('viewBody', 'company.register', array(
						'input' => $input
						));
	
	}

	public function postRegister(){

		$input = Input::all();

		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'company_name' => 'required',
			'accept_t_and_c' => 'required',
			'password' => 'required|min:8|confirmed',
			'email' => 'required|email|unique:users,email',
			'phone' => 'required|min:11'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('company/register')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validator->errors()
							));
		}

		// create new company 
		$company = new Company;

		// set the the new companies values
		$company->email = $input['email'];
		$company->company_name = $input['company_name'];		
		$company->phone = $input['phone'];
		$company->company_status = 1;

		$company->save();
		// end company creation

		// create access data array
		$accessSettings = array(
			'user_id' => Auth::user()->id,
			'object_id' => $company->id, 
			'object_type' => 1, 
			'access_level' => 3 
		);

		// run access creation function
		$accessCreate = Access::createAccess($accessSettings);

		// set the action log data array
		$actionSettings = array(
			'object_id' => $company->id,
			'object_type' => 1,
			'user_id' => Auth::user()->id,
			'action_key' => 'company.create'
		);

		// run this function to create new action record in the DB
		$action = ActionLog::createAction($actionSettings);

		return View::make('index', array(
					'title' => Lang::get('company.register_success.title')
					))
			->nest('viewBody', 'company.register_success', array());
	}

}