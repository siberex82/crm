<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: catcher for post & get queries
/@ Params:  #
/* 
*/



class Catcher implements IntCatcher {
	
	
	
	
	protected $request;
	
	
    
	
	
	function __construct() {
	   
	   switch($_SERVER['REQUEST_METHOD']){
		
		
				case 'GET': 
				       $the_request = &$_GET; 
				break;
				
				
				
				case 'POST': 
				       $the_request = &$_POST;
				   
					   if(file_exists(ROOT.SEPARATOR."cnf/requests.php")){
						   
							   include_once ROOT.SEPARATOR."cnf/requests.php";
                               
							   $request_array = array();
							   
							   foreach($the_request as $key=>$val) {
								   
								    if(array_key_exists($key, $access_post)) {
										 
									     if(isset($_POST["token"])) {
										    $_POST["token"] = $_SESSION['token'];
										 }
										 
										 $request_array[$key] = $val;  

									}else {
										 $_POST[$key] = NULL;

										 throw new Exception("Error ! POST request '{$key}' not access!");
									}
								
							   }//end foreach
							   
							   $UserCheck = new UserCheck($request_array);
							   
							   //$UserCheck->singin_generator(); 
						   
					   }else{
						   
						       throw new Exception("Error ! request list not found");
					   
					   }//end if file exists
	
				break;
			
		}//end switch
		

	}//end __construct
	
	
	
	
	
	static function send($request) {
		$request;
	}
	
	
	
	
}

$Catcher = new Catcher();
?>