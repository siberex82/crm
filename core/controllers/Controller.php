<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: 
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  Controller {
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
	   include_once ROOT.SEPARATOR.'core/actions/Action.php';
	   echo 'page';
	}
			
} 
		
		
?>