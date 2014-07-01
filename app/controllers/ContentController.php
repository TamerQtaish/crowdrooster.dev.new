<?php

class ContentController extends BaseController{

	public function getContent(){

		$input = Input::old();

		return View::make('index', array(
					'title' => Lang::get('content.create.title')
					))
			->nest('viewBody', 'content.create', array(
						'input' => $input
						));

	}

	public function postContent(){

		// get ajax content data array
		$contentData = Input::all();
		// set rules for $content_data array
		$rules = array(
			'object_id' => 'required|numeric',
			'object_type' => 'required',
			'content' => 'required',
			'content_type' => 'required|numeric',
			'exists' => 'required|numeric',
			'content_id' => 'required'
		);

		// validate $contentData array with $rules
		$validation = Validator::make($contentData, $rules);
		
		if($validation->fails()){
			// return an error message in here 
		}

		// determine whether this content already exists (1) the record can be updated
		// or whether this is a new piece of content (0) and a new record can be inserted
		if( $contentData['exists'] == 1 ){
			$content = Content::editContent($contentData);
			$actionType = 'content.edit';
		}else{
			$content = Content::createContent($contentData);
			$actionType = 'content.create';
		}

		// set the action log data array
		$actionSettings = array(
			'object_id' => $content->id,
			'object_type' => 1,
			'user_id' => Auth::user()->id,
			'action_key' => $actionType
		);

		// run this function to create new action record in the DB
		$action = ActionLog::createAction($actionSettings);

		// return object
		return $content;

	}

}