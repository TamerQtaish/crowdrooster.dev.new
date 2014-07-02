<?php

class Address extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'addresses';

	static public function createAddress($data = array()){
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