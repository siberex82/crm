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
		
	    $Templater->getContent("main")->replace()->view();
	   
	}
	
}//end class



?>