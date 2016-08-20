<?php

/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: InitSystem 
/@ Initialisation files system
/@ Method:init()
/@ Params: $initList is array key(dirname)=>val(fileName !not extension) 
/* 
*/


class initSystem {
   
   
   
   public $pathList;
   public $initList = array();
   
   
   
   
   
   
   
   function getList() {
	   
		 $this->pathList = file_get_contents($_SERVER['DOCUMENT_ROOT']."/init/path.ini");
		 
		 $this->initList = explode(",",$this->pathList);
		 

		 return $this->initList;
   }
   
   

   
   
   
   function init() {
	      
		  foreach($this->getList() as $key=>$file) {
	          $file = trim($file);
			 
			  if(file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
				
				 include_once $_SERVER['DOCUMENT_ROOT'].$file;
			   
			  }else{ 

				 throw new Exception("<span>Initialisation Error, not found : ".$file."</span>");
				 
			  }
	
		   }
	   
	   //$this->getFakeFiles(); 
   }
   
   
   
   
}//end class



$initSystem = new initSystem();

?>