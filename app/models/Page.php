<?php

class Page extends Eloquent{
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * Content relationship - one to one
	 */
	public function contents()
	{
		return $this->hasOne('Content', 'object_id')->where('object_type', 4)->where('content_type', 1)->where('soft_deleted', 0);
	}
	
}