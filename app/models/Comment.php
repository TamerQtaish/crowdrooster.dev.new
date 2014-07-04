<?php

class Comment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

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
		return $this->belongsTo('User', 'user_id')->where('soft_deleted', 0);
	}	

	/**
	 * Media File relationship - many to one
	 */
	public function mediaFile()
	{
		return $this->hasMany('MediaFile', 'object_id')->where('usage_type', 5)->where('soft_deleted', 0);
	}

}