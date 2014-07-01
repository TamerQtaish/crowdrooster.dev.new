<?php

class AddressController extends BaseController{
	
	public function postAddress(){

		$input = Input::all();

		$rules = array(
			'address_type' => 'required',
			'address_1' => 'required',
			'address_2' => 'required',
			'town' => 'required',
			'zip_postcode' => 'required|max:8',
			'region' => 'required|numeric',
			'country' => 'required|numeric'
		);

		$validator = Validator::make($input, $rules);

		if ($validator->fails()) {
			return Redirect::to('address/create')->withInput()
				->with('notification', array(
							'type' => 'error',
							'message' => $validator->errors()
							));
		}
		
		// pass array to create new address
		$createAddress = Address::createAddress($input);

		// set the action log data array
		$actionSettings = array(
			'object_id' => $address->id,
			'object_type' => $address->object_type,
			'user_id' => Auth::user()->id,
			'action_key' => 'address.create'
		);

		// run this function to create new action record in the DB
		$action = ActionLog::createAction($actionSettings);

	}

}