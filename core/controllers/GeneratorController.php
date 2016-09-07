<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Inspector
/@ Target: clear url route
/@ Method:
/@ Params:  
/* 
*/

class GeneratorController {
	
	
	
	
	static function _construct() {

		   self::auth();	 
		
	}
	
	
	
	
	
	static function auth() {
	    //unset($_SESSION);
		
		$Templater = new Templater();
		$Superquery = new Superquery();
        
        if($_SESSION['auth'] == false){
			$Templater->getCoreContent("auth_generator")->CoreReplace()->view();
		} 
		if($_SESSION['auth'] == true) {
			Redirect::url("generator/view/");
		}
		//$Superquery->getCustom("SELECT * FROM fus_admins")->getArray();
	    
			
			  
	}
	
	
	
	
	function logout() {
	   unset($_SESSION['auth']);
	   Redirect::url("generator/auth/");
	}
	
	
	
    static function view() {
		$Templater = new Templater();
		$Superquery = new Superquery();
		
		
	    if($_SESSION['auth'] == false){
		   self::auth();
		}
		
		if($_SESSION['auth'] == true){
		   $Templater->getCoreContent("page_generator")->CoreReplace()->view();
		}
		
    }
	
	
	
	
	
}//end class
?>