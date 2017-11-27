<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Inspector
/@ Target: clear url route
/@ Method:
/@ Params:  
/* 
*/

class MainController {
	static function _construct() {
	  
	  self::main();
	}
	
	
	static function main() {
	    
		$Templater = new Templater();
		$Superquery = new Superquery;
		
		
		include_once ROOT.SEPARATOR.'core/actions/MessagesAction.php';
			
	    $Templater->getContent("messages")->replace()->view();
        
	
		//$Superquery->getCustom("SELECT * FROM fus_admins")->getArray();
	   
	}
	
	static function logout() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		
		
			
	    $Templater->getContent("homepage")->replace()->view();
        
		unset($_SESSION['user']);
		$_SESSION['user_auth'] = false;
		Redirect::url("main/");
	}
	
}//end class



?>