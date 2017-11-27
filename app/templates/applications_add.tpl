<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Задачи</a> 
              </li>
              
              <li><a href="#">Добавить новую задачу</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Страница добавления задач зарегистрированным пользователям. Добавление задачи позволяет указать дату начала и дату ккрайнего срока выполнения,<br/> так же можно прикрепить файл и назначить контролера по процессу выполнения. </span> 
            
            <div class="clr"></div>
            </div>
            
            <form class="usercontrolForm" method="post" action="" enctype="multipart/form-data">
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">#</span>
              <input  type="text"  class="form-control" placeholder="Краткое название задачи" name="application_add_title" required aria-describedby="basic-addon1">
            </div>
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">#</span>
              <input  type="text"  class="form-control date" placeholder="Дата начала" name="application_add_datestart" required aria-describedby="basic-addon2">
            </div>
            
            
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">#</span>
              <input  type="text"  class="form-control date" placeholder="Дата окончания" name="application_add_dateend" required aria-describedby="basic-addon3">
            </div>
            
           
            <fieldset>
              <legend>Выбрать исполнителя</legend>
              
               <select name="application_add_foruser" class="selectpicker">

                {select_userlist}
     
               </select>

               <input type="hidden" name="application_add_fromuser" value="{this_user}"/>
             
            </fieldset>
            
            <br/><br/>
            <fieldset>
              <legend>Выбрать контролера</legend>
              
              <select name="application_add_controler" class="selectpicker">

                {select_userlist}
     
            </select>

             <input type="hidden" name="token" value="{token}"/>   
             
            </fieldset>
            
            
            <br/><br/>
            <fieldset>
              <legend>Приоритет задания</legend>
              
              <select name="application_add_priority" class="selectpicker">

                <option value="обычный (выполнить за указанный срок)">обычный (выполнить за указанный срок)</option>
                <option value="средний (желательно закончить раньше)">средний (желательно закончить раньше)</option>
                <option value="срочный  (немедленно приступить к выполнению)">срочный  (немедленно приступить к выполнению)</option>
     
            </select>

             <input type="hidden" name="token" value="{token}"/>   
             
            </fieldset>
            
            
            <br/>
            <fieldset>
              <legend>Прикрепить файл</legend>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon3">#</span>
              <input type="file"  name="application_add_file" aria-describedby="basic-addon3">
            </div>
            </fieldset>
            
            
             <div class="input-group">

              <textarea class="form-control textarea" placeholder="Текст задачи" name="application_add_text"></textarea>
            </div>
            
            
            
            <div class="input-group">
              <input name="application_add_sub" type="submit" class="form-control" value="сохранить" aria-describedby="basic-addon6">
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