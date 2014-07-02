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
	
	static $object_type = [1 => 'company',
			       ];
		
	static $access_level = [1 => 'readOnly',
				2 => 'readAndWrite',
				3 => 'admin',
				];	

	/**
	 * User relationship - many to one
	 */	
	public function user() {
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Link relationship - one to many
	 */
	public function companies() {
		return $this->hasOne('Company', 'id')->where('soft_deleted', 0);
	}
	
	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() {
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return Access level Name
	 */
	public function getAccessLevelName() {
		return self::$access_level[$this->access_level];
	}
	
	static public function createAccess($data = array()){
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