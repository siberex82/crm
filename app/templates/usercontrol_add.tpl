<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Пользователи</a> 
              </li>
              
              <li><a href="#">Добавить нового пользователя</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Страница добавления нового пользователя, доступна пользователям с уровнем доступа "директор".<br/> ВНИМАНИЕ !!! Пароль в целях безопасности не возможно восстановить
            , создавая пароль для нового пользователя не забудьте его записать.</span> 
            
            <div class="clr"></div>
            </div>
            
            
            <form class="usercontrolForm" method="post" action="">
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">#</span>
              <input type="text" class="form-control" placeholder="Имя пользователя" name="usercontrol_addname" required aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">#</span>
              <input type="text" class="form-control" placeholder="Логин пользователя" name="usercontrol_addlogin" required aria-describedby="basic-addon2">
            </div>
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">#</span>
              <input type="password" class="form-control" placeholder="Пароль пользователя" name="usercontrol_addpassword" required aria-describedby="basic-addon3">
            </div>
            
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon4">#</span>
              <input type="email" class="form-control" placeholder="Емейл пользователя" name="usercontrol_addemail" required aria-describedby="basic-addon4">
            </div>
            
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon5">#</span>
              <input type="text" class="form-control" placeholder="Должность пользователя" name="usercontrol_addprofession" required aria-describedby="basic-addon5">
            </div>
            
            <fieldset>
              <legend>Права на сайте</legend>
              
             <select name="usercontrol_addrole" class="selectpicker">

                <option value="3">Сотрудник</option>
                <option value="2">Помощник директора</option>
                <option value="1">Директор</option>
     
            </select>

            <div class="input-group">
             
             <input type="hidden" name="token" value="{token}"/>   
             
            </div>
            </fieldset>
            
             <div class="input-group">
              <input name="usercontrol_addsub" type="submit" class="form-control" value="сохранить" aria-describedby="basic-addon6">
            </div>
            
            </form>

            <!--div class="well">
                 dsfdsfdsf  dsafdsf
            </div-->
            
            <!--table class="table table-striped">
              <thead>
                 <tr><th>dgdfg</th><th>dfgdfg</th><th>dfgfg</th></tr>
              </thead>
              
              <tbody>
                 <tr><td>dgdfg</td><td>dfgdfg</td><td>dfgfg</td></tr>
                 <tr><td>dgdfg</td><td>dfgdfg</td><td>dfgfg</td></tr>
                 <tr><td>dgdfg</td><td>dfgdfg</td><td>dfgfg</td></tr>
                 <tr><td>dgdfg</td><td>dfgdfg</td><td>dfgfg</td></tr>
              </tbody>
            </table-->
          
       </div>
   </div>
</div>