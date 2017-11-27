<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Inspector
/@ Target: main class for query to db
/@ Method:
/@ Params:  
/* 
*/


class Superquery implements IntSuperquery {
   
   protected $table;
   protected $data;
   protected $linkDb;
   
   function __construct() {
	   
	   require_once ROOT.SEPARATOR."cnf".SEPARATOR."sql.php";
	   $Connect = new Connect();
	   $this->linkDb = $Connect->db();
	   
   }// end construct
   
   
   function table($table) {
	   
	  $this->data = mysqli_query($this->linkDb,"SELECT * FROM {$table}") or die("query Error!");
	  
	  return $this;
	   
   }//end function table
   
   
   
   
   function escaped($string) {
       return mysqli_real_escape_string($this->linkDb,$string);
   }//escape
   
   
   
   
   
   function getCustom($table) {
	   
	   $this->data = mysqli_query($this->linkDb,$table) or die(mysqli_error($this->linkDb));
	   
	   if($this->data) {
		   
	   return $this;
	   
	   }
   }//end function getCustom
   
   
   
 
   
   function getAssoc() {
	   
	   $data = mysqli_fetch_assoc($this->data);
	   
	   //$Connect->close();
	   
	   return $data;
	   
	   //mysqli_free_result($this->data);
	   
   }//end function getAssoc
   
   
   
   
   
   
   
   function getArray() {
	   
	  $data = mysqli_fetch_array($this->data);
	  
	  return $data;
	   
   }//end function getArray
   
   
   
   
   
   
   
   function getTable() {

   }//end function getTable
   
   
   

   
   
   
   
   

}//end class




?>