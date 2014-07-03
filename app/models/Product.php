<?php

class Product extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	public function comments()
	{
		return $this->hasMany('Comment', 'object_id')->where('object_type', 1)->where('soft_deleted', 0);
	}

	public function media()
	{
		return $this->hasMany('MediaFile', 'object_id')->where('object_type', 1)->where('soft_deleted', 0);
	}

}