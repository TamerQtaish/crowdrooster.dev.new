<?php

class Access extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'access';

	static public function createAccess($data = array()){

		if(is_object($data)){

			// create instance of Access
			$access = new Access;

			// set the access fields
			$access->user_id = $data['user_id'];
			$access->object_id = $data['object_id'];
			$access->object_type = $data['object_id'];
			$access->access_level = $data['access_level'];

			// save the record to the DB
			$access->save();

			// return the new DB record
			return $access;

		}else{
			throw new exception('Your access could not be granted');
		}

	}

	static public function editAccess($data = array()){

		if(is_object($data)){

			// create instance of Access
			$access = Access::find($data['access_id']);

			// set the access fields
			$access->user_id = $data['user_id'];
			$access->object_id = $data['object_id'];
			$access->object_type = $data['object_id'];
			$access->access_level = $data['access_level'];

			// update the record within the DB
			$access->save();

		}else{
			throw new exception('Your access could not be changed');
		}

	}

}