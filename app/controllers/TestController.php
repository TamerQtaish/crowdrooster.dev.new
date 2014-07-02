<?php

class TestController extends Controller {
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function index()
	{
            echo '<pre>';            
            $company = Company::find(1);
            
            print_r($company->links);

            foreach($company->links AS $link) {
               echo $link->getObjectTypeName();
               echo '-----';
               echo $link->getLinkTypeName(); 
            }
            
            $user = User::find(1);
            
            print_r($user->links);
            
            

	}
}
