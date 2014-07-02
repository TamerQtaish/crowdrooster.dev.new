<?php

class Link extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'links';

	static public function createLink($data = array()){
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
}