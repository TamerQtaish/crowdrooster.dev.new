<?php

class Product extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

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
		1 => 'USD',
		2 => 'GBP',
		3 => 'EUR',
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
	public function mediaFile()
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
	 * Return product type Name
	 */
	public function getProductTypeName() 
	{
		return self::$product_type[$this->product_type];
	}	
	
	/**
	 * Return product featured Name
	 */
	public function getProductFeaturedName() 
	{
		return self::$product_featured[$this->product_featured];
	}

	/**
	 * Return product status Name
	 */
	public function getProductStatusName() 
	{
		return self::$product_status[$this->product_status];
	}

	/**
	 * Return currency type Name
	 */
	public function getProductCurrencyName() 
	{
		return self::$currency_id[$this->currency_id];
	}
       
}