<? session_start();
/*
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Target: check user for authorisated & user singin 
/@ Method:
/@ Params:  
/* 
*/

class UserCheck implements IntUserCheck {
   protected $array;
   protected $login;
   protected $pass;
   protected $token;
   
   protected $authLogin;
   protected $authPass;
  
   public $message;
   protected $usercontrolPass;
   
   function __construct($array) {
       $this->array = $array;
	   $this->singin_generator();
	   $this->generation();
	   $this->authentication();
	   $this->usercontrol_adduser();
	   $this->usercontrol_edituser();
	   $this->application_add();
	   $this->application_edit();
   }
   
   
   
   function usercontrol_adduser() { 

	   if(isset($_POST["usercontrol_addsub"])) {
       $request = $this->array;
	   $Superquery = new Superquery();
	   
       $this->token = $_SESSION['token'];
	   
	   $this->usercontrolPass = md5($request["usercontrol_addpassword"]);
	   
	   $resRec = $Superquery->getCustom("INSERT INTO `fus_users` (name,profession,login,pass,email,role) VALUES ('{$request["usercontrol_addname"]}','{$request["usercontrol_addprofession"]}','{$request["usercontrol_addlogin"]}','".$this->usercontrolPass."','{$request["usercontrol_addemail"]}','{$request["usercontrol_addrole"]}')");
	   
	   Redirect::url("usercontrol/useradd/?message=пользователь добавлен");


      }
   }
   
   
   
   function usercontrol_edituser() {
       if(isset($_POST["usercontrol_editsub"])) {
	   $request = $this->array;
	   $Superquery = new Superquery();
	   
       $this->token = $_SESSION['token'];
	   
	   if(!empty($request["usercontrol_editpassword"])) {
		   $paswd = ",pass='$request[usercontrol_editpassword]'";
	   } else {
	       $paswd = "";
	   }
	   
	   $resQuery = $Superquery->getCustom("UPDATE `fus_users` SET name='$request[usercontrol_editname]',profession='$request[usercontrol_editprofession]',login='$request[usercontrol_editlogin]', {$paswd} email='$request[usercontrol_editemail]',role='$request[usercontrol_editrole]' WHERE id = '$_GET[id]'");
       
	    if($resQuery) {
		  Redirect::url("usercontrol/userview/?message=пользователь отредактирован");
	    }
	   }
   } 
   
   
   function application_add() { 

	   if(isset($_POST["application_add_sub"])) {
       $request = $this->array;
	   $Superquery = new Superquery();
	   
       $this->token = $_SESSION['token'];
	   
	   $application_add_title = $Superquery->escaped($request["application_add_title"]);
	   $application_add_text =  $Superquery->escaped($request["application_add_text"]);
	   
	   $saveFilePath = ROOT.SEPARATOR."/uploads/";
	   
	   if($_FILES['application_add_file']['size'] > 0) {
	     $resMove = move_uploaded_file($_FILES['application_add_file']['tmp_name'],$saveFilePath.$_FILES['application_add_file']['name']);
	   }
	   
	   
	   $resRec = $Superquery->getCustom("INSERT INTO fus_applications (date_start,date_finish,for_user,title,text,attach,from_user,controller,priority) VALUES ('{$request["application_add_datestart"]}','{$request["application_add_dateend"]}','{$request["application_add_foruser"]}','{$application_add_title}','{$application_add_text}' ,'".$_FILES['application_add_file']['name']."' ,'{$request["application_add_fromuser"]}' ,'{$request["application_add_controler"]}', '{$request["application_add_priority"]}')");
	   
	   
	   $message = "Подтвердите начало выполнения задачи !";
	   
	   $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message','Новая задача ожидает резолюции','0','1')");
	 
	 


	   Redirect::url("applications/add/?message=Задача отправлена на резолюцию");
	   
	   


      }
   }
   
   
   
   
   
   
   function application_edit() { 

	   if(isset($_POST["application_edit_sub"])) {
       $request = $this->array;
	   $Superquery = new Superquery();
	   
       $this->token = $_SESSION['token'];
	   
	   $application_edit_title = $Superquery->escaped($request["application_edit_title"]);
	   $application_edit_text =  $Superquery->escaped($request["application_edit_text"]);
	   
	   $saveFilePath = ROOT.SEPARATOR."/uploads/";
	   
	   if($_FILES['application_edit_file']['size'] > 0) {
	     $resMove = move_uploaded_file($_FILES['application_edit_file']['tmp_name'],$saveFilePath.$_FILES['application_edit_file']['name']);
		 $file = "attach = '{$_FILES['application_edit_file']['name']}',";
	   } else {
		   
		   }
	   

	   $upd = "UPDATE fus_applications SET 
	   date_start = '{$request["application_edit_datestart"]}',
	   date_finish = '{$request["application_edit_dateend"]}',
	   for_user = '{$request["application_edit_foruser"]}',
	   title = '$application_edit_title',
	   text = '$application_edit_text',
	   $file
	   from_user = '{$request["application_edit_fromuser"]}',
	   controller = '{$request["application_edit_controler"]}',
	   priority = '{$request["application_edit_priority"]}',
	   user_confirm = '0'
	    WHERE id = '$_GET[id]'";
		
	   
	   
	   $resRec = $Superquery->getCustom($upd);
	   
	   $application_edit_fromuser = $Superquery->getCustom("SELECT fu.name, fu.profession FROM fus_users fu WHERE id='$request[application_edit_fromuser]' ")->getAssoc();
	   
	   
	   
	   $link = $Superquery->escaped("<a class='btn' href='".HOST.SEPARATOR."applications/execute/'>Я исполняю</a>");
	   $message = "Задача ( $request[application_edit_title] ) в которой вы исполнитель, была отредактирована пользователем  $application_edit_fromuser[name]($application_edit_fromuser[profession]) 
	              перейдите в раздел $link  для подтверждения";
	   $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message','Задача была изменена','0','$request[application_edit_foruser]')");
	 
	 
	 
	   $link2 = $Superquery->escaped("<a class='btn' href='".HOST.SEPARATOR."applications/control/'>Я контрлирую</a>");
       $message_controler = "Задача ( $request[application_edit_title] ) в который вас назначили контролером, была отредактирована пользователем $application_edit_fromuser[name]($application_edit_fromuser[profession])
	              перейдите в раздел $link2  для ознакомления";
	   
	   
	   
	   $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message_controler','Была изменена задача где вы контролер','0','$request[application_edit_controler]')");

	   Redirect::url("applications/edit/$_GET[id]/?message=Задача успешно отредактирована");
	   
	   


      }
   }
   
  
	
   
   	
   function authentication() {
	   if(isset($_POST['singin_login'])) {
		   
	   $request = $this->array;
	   $Superquery = new Superquery();
	   
       $this->token = $_SESSION['token'];
	   $request['token'];

	   
	   $authRes = $Superquery->getCustom("SELECT * FROM `fus_users` WHERE login = '{$request['singin_login']}'")->getAssoc();
	   
	   if(!empty($authRes['login']) && $authRes['login'] == trim($request['singin_login'])) {
	      
		  if(!empty($request['singin_pass'])) {
		     $this->authPass = md5(trim($request['singin_pass']));
			 
			 if($this->authPass == $authRes['pass']) {
			    $_SESSION['user_auth'] = true;
				
				if(!$_SESSION['user']) {
				   $_SESSION['user'] = array();
				   $_SESSION['user']['id'] = $authRes['id']; 
				   $_SESSION['user']['name'] = $authRes['name'];
				   $_SESSION['user']['last_in'] = $authRes['last_in'];
				   $_SESSION['user']['login'] = $authRes['login'];
				   $_SESSION['user']['email'] = $authRes['email'];
				   $_SESSION['user']['role'] = $authRes['role']; 
				} else {
				   $_SESSION['user']['id'] = $authRes['id']; 
				   $_SESSION['user']['name'] = $authRes['name'];
				   $_SESSION['user']['last_in'] = $authRes['last_in'];
				   $_SESSION['user']['login'] = $authRes['login'];
				   $_SESSION['user']['email'] = $authRes['email'];
				   $_SESSION['user']['role'] = $authRes['role']; 
				}
				   
				
				Redirect::url();
			 }else{
				$_SESSION['user_auth'] = false; 
			 }// auth pass
		  }// if !empty pass
		  
		  
	   } else {
		   
		  $_SESSION['user_auth'] = false;  
		     
	   }//if login
	   }
   }
   
   
   
   
   
   
   
   
   
   
   function singin_generator() {
       if(isset($_POST['auth_name'])) {
		     
       $request = $this->array;
	   
	   $this->login = "fusion";
	   $this->pass = "10101010101";
	   $this->token = $_SESSION['token'];
	   
	   if($request['auth_name'] == $this->login){
	      
		  if($request['auth_pass'] == $this->pass) {
		      
			   $_SESSION['auth'] = true;  
			   $_SESSION['role'] = "root";
			   $_SESSION['error_message'] = "";
			   header("Location:".HOST."/generator/auth/");
		  } else{ 
	          $_SESSION['error_message'] = "неверные данные";
			  }
		  
	   }else{ 
	          $_SESSION['error_message'] = "неверные данные";
			  }
	   }
   }
   
   
   
   
   
   
   function generation() {
	  $request = $this->array;
	   
      $Generation = new Generation();
	  $Generation->generate($request);   
   } // end generation()
   
   
   
   
   
   
   
   
   function return_request() {
	   return $this;
   }
   
   
   
   
}//end class
?>