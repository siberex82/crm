<?php
session_start();
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: handler js 
/@ Method:
/@ Params:  
/* 
*/

if(isset($_POST['event'])) {
	
	include_once (realpath($_SERVER['DOCUMENT_ROOT']."/cnf/system.php"));
	include_once (realpath($_SERVER['DOCUMENT_ROOT']."/cnf/sql.php"));
	include_once (realpath(dirname(__DIR__)."/parents/MainInterface.php"));
	include_once (realpath($_SERVER['DOCUMENT_ROOT']."/core/plugins/dbQueryConstructor_plugin.php"));

    $Superquery = new Superquery();
	
	switch($_POST['event']) {
	
	
	
	case "getMessage":
		
		$ar = $Superquery->getCustom("SELECT * FROM fus_messages WHERE to_user = '".$_SESSION['user']['id']."' AND closed = 0 AND popup_show = 0 ORDER BY date_create DESC");
		if($ar) {
		$SqrArr = $ar->getAssoc();
		}
		if($SqrArr['text'] != "") {  echo $SqrArr['text']."|".$SqrArr['id']; } else { echo false;}
		
	break;
	
	
	
	
	case "closeMessage":
	    
		$upd = $Superquery->getCustom("UPDATE fus_messages SET popup_show = '1' WHERE to_user = '".$_SESSION['user']['id']."' AND id = '$_POST[closeid]' ");
		
		if($upd) { echo true; } else { echo false;}
		
	break;
		
	
	
	
    case "countMessage":

	   $sqlRes = $Superquery->getCustom("SELECT COUNT(id) FROM fus_messages WHERE to_user = ".$_SESSION['user']['id']." AND closed = 0")->getArray();

	   echo $sqlRes[0];
   
	break;	
	}
	
	


}

?>