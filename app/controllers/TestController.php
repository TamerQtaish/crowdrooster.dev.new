<?php

class TestController extends Controller {
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function index()
    {
          //  echo '<pre>';            

            /*
            // Links test
            
            $company = Company::find(1);
            
            print_r($company->links);

            foreach($company->links AS $link) {
               echo $link->getObjectTypeName();
               echo '-----';
               echo $link->getLinkTypeName(); 
            }
            
            $user = User::find(1);
            
            print_r($user->links);
            
            */
            
            /*
            // Address test
            
            $user = User::find(1);
            
            foreach($user->addresses AS $address) {
                
                print_r($address);
                
                echo $address->getAddressTypeName();
            }
            */

            /*
            // Test Access
            $user = User::find(1);
            
            foreach($user->access AS $access) {
                
                print_r($access->companies);
                
                echo $access->getAccessLevelName();
            }
            */
            
        //    $user = User::find( Auth::user()->id );
        //    print_r($user->actionLogs);

	    /*
	     // Test user action logs 
            $user = User::find(1);
            print_r($user->actionLogs);
            */
	    
	    
	/*    $data = ['name'=>'tamer'];
	    
	    Mail::queue('emails.welcome', $data, function($message)
	    {
		$message->to('TamerQtaish@gmail.com', 'Tamer Qtaish')->subject('Welcome!');
	    });	    
	*/
	
	
	print_r(Language::getAvailableLanguages());
    }
}
