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
	
	static function auth() {
	    
		$Templater = new Templater();
		$Superquery = new Superquery;
		
	    $Templater->getCoreContent("auth_generator")->Corereplace()->view();

		//$Superquery->getCustom("SELECT * FROM fus_admins")->getArray();
	   
	}
	
}//end class
?>