<?php

class Industry extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industries';

	/**
	 * InustryCategory relationship - one to many
	 */
	public function categories()
	{
		return $this->hasMany('IndustryCategory', 'industry_id')->where('soft_deleted', 0);
	}

}