<?php
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: Db connect
/@ Params:  #
/* 
*/


class Connect  {
	
     private $connect;
	 
     const HOST = "localhost";
	 const USER = "root";
	 const PASS = "";
	 const DBNAME = "fusion";
	 
	 
	 function db() {
		 
		 //$this->connect = mysqli_connect(HOST, USER, PASS, DBNAME);
         
		 $this->connect = mysqli_connect(self::HOST,self::USER,self::PASS,self::DBNAME) or die (mysqli_error());
		 
		 /* check connection */ 
		if (!$this->connect) {
			 throw new Exception("Connect db failed");
             exit();
		}
		
		// mysqli_select_db($this->connect,DBNAME) or die ("Connect Err!");
		 
		

		return $this->connect; 
	 }
	 
	 
	 
   

}//end class


?>