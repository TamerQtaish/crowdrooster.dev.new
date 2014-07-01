<?php

class Content extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

	static public function createContent($data = array()){

		if(is_object($data)){

			// create instance of Content
			$content = new Content;

			// set the content fields
			$content->object_id = $data['object_id'];
			$content->object_type = $data['object_type'];
			$content->content_type = $data['content_type'];
			$content->content = $data['content'];

			// save the record to the DB
			$content->save();

			// return the new DB record
			return $content;

		}else{
			return 'Your content could not be added';
		}

	}

	static public function editContent($data = array()){

		if(is_object($data)){

			// create instance of Content
			$content = Content::find($data['content_id']);

			// set the content fields
			$content->object_id = $data['object_id'];
			$content->object_type = $data['object_type'];
			$content->content_type = $data['content_type'];
			$content->content = $data['content'];

			// update the record within the DB
			$content->save();

			return $content;

		}else{
			return 'Your content could not be updated';
		}

	}

}
