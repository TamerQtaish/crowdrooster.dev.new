<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	public function links()
	{
		return $this->hasMany('links', 'id', 'object_id');
	}

	public function users()
	{
		return $this->hasMany('users');
	}

}