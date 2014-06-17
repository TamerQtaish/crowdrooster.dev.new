<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	 protected $fillable = ['email',
				'password',
				'first_name',
				'first_name',
				'signup_ip',
				'last_ip',
				'phone',
				''];
	 /*
+----------------+---------------------+------+-----+---------+----------------+
| Field          | Type                | Null | Key | Default | Extra          |
+----------------+---------------------+------+-----+---------+----------------+
| id             | int(12) unsigned    | NO   | PRI | NULL    | auto_increment |
| email          | varchar(60)         | YES  | MUL | NULL    |                |
| password       | varchar(60)         | YES  |     | NULL    |                |
| first_name     | varchar(30)         | YES  |     | NULL    |                |
| last_name      | varchar(30)         | YES  |     | NULL    |                |
| signup_ip      | varchar(30)         | YES  |     | NULL    |                |
| last_ip        | varchar(30)         | YES  |     | NULL    |                |
| last_on        | int(12)             | YES  |     | 0       |                |
| phone          | varchar(30)         | YES  |     | NULL    |                |
| remember_token | varchar(100)        | YES  |     | NULL    |                |
| user_type      | tinyint(3) unsigned | YES  |     | 1       |                |
| t_and_c        | tinyint(3) unsigned | YES  |     | 0       |                |
| require_info   | tinyint(3) unsigned | YES  |     | 0       |                |
| soft_deleted   | tinyint(3) unsigned | YES  |     | 0       |                |
| created_at     | datetime            | NO   |     | NULL    |                |
| updated_at     | datetime            | NO   |     | NULL    |                |
+----------------+---------------------+------+-----+---------+----------------+
	 */
	 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

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
		if($x = is_object(User::where('email', $email)->where('soft_deleted', 0)->first())) {
			return true;
		} else {
			return false;
		}
	}


}
