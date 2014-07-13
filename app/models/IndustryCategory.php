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
		return $this->belongsTo('Industry', 'industry_id' , 'id');
	}

}