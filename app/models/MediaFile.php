<?php

class MediaFile extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'media_files';

	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
		5 => 'attribute',
	];
	
	static $media_type = [	
		1 => 'image',
		2 => 'video',
	];

	static $usage_type = [	
		1 => 'profile_picture',
		2 => 'cover_image',
		3 => 'content_image',
		4 => 'attribute_image',
		5 => 'comment_image',     			
	];

	/**
	 * Product relationship - one to many
	 */
	public function product()
	{
		return $this->belongsTo('Product', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - one to many
	 */
	public function company()
	{
		return $this->belongsTo('Company', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * User relationship - one to many
	 */
	public function user()
	{
		return $this->belongsTo('User', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Attrbiute Value relationship - one to one
	 */
	public function attributeValue()
	{
		return $this->belongsTo('AttributeValue', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Attrbiute Value relationship - one to one
	 */
	public function comment()
	{
		return $this->belongsTo('Comment', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Return the object type value
 	 */
	public function getObjectType()
	{
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return the media type value
 	 */
	public function getMediaType()
	{
		return self::$media_type[$this->media_type];
	}

	/**
	 * Return the media usage value
 	 */
	public function getUsageType()
	{
		return self::$usage_type[$this->usage_type];
	}

}