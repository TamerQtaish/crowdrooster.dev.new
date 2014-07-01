<?php

class IndustryCategory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industry_categories';

	public function industry()
	{
		return $this->belongsTo('industries', 'industry_id' , 'id');
	}

}