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
	
	
	
	
	
	function getContent($template) {
		
		$PathGetContent = ROOT.SEPARATOR."app".SEPARATOR."templates".SEPARATOR.$template.".tpl";
		
		if(file_exists($PathGetContent)) {
		
		$this->content = $TemplateContent = file_get_contents($PathGetContent);
		
		return $this;
		
		} else {
		 throw new Exception("Template {$template} not found");
			}	
			
	}//end function getContent
	
	
	
	
	
	
	function replace() {
	   
	   $this->content = str_replace("{title}","Мой сайт",$this->content);
	   
	   $this->content = str_replace("/css/", "http://".$_SERVER['HTTP_HOST'].SEPARATOR."app".SEPARATOR."includes/css/",$this->content);
	   
	   $this->content = str_replace("/images/", "http://".$_SERVER['HTTP_HOST'].SEPARATOR."app".SEPARATOR."includes/images/",$this->content);
	   
	   $this->content = str_replace("/js/", "http://".$_SERVER['HTTP_HOST'].SEPARATOR."app".SEPARATOR."includes/js/",$this->content);
	   
	   preg_match_all("|{(.*)}|", $this->content, $out, PREG_PATTERN_ORDER);
	   
	   foreach($out as $key=>$mask){
	     foreach($mask as $key=>$mask2){
	      var_dump($mask2);
	     }
	   }
	   
	   $this->content = str_replace("{gallery,4,Название блока, Название поля}","",$this->content);
	   
	   return $this;
	}
	
	
	
	
	
	
	function view() {
	   echo $this->content;
	}//end function view
	
	
	
	
}//end class



?>