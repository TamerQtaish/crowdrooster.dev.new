<?php

class Link extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'links';

	public function createLink($data = array()){

		try{

			// create instance of Link
			$link = new Link;

			// set the link fields
			$link->object_id = $data['object_id'];
			$link->object_type = $data['object_type'];
			$link->link_type = $data['link_type'];
			$link->link = $data['link'];

			// save the record to the DB
			$link->save();

			// return the new DB records id
			return $link;

		}
		catch{
			throw new exception('Your link could not be added');
		}

	}

	static public function editLink($data = array()){

		try{

			// create instance of Link record from DB
			$link = Link::find($data['link_id']);

			// set the link fields
			$link->object_id = $data['object_id'];
			$link->object_type = $data['object_type'];
			$link->link_type = $data['link_type'];
			$link->link = $data['link'];

			// update the record within the DB
			$link->save();			

		}catch{
			throw new exception('Your link could not be updated');
		}

	}

}