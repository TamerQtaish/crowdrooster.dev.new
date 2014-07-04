<?php

class Comment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];

	/**
	 * Product relationship - many to one
	 */
	public function product()
	{
		return $this->belongsTo('Product', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - many to one
	 */
	public function company()
	{
		return $this->belongsTo('Company', 'object_id')->where('soft_deleted', 0);
	}	

	/**
	 * User relationship - many to one
	 */
	public function user()
	{
		return $this->belongsTo('User', 'object_id')->where('soft_deleted', 0);
	}	

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}

}