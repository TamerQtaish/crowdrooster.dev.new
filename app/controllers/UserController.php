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
				'user_id' => $user->id,
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

	public function getForgotPassword() {
		$input = Input::old();

		return View::make('index', array(
					'title' => Lang::get('user.forgot_password.title')
					))
			->nest('viewBody', 'user.forgot_password', array(
						'input' => $input
						));		
	}


	public function postForgotPassword() {
		$input = Input::all();

		$rules = array('email' => 'required|email');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('user/forgot_password')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validator->errors()
							));
		}	

		// Chjeck if users exists
		$user = User::where('email', $input['email'])
			->where('soft_deleted', '0')
			->first();

		if (empty($user->email)) {
			return Redirect::to('user/forgot_password')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' =>  Lang::get('user.forgot_password.errors.account_not_found')
							));			
		} 

		// Generate a new token
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$user->reset_token = substr(str_shuffle($chars),0,24);
		$user->save();

		$data = array('lang' => Lang::get('emails.forgot_password'),
				'reset_token_url' => url('/user/reset_password/'.$user->reset_token.'-'.$user->id),			  
			     );

		Mail::queue('emails.forgot_password', $data, function($message) use ($user)
				{
				$message->to($user->email, $user->first_name.' '.$user->last_name)->subject(Lang::get('emails.forgot_password.subject'));
				});		

		return Redirect::to('/')->withInput()
			->with('notification', array(
						'type' => 'success',
						'message' =>  Lang::get('user.forgot_password.success')
						));
	}

	/**
	 * Displays the reset password form, if the token is valid
	 *
	 * @param string $token Reset Token
	 * @return Response
	 */
	public function getResetPassword($token) {
		try {
			$tokenParts = explode('-', $token);

			if(!isset($tokenParts[0]) || !isset($tokenParts[1])) {
				return Redirect::to('/')
					->withInput()
					->with('notification', array(
								'type' => 'error',
								'message' => Lang::get('user.reset_password.errors.invalide_token')
								));					
			}


			// Check token is valid
			$user = User::where('id', $tokenParts[1])->where('reset_token', $tokenParts[0])->first();
			if (empty($user->email)) {
				return Redirect::to('/')
					->withInput()
					->with('notification', array(
								'type' => 'error',
								'message' => Lang::get('user.reset_password.errors.invalide_token')
								));					
			}

			// View
			return 	View::make('index', array('title' => Lang::get('interface.reset.title')))
				->nest('viewBody', 'user.reset_password', array(
							'token' => $token
							));
		} catch (Exception $e) {
			// Return to edit
			return Redirect::to('/')
				->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $e->getMessage()
							));
		}
	}	

	/**
	 * Sets a new password
	 *
	 * @param string $token Reset Token
	 * @return Response
	 */
	public function postResetPassword($token) {
		$tokenParts = explode('-', $token);

		if(!isset($tokenParts[0]) || !isset($tokenParts[1])) {
			return Redirect::to('/')
				->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => Lang::get('user.reset_password.errors.invalide_token')
							));					
		}


		// Check token is valid
		$user = User::where('id', $tokenParts[1])->where('reset_token', $tokenParts[0])->first();
		if (empty($user->email)) {
			return Redirect::to('/')
				->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => Lang::get('user.reset_password.errors.invalide_token')
							));					
		}

		// Check passwords match and meet validation criteria
		$rules = array(
				'password' => 'required|min:8|confirmed',
			      );

		$input = Input::all();

		// Test our validation against the form input
		$validation = Validator::make($input, $rules);
		if ($validation->fails()) {
			// Validation error
			return Redirect::to('reset_password/'.$token)
				->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validation->errors()
							));
		}

		// Update password
		$user->password = Hash::make($input['password']);
		$user->reset_token = null;
		$user->save();

		// Redirect
		return Redirect::to('/')
			->withInput()
			->with('notification', array(
						'type' => 'success',
						'message' => Lang::get('user.reset_password.success')
						));

	}	

}
