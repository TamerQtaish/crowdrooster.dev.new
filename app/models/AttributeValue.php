<?php

class AttributeValue extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attribute_values';

	public function attribute()
	{
		return $this->belongsTo('Attribute', 'attribute_id', 'id');
	}

}