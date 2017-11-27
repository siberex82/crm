<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Settings
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  SettingsController {
	
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
		$Templater = new Templater();
		$Superquery = new Superquery();
		
	   include_once ROOT.SEPARATOR.'core/actions/SettingsAction.php';
	   $Templater->getContent('settings')->replace()->view();
	}
			
} 
		
		
?>