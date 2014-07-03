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
	];

	static public function createContent($data = array()){
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

	// content types - 1 = company content, 2 = page content, 3 = user content & 4 = product content

	/**
	 * Page relationship - many to one
	 */
	public function page()
	{
		return $this->belongsTo('Page', 'object_id')->where('object_type', 4)->where('content_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Product relationship - many to one
	 */
	public function product()
	{
		return $this->belongsTo('Product', 'object_id')->where('object_type', 3)->where('content_type', 4)->where('soft_deleted', 0);
	}	

	/**
	 * Company relationship - many to one
	 */
	public function company()
	{
		return $this->belongsTo('Company', 'object_id')->where('object_type', 2)->where('content_type', 1)->where('soft_deleted', 0);
	}	

	/**
	 * User relationship - many to one
	 */
	public function user()
	{
		return $this->belongsTo('User', 'object_id')->where('object_type', 1)->where('content_type', 3)->where('soft_deleted', 0);
	}	

}
