<?php

class Attribute extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attributes';

	/**
	 * Attribute Values relationship - one to many
	 */
	public function values()
	{
		return $this->hasMany('AttributeValue', 'attribute_id')->where('soft_deleted', 0);
	}

	/**
	 * Product relationship - many to one
	 */
	public function product()
	{
		return $this->belongsTo('Attribute', 'product_id')->where('soft_deleted', 0);
	}

}