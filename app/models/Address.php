<?php

class Address extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

	static $object_type = [
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
	];

	static $address_type = [
		1 => 'shipping',
		2 => 'billing',
		3 => 'location',
	];

	/**
	 * Define the static vars for the class
	 *
	 *  @var array
	 */
		
	/**
	 * Company relationship - many to one
	 */	
	public function company() 
	{
		return $this->belongsTo('Company', 'object_id')->where('soft_deleted', 0);
	}
		
	/**
	 * User relationship - many to one
	 */	
	public function user() 
	{
		return $this->belongsTo('User', 'object_id')->where('soft_deleted', 0);
	}

	/**
	 * Return object type Name
	 */
	public function getObjectTypeName() 
	{
		return self::$object_type[$this->object_type];
	}

	/**
	 * Return address type Name
	 */
	public function getAddressTypeName() 
	{
		return self::$address_type[$this->address_type];
	}
	
	static public function createAddress($data = [])
	{
		// create instance of Address
		$address = new Address;

		// set the address fields 
		$address->object_id = $data['object_id'];
		$address->object_type = $data['object_type'];
		$address->address_type = $data['address_type'];
		$address->address1 = $data['address_1'];
		$address->address2 = $data['address_2'];
		$address->town = $data['town'];
		$address->zip_post_code = $data['zip_postcode'];
		$address->region_code = $data['region'];
		$address->country_code = $data['country'];

		// save the record to the DB
		$address->save();

		// return the new DB records id
		return $address;
	}
}