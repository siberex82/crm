<?php
if(!session_start()) {
  session_start();
}
ob_start();
/*
/
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Index point 
/
*/

try {
  $start = realpath(dirname(__DIR__))."/init/start.php";
  
  if(file_exists($start)) {
    require_once $start;
  
  $initSystem->init();
  } else {
	throw new Exception("Fatal Error! {$start} not found");  
	  }
} 

catch(Exception $e) {
  
  echo $e->getMessage();
  	
}

?>