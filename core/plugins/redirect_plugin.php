<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class:  Redirect
/@ Target: Redirect 401 403 404 500 for error
/@ Method: url($data)
/@ Params:  
/* 
*/

class Redirect implements IntRedirect {
    
	static function url($url=NULL) {
		header("Location: http://".$_SERVER['HTTP_HOST'].SEPARATOR.$url);
	}
}
?>