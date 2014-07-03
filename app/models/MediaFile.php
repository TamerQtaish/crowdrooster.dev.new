<?php

class MediaFile extends Eloquent {

	// unsure about media type
	// should we differenciate between media type which could be image, video or document for example
	// then create a file extension type to store gif, jpg, mp4, wmv for example
	// the wording just soudnds strange to me

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'media_files';

	static $object_type = [	1 => 'user',
					       	2 => 'company',
					       	3 => 'product',
					       	4 => 'page',
	];
	
	static $media_type = [	1 => 'jpg',
							2 => 'jpeg',
			     			3 => 'png',
			     			4 => 'gif',
			     			5 => 'wmv',
			     			6 => 'swf',
			     			7 => 'mp4',
			     			8 => 'mkv',
			     			9 => 'avi'
			     			10 => 'youtube',
			     			11 => 'wistia',
			     			12 => 'vimeo',
	];

	static $usage_type = [	1 => 'profile picture',
							2 => 'cover image',
			     			3 => 'content image',
			     			4 => 'attribute image',
			     			4 => 'comment image',			     			
	];

	/**
	 * Media File relationship (videos) - many to one
	 */
	public function product()
	{
		return $this->belongsTo('Product', 'object_id')->where('object_type', 3)->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - many to one
	 */
	public function company()
	{
		return $this->belongsTo('Company', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * User relationship - many to one
	 */
	public function user()
	{
		return $this->belongsTo('User', 'object_id')->where('object_type', 1)->where('soft_deleted', 0);
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