<?php
/*
/@ Author: tropic.r@gmail.com
/@ Special for UA ITlab 2016 
/@ Class: Usercontrol
/@ Target: action page
/@ Method:
/@ Params:   
*/
		
class  UsercontrolAction {
		    
	static function _construct() {
		self::view();
	}
	
	
	
	static function view() {
	   $Superquery = new Superquery;
	   $sqlRes = $Superquery->getCustom("SELECT * FROM fus_users WHERE login NOT IN ('admin')");
	   
	   do {
	   
	   if(!empty($fromSql['id'])) {   
	      $sqlRow .= "<tr>
		  <td>$fromSql[id]</td> 
		  <td>$fromSql[name]</td> 
		  <td>$fromSql[login]</td> 
		  <td><a href='' title='отправить письмо'><i class='fa fa-envelope'>          </i> &nbsp;&nbsp;$fromSql[email]
		      
			  <a/>
		  </td> 
		  <td>$fromSql[last_in]</td> 
		  <td>$fromSql[profession]</td>
		  <td><center>
			  <ul>
			  <li><a href='".HOST.SEPARATOR."/usercontrol/trash/$fromSql[id]/' title='удалить пользователя'><i class='fa fa-trash'></i></a></li>
			  <li><a href='".HOST.SEPARATOR."/usercontrol/useredit/$fromSql[id]/' title='редактировать'><i class='fa fa-briefcase'></i></a></li>
			  </ul></center>
		  </td>
		  </tr>";
	   }
	   
	   }
	   while($fromSql = $sqlRes->getAssoc());
	    

       return $sqlRow;


	}
	
	
	
	static function trash() {
	    
		$Superquery = new Superquery;
	    $sqlRes = $Superquery->getCustom("DELETE FROM fus_users WHERE id = '$_GET[id]'")->getAssoc();
		Redirect::url("usercontrol/userview/?message=пользователь удален!");
		
	}
	
	
	
	static function edit() {
	    
		$Superquery = new Superquery;
	    $sqlRes = $Superquery->getCustom("SELECT * FROM fus_users WHERE id = '$_GET[id]'")->getAssoc();
	    
		switch($sqlRes['role']) {
		  case"1":
		    $role = "директор";
		  break;
		  
		  case"2":
		    $role = "помощник директора";
		  break;
		  
		  case"3":
		    $role = "сотрудник";
		  break;
		}
	    
	    $data = "
	        <form class='usercontrolForm' method='post' action=''>
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon1'>#</span>
              <input type='text' class='form-control' placeholder='Имя пользователя' name='usercontrol_editname' value='$sqlRes[name]' required aria-describedby='basic-addon1'>
            </div>
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon2'>#</span>
              <input type='text' class='form-control' placeholder='Логин пользователя' value='$sqlRes[login]' name='usercontrol_editlogin' required aria-describedby='basic-addon2'>
            </div>
            
            <div class='input-group' style='border:1px solid red;'>
              <span class='input-group-addon' id='basic-addon3'>#</span>
              <input type='password' class='form-control' placeholder='Пароль пользователя нельзя изменить !!! введите новый пароль или оставьте пустым' name='usercontrol_editpassword' aria-describedby='basic-addon3'>
            </div>
            
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon4'>#</span>
              <input type='email' class='form-control' placeholder='Емейл пользователя'  value='$sqlRes[email]' name='usercontrol_editemail' required aria-describedby='basic-addon4'>
            </div>
            
            
            <div class='input-group'>
              <span class='input-group-addon' id='basic-addon5'>#</span>
              <input type='text' class='form-control' placeholder='Должность пользователя'  value='$sqlRes[profession]' name='usercontrol_editprofession' required aria-describedby='basic-addon5'>
            </div>
            
            <fieldset>
              <legend>Права на сайте</legend>
              
             <select name='usercontrol_editrole' class='selectpicker'>
                <optgroup label='выбран сейчас'>
				
				<option value='$sqlRes[role]'>$role</option>
				</optgroup>
				<optgroup label='_____________________'>
				
				</optgroup>
                <option value='3'>Сотрудник</option>
                <option value='2'>Помощник директора</option>
                <option value='1'>Директор</option>
     
            </select>

            <div class='input-group'>
             
             <input type='hidden' name='token' value='".$_SESSION['token']."'/>   
             
            </div>
            </fieldset>
            
             <div class='input-group'>
              <input name='usercontrol_editsub' type='submit' class='form-control' value='сохранить' aria-describedby='basic-addon6'>
            </div>
            
            </form>
	";
	return $data;
	}
	
	
	
			
} // end class
		
		
?>