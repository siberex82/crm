<div class="container-fluid">
   <div class="row-fluid">
       <div class="col-md-12">
             <hr class="hr"/>
             
             <ul class="breadcrumb">
              <li><a href="#">Задачи</a> 
              </li>
              
              <li><a href="#">Завершенные задачи</a> 
              </li>

            </ul>
            <hr class="hr"/>
            
            <div class="alert alert-info">
            <i class="fa fa-info-circle" aria-hidden="true"></i>
            <span>Страница доступна только пользователю с уровнем доступа "директор", контент страницы содержит завершенные задачи пользователей,<br/> и подлежат подтверждению выполнения старшим по рангу.</span> 
            
            <div class="clr"></div>
            </div>
            
            <!--div class="well">
                 dsfdsfdsf  dsafdsf
            </div-->
            
              <table class="table table-striped">
              <thead>
                 <tr><th>Создана</th><th>Название</th><th>Начать с</th> <th>Окончить до</th> <th>Кем поставлена</th> <th>Исполнитель</th> <th>Контролирует</th> <th>Приоритет</th> <th>Управление</th></tr>
              </thead>
              
              <tbody>
                {application}
              </tbody>
            </table>
          
       </div>
   </div>
</div>