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

class MainAction {
   
   static function menuCountUser() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_users")->getArray();

	   
	   return $sqlRes[0];
	   //Redirect::url("usercontrol/userview/?message=пользователь удален!");
   }
   
   static function menuCountResolution() {
	   
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE resolution = 0")->getArray();

	   
	   return $sqlRes[0];
   
   }
   
   
   static function menuCountAllApplications() {
       $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE finished NOT IN(1) AND resolution = 1")->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountFinishApplications() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE finished = 1")->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountOffTimeApplications() {
	   $Superquery = new Superquery;
	   $date = date("Y-m-d");
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE date_finish < '$date'  AND resolution = 1")->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountControlApplications() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE finished NOT IN(1) AND resolution = 1 AND controller = ".$_SESSION['user']['id'])->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountExecuteApplications() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE for_user = ".$_SESSION['user']['id']."")->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountIpuzzleApplications() {
       $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_applications WHERE from_user = ".$_SESSION['user']['id']."")->getArray();

	   
	   return $sqlRes[0];
   }
   
   
   static function menuCountMessage() {
       $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_messages WHERE to_user = ".$_SESSION['user']['id']." AND closed = 0")->getArray();

	   
	   return $sqlRes[0];
   }
   
}//end class


?>