<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	static $object_type = [
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Link relationship - one to many
	 */
	public function links() 
	{
		return $this->hasMany('Link', 'object_id')->where('object_type', 1)->where('soft_deleted', 0);
	}

	/**
	 * Action Log relationship - one to many
	 */
	public function actionLogs() 
	{
		return $this->hasMany('ActionLog', 'user_id');
	}
	
	/**
	 * Address relationship - one to many
	 */
	public function addresses() 
	{
		return $this->hasMany('Address', 'object_id')->where('object_type', 1)->where('soft_deleted', 0);
	}
	
	/**
	 * Access relationship - one to many
	 */
	public function access() 
	{
		return $this->hasMany('Access', 'user_id')->where('soft_deleted', 0);
	}
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Check if the email is already used.
	 *
	 * @return boal
	 */
	static public function checkEmailExists($email)
	{
		if(is_object(User::where('email', $email)->where('soft_deleted', 0)->first())) {
			return true;
		} else {
			return false;
		}
	}
}
