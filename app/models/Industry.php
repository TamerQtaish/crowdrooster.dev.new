<?php

class Industry extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industries';

	public function categories()
	{
		return $this->hasMany('industry_categories', 'id', 'industry_id');
	}

}