<?php

class Generation implements IntGeneration {
  
   public $inputActionMethodName;
   public $inputControllerMethodName;
   public $inputControllerName;
   public $generationControllerContent;
   public $generationActionContent;
  
  
  
  
  function generate($request) {

	   $this->token = $_SESSION['token'];
	   $this->inputControllerName = $request["inputControllerName"];
	   $this->inputControllerName = ucfirst(strtolower($this->inputControllerName));
	   $this->inputControllerMethodName = $request["inputControllerMethodName"];
	   $this->inputActionMethodName = $request["inputActionMethodName"];
	   
	   
	   
	   $this->generationControllerContent = "<?php
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
	   include_once ROOT.SEPARATOR.'core/actions/{$this->inputControllerName}Action.php';
	   echo 'page';
	}
			
} 
		
		
?>";

     
	 
	 
	 
	 
	 $this->generationActionContent = "<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: {$this->inputControllerName}
/@ Target: action page
/@ Method:
/@ Params:   
*/
		
class  {$this->inputControllerName}Action {
		    
	static function _construct() {
		self::view();
	}
	
	
	
	static function view() {
	  
	}
			
} // end class
		
		
?>";




	   
	   $createPathContr = ROOT.SEPARATOR."core/controllers/".$this->inputControllerName."Controller.php";
	   
	   
	   $createPathAct = ROOT.SEPARATOR."core/actions/".$this->inputControllerName."Action.php";
	   
	   
	   if(!file_exists($createPathContr)) {
		   $docOpen = fopen($createPathContr,"w");
		   fwrite($docOpen, $this->generationControllerContent);
		   fclose($docOpen);
	   }
	   
	   
	   if(!file_exists($createPathAct)) {
		   $docOpen = fopen($createPathAct,"w");
		   fwrite($docOpen, $this->generationActionContent);
		   fclose($docOpen);
	   }
	   
  } //end generate()

}// end class


?>