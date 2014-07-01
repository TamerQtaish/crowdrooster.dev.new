<?php

class ActionLog extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'action_logs';

	static public function createAction($data = array()){

		if(is_object($data)){

			// create instance of ActionLog
			$action = new ActionLog;

			// set the action log fields
			$action->object_id = $data['object_id'];
			$action->object_type = $data['object_type'];
			$action->user_id = Auth::user()->id;
			$action->action_key = $data['action_key'];

			// save the record to the DB
			$action->save();

			return $action;

		}else{
			throw new exception('Your action could not be logged');
		}

	}

}