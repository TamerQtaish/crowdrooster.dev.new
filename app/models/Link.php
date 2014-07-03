<?php

class Link extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'links';
	
	/**
	 * Define the static vars for the class
	 *
	 *  @var array
	 */
	
	static $object_type = [1 => 'user',
			       2 => 'company',
			       ];
	
	static $link_type = [1 => 'facebook',
			     2 => 'twitter',
			     3 => 'linkedIn',
			     4 => 'google+',
			     5 => 'pinterest',
			     6 => 'youtube',
			     7 => 'pressLink',
			     8 => 'homePage',
			     ];
	
	
	/**
	 * Company relationship - many to one
	 */	
	public function company() {
		return $this->belongsTo('Company', 'object_id')->where('soft_deleted', 0);
	}
		
	/**
	 * User relationship - many to one
	 */	
	public function user() {
		return $this->belongsTo('User', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() {
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return link type Name
	 */
	public function getLinkTypeName() {
		return self::$link_type[$this->link_type];
	}
		
	static public function createLink($data = array()){
		// create instance of Link
		$link = new Link;

		// set the link fields
		$link->object_id = $data['object_id'];
		$link->object_type = $data['object_type'];
		$link->link_type = $data['link_type'];
		$link->link = $data['link'];

		// save the record to the DB
		$link->save();

		// return the new DB records id
		return $link;
	}	
}