<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Applications
/@ Target: action page
/@ Method:
/@ Params:   
*/
		
class  ApplicationsAction {
		    
	static function _construct() {
		self::view();
	}
	
	

	
	static function view() {
	  
	}
	
	

	
	static function selectUserlist() {
	   
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT * FROM fus_users");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "
		  <option value='$fromSql[id]'>$fromSql[name] ($fromSql[profession])</option> 
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	   
	}
	
	
	
	
	static function curent_finish() {
	   $Superquery = new Superquery;
	   $Superquery->getCustom("UPDATE fus_applications SET finished='1' WHERE id = '$_GET[id]'");
       
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE fa.id = '$_GET[id]'
");
	   
	   $fromSql = $sqlRes->getAssoc();
	   
	   $escaped_text = $Superquery->escaped("<a href='".HOST.SEPARATOR."applications/ipuzzle/'>посмотреть</a>");
	   
	   $message = "Пользователь $fromSql[name_To]($fromSql[profession_To]) выполнил задачу ($fromSql[title])  $escaped_text ";
	   
	   $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message','Задача была выполнена пользователем.','0','1')");
	   
	   if($sqlRes) {return true;}else {return false;}
	}

	
	
	
	
	
	static function fullview() {
	   $Superquery = new Superquery;
	   
	   if($_GET['act'] == "fullview" && !empty($_GET['id'])) {
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE fa.id = '$_GET[id]'
");
	   
	   $fromSql = $sqlRes->getAssoc(); 
          
		  if(!empty($fromSql['attach'])){
			  $file = "<a href='".HOST.SEPARATOR."uploads/{$fromSql['attach']}'> <i class='fa fa-download' aria-hidden='true'></i> загрузить</a>";
		   } else {
			  $file = "прикрепленных файлов нет";
			   }
		  
	      $sqlRow .= "
		   <tr><td style='width:400px !important;'><h4>$fromSql[title]</h4></td> <td></td></tr>
		   <tr> <td><i class='fa fa-calendar' aria-hidden='true'></i>
 Задание создано :</td> <td>$fromSql[date_create]</td></tr>
		   
		   <tr> <td><i class='fa fa-calendar' aria-hidden='true'></i> Начать задание с:</td> <td>$fromSql[date_start]</td></tr>
		   <tr> <td><i class='fa fa-calendar' aria-hidden='true'></i> Закончить задание до :</td> <td>$fromSql[date_finish]</td></tr>
		   <tr> <td><i class='fa fa-creative-commons' aria-hidden='true'></i>
 Создал задание :</td> <td>$fromSql[name_From] ($fromSql[proffesion_From])</td> </tr> 
		   <tr><td><i class='fa fa-user' aria-hidden='true'></i> Исполнитель:</td> <td>$fromSql[name_To] ($fromSql[profession_To])</td> </tr>
		   <tr><td><i class='fa fa-user' aria-hidden='true'></i> Контролирует выполнение :</td> <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> </tr>
		   <tr><td><i class='fa fa-exclamation-circle' aria-hidden='true'></i> Приоритет задания :</td> <td>$fromSql[priority]</td> </tr> 
		   <tr><td><i class='fa fa-file-text' aria-hidden='true'></i> Описание :</td> <td><fieldset class='fieldset'>$fromSql[text]</fieldset></td></tr> 
		   <tr><td><br/><br/><i class='fa fa-cloud-download' aria-hidden='true'></i> Прикрепленный файл :</td> <td><br/><br/>$file</td></tr>
		  ";

	   
	 

       return $sqlRow;
	   }
	}
	
	
	

	
	
	
	static function worknow() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id WHERE resolution = 1  ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if($fromSql['finished'] == 0) {
	   
	   if($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
		   
	   $controlPanel = "
	         <a style='margin-left:5px; margin-right:5px;' href='".HOST.SEPARATOR."applications/edit/$fromSql[id]/' title='редактировать'>
			 <i class='fa fa-pencil' aria-hidden='true'></i></a>
             <a style='margin-left:5px; margin-right:5px;' href='".HOST.SEPARATOR."applications/delete/$fromSql[id]/' title='отменить'>
			 <i class='fa fa-times' aria-hidden='true'></i></a>

	   ";
	   } else {
		   
		$controlPanel = "<i class='fa fa-unlock-alt' aria-hidden='true'></i>
";   
		   }
	   
	   
	   
	   
	   
	   if(!empty($fromSql['title'])) {   
	      $sqlRow .= "
		   <tr>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации' class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>$controlPanel</td>
		   </tr>
		  ";
	   }
	   
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	

	
	static function resolution() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE resolution = 0 ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "
		   <tr>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>
           <a href='".HOST.SEPARATOR."applications/apply/$fromSql[id]/' style='background:red; color:#FFF;' class='btn'><i style='color:#FFF;' class='fa fa-exclamation' aria-hidden='true'></i> одобрить</a></td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	

	
	static function finished() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id WHERE finished = 1 AND resolution = 1 ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "
		   <tr>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>Управление</td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	

	
	
	static function offtimes() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id WHERE date_finish < '".date("Y-m-d")."' AND resolution = 1 ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "
		   <tr>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>Управление</td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	

	
	
	static function control() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE controller = '".$_SESSION['user']['id']."'  AND resolution = 1 ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "
		   <tr>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>Управление</td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	
	

	
	
	
	static function execute() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE for_user = '".$_SESSION['user']['id']."'  AND resolution = 1 ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) { 
	     
		 
		 
		 if($fromSql["user_confirm"] == 0) {
		   $confirm = "<a href='".HOST.SEPARATOR."applications/confirm/$fromSql[id]/' style='background:blue; color:#FFF;' class='btn'>подтверждаю</a>";
		 }
		 
		 
		 
		 if($fromSql["user_confirm"] == 1) {
		   $confirm = "<center><a title='Вы подтвердили начало выполнения'><i style='color:green; font-size:18px; margin-right:10px;' class='fa fa-check-circle' aria-hidden='true'></i></a>
		               <a class='btn' style='background:#F39C12; color:#FFF;'  href='".HOST.SEPARATOR."applications/curentfinish/$fromSql[id]/' title='Пдтвердить окончание выполнения, отправить на проверку'>закончить</a></center>
		   ";

		 }
		 
		 
		 
		 if($fromSql["finished"] == 1) {
		   $confirm = "<center><a title='Задача завершена'><i style='color:green; font-size:18px; margin-right:10px;' class='fa fa-lock' aria-hidden='true'></i>Задача завершена</a></center>";
		   $offtimes = "style='opacity:0.5;'";      
		 }
		 
		 if($fromSql['date_finish'] < date("Y-m-d")) {
		    $offtimes = "style='background:rgba(221,75,57,0.3);'";
			$confirm = "<center><i style='background:red; color:#FFF; font-size:18px; margin-right:10px;' class='fa fa-calendar-times-o'></i>
			           <a class='btn' style='background:red; color:#FFF;'  href='".HOST.SEPARATOR."applications/curentfinish/$fromSql[id]/' title='Пдтвердить окончание выполнения, отправить на проверку'>Просрочено ".date("Y-m-d")."</a></center>";
		 } 
	     
		 
		 
		   
	      $sqlRow .= "
		   <tr $offtimes>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td>$confirm</td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	

	
	
	static function execute_confirm() {
	   $Superquery = new Superquery;
	   
	   if($_GET['act'] == "confirm" && isset($_GET['id']) && $_GET['id'] !="") {
	     
		$sqlRes = $Superquery->getCustom("UPDATE fus_applications SET user_confirm = 1 WHERE id = '".$_GET['id']."'");
		 
		$sqlGetRes = $Superquery->getCustom("SELECT * FROM fus_applications WHERE id = '".$_GET['id']."' ");
		 
		$sqlApplName = $sqlGetRes->getAssoc();
		 
		if($sqlRes) {
		
		$message = "Пользователь ".$_SESSION['user']['name']." подтвердил начало выполненя задачи ".$sqlApplName['title'];
	   
	    $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message','Пользователь принял задачу','0','1')");
	 
	   
		Redirect::url("applications/execute/?message=Задача взята на исполнение");
		}
	   }
	}
	
	
	
	
	
	
	
	
	static function delete() {
	   $Superquery = new Superquery;
	   
	   if($_GET['act'] == "delete" && isset($_GET['id']) && $_GET['id'] !="") {
	     
		$sqlRes = $Superquery->getCustom("UPDATE fus_applications SET finished = 1 WHERE id = '".$_GET['id']."'");
		 
		$sqlGetRes = $Superquery->getCustom("SELECT * FROM fus_applications WHERE id = '".$_GET['id']."' ");
		 
		$sqlApplName = $sqlGetRes->getAssoc();
		 
		
	   
		Redirect::url("applications/");
		
	   }
	}
	
	
	
	
	static function returned() {
	   $Superquery = new Superquery;
	   
	   if($_GET['act'] == "returned" && isset($_GET['id']) && $_GET['id'] !="") {
	     		 
		$sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE fa.id = '".$_GET['id']."' ");
		 
		$sqlAppl = $sqlRes->getAssoc();
	   }
	   
	}
	
	
	
	
	
	static function edit() {
	   $Superquery = new Superquery;
	   
	   if($_GET['act'] == "edit" && isset($_GET['id']) && $_GET['id'] !="") {
	     		 
		$sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id  WHERE fa.id = '".$_GET['id']."' ");
		 
		$sqlAppl = $sqlRes->getAssoc();
		 
		
		$forms = "
		  <form class='usercontrolForm' method='post' action='' enctype='multipart/form-data'>
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon1'>#</span>
              <input  type='text'  class='form-control' placeholder='Краткое название задачи' value='$sqlAppl[title]' name='application_edit_title' required aria-describedby='basic-addon1'>
            </div>
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon2'>#</span>
              <input  type='text'  class='form-control date' placeholder='Дата начала' value='$sqlAppl[date_start]' name='application_edit_datestart' required aria-describedby='basic-addon2'>
            </div>
            
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon3'>#</span>
              <input  type='text'  class='form-control date' placeholder='Дата окончания' value='$sqlAppl[date_finish]' name='application_edit_dateend' required aria-describedby='basic-addon3'>
            </div>
            
           
            <fieldset>
              <legend>Выбрать исполнителя</legend>
              
               <select name='application_edit_foruser' class='selectpicker'>
                <optgroup label='выбран сейчас'>
				   <option value='$sqlAppl[fu_Id]'>$sqlAppl[name_To] ( $sqlAppl[profession_To])</option>
				</optgroup>
				
				<optgroup label='----------'></optgroup>
				
                ".self::selectUserlist()."
     
               </select>

               <input type='hidden' name='application_edit_fromuser' value='$sqlAppl[from_user]'/>
             
            </fieldset>
            
            <br/><br/>
            <fieldset>
              <legend>Выбрать контролера</legend>
              
              <select name='application_edit_controler' class='selectpicker'>
                
				<optgroup label='выбран сейчас'>
				   <option value='$sqlAppl[fu_Id3]'>$sqlAppl[name_Controller] ( $sqlAppl[profession_Controller])</option>
				</optgroup>
				
				<optgroup label='----------'></optgroup>
				
                ".self::selectUserlist()."
     
            </select>

   
             
            </fieldset>
            
            
            <br/><br/>
            <fieldset>
              <legend>Приоритет задания</legend>
              
              <select name='application_edit_priority' class='selectpicker'>
                <optgroup label='выбран сейчас'>
				   <option value='$sqlAppl[priority]'>$sqlAppl[priority] </option>
				</optgroup>
				
				<optgroup label='----------'></optgroup>
				
                <option value='обычный (выполнить за указанный срок)'>обычный (выполнить за указанный срок)</option>
                <option value='средний (желательно закончить раньше)'>средний (желательно закончить раньше)</option>
                <option value='срочный  (немедленно приступить к выполнению)'>срочный  (немедленно приступить к выполнению)</option>
     
            </select>

    
             
            </fieldset>
            
            
            <br/>
            <fieldset>
              <legend>Прикрепить файл</legend>
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon3'>#</span>
              <input type='file'  name='application_edit_file' aria-describedby='basic-addon3'>
            </div>
            </fieldset>
            
            
             <div class='input-group'>

              <textarea class='form-control textarea' placeholder='Текст задачи' name='application_edit_text'>$sqlAppl[text]</textarea>
            </div>
            
            
            
            <div class='input-group'>
              <input name='application_edit_sub' type='submit' class='form-control' value='сохранить' aria-describedby='basic-addon6'>
            </div>
            
            </form>
		";
		
		return $forms;
	     }
	  }
	
	
	
	
	
	
	
	static function ipuzzle() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT fa.*,(fu.id) AS fu_Id, (fu.name) AS name_To,(fu.profession) AS profession_To,
  (fu2.id) AS fu_Id2,(fu2.name) AS name_From, 
  (fu2.profession) AS proffesion_From ,
  (fu3.id) AS fu_Id3,(fu3.name) AS name_Controller,(fu3.profession) AS profession_Controller
  FROM fus_applications fa RIGHT JOIN fus_users fu
  ON fa.for_user = fu.id RIGHT JOIN fus_users fu2 ON fa.from_user = fu2.id RIGHT
  JOIN fus_users fu3 ON fa.controller = fu3.id WHERE from_user = '".$_SESSION['user']['id']."'  ORDER BY fa.date_create DESC
");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {
		   
		  if($fromSql['resolution'] == 0) {
			  $opacity = "style='background:rgba(205,228,237,0.5);'";
			  $status = "<span><a href='".HOST.SEPARATOR."applications/resolution/'>Требует резолюции <i class='fa fa-arrow-right'></i></a></span>";
		  }
		  
		  if($fromSql['resolution'] == 1 && $fromSql['user_confirm'] == 0){
		      $opacity = "style='background:rgba(190,239,194,0.5);'";
			  $status = "<span><a href='".HOST.SEPARATOR."applications/resolution/'>Исполнитель не<br/> подтвердил <i class='fa fa-arrow-right'></i></a></span>";
		  }
		  
		  if($fromSql['resolution'] == 1 && $fromSql['user_confirm'] == 1){
		      $opacity = "";
			  $status = "<span><a title='Вы уже взяли данную задачу на исполнение' href='".HOST.SEPARATOR."applications/resolution/'>Исполняется </a></span>";
		  }
		  
		  if($fromSql['resolution'] == 1 && $fromSql['user_confirm'] == 1 && $fromSql['finished'] == 1){
		      $opacity = "style='opacity:0.6;'";
			  $status = "<span><a title='Задача завершенае'><i class='fa fa-lock' style='color:green; font-size:18px;'></i> Задача завершена  
</a></span>
              <br/><a href='".HOST.SEPARATOR."applications/returned/$fromSql[id]/' title='отправить исполнителю на доработку'><i style='font-size:18px; margin:2px 5px 0 5px;' class='fa fa-arrow-circle-o-right'></i></a>
			  ";
		  }        
		  
		  if($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
		   
		   $controlPanel = "
				 <a style='margin-left:5px; margin-right:5px;' href='".HOST.SEPARATOR."applications/edit/$fromSql[id]/' title='редактировать'
				 ><i class='fa fa-pencil' aria-hidden='true'></i></a>
				 <a style='margin-left:5px; margin-right:5px;' href='".HOST.SEPARATOR."applications/delete/$fromSql[id]/' title='отменить'>
				 <i class='fa fa-times' aria-hidden='true'></i></a>";
		  } else {
			$controlPanel = "<i class='fa fa-unlock-alt' aria-hidden='true'></i>";   
		  }
		   
		  
		  
	      $sqlRow .= "
		   <tr $opacity>
		   <td>$fromSql[date_create]</td>
		   <td><a title='Перейти к подробной информации'  class='badge' href='".HOST.SEPARATOR."applications/fullview/$fromSql[id]/'>
		   <i class='fa fa-external-link' aria-hidden='true'></i>
 $fromSql[title]
           </a></td>
		   <td>$fromSql[date_start]</td>
		   <td>$fromSql[date_finish]</td>
		   <td>$fromSql[name_From] ($fromSql[proffesion_From])</td>  
		   <td>$fromSql[name_To] ($fromSql[profession_To])</td> 
		   <td>$fromSql[name_Controller] ($fromSql[profession_Controller])</td> 
		   <td>$fromSql[priority]</td> 
		   <td><center>$status $controlPanel</center> </td>
		   </tr>
		  ";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;
	}
	
	
	
	

	
	
	
	static function resolution_apply() {
	    $Superquery = new Superquery;
	    $sqlRes = $Superquery->getCustom("UPDATE fus_applications SET resolution=1 WHERE id = '{$_GET[id]}'");
		
		$sqlGetRes = $Superquery->getCustom("SELECT * FROM fus_applications WHERE id = '$_GET[id]'");
		$alertTo = $sqlGetRes->getAssoc();
		
		if($sqlRes) {
		
		$message = "Вам пришло новое задание  $alertTo[title]!  перейдите в раздел: Задания - Я исполняю что бы подтвердить";
	   
	    $Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message','У вас одно новое задание','0','".$alertTo['for_user']."')");
	 
	    $message2 = "Вы выбраны в качестве контролера для задания $alertTo[title]";
		$Superquery->getCustom("INSERT INTO fus_messages (text ,title ,from_user, to_user) VALUES ('$message2','Вы выбраны контролером задания','0','".$alertTo['controller']."')");
		
		Redirect::url("applications/resolution/?message=Задание отправлено исполнителю");
		}
	}
	
	
	
	
	
	
	
		
} // end class
		
		
?>