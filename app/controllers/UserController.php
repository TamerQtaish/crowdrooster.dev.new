<?php

class UserController extends BaseController {

	public function getRegister()
	{
		$input = Input::old();

		return View::make('index', array(
					'title' => Lang::get('user.register.title')
					))
			->nest('viewBody', 'user.register', array(
						'input' => $input
						));
	}

	public function PostRegister()
	{
		$input = Input::all();

		$rules = array('first_name' => 'required',
				'last_name' => 'required',
				'accept_t_and_c' => 'required',
				'password' => 'required|min:8|confirmed',
				'email' => 'required|email|unique:users,email'
			      );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('user/register')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validator->errors()
							));
		}

		if(User::checkEmailExists($input['email'])) {
			return Redirect::to('user/register')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => Lang::get('user.register.errors.email_used')
							));                            
		}

		$user = new User;
		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->phone = $input['phone'];
		$user->t_and_c = (isset($data['accept_t_and_c'])) ? 1 : 0;
		$user->signup_ip = Request::getClientIp();

		$user->save();

		// set the action log data array
		$action_settings = array(
			'object_id' => $user->id,
			'object_type' => $user->object_type,
			'user_id' => Auth::user()->id,
			'action_key' => 'user.create'
		);

		// run this function to create new action record in the DB
		$action = ActionLog::createAction($action_settings);

		return View::make('index', array(
					'title' => Lang::get('user.register_success.title')
					))
			->nest('viewBody', 'user.register_success', array());
	}

	public function getLogin()
	{
		$input = Input::old();

		return View::make('index', array(
					'title' => Lang::get('user.login.title')
					))
			->nest('viewBody', 'user.login', array(
						'input' => $input
						));
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('password' => 'required|min:8',
				'email' => 'required|email'
			      );

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('user/login')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validator->errors()
							));
		}

		if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password']), (isset($input['remember_me']) ? 1 : 0))) {
			$user = Auth::user();
			$user->last_on = time();
			$user->save();

			return Redirect::to('/');
		} else {
			return Redirect::to('/user/login')->with('notification', array(
						'type' => 'error',
						'message' => Lang::get('user.login.error')
						));
		}
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}
}
