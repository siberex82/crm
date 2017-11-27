<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Usercontrol
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  UsercontrolController {
	
		    
	static function _construct() {
		self::userview();
	}
	
	static function userview() {
        $Templater = new Templater();
		$Superquery = new Superquery;
		
		include ROOT.SEPARATOR.'core/actions/UsercontrolAction.php';
		
		$Templater->getContent("usercontrol_view")->replace()->view();
	    UsercontrolAction::_construct();
	   
	}
	
	
	static function useradd() {
		$Templater = new Templater();
		$Superquery = new Superquery;
		include ROOT.SEPARATOR.'core/actions/UsercontrolAction.php';
		$Templater->getContent("usercontrol_add")->replace()->view();
	    
	}
	
	
   static function useredit() {
	   $Templater = new Templater();
	   $Superquery = new Superquery;
	   include ROOT.SEPARATOR.'core/actions/UsercontrolAction.php';
	   $Templater->getContent("usercontrol_edit")->replace()->view();
	   
   }
   
   
   static function trash() {
	   $Templater = new Templater();
	   $Superquery = new Superquery;
	   include ROOT.SEPARATOR.'core/actions/UsercontrolAction.php';
	   $Templater->getContent("usercontrol_view")->replace()->view();
	   UsercontrolAction::trash();
   }
   
   
   		
} 
		
		
?>