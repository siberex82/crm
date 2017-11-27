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
	public $token;
	
	
	
	
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
	  
	   
	   $this->content = str_replace("{message}",  "",$this->content);
	   
	   
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
		  
	  
	   
	   $this->content = str_replace("{message}",  $_SESSION['error_message'],$this->content);
	   
		
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
	   
	   $this->content = str_replace("{title}","CRM",$this->content);
	   
	   $this->content = str_replace("/css/", HOST.SEPARATOR."app".SEPARATOR."includes/css/",$this->content);
	   
	   $this->content = str_replace("/images/",  HOST.SEPARATOR."app".SEPARATOR."includes/images/",$this->content);
	   
	   $this->content = str_replace("/js/",  HOST.SEPARATOR."app".SEPARATOR."includes/js/",$this->content);
	   
	   $this->content = str_replace("/fonts/",  HOST.SEPARATOR."app".SEPARATOR."includes/fonts/",$this->content);
	   
	   $this->content = str_replace("/plugins/",  HOST.SEPARATOR."app".SEPARATOR."includes/plugins/",$this->content);
	   
	   $this->content = str_replace("{token}", $this->token = $_SESSION['token'],  $this->content);
	   
	   $this->content = str_replace("{HOST}", HOST,  $this->content);
	   
	   $this->content = str_replace("{username}", $_SESSION['user']['name'],  $this->content);
	   
	   
	   //count points for left menu
	  
	   if($_SESSION['user_auth'] == true) {   
	   $this->content = str_replace("{menu_count_user}", MainAction::menuCountUser(),  $this->content);
	   $this->content = str_replace("{menu_count_resolution}", MainAction::menuCountResolution(),  $this->content);
	   $this->content = str_replace("{menu_count_allapplications}", MainAction::menuCountAllApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_finish_applications}", MainAction::menuCountFinishApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_offtime_applications}", MainAction::menuCountOffTimeApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_control_applications}", MainAction::menuCountControlApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_execute_applications}", MainAction::menuCountExecuteApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_ipuzzle_applications}", MainAction::menuCountIpuzzleApplications(),  $this->content);
	   $this->content = str_replace("{menu_count_message}", MainAction::menuCountMessage(),  $this->content);
	   
	   
	   }
	   
	   
	   
	   if($_GET['act'] == "userview") {
	   $this->content = str_replace("{usercontrol_userview}", UsercontrolAction::view(),  $this->content);
	   }
	   
	   
	   if($_GET['act'] == "useredit") {
	   $this->content = str_replace("{usercontrol_edit}", UsercontrolAction::edit(),  $this->content);
	   }
	   
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "add") {
	   $this->content = str_replace("{select_userlist}", ApplicationsAction::selectUserlist(),  $this->content);
	   $this->content = str_replace("{this_user}", $_SESSION['user']['id'],  $this->content);
	   }
	   
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "worknow") {
	   $this->content = str_replace("{application}", ApplicationsAction::worknow(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "finished") {
	   $this->content = str_replace("{application}", ApplicationsAction::finished(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "offtimes") {
	   $this->content = str_replace("{application}", ApplicationsAction::offtimes(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "control") {
	   $this->content = str_replace("{application}", ApplicationsAction::control(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "execute") {
	   $this->content = str_replace("{application}", ApplicationsAction::execute(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "ipuzzle") {
	   $this->content = str_replace("{application}", ApplicationsAction::ipuzzle(),  $this->content);
	   }
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "resolution") {
	   $this->content = str_replace("{application}", ApplicationsAction::resolution(),  $this->content);
	   }
	   
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "fullview") {
	   $this->content = str_replace("{application}", ApplicationsAction::fullview(),  $this->content);
	   }
	   
	   
	   if($_GET['route'] == "applications" && $_GET['act'] == "edit") {
	   $this->content = str_replace("{application}", ApplicationsAction::edit(),  $this->content);
	   }
	   
	   
	   
	   if($_GET['route'] == "messages") {
	   $this->content = str_replace("{systems_mail}", MessagesAction::_construct(),  $this->content);
	   }
	   
	   
	   
	   if(isset($_GET['message'])) {
	   $this->content = str_replace("{alert}", "<br/>".$_GET['message']."<br/><br/>",  $this->content);
	   } else {
	   $this->content = str_replace("{alert}", "",  $this->content);   
		   }
	   
	   
	   
	   
	   preg_match_all("|{(.*)}|", $this->content, $out, PREG_PATTERN_ORDER);
	   if(!$_SESSION['user_auth'] || empty($_SESSION['user_auth']) || $_SESSION['user_auth'] == false ) {
	       preg_match_all("#{hide-nologin}(.*?){/hide-nologin}#is", $this->content, $hideNoLoginOut, PREG_PATTERN_ORDER);
		   
		   
	   
		   foreach($hideNoLoginOut as $key=>$matches) {
		   $this->content = str_replace($matches,"", $this->content);
		   }
	   }//end if(!$_SESSION['user_auth']
	   
	   
	   
	   
	   
	   
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