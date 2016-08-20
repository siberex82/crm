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
	   
	   return $this;
	}
	
	
	
	function view() {
	   echo $this->content;
	}//end function view
	
}//end class



?>