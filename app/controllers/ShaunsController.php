<?php

class ShaunsController extends Controller {
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function index()
    {
    	echo '<pre>';

/*    	$obj = Page::find(1);
    	$obj = $obj->content;

    	print_r($obj);
*/

/*    	$obj = Comment::find(1);
    	$obj = $obj->mediaFile;

    	print_r($obj);
*/

/*	   	$obj = MediaFile::find(4);
    	$obj = $obj->user;

    	print_r($obj);
*/

/*	   	$obj = User::find(6);
    	$obj = $obj->comments;

    	print_r($obj);
*/
    	
        $obj = Product::find(1);
        $obj = $obj->shoppingCartAttribute;

        print_r($obj);

    }

}

