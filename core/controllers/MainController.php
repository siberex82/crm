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
	
	static function main() {
	    
		$Templater = new Templater();
		$Superquery = new Superquery;
		
		
	    $Templater->getContent("homepage")->replace()->view();

		$Superquery->getCustom("SELECT * FROM fus_admins")->getArray();
	   
	}
	
}//end class



?>