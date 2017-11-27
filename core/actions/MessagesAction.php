<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Messages
/@ Target: action page
/@ Method:
/@ Params:   
*/
		
class  MessagesAction {
		    
	static function _construct() {
		
		$Superquery = new Superquery(); 
		$SqrArr = $Superquery->getCustom("SELECT * FROM fus_messages WHERE to_user = '".$_SESSION['user']['id']."' AND closed = 0 ORDER BY date_create DESC");
		
		do {
			
		  if($SqlRow['title'] !="") {	
		    if($SqlRow['from_user'] == 0) {
				$from = "[ системное уведомление ] ";
			} else {
			    $from = "";
			}
			
			$Sql .= "
			          <div class='alert alert-block'>
					  <a href='".HOST.SEPARATOR."/messages/closed/?id={$SqlRow['id']}' type='button' class='close' data-dismiss='alert'>закрыть  <i class='fa fa-check-square-o'></i>
</a>
					   <h4>$from : $SqlRow[title]</h4>
					   $SqlRow[text]
					   <hr class='hr'/>
					   <p style='font-size:12px;'>$SqlRow[date_create]</p>
					  </div>
			";
		  }
		}
		while($SqlRow = $SqrArr->getAssoc());
		
		return $Sql;
	}
	
	
	
	
	static function closed() {
	   $Superquery = new Superquery();
	   
	   if($_GET['route'] == "messages" && $_GET['act'] == "closed" && !empty($_GET['id'])) {
		   
	   $Superquery->getCustom("UPDATE fus_messages SET closed=1 WHERE id = '".$_GET['id']."'");


	   Redirect::url("messages/?message=подтверждено");
	   }
	}
	
	
	
			
} // end class
		
		
?>