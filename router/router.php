<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Router
/@ Target: include Controllers and Methods from URL route 
/@ Method:
/@ Params: 
/* 
*/

class Router implements IntRouter {

   function route($urlRoute) {
      
	  $Inspector = new Inspector();
	  
	  if(isset($_GET['route'])) {
		  
		  
		  $route = $Inspector->ClearString(trim($urlRoute));
		  $route = trim(ucfirst($route));
	
		  $ControllerPath = ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR.$route."Controller.php"; 
	  

		  if(file_exists($ControllerPath)) {
			  
			  if($route) {
				 require_once $ControllerPath;
				 
				 $class = $route."Controller";
				 
				 if(isset($_GET['act'])) {
					 
					if($_SESSION['user_auth'] && $_SESSION['user_auth'] == true) {
							 if($act = $Inspector->ClearString(trim($_GET['act']))) {
								

										$class::$act();
								
							 }else{
								//Redirect::url("404.html");
							 }//end if act valid
					} else {
					        if(file_exists(ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php")) { 
		 
				           require_once ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php";
						 
				          SinginController::_construct();
		 
			               }
				   }//if($_SESSION['user_auth']
				   
				 }else {
				     if( $_SESSION['user_auth'] && $_SESSION['user_auth'] == true ) {
				  	     $class::_construct();
					 } else {
					    if(file_exists(ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php")) { 
		 
				           require_once ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php";
						 
				          SinginController::_construct();
		 
			               }
					 }
				 }//if(isset($_GET['act']
				 
			  }else {
				 
				 
			  }//end if $route
				  
		  } else {
			  
		  Redirect::url("404.html");
			  
		  }//end file_exists
	  
	  } else {
		 
		 if(!$_SESSION['user_auth'] || empty($_SESSION['user_auth']) || $_SESSION['user_auth'] == false ) {
		
		     if(file_exists(ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php")) { 
		 
				 require_once ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."SinginController.php";
						 
				 SinginController::_construct();
		 
			 } else {
			 
			 }//end file exists
		 }// !$_SESSION['user_auth']
		 
		 if($_SESSION['user_auth'] && $_SESSION['user_auth'] == true ) {
			 if(file_exists(ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."MainController.php")) { 
			 
				 require_once ROOT.SEPARATOR."core".SEPARATOR."controllers".SEPARATOR."MainController.php";
						 
				 MainController::main();
			 
			 } else {
			 
			 }//end file exists
		 }// $_SESSION['user_auth']
	  }
	  
   }

}//end class

$Router = new Router();
$Router->route($_GET['route']);
?>