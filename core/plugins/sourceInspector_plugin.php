<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Inspector
/@ Target: clear url route
/@ Method:
/@ Params:  
/* 
*/

class Inspector {
   
   function ClearString($data) {
       
	   if(preg_match("/^[a-z]+$/",$data,$matchesRes)) {
		   $data = strip_tags($data);
           $data = htmlspecialchars($data);
           $data = mysql_escape_string($data);
	       return $data;
	   }else{
		   Redirect::url("404.html");
		   return false;
		   }
	   
   }

}



?>