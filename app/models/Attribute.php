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
		return $this->hasMany('AttributeValue', 'attribute_id')->where('soft_deleted', 0);
	}

}