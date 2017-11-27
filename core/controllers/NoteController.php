<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Note
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  NoteController {
	
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		
	   include_once ROOT.SEPARATOR.'core/actions/NoteAction.php';
	   $Templater->getContent("note_view")->replace()->view();
	}
			
} 
		
		
?>