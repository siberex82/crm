<?php 
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: check user for authorisated & user singin 
/@ Method:
/@ Params:  
/* 
*/

class Message {
	
	 static function show($text=NULL) {
		$text2 = rawurlencode($text);
		
		$str = "Тестовый текст";
 
        $str = urlencode($str);
 


	    Redirect::url("usercontrol/useradd/?message=".$str);
	}
	
}
?>