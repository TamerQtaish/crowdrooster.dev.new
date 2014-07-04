<?php

class Content extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

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
	 * Page relationship - many to one
	 */
	public function page()
	{
		return $this->belongsTo('Page', 'object_id')->where('soft_deleted', 0);
	}

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
	
	/**
	 * Return content type Name
	 */
	public function getContentTypeName() 
	{
		return self::$content_type[$this->content_type];
	}
	
	static public function createContent($data = [])
	{
		// create instance of Content
		$content = new Content;

		// set the content fields
		$content->object_id = $data['object_id'];
		$content->object_type = $data['object_type'];
		$content->content_type = $data['content_type'];
		$content->content = $data['content'];

		// save the record to the DB
		$content->save();

		// return the new DB record
		return $content;
	}


}
