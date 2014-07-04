<?php

class Product extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];

	static $product_type = [
		1 => 'pre_order',
		2 => 'shop_ready',
	];

	static $product_featured = [
		1 => 'not_featured',
		2 => 'featured',
	];

	static $product_status = [	
		1 => 'draft',
		2 => 'pending',
		3 => 'rejected',
		4 => 'approved',
	];

	static $currency_id = [	
		1 => 'usd',
		2 => 'gbp',
		3 => 'eur',
	];

	/**
	 * Comment relationship - one to many
	 */
	public function comments()
	{
		return $this->hasMany('Comment', 'object_id')->where('object_type', 3)->where('soft_deleted', 0);
	}
        
	/**
	 * Media File relationship - one to many
 	 */
	public function media()
	{
		return $this->hasMany('MediaFile', 'object_id')->where('object_type', 3)->where('soft_deleted', 0);
	}

	/**
	 * Attributes relationship - one to many
	 */	
	public function attributes()
	{
		return $this->hasMany('Attribute', 'product_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - many to one
	 */	
	public function company()
	{
		return $this->belongsTo('Company', 'company_id')->where('soft_deleted', 0);
	}

	/**
	 * Content relationship - one to many
	 */	
	public function contents()
	{
		return $this->hasMany('Content', 'object_id')->where('object_type', 3)->where('content_type', 1)->where('soft_deleted', 0);
	}

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return Media type Name
	 */
	public function getMediaTypeName() 
	{
		return self::$media_type[$this->media_type];
	}

	/**
	 * Return usage type Name
	 */
	public function getUsageTypeName() 
	{
		return self::$usage_type[$this->usage_type];
	}

        
        
}