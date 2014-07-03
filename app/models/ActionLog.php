<?php

class ActionLog extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'action_logs';

	static $object_type = [	
		1 => 'user',
		2 => 'company',
		3 => 'product',
		4 => 'page',
	];

	/**
	 * User relationship - many to one
	 */	
	public function user() 
	{
		return $this->belongsTo('User', 'user_id');
	}

	static public function createAction($data = [])
	{
		// create instance of ActionLog
		$action = new ActionLog;

		// set the action log fields
		$action->object_id = $data['object_id'];
		$action->object_type = $data['object_type'];
		$action->user_id = $data['user_id'];
		$action->action_key = $data['action_key'];

		// save the record to the DB
		$action->save();

		return $action;
	}

}