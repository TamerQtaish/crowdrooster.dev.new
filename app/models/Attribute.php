<?php

class Attribute extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'attributes';

	public function values()
	{
		return $this->hasMany('attribute_values', 'attribute_id', 'id');
	}

}