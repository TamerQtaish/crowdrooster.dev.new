<?php

class Product extends Eloquent {

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
	 * Media File relationship - one to many
	 */
	public function media()
	{
		return $this->hasMany('MediaFile', 'object_id')->where('object_type', 3)->where('soft_deleted', 0);
	}

}