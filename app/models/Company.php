<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	static $object_type = [
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
	];

	/**
	 * Access relationship - many to one
	 */	
	public function access() 
	{
		return $this->belongsTo('Access', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Link relationship - one to many
	 */
	public function links() 
	{
		return $this->hasMany('Link', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Address relationship - one to many
	 */
	public function addresses() 
	{
		return $this->hasMany('Address', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Product relationship - one to many
	 */
	public function products()
	{
		return $this->hasMany('Product', 'company_id')->where('soft_deleted', 0);
	}	

	/**
	 * Content relationship - one to many
	 */
	public function contents()
	{
		return $this->hasMany('Content', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}		

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}	
	
	
}