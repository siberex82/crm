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
		
	   if( !$_COOKIE['auth']  &&  $_COOKIE['role'] != "root" ){
		   self::auth();
		} 
		
	}
	
	static function auth() {
	    
		$Templater = new Templater();
		$Superquery = new Superquery;
		
	    $Templater->getCoreContent("auth_generator")->CoreReplace()->view();
        
		//$Superquery->getCustom("SELECT * FROM fus_admins")->getArray();
	   
	}
	
	
	
	
    static function view() {
		
	    if( !$_COOKIE['auth']  &&  $_COOKIE['role'] != "root" ){
		   self::auth();
		} 
		
    }
	
}//end class
?>