<?php

class AttributeValue extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attribute_values';

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
	public function attribute()
	{
		return $this->belongsTo('Attribute', 'attribute_id');
	}

	/**
	 * Media File relationship - one to one
 	 */
	public function media()
	{
		return $this->hasOne('MediaFile', 'object_id')->where('object_type', 5)->where('soft_deleted', 0);
	}

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}	
	
}