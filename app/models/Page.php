<?php

class Page extends Eloquent{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];

	static $content_type = [
		1 => 'description',
		2 => 'shipping_info',
	];
	
	/**
	 * Content relationship - one to one
	 */
	public function contents()
	{
		return $this->hasOne('Content', 'object_id')->where('object_type', 4)->where('content_type', 1)->where('soft_deleted', 0);
	}

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return content type Name
	 */
	public function getContentTypeName() 
	{
		return self::$content_type[$this->content_type];
	}

}