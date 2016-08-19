<?php

class initSystem {
   
   public $initList = array(
          
		  "init"=>"loader",
		  "cnf"=>"sql",
		  "cnf"=>"system",
		  "parents"=>"MainInterface",
		  "core/classes"=>"class.authorisated",
		  "core/classes"=>"class.templater",
		  "core/plugins"=>"dbQueryConstructor_plugin",
		  "core/plugins"=>"logger_plugin",
		  "core/plugins"=>"sourceInspector_plugin",
		  "router"=>"router"
		  
   );
   
   
   

   
   
   
   
   
   function init() {
	  
	  
	  foreach($this->initList as $dir=>$file) {
	      
		  if(file_exists($_SERVER['DOCUMENT_ROOT']."/".$dir."/".$file.".php")){
		   
		     include_once $_SERVER['DOCUMENT_ROOT']."/".$dir."/".$file.".php";
		  
		  }  
		  
	   }
	  
   }
   
   
   
   
}



$initSystem = new initSystem();

?>