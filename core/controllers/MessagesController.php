<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Messages
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  MessagesController {
	
		    
	static function _construct() {
		self::view();
	}
	
	
	
	static function view() {
		$Templater = new Templater();
		$Superquery = new Superquery();
		
	    include_once ROOT.SEPARATOR.'core/actions/MessagesAction.php';
	    
		$Templater->getContent("messages")->replace()->view();
	}
	
	
	
	
	static function closed() {
		$Templater = new Templater();
		$Superquery = new Superquery();
		
	    include_once ROOT.SEPARATOR.'core/actions/MessagesAction.php';
	    
		$Templater->getContent("messages")->replace()->view();
		MessagesAction::closed();
	}
			
} 
		
		
?>