<?php

class Product extends Eloquent {

	// unsure about media type
	// should we differenciate between media type which could be image, video or document for example
	// then create a file extension type to store gif, jpg, mp4, wmv for example
	// the wording just soudnds strange to me

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * Comment relationship - one to many
	 */
	public function comments()
	{
		return $this->hasMany('Comment', 'object_id')->where('object_type', 3)->where('soft_deleted', 0);
	}

	/**
	 * Media File relationship (videos) - one to one
	 */		
	public function video()
	{
		return $this->hasOne('MediaFile', 'object_id')->where('object_type', 3)->where('media_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Media File relationship (images) - one to many
	 */
	public function images()
	{
		return $this->hasMany('MediaFile', 'object_id')->where('object_type', 3)->where('object_type', 1)->where('soft_deleted', 0);
	}

	/**
	 * Attributes relationship - one to many
	 */	
	public function attributes()
	{
		return $this->hasMany('Attribute', 'product_id')->where('object_type', 3)->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - many to one
	 */	
	public function company()
	{
		return $this->belongsTo('Company', 'company_id')->where('soft_deleted', 0);		
	}

}