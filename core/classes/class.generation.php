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
	   
	   
	   
	   include ROOT.SEPARATOR."core/templates/mask_controller.php";

     
	   include ROOT.SEPARATOR."core/templates/mask_action.php";
	 
	 

	   $createPathContr = ROOT.SEPARATOR."core/controllers/".$this->inputControllerName."Controller.php";
	   
	   
	   $createPathAct = ROOT.SEPARATOR."core/actions/".$this->inputControllerName."Action.php";
	   
	   
	   if(!file_exists($createPathContr)) {
		   $docOpenContr = fopen($createPathContr,"w");
		   fwrite($docOpenContr, $this->generationControllerContent);
		   fclose($docOpenContr);
	   }
	   
	   
	   if(!file_exists($createPathAct)) {
		   $docOpenAct = fopen($createPathAct,"w");
		   fwrite($docOpenAct, $this->generationActionContent);
		   fclose($docOpenAct);
	   }
	   
  } //end generate()

}// end class


?>