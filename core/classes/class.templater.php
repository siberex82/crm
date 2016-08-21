<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Templater
/@ Target: 
/@ Method:
/@ Params:  
/* 
*/

class Templater implements IntTemplater {
    
	public $template = "main";
	public $content;
	
	
	
	
	
	
	//---------------------------------- get mask from document
	
	function getContent($template) {
		
		$PathGetContent = ROOT.SEPARATOR."app".SEPARATOR."templates".SEPARATOR.$template.".tpl";
		
		if(file_exists($PathGetContent)) {
		
		$this->content = $TemplateContent = file_get_contents($PathGetContent);
		
		return $this;
		
		} else {
		 throw new Exception("Template {$template} not found");
			}	
			
	}//end function getContent
	
	
	
	
	
	
	
	//---------------------------------- parser for mask 
	function parserMask() {
		
	}//end function parserMask
	
	
	
	
	
	
	
	
	//---------------------------------- replace mask in document
	
	function replace() {
	   
	   $this->content = str_replace("{title}","FUSION",$this->content);
	   
	   $this->content = str_replace("/css/", HOST.SEPARATOR."app".SEPARATOR."includes/css/",$this->content);
	   
	   $this->content = str_replace("/images/",  HOST.SEPARATOR."app".SEPARATOR."includes/images/",$this->content);
	   
	   $this->content = str_replace("/js/",  HOST.SEPARATOR."app".SEPARATOR."includes/js/",$this->content);
	   
	   preg_match_all("|{(.*)}|", $this->content, $out, PREG_PATTERN_ORDER);

	   
	   foreach($out[1] as $key=>$mask){
	
	       $maskArray = explode(",",$mask); 
		   
		   $typeMask = $maskArray[0];
		   $galleryCount = $maskArray[1];
		   $titleMask =  $maskArray[2];
		   $nameMask = $maskArray[3];
		   $idMask = $maskArray[4];
	     
	   }
	   
	   $this->content = str_replace($out[0],"",$this->content);

	   
	   return $this;
	}
	
	
	
	
	
	
	
	
	
	
	//---------------------------------- take in document
	function view() {
	   echo $this->content;
	}//end function view
	
	
	
	
	
	
	
	
	
}//end class



?>