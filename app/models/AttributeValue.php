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
	public function mediaFile()
	{
		return $this->hasOne('MediaFile', 'object_id')->where('object_type', 5)->where('soft_deleted', 0);
	}
	
	/**
	 * Shopping Cart Attribute relationship - many to one
 	 */
	public function shoppingCartAttribute()
	{
		return $this->belongsTo('ShoppingCartAttribute', 'id')->where('soft_deleted', 0);
	}

}