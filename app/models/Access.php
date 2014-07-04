<?php

class Access extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access';

	/**
	 * Define the static vars for the class
	 *
	 *  @var array
	 */
	
	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];
		
	static $access_level = [
		1 => 'read_only',
		2 => 'read_and_write',
		3 => 'admin',
	];	

	/**
	 * User relationship - many to one
	 */	
	public function user() 
	{
		return $this->belongsTo('User', 'user_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - one to one
	 */
	public function company() 
	{
		return $this->belongsTo('Company', 'object_id')->where('soft_deleted', 0);
	}
	
	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return Access level Name
	 */
	public function getAccessLevelName() 
	{
		return self::$access_level[$this->access_level];
	}
	
	static public function createAccess($data = [])
	{
		// create instance of Access
		$access = new Access;

		// set the access fields
		$access->user_id = $data['user_id'];
		$access->object_id = $data['object_id'];
		$access->object_type = $data['object_id'];
		$access->access_level = $data['access_level'];

		// save the record to the DB
		$access->save();

		// return the new DB record
		return $access;
	}

}