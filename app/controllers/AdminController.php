<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index()
	{
            die('you are an admin');
		return $view = View::make('index', array(
					'title' => Lang::get('home.index.title')
					))
			->nest('viewBody', 'home.index', array());
			
		return $view;
	}


	/**
	 * Language section of the admin panel
	 *
	 * @param string $language Language Folder
	 * @return Response
	 */
	public function languages($language = null, $file = null, $action = null) {
		$input = Input::all();

		if(isset($input['language'])) {
		    $language = $input['language'];
		}

		if(isset($input['file'])) {
		    $file = $input['file'];
		}
		
		if($language === null){
			$records = Language::getAvailableLanguages();
			return $view = View::make('index', array(
						'title' => Lang::get('admin.languages.title')
						))
						->nest('viewBody', 'admin.languages', array(
									    'records' => $records
									    ));
		} else {
			if($file === null) {
			    $records = Language::getAvailableLanguageFiles($language);
			    return $view = View::make('index', array(
						    'title' => Lang::get('admin.languages.title')
						    ))
						    ->nest('viewBody', 'admin.languages', array(
										'records' => $records,
										'language' => $language,
										));
			} else {
			    if($language != null && $file != null && $action == 'save') {
				if(Language::updateLanguageFile($language, $file, $input)){
				    return Redirect::to('/admin/languages/'.$language.'/'.$file)
					    ->withInput(['language' => $language])
					    ->with('notification', array(
								    'type' => 'success',
								    'message' => Lang::get('admin.languages.file_success')
								    ));
				}
			    } else {
				return $view = View::make('index', array(
							'title' => Lang::get('admin.edit_language.title')
							))
							->nest('viewBody', 'admin.edit_language', array(
										    'records' => Language::getByLang($language, $file),
										    'language' => $language,
										    'file' => $file,
										    ));
			    }
			}
		}
	}	
}
