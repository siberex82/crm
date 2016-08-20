<?php

/*
/
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Index point 
/
*/

try {
  require_once realpath(dirname(__DIR__))."/init/start.php";
  
  $initSystem->init();
  
} 
catch(Exception $e) {
  
  echo $e->getMessage();
  	
}




?>