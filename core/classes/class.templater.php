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
	
	
	
	
	function getCoreContent($template) {
		$CorePathTemplates = ROOT.SEPARATOR."core".SEPARATOR."templates";
		
		if(file_exists($CorePathTemplates.SEPARATOR.$template.".tpl")) {
		   $this->content = file_get_contents($CorePathTemplates.SEPARATOR.$template.".tpl");
		} else {
		
		   throw new Exception("Error ! Template {$template} not found");	
		
		}
		
		return $this;
	}
	
	
	
	
	
	
	function CoreReplace() {
	   
	   $this->content = str_replace("{title}","FUSION",$this->content);
	   
	   $this->content = str_replace("css/", HOST.SEPARATOR."core".SEPARATOR."templates/css/",$this->content);
	   
	   $this->content = str_replace("images/",  HOST.SEPARATOR."core".SEPARATOR."templates/images/",$this->content);
	   
	   $this->content = str_replace("js/",  HOST.SEPARATOR."core".SEPARATOR."templates/js/",$this->content);
	   
	   $this->content = str_replace("fonts/",  HOST.SEPARATOR."core".SEPARATOR."templates/fonts/",$this->content);
	   
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
	
	
	
	
	
	//---------------------------------- get mask from document
	
	function getContent($template) {
		
		$MainGetContent = ROOT.SEPARATOR."app".SEPARATOR."templates".SEPARATOR."main.tpl";
		
		$PathGetContent = ROOT.SEPARATOR."app".SEPARATOR."templates".SEPARATOR.$template.".tpl";
		
		if(file_exists($MainGetContent)) {
		
		$this->content = $MainGetContent = file_get_contents($MainGetContent);
		
		if(file_exists($PathGetContent)) {
		
		  $PathGetContent = file_get_contents($PathGetContent);
		  
		  $this->content = str_replace("{content}", $PathGetContent, $MainGetContent);
		
		} else {
		  throw new Exception("Template {$template} not found!");	
		}
		
		return $this;
		
		} else {
		 throw new Exception("Template main not found");
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
	   
	   $this->content = str_replace("/fonts/",  HOST.SEPARATOR."app".SEPARATOR."includes/fonts/",$this->content);
	   
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