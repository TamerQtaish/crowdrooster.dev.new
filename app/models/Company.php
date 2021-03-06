<?php

class Company extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	static $company_status = [	
		1 => 'inactive',
		2 => 'active',
		3 => 'partner',
	];

	static $currency_id = [	
		1 => 'USD',
		2 => 'GBP',
		3 => 'EUR',
	];

	/**
	 * Access relationship - many to one
	 */	
	public function access() 
	{
		return $this->hasMany('Access', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Link relationship - one to many
	 */
	public function links() 
	{
		return $this->hasMany('Link', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Address relationship - one to many
	 */
	public function addresses() 
	{
		return $this->hasMany('Address', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}

	/**
	 * Product relationship - one to many
	 */
	public function products()
	{
		return $this->hasMany('Product', 'company_id')->where('soft_deleted', 0);
	}	

	/**
	 * Content relationship - one to many
	 */
	public function contents()
	{
		return $this->hasMany('Content', 'object_id')->where('object_type', 2)->where('content_type', 1)->where('soft_deleted', 0);
	}		

	/**
	 * Comment relationship - one to many
	 */
	public function comments()
	{
		return $this->hasMany('Comment', 'object_id')->where('object_type', 2)->where('soft_deleted', 0);
	}		
	
	/**
	 * Return company status Name
	 */
	public function getCompanyStatusName() 
	{
		return self::$company_status[$this->company_status];
	}

	/**
	 * Return currency type Name
	 */
	public function getCompanyCurrencyName() 
	{
		return self::$currency_id[$this->currency_id];
	}

}