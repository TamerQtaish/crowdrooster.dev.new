<?php

class Industry extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industries';

	/**
	 * Inustry Category relationship - one to many
	 */
	public function categories()
	{
		return $this->hasMany('IndustryCategory', 'industry_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - one to many
	 */	
	public function company()
	{
		return $this->hasOne('Company', 'industry_id')->where('soft_deleted', 0);
	}

}