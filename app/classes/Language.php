<?php
class Language {
	/**
	 * Scans the app/lang folder, listing each subdirectory
	 *
	 * @return array Languages
	 */
	static public function getAvailableLanguages() {
		$langs = [];
		if ($handle = opendir(app_path().'/lang')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry == '.') continue;
				if ($entry == '..') continue;
				if (is_dir(app_path().'/lang/'.$entry)) {
					$langs[] = $entry;
				}
			}
		}	

		return $langs;
	}

	/**
	 * Scans the app/lang folder, listing each subdirectory
	 *
	 * @return array Languages
	 */
	static public function getAvailableLanguageFiles($language = []) {
		$files = [];
		if ($handle = opendir(app_path().'/lang/'.$language)) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry == '.') continue;
				if ($entry == '..') continue;
				if (!is_dir(app_path().'/lang/'.$language.'/'.$entry)) {
					$files[] = $entry;
				}
			}
		}	

		return $files;
	}

	
	
	/**
	 * Returns the array of language strings for the given language index
	 *
	 * @param int $lang Language Folder
	 */
	static public function getByLang($language, $filen) {
		$file = app_path().'/lang/'.$language.'/'.$filen;
		$records = include $file;
		return $records;
	}

	/**
	 * Writes strings the language file for the given language
	 *
	 * @param string $lang Language (en)
	 * @param array $contentArr Language String Array
	 */
	static public function updateLanguageFile($language, $filen,  $contentArr) {
		$file = app_path().'/lang/'.$language.'/'.$filen;
		File::put($file, '<?php return '.var_export($contentArr,true).';');
                return true;
	}
        
        /**
	 * Adds a field int the language list
	 *
	 * @param 
	 * @return Response
	 */
	static public function addLanguageField($lang, $file, $field) {

                $array = Lang::get($file);
                $keys_array = explode('.', $field);
                $countDots = count($keys_array, COUNT_RECURSIVE);
                if($countDots <= 3){
                        if($countDots > 0){
                                if(!array_key_exists($keys_array[0], $array))
                                        $array[$keys_array[0]] = array();
                                if ($countDots > 1){
                                        if(!array_key_exists($keys_array[1], $array[$keys_array[0]])){
                                                $array[$keys_array[0]][$keys_array[1]] =  ($countDots == 2) ? '' : array();
                                        }


                                        if ($countDots > 2){
                                                $ar = $array[$keys_array[0]][$keys_array[1]];
                                                if(is_array($ar)){
                                                        if(!array_key_exists($keys_array[2], $ar))
                                                                $array[$keys_array[0]][$keys_array[1]][$keys_array[2]] = '';
                                                } else {
                                                        $array[$keys_array[0]][$keys_array[1]] = array();
                                                        $array[$keys_array[0]][$keys_array[1]][$keys_array[2]] = '';
                                                }
                                        }
                                }
                        }
                        Language::updateLanguageFile($lang, $file, $array);
                      return true; 
                }
                return false;
	}
}