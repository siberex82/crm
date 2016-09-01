<? session_start();
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: check user for authorisated & user singin 
/@ Method:
/@ Params:  
/* 
*/

class UserCheck implements IntUserCheck {
   protected $array;
   protected $login;
   protected $pass;
   protected $token;
   
   function __construct($array) {
       $this->array = $array;
	   $this->singin_generator();
   }
   
   	
   function authentication() {
   }
   
   
   
   
   function singin_generator() {
          
       $request = $this->array;
	   
	   $this->login = "fusion";
	   $this->pass = "10101010101";
	   $this->token = $_SESSION['token'];
	   
	   if($request['auth_name'] == $this->login){
	      
		  if($request['auth_pass'] == $this->pass) {
		      
			   $_SESSION['auth'] = true;  
			   $_SESSION['role'] = "root";
			   $_SESSION['error_message'] = "";
			   header("Location:".HOST."/generator/auth/");
		  } else{ 
	          $_SESSION['error_message'] = "неверные данные";
			  }
		  
	   }else{ 
	          $_SESSION['error_message'] = "неверные данные";
			  }
 
   }
   
   
   
   
   function return_request() {
	   return $this;
   }
   
   
   
   
}//end class
?>