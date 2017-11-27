<div class="">
   <div class="">
       <div class="">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Пользователи</a> 
              </li>
              
              <li><a href="#">Управление пользователями</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Данная страница содержит список зарегистрированных пользователей, управление каждым их них разрешено только пользователям с уровнем доступа "директор". <br/> кликнув на emeil в поле пользователя вы получите возможность отправить письмо.</span> 
            
            <div class="clr"></div>
            </div>
        
            <!--div class="well">
                 dsfdsfdsf  dsafdsf
            </div-->
            
            <table class="table table-striped table-bordered">
              <thead>
                 <tr><th>id</th><th>имя пользователя</th><th>логин</th><th>emeil</th><th>последний вход</th><th>должность</th><th>управление</th></tr>
              </thead>
              
              <tbody>
                 {usercontrol_userview}
                 
                 
              </tbody>
            </table>
          
       </div>
   </div>
</div>