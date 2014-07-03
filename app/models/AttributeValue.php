<?php

class AttributeValue extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attribute_values';

	/**
	 * Product relationship - many to one
	 */
	public function attribute()
	{
		return $this->belongsTo('Attribute', 'attribute_id');
	}

	/**
	 * Media File relationship - one to one
 	 */
	public function media()
	{
		return $this->hasOne('MediaFile', 'media_file_id')->where('soft_deleted', 0);
	}

}