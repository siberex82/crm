<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Singin
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  SinginController {
		    
	static function _construct() {
		
		if(!$_SESSION['user_auth'] || empty($_SESSION['user_auth']) ) {
		    self::auth();
		}
		if($_SESSION['user_auth'] && $_SESSION['user_auth'] == true ) {}
		
	}
	
	
	
	
	static function auth() {
		
	   $Templater = new Templater();
	   
	   include_once ROOT.SEPARATOR.'core/actions/SinginAction.php';
	   
	   $Templater->getContent("singin")->replace()->view();
	}
			
} 
		
		
?>