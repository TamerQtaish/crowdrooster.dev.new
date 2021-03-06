<?php

class IndustryCategory extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'industry_categories';

	/**
	 * Industry relationship - many to one
	 */
	public function industry()
	{
		return $this->belongsTo('Industry', 'industry_id')->where('soft_deleted', 0);
	}

	/**
	 * Company relationship - one to many
	 */	
	public function company()
	{
		return $this->hasOne('Company', 'industry_category_id')->where('soft_deleted', 0);
	}

}