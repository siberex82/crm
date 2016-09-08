<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Cart
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  CartController {
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
	   include_once ROOT.SEPARATOR.'core/actions/CartAction.php';
	   echo 'page';
	}
			
} 
		
		
?>