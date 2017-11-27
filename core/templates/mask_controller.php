<?php $this->generationControllerContent = "<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: {$this->inputControllerName}
/@ Target: controller page
/@ Method:
/@ Params:   
*/
		
class  {$this->inputControllerName}Controller {
	
		    
	static function _construct() {
		self::view();
	}
	
	static function view() {
		//$Templater = new Templater();
		//$Superquery = new Superquery;
		
	   include_once ROOT.SEPARATOR.'core/actions/{$this->inputControllerName}Action.php';
	   
	   $Templater->getContent('')->replace()->view();
	   echo 'page';
	}
			
} 
		
		
?>";
?>